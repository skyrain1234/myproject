<?php
    $data   = file_get_contents("php://input","r");
    $mydata = array();
    $mydata = json_decode($data,true);

    if(isset($mydata["name"]) && isset($mydata["desc"]) && isset($mydata["type"]) && isset($mydata["price"])&& isset($mydata["stock"])&& isset($mydata["state"]) && isset($mydata["photo"])){
        if($mydata["name"]!="" && $mydata["desc"]!="" && $mydata["type"] != "" && $mydata["price"]!="" && $mydata["stock"]!="" && $mydata["state"]!=""){
            $p_name = $mydata["name"];
            //$p_password = $mydata["password"];
            $p_desc = $mydata["desc"];
            $p_type = $mydata["type"];
            $p_price = $mydata["price"];
            $p_stock = $mydata["stock"];
            $p_state = $mydata["state"];
            $p_photo = $mydata["photo"];
            
            require_once("dbtools.php");
            $link = create_connection();
            $sql = "INSERT INTO product_all(Product_name,Description,Type_id,Price,Stock,State,Image_url) VALUES('$p_name','$p_desc','$p_type','$p_price','$p_stock','$p_state','$p_photo')";
            //INSERT 只有成功或失敗 為boolean
                if(execute_sql($link,"testdb",$sql)){
                    echo'{"state" : true , "message" : "建立成功"}';
                }else{
                    echo'{"state" : false , "message" : "建立失敗"}';
                }
            mysqli_close($link);
        }else{
            echo'{"state" : false , "message" : "欄位不得為空白"}';
        }
    }else{
        echo'{"state" : false , "message" : "欄位命名錯誤"}';
    }

    
?>