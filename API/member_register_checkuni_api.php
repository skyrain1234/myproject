<?php
    //{"username":"owner01"}
    $data   = file_get_contents("php://input","r");
    $mydata = array();
    $mydata = json_decode($data,true);

    if(isset($mydata["username"])){
        if($mydata["username"]!=""){
            $p_username = $mydata["username"];
            //$p_password = $mydata["password"];
            
            require_once("dbtools.php");
            $link = create_connection();

            //搜尋傳進來的username是否存在於資料庫中
            $sql = "SELECT Username FROM member WHERE Username = '$p_username'";
            $result=  execute_sql($link,"",$sql);
                //如果搜到的筆數為0
                if(mysqli_num_rows($result) == 0){
                    echo'{"state" : true , "message" : "可以使用"}';
                }else{
                    echo'{"state" : false , "message" : "帳號已存在,請修改帳號名稱"}';
                }
            mysqli_close($link);
        }else{
            echo'{"state" : false , "message" : "欄位不得為空白"}';
        }
    }else{
        echo'{"state" : false , "message" : "欄位命名錯誤"}';
    }

    
?>