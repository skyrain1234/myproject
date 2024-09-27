<?php
    // {"state"   : "true" ,"data":[{"level":"900","level_num":"50"},{"level":"300","level_num":"50"},{"level":"200","level_num":"50"},{"level":"100","level_num":"50"},{"level":"0","level_num":"50"}], "message" : "取得資料成功"}
    // {"state"   : "false" , "message" : "取得資料失敗"}
    
    require_once("dbtools.php");
    $link = create_connection();

    $sql = "SELECT COUNT(State) as state_num , State as state FROM member GROUP BY State Order BY State ";
    $result = execute_sql($link,"",$sql);
    $mydata = array();
    
    while ($row = mysqli_fetch_assoc($result)){
        $mydata[] = $row;
    }
    echo '{"state" : true, "data": ' . json_encode($mydata) . ', "message" : "讀取會員資訊"}';

    mysqli_close($link);
    
?>
