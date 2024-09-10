<?php
// {"id":"xxx", "email": "owner@test.com"}

// {"state" : true, "message" : "更新成功"}
// {"state" : false, "message" : "註冊失敗和錯誤代碼等"}
// {"state" : false, "message" : "欄位不得為空白"}
// {"state" : false, "message" : "欄位命名錯誤"}

    $data = file_get_contents("php://input", "r");
    $mydata = array();
    $mydata = json_decode($data, true);

    if(isset($mydata["id"]) && isset($mydata["product_name"]) && isset($mydata["product_desc"])&& isset($mydata["product_price"])&& isset($mydata["product_stock"])){
        if($mydata["id"] != "" && $mydata["product_name"] != "" && $mydata["product_desc"] != "" && $mydata["product_price"] != "" && $mydata["product_stock"] != ""  ){
            $p_id = $mydata["id"];
            $p_name = $mydata["product_name"];
            $p_desc = $mydata["product_desc"];
            $p_price = $mydata["product_price"];
            $p_price_discount = $mydata["product_price_discount"];
            $p_stock = $mydata["product_stock"];


            require_once("dbtools.php");
            $link = create_connection();
            if($p_price_discount="NULL"){
                $sql = "UPDATE product_all SET Product_name = '$p_name', Description = '$p_desc' , Price ='$p_price' , Price_discount = NULL , Stock = '$p_stock'  WHERE ID = '$p_id'";
                if(execute_sql($link, "testdb", $sql)){
                    echo '{"state" : true, "message" : "更新成功"}';
                }else{
                    echo '{"state" : false, "message" : "註冊失敗和錯誤代碼等"}';
                }
                mysqli_close($link); 
            }else{
                $sql = "UPDATE product_all SET Product_name = '$p_name', Description = '$p_desc' , Price ='$p_price' , Price_discount = '$p_price_discount' , Stock = '$p_stock'  WHERE ID = '$p_id'";
                if(execute_sql($link, "testdb", $sql)){
                    echo '{"state" : true, "message" : "更新成功"}';
                }else{
                    echo '{"state" : false, "message" : "註冊失敗和錯誤代碼等"}';
                }
                mysqli_close($link);  
            }   
        }else{
            echo '{"state" : false, "message" : "欄位不得為空白"}';
        }
    }else{
        echo '{"state" : false, "message" : "欄位命名錯誤"}';
    }
?>