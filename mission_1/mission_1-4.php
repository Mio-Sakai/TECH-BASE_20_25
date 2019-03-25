<!DOCTYPE html>
<html lsng="ja">
	<head>
		<title>mission1-4</title>
			<meta charset="utf-8">
	</head>
<body>
<form action = '' method = "POST">
	<input type = “text” name ="comment" value="コメント"><br/>
		<p><input type="submit" value="送信する"></p>
</from>
</body>
</html>

<?php
	if(isset($_POST['comment'])){
		$hensu="ご入力ありがとうございます。<br>". date("Y年m月d日H時i分s秒");
		echo $hensu;
}

?>