<?php
// {"id":"xxx","state":"1"}

// {"state" : true, "message" : "更新成功"}
// {"state" : false, "message" : "更新失敗"}
// {"state" : false, "message" : "欄位不得為空白"}
// {"state" : false, "message" : "欄位命名錯誤"}

    $data = file_get_contents("php://input", "r");
    $mydata = array();
    $mydata = json_decode($data, true);

    if(isset($mydata["id"]) && isset($mydata["type_name"]) ){
        if($mydata["id"] != "" && $mydata["type_name"] != ""){
            
            $p_id = $mydata["id"];
            $p_type_name = $mydata["type_name"];

            require_once("dbtools.php");
            $link = create_connection();

            $sql = "UPDATE product_type SET Product_type = '$p_type_name' WHERE Type_id  = '$p_id'";
            if(execute_sql($link, "testdb", $sql)){
                echo '{"state" : true, "message" : "更新成功"}';
            }else{
                echo '{"state" : false, "message" : "更新失敗"}';
            }
            mysqli_close($link);
        }else{
            echo '{"state" : false, "message" : "欄位不得為空白"}';
        }
    }else{
        echo '{"state" : false, "message" : "欄位命名錯誤"}';
    }
?>