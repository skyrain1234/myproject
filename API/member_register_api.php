<?php
    //{"user_name":"owner01" , "pwd":"12345678" , "email":"owner@test.com" ,"birthday":"2012-05-20"}
    $data   = file_get_contents("php://input","r");
    $mydata = array();
    $mydata = json_decode($data,true);

    if(isset($mydata["username"]) && isset($mydata["password"]) && isset($mydata["email"]) && isset($mydata["birthday"])){
        if($mydata["username"]!="" && $mydata["password"]!="" && $mydata["email"] != "" && $mydata["birthday"]!=""){
            $p_username = $mydata["username"];
            //$p_password = $mydata["password"];
            $p_password= password_hash($mydata["password"] , PASSWORD_DEFAULT);
            $p_email = $mydata["email"];
            $p_birthday = $mydata["birthday"];
            
            require_once("dbtools.php");
            $link = create_connection();
            $sql = "INSERT INTO member(Username,Password,Email,Birthday) VALUES('$p_username','$p_password','$p_email','$p_birthday')";
            //INSERT 只有成功或失敗 為boolean
                if(execute_sql($link,"",$sql)){
                    echo'{"state" : true , "message" : "註冊成功"}';
                }else{
                    echo'{"state" : false , "message" : "註冊失敗"}';
                }
            mysqli_close($link);
        }else{
            echo'{"state" : false , "message" : "欄位不得為空白"}';
        }
    }else{
        echo'{"state" : false , "message" : "欄位命名錯誤"}';
    }

    
?>