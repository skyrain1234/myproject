<?php

//定義變數data:內容為 取得資料
$data   = file_get_contents("php://input" , "r");
//新增一個陣列mydata
$mydata = array();
//將字串轉為json
$mydata = json_decode("$data",true);

//確保程式是對的
//echo $mydata["name"];

//檢查欄位是否存在
if(isset($mydata["ID"])){
    //檢查欄位是否空白
    if($mydata["ID"]!=""){
        
        //設定變數用以取得該欄位資料
        $p_ID     = $mydata["ID"];
        //開啟連線
        $servername = "localhost";
        $username   = "owner";
        $password   = "123456";
        $dbname     = "testdb";
        $conn = mysqli_connect($servername,$username,$password,$dbname);

        if(!$conn)
        {
            //用.連接字串
            die("連線失敗".mysqli_connect_error());
        }

        //sql語法update
        $sql = "DELETE FROM product WHERE ID = $p_ID ";

        if(mysqli_query($conn,$sql)){
            if(mysqli_affected_rows($conn) ==1){
                echo 
                '{
                    "state"   : "true" , 
                    "message" : "刪除成功"
                  }';
            }else{
                echo 
                '{
                    "state"   : "false" , 
                    "message" : "刪除失敗,ID不存在,請聯絡管理人員"
                  }';
            }       
        }else{
            echo '{
                    "state"   : "false" , 
                    "message" : "刪除失敗'.$sql.mysqli_error($conn).'"
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