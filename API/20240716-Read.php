<?php
    $server="localhost";
    $username="owner";
    $password="123456";
    $dbname= "testdb";

    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("連線失敗".mysqli_connect_error());
    }

    $sql = "SELECT * FROM product ORDER BY ID DESC"; //*全選 DESC遞減
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        // $row = mysqli_fetch_assoc($result);
        // echo "ID:" . $row["ID"]."Name:".$row["Name"];

        // $row = mysqli_fetch_assoc($result);
        // echo "ID:" . $row["ID"]."Name:".$row["Name"];

        // $row = mysqli_fetch_assoc($result);
        // echo "ID:" . $row["ID"]."Name:".$row["Name"];

        $mydata = array();//宣告一個陣列
        while($row = mysqli_fetch_assoc($result)){
            
            // echo "ID:" . $row["ID"]."Name:".$row["Name"];
            //陣列多一個[]則會多一個維度
            $mydata[] = $row; 
        }

        echo '{
                "state"   : "true",
                "data"    : '.json_encode($mydata).',
                "message" : "讀取產品成功" 
             }';

    }else{
        echo '{
                "state"   : "false",
                "message" : "讀取失敗" 
             }';
    }

    mysqli_close($conn);
?>

