<?php
    $data   = file_get_contents("php://input","r");
    $mydata = array();
    $mydata = json_decode($data,true);

    if(isset($mydata["name"]) && isset($mydata["tel"]) && isset($mydata["email"]) && isset($mydata["remark"])){
        if($mydata["name"]!="" && $mydata["tel"]!="" && $mydata["email"] != "" && $mydata["remark"]!=""){
            $c_name = $mydata["name"];
            $c_tel = $mydata["tel"];
            $c_email = $mydata["email"];
            $c_remark = $mydata["remark"];
            
            require_once("dbtools.php");
            $link = create_connection();
            $sql = "INSERT INTO comments(Name,Tel,Email,Remark) VALUES('$c_name','$c_tel','$c_email','$c_remark')";
            //INSERT 只有成功或失敗 為boolean
                if(execute_sql($link,"testdb",$sql)){
                    echo'{"state" : true , "message" : "成功留言，我們將會盡快與您聯繫"}';
                }else{
                    echo'{"state" : false , "message" : "留言失敗"}';
                }
            mysqli_close($link);
        }else{
            echo'{"state" : false , "message" : "欄位不得為空白"}';
        }
    }else{
        echo'{"state" : false , "message" : "欄位命名錯誤"}';
    }

    
?>