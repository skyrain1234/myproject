<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 設定上傳的目標目錄
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //如果指定的資料夾不存在
    if(!file_exists($target_dir))
    {
        //建立資料夾,權限777
        mkdir($target_dir,0755);
    }

    // 檢查檔案是否已存在
    if (file_exists($target_file)) {
        echo "檔案已經存在。";
        $uploadOk = 0;
    }

    // 限制上傳的檔案格式
    $allowed_types = array("jpg", "png", "jpeg", "gif");
    if (!in_array($fileType, $allowed_types)) {
        echo "只允許上傳 JPG, JPEG, PNG, GIF 檔案。";
        $uploadOk = 0;
    }

    // 檢查 $uploadOk 是否為 0
    if ($uploadOk == 0) {
        echo "檔案未上傳。";
    } else {
        // 移動上傳的檔案到目標目錄
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "檔案 " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " 上傳成功。";
        } else {
            echo "上傳檔案時發生錯誤。";
        }
    }
}
?>
