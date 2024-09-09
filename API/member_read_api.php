<?php
    // {"state"   : "true" , "data":"所有會員資訊","message" : "讀取會員資訊"}
    // {"state"   : "false" , "message" : "讀取會員失敗"}
    
    require_once("dbtools.php");
    $link = create_connection();

    $sql = "SELECT ID, Username, Seq, Email,Birthday, Uid01,State,Level,Created_at FROM member ORDER BY  ID DESC";
    $result = execute_sql($link,"testdb",$sql);
    $mydata = array();
    
    while ($row = mysqli_fetch_assoc($result)){
        $mydata[] = $row;
    }
    echo '{"state" : true, "data": ' . json_encode($mydata) . ', "message" : "讀取會員資訊"}';

    mysqli_close($link);
    
?>
