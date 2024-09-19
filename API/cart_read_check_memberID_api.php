<?php
    // {"state"   : "true" , "data":"所有會員資訊","message" : "讀取會員資訊"}
    // {"state"   : "false" , "message" : "讀取會員失敗"}
    $data   = file_get_contents("php://input","r");
    $mydata = array();
    $mydata = json_decode($data,true);

    if(isset($mydata["member_id"])){
        
        if($mydata["member_id"]!=""){
            $c_id = $mydata["member_id"];//todo
            require_once("dbtools.php");
            $link = create_connection();
            // $sql = "SELECT *FROM product_all order by ID DESC";
            
            $sql = "SELECT a.*, b.Username, c.Product_name ,c.Image_url FROM cart_items AS a 
                    JOIN member AS b ON a.Member_id = b.ID
                    JOIN product_all AS c ON a.Product_id = c.ID 
                    WHERE a.Member_id = $c_id";
            $result = execute_sql($link,"testdb",$sql);
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

        }else{
            echo'{"state" : false , "message" : "欄位不得為空白"}';
        }

    }else{
        echo'{"state" : false , "message" : "欄位命名錯誤"}';
    }


?>
