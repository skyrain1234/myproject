<?php
    //{"username":"owner01","password":"123456"}
    /*{"state"   : "true" ,"data":"會員資訊", "message" : "登入成功"}
    {"state"   : "false" , "message" : "登入失敗"}
    {"state"   : "false" , "message" : "uid更新失敗"}
    {"state"   : "false" , "message" : "帳號不存在"}
    {"state"   : "false" , "message" : "欄位不得為空白"}
    {"state"   : "false" , "message" : "欄位命名錯誤"}}
    */

    //接收前端傳入的資料
    $data   = file_get_contents("php://input","r");
    $mydata = array();
    $mydata = json_decode($data,true);

    if(isset($mydata["username"]) && isset($mydata["password"])){
        if($mydata["username"]!="" && $mydata["password"]){
            //設定變數用以存放接收到的資料
            $p_username = $mydata["username"];
            $p_password = $mydata["password"];
            
            //使用dbtools.php與資料庫建立連線
            require_once("dbtools.php");
            $link = create_connection();

            //1.確認帳號是否存在
            //2.確認密碼是否正確 password_verify()

            //搜尋傳進來的username是否存在於資料庫中，順便撈Password之後就不用再搜尋一次
            $sql = "SELECT Username ,Password ,Seq FROM member WHERE Username = '$p_username'";
            
            //使用dbtools.php執行sql指令
            $result = execute_sql($link,"",$sql);

            //比對帳號是否存在,繼續比對密碼，因為帳號為唯一 所以=1
            if(mysqli_num_rows($result) == 1){
                
                $rows = mysqli_fetch_assoc($result);
                //echo $row["Password"];
                
                //比對密碼是否正確
                if(password_verify($p_password,$rows["Password"])){
                    //產生uid並更新資料庫
                    $hashID = hash('sha256',uniqid(time()));
                    $uid01 = substr($hashID,0,8).substr($hashID,15,20);
                    $sql = "UPDATE member set Uid01 = '$uid01' WHERE Username = '$p_username' ";

                        if(execute_sql($link,"",$sql)){
                            //uid更新成功
                            $sql = "SELECT Username ,Seq,Email,Birthday,Uid01,State,Level,Created_at FROM member WHERE Username = '$p_username'";
                            $result = execute_sql($link,"",$sql);
                            $row = mysqli_fetch_assoc($result);
                            echo'{"state" : true , "data":'.json_encode($row).',"message" : "登入成功"}';
                        }else{
                            //uid更新失敗
                            echo'{"state"   : false , "message" : "uid更新失敗"}';
                        }
                }else{
                    echo'{"state" : false , "message" : "登入失敗"}';
                }
            }else{
                echo'{"state" : false , "message" : "帳號不存在"}';
            }
            mysqli_close($link);
        }else{
            echo'{"state" : false , "message" : "失敗"}';
        }
    }else{
        echo'{"state" : false , "message" : "失敗"}';
    }

    
?>