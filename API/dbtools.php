<?php

    //定義方程式 與資料庫建立連線
    function create_connection(){
        $conn = mysqli_connect("sql100.infinityfree.com","if0_37389187","OfEAug10lSckWz ") 
            or die("連線失敗:" . mysqli_connect_error());
        /* 
            or dir 與下列意思相同
            if(!$conn){
             die("連線失敗!".mysqli_connect_error());
            }
        */
        return $conn;
    }

    //定義方程式 執行sql 設參數選定要連接的資料庫
    function execute_sql($link,$database="if0_37389187_testdb",$sql){
        mysqli_select_db($link,$database) 
            or die("連線失敗:" . mysqli_error($link));

        $result = mysqli_query($link , $sql);

        return $result;
        
    }
?>