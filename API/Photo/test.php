<?php
require_once 'Upload.php';

$upload = new Upload();

// 模擬一個來自 HTML 表單的 $_FILES 資料
$photo = $_FILES['photo'];

// 設置上傳路徑
$path = 'uploads';

// 調用 uploadPhoto 方法，上傳並生成縮略圖
$filename = $upload->uploadPhoto($photo, $path, true, 400, 400, true, 100, 100);

echo "上傳成功！檔案名稱：".$filename;