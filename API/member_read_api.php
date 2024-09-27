<?php
    // {"state"   : "true" , "data":"所有會員資訊","message" : "讀取會員資訊"}
    // {"state"   : "false" , "message" : "讀取會員失敗"}
    require_once("dbtools.php");
    $link = create_connection();

    $sql = "SELECT * FROM member ORDER BY  ID DESC";
    $result = execute_sql($link,"",$sql);
    $mydata = array();
    
    while ($row = mysqli_fetch_assoc($result)){
        $mydata[] = $row;
    }
    header('Content-Type: application/json; charset=utf-8');

    echo '{"state" : true, "data": ' . json_encode($mydata,JSON_UNESCAPED_UNICODE) . ', "message" : "讀取會員資訊"}';

    mysqli_close($link);
    
?>
