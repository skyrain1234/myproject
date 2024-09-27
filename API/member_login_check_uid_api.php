<?php
    //{"uid01":"xxx"}
    // {"state"   : "true" , "data":"會員資訊","message" : "驗證成功,已登入"}
    // {"state"   : "false" , "message" : "驗證失敗,未登入"}
    // {"state"   : "false" , "message" : "欄位不得為空白"}
    // {"state"   : "false" , "message" : "欄位命名錯誤"}
    $data   = file_get_contents("php://input","r");
    $mydata = array();
    $mydata = json_decode($data,true);

    if(isset($mydata["uid01"])){
        if($mydata["uid01"]!=""){
            $p_uid01 = $mydata["uid01"];
            //$p_password = $mydata["password"];
            
            require_once("dbtools.php");
            $link = create_connection();

            //搜尋傳進來的username是否存在於資料庫中
            $sql = "SELECT ID,Username,Seq,Email,Birthday,Uid01,State ,Level ,Created_at FROM member WHERE Uid01 = '$p_uid01'";
            $result=  execute_sql($link,"",$sql);
                
                if(mysqli_num_rows($result) == 1){
                    //驗證成功
                    $row=mysqli_fetch_assoc($result);
                    echo'{"state" : true , "data": '.json_encode($row).',"message" : "驗證成功,已登入"}';
                }else{
                    echo'{"state" : false , "message" : "驗證失敗,未登入"}';
                }
            mysqli_close($link);
        }else{
            echo'{"state" : false , "message" : "欄位不得為空白"}';
        }
    }else{
        echo'{"state" : false , "message" : "欄位命名錯誤"}';
    }

    
?>