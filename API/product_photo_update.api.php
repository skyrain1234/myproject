<?php
 error_reporting(0);
 if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
    if($_FILES['file']['type'] == 'image/jpeg' || $_FILES['file']['type'] == 'image/png' ||$_FILES['file']['type'] == 'image/svg+xml'){
       
        $target_dir = "../image/product/";
        //如果指定的資料夾不存在
        if(!file_exists($target_dir))
        {
            //建立資料夾,權限777
            mkdir($target_dir,0755);
        }

        $filename = date("YmdHis")."_".$_FILES['file']['name'];//重新命名
        

        $target_file = $target_dir.$filename;
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
            $datainfo = array();
            $datainfo["state"] = true;
            $datainfo["message"]="上傳成功";
            $datainfo["原始名稱"]=$_FILES['file']['name'];
            $datainfo["filename"]=$filename;
            $datainfo["檔案格式"]=$_FILES['file']['type'];
            $datainfo["size"]=$_FILES['file']['size'];
            $datainfo["tmp_name"]=$_FILES['file']['tmp_name'];
            $datainfo["error"]=$_FILES['file']['error'];
            $datainfo["imgTitle"]=$_POST["title"];
            echo json_encode($datainfo);
        }else{
            $errinfo = array();
            $errinfo["state"] = false;
            $errinfo["message"] = "檔案傳輸失敗!";
            echo json_encode($errinfo);
        }
    }else{
        echo'{"state":false , "message":"檔案必須為jpeg , png , svg"}';
    }

 }else{
    echo'{"state":false , "message":"檔案不存在"}';
 }
?>