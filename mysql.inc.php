<?php
//資料庫設定
$dbServer = "127.0.0.1";
$dbUser = "cc";
$dbPass = "cc";
$dbName = "googlemap";
$dbNameLogin="account_management";
//連線資料庫伺服器
$con = @mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
$connect = @mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
$connect_login = @mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

//設定連線的字元集為 UTF8 編碼
mysqli_set_charset($con, "utf8");
mysqli_set_charset($connect, "utf8");
mysqli_set_charset($connect_login, "utf8");
?>