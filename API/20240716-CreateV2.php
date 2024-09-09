<?php
    //{"name":"雞腿飯" , "price":"100" , "num":"2", "remark":"好吃"}

    //取得資料
    $data=file_get_contents("php://input" , "r");

    //宣告陣列
    $mydata = array();

    //json_decode將字串轉為陣列
    $mydata = json_decode("$data",true);

    //如果欄位存在
    if(isset($mydata["name"]) && isset($mydata["price"]) && isset($mydata["num"]) && isset($mydata["remark"])){

        //如果資料不為空
        if($mydata["name"] != "" && $mydata["price"]!= "" && $mydata["num"]!= "" && $mydata["remark"]!=""){
                
            //設定變數，將陣列mydata中的資料指派給變數
            $p_name   = $mydata["name"];
            $p_price  = $mydata["price"];
            $p_num    = $mydata["num"];
            $p_remark = $mydata["remark"];
    
            $servername = "localhost";
            $username   = "owner";
            $password   = "123456";
            $dbname     = "testdb";
            
            //與資料庫連線
            $conn = mysqli_connect($servername,$username,$password,$dbname);
            if(!$conn){
                die("連線失敗".mysqli_connect_error());
            }
    
            //設定變數sql 內容為"字串" INSERT INTO 資料表(欄位1,欄位2,....) VAlUES("新增資料1","新增資料2",.....)
            //INSERT INTO 回傳值為boolean型態(true/false)
            $sql = "INSERT INTO product(Name,Price,num,Remark) VALUES('$p_name','$p_price','$p_num','$p_remark')";
            
            if(mysqli_query($conn,$sql)){
                echo '{
                        "state"   : "true" , 
                        "message" : "新增成功"
                    }';
            }else{
                echo '{
                        "state"   : "false" , 
                        "message" : "新增失敗'.$sql.mysqli_error($conn).'"
                    }';
            }
            //關閉連線
            mysqli_close($conn);

        }else{
            echo '{"state" : false , "message" : "欄位不得為空白"}';
    }
    }else{
        echo'{"state" : false , "message" : "欄位命名錯誤"}';
    }

        

    
?>



