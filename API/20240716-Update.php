<?php

//定義變數:內容為 取得資料
$data   = file_get_contents("php://input" , "r");
//定義陣列mydata
$mydata = array();
//將字串轉為json
$mydata = json_decode("$data",true);

//確保程式是對的
//echo $mydata["name"];

//檢查欄位是否存在
if(isset($mydata["ID"]) && isset($mydata["name"]) && isset($mydata["price"]) && isset($mydata["num"]) && isset($mydata["remark"])){
    //檢查欄位是否空白
    if($mydata["ID"]!="" && $mydata["name"] != "" && $mydata["price"]!= "" && $mydata["num"]!= "" && $mydata["remark"]!=""){
        
        //設定變數用以取得該欄位資料
        $p_ID     = $mydata["ID"];
        $p_name   = $mydata["name"];
        $p_price  = $mydata["price"];
        $p_num    = $mydata["num"];
        $p_remark = $mydata["remark"];

        //開啟連線
        $servername = "localhost";
        $username   = "owner";
        $password   = "123456";
        $dbname     = "testdb";
        $conn = mysqli_connect($servername,$username,$password,$dbname);

        if(!$conn)
        {
            die("連線失敗".mysqli_connect_error());
        }

        //sql語法update
        $sql = "UPDATE product SET Name = '$p_name' , Price = $p_price , Num = $p_num , Remark = '$p_remark' WHERE ID = $p_ID ";

        if(mysqli_query($conn,$sql)){
            echo '{
                    "state"   : "true" , 
                    "message" : "更新成功"
                  }';
        }else{
            echo '{
                    "state"   : "false" , 
                    "message" : "更新失敗'.$sql.mysqli_error($conn).'"
                  }';
        }
        //關閉連線
        mysqli_close($conn);
    }else{
        echo '{"state" : false , "message" : "欄位不得為空白"}';
    }   
}else{
    echo'{"state" : false , "message" : "欄位命名錯誤"}';
}



?>