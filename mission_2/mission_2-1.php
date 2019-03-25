<!DOCTYPE html>
<html lsng="ja">
	<head>
		<title>mission2-1</title>
			<meta charset="utf-8">
	</head>
<body>
<form action = '' method = "POST">
	<label>名前：<input type = “text” name ="name" value=""><label><br/>
	<label>コメント：<input type = “text” name ="comment" value=""><label><br/>
	 <p><input type="submit" value="送信する"></p>
		
		
</from>
</body>
</html>

<?php
if(isset($_POST['comment'])){
		$filename='mission_2-1_sakai.txt';
		$fp=fopen($filename,'a');
		$num = count( file( $filename ) ); 
		$num++; 
		$hensu=$num."<>".$_POST["name"] ."<>"."これはテストです"."<>". date("Y年m月d日H時i分s秒");
		fwrite($fp,$hensu."\n");
		fclose($fp);
}
?>