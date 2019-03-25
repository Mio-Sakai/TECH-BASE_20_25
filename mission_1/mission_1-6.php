
<!DOCTYPE html>
<html lsng="ja">
	<meta charset="utf-8">
		<head>
			<title>mission1-6</title>
		</head>
<body>
<form action = '' method = "POST">
	<input type = “text” name ="comment" value="コメント"><br/>
		<p><input type="submit" value="送信する"></p>
</from>
</body>
</html>



<?php
$hensu=$_POST['comment'];
if (empty($_POST['comment']));
elseif(isset($_POST['comment'])){
	$filename='mission_1-6_sakai.txt';
	$fp=fopen($filename,'a');
	fwrite($fp,$_POST['comment']."\n");
	fclose($fp);
					if($hensu=="完成！"){
						echo "おめでとう！";
					}else{
						echo "ご入力ありがとうございます。<br>". date("Y年m月d日H時i分s秒");
					
	    }
}


?>