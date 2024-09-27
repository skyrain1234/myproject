<?php
header('Content-Type: text/html; charset=utf-8');
echo "當前字符集: " . mb_detect_encoding("你的測試文本");
?>
