<!DOCTYPE html>
<html lsng="ja">
	<head>
		<title>mission3-5</title>
			<meta charset="utf-8">
	</head>
	
<body>
<?php
// Mysqlの設定
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo = new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$sql=$pdo->prepare("INSERT INTO tbtest (id,name,comment) VALUES('3',:name,:comment)");
$sql->bindParam(':name',$name,PDO::PARAM_STR);
$sql->bindParam(':comment',$comment,PDO::PARAM_STR);
$name='米津玄師';
$comment='アイネクライネ';
$sql->execute();
?>
</html>