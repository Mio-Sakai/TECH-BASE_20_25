<!DOCTYPE html>
<html lsng="ja">
	<head>
		<title>mission2-2(遊び)</title>
		
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
if (empty($_POST['comment']));
elseif(isset($_POST['comment'])){
$filename='mission_2-2_asobi.txt';
$fp=fopen($filename,'a');
$num = count( file( $filename ) );
$num++; 
$hensu=$num."<>".$_POST["name"] ."<>".$_POST["comment"] ."<>". date("Y年m月d日H時i分s秒");
fwrite($fp,$hensu."\n");
fclose($fp);
$array = @file( $filename, FILE_IGNORE_NEW_LINES);
 $i = 0;
 $value = $num."<>".$_POST["name"] ."<>".$_POST["comment"] ."<>". date("Y年m月d日H時i分s秒");
foreach($array as $value){
  $frend = explode("<>",$value);
   if($i >= 100){
    	 	 break;
	 	}
	 	echo $frend[0]." ".$frend[1]." ".$frend[2]." ".$frend[3],'<br>';
         $i++;
    }
   }
?>
