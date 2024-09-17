<?php
    // {"state"   : "true" , "data":"所有會員資訊","message" : "讀取會員資訊"}
    // {"state"   : "false" , "message" : "讀取會員失敗"}
    
    require_once("dbtools.php");
    $link = create_connection();

    $sql = "SELECT * FROM comments WHERE State='Y' order by ID DESC";
    $result = execute_sql($link,"testdb",$sql);
    $mydata = array();
    
    while ($row = mysqli_fetch_assoc($result)){
        
        $mydata[] = $row;
    }
    echo '{"state" : true, "data": ' . json_encode($mydata) . ', "message" : "讀取留言"}';

    mysqli_close($link);
    
?>
