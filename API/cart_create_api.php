<?php
    //{"user_name":"owner01" , "pwd":"12345678" , "email":"owner@test.com" ,"birthday":"2012-05-20"}
    $data   = file_get_contents("php://input","r");
    $mydata = array();
    $mydata = json_decode($data,true);

    if(isset($mydata["product_id"]) && isset($mydata["product_name"]) && isset($mydata["quantity"]) && isset($mydata["price"]) && isset($mydata["member_id"])){
        if($mydata["product_id"]!="" && $mydata["product_name"]!="" && $mydata["quantity"] != "" && $mydata["price"]!="" && $mydata["member_id"]!=""){
            $c_product_id= $mydata["product_id"];
            $c_product_name = $mydata["product_name"];
            $c_quantity = $mydata["quantity"];
            $c_price = $mydata["price"];
            $c_member_id = $mydata["member_id"];
            
            require_once("dbtools.php");
            $link = create_connection();
            $sql = "INSERT INTO cart_items(Member_id,Product_id,Quantity,Price) VALUES('$c_member_id','$c_product_id','$c_quantity','$c_price')";
            //INSERT 只有成功或失敗 為boolean
                if(execute_sql($link,"testdb",$sql)){
                    echo'{"state" : true , "message" : "加入購物車成功"}';
                }else{
                    echo'{"state" : false , "message" : "加入購物車失敗"}';
                }
            mysqli_close($link);
        }else{
            echo'{"state" : false , "message" : "欄位不得為空白"}';
        }
    }else{
        echo'{"state" : false , "message" : "欄位命名錯誤"}';
    }

    
?>