<?php
// 引入 Upload.php 文件，確保它包含在當前範圍內
require_once 'Photo/Upload.php';

// 檢查是否有文件上傳
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取上傳的圖片文件
    $photo = $_FILES['photo'];


    // 設定上傳目錄
    $uploadDir = "../image/furniture/product";

    // 創建 Upload 類的實例
    $upload = new Upload();

    // 調用 uploadPhoto 方法進行圖片上傳
    $fileName = $upload->uploadPhoto($photo, $uploadDir, true, 300, 300, true, 100, 100);

    // 返回上傳結果
    echo "圖片上傳成功，檔名為: " . $fileName;
} else {
    echo "請上傳圖片";
}
?>