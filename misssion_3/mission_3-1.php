<!DOCTYPE html>
<html lsng="ja">
	<head>
		<title>mission3-1</title>
			<meta charset="utf-8">
	</head>
	
<body>
<?php
// Mysqlの設定
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo = new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
?>
</html>