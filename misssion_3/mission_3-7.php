<!DOCTYPE html>
<html lsng="ja">
	<head>
		<title>mission3-7</title>
			<meta charset="utf-8">
	</head>
	
<body>
<?php
// Mysqlの設定
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo = new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$id=1;
$name="星野源";
$comment="アイデア";
$sql='update tbtest set name=:name,comment=:comment where id=:id';
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':name',$name,PDO::PARAM_STR);
$stmt->bindParam(':comment',$comment,PDO::PARAM_STR);
$stmt->bindParam(':id',$id,PDO::PARAM_INT);
$stmt->execute();
?>
</html>