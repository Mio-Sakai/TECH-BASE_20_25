
<!DOCTYPE html>
<html lsng="ja">
	<meta charset="utf-8">
		<head>
			<title>mission1-7</title>
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
	$filename='mission_1-7_sakai.txt';
	$fp=fopen($filename,'a');
	fwrite($fp,$_POST['comment']."\n");
	fclose($fp);
    $array = @file( $filename, FILE_IGNORE_NEW_LINES);
    $i = 0;
    foreach($array as $info){
    	 if($i >= 3){
    	 	 break;
    	 	}
        echo $info,'<br>';
        $i++;
	}
}
?>