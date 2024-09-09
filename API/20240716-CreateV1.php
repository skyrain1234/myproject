<?php
    $p_name     = $_POST["name"];//設定變數$p_name = $_POST["name"] 接收
    $p_price    = $_POST["price"];
    $p_num      = $_POST["num"];
    $p_remark   = $_POST["remark"];

   $servername = "localhost";
   $username = "owner";
   $password = "123456";
   $dbname = "testdb";

   $conn = mysqli_connect($servername,$username,$password,$dbname);
   if(!$conn){
    die("連線失敗".mysqli_connect_error());
   }

   //設定變數sql 內容為"字串" INSERT INTO 資料表(欄位1,欄位2,....) VAlUES("新增資料1","新增資料2",.....)
   $sql = "INSERT INTO product(Name,Price,num,Remark) VALUES('$p_name','$p_price','$p_num','$p_remark')";
   //INSERT INTO 回傳值為boolean型態(true/false)
   
   if(mysqli_query($conn,$sql)){
    echo '{"state" : "true" , "message" : "新增成功"}';
   }else{
    echo '{"state" : "false" , "message" : "新增失敗'.$sql.mysqli_error($conn).'"}';
    
   }

   mysqli_close($conn);
?>



