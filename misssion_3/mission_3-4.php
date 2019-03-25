<!DOCTYPE html>
<html lsng="ja">
	<head>
		<title>mission3-4</title>
			<meta charset="utf-8">
	</head>
	
<body>
<?php
// Mysqlの設定
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo = new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$sql='SHOW CREATE TABLE tbtest';
$result=$pdo->query($sql);
foreach($result as $row){
echo $row[1];
}
echo "<hr>";
?>
</html>