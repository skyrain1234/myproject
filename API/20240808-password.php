<?php
//時間戳記
echo time();
echo '<br>';
echo date("Ymdhis");
echo '<br>';

//md5
echo "md5('123456'):".md5('123456');
echo '<br>';
echo "md5('abcdef'):".md5('abcdef');
echo '<br>';

//uniqid
echo "uniqid():".uniqid(time());
echo '<br>';

//hash 雜湊
echo "hash('md5',time()):".hash('md5',time());
echo '<br>';
echo "hash('sha256',time()):".hash('sha256',time());
echo '<br>';
echo "hash('sha512',time()):".hash('sha512',time());
echo '<br>';

//password_hash("密碼",演算法)
echo 'password_hash("密碼",演算法):'.password_hash("123456",PASSWORD_DEFAULT);
echo '<br>';
echo '<br>';
//$2y$10$NEi.QY1713UIG1j51uPEMOHg4JhNR8jQuHE.hE4jLAT2Cdoj.Rl5K
/*
    建立變數hash01 記錄某一個時段產生的代碼 來驗證密碼是否正確 
    即使接下來每一時刻的password_hash("123456",PASSWORD_DEFAULT)都會產生不同的代碼
    但都是由123456這個密碼所衍生的所以通過認證
*/
$hash01='$2y$10$NEi.QY1713UIG1j51uPEMOHg4JhNR8jQuHE.hE4jLAT2Cdoj.Rl5K';
if(password_verify('123456',$hash01)){
    echo '密碼正確';
}else{
    echo '密碼錯誤';
}
echo '<br>';
echo '<br>';

//產生亂數
/*
產生複雜度高的UID
*/
$hashID = hash('sha256',uniqid(time()));
echo "UID01:" .$hashID ;
echo '<br>';
echo "UID擷取:" .substr($hashID,0,8).substr($hashID,15,20) ;
?>