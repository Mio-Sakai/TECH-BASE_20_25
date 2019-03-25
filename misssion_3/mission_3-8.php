<!DOCTYPE html>
<html lsng="ja">
	<head>
		<title>mission3-8</title>
			<meta charset="utf-8">
	</head>
	
<body>
<?php
// Mysqlの設定
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';

$pdo = new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$id=2;
$sql='delete from tbtest where id=:id';
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id,PDO::PARAM_INT);
$stmt->execute();
?>
</html>