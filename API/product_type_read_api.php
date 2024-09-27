<?php
    // {"state"   : "true" , "data":"所有會員資訊","message" : "讀取會員資訊"}
    // {"state"   : "false" , "message" : "讀取會員失敗"}
    
    require_once("dbtools.php");
    $link = create_connection();

    $sql = "SELECT * FROM product_type";
    $result = execute_sql($link,"",$sql);
    $mydata = array();
    
    while ($row = mysqli_fetch_assoc($result)){
        $mydata[] = $row;
    }
    echo '{"state" : true, "data": ' . json_encode($mydata) . ', "message" : "讀取產品資訊"}';

    mysqli_close($link);
    
?>
