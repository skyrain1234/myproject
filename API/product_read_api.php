<?php
    // {"state"   : "true" , "data":"所有會員資訊","message" : "讀取會員資訊"}
    // {"state"   : "false" , "message" : "讀取會員失敗"}
    
    require_once("dbtools.php");
    $link = create_connection();
    // $sql = "SELECT *FROM product_all order by ID DESC";
    
    $sql = "SELECT a.*,b.Product_type FROM product_all AS a JOIN product_type AS b ON a.Type_id=b.Type_id order by ID DESC";
    $result = execute_sql($link,"",$sql);
    $mydata = array();
    
    while ($row = mysqli_fetch_assoc($result)){
        
        //如果產品沒有圖片
        if($row["Image_url"]==null)
        {
            $row["Image_url"]="No_image_available.svg";
        }
        $mydata[] = $row;
    }
    echo '{"state" : true, "data": ' . json_encode($mydata) . ', "message" : "讀取產品資訊"}';

    mysqli_close($link);
    
?>
