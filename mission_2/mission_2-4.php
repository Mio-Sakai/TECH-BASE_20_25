<!DOCTYPE html>
<html lsng="ja">
	<head>
		<title>mission2-4</title>
			<meta charset="utf-8">
	</head>
	
<body>
<?php
$filename='mission_2-3_sakai.txt';
$comment=$_POST["comment"];
$name=$_POST["name"];
$delete=$_POST["Deleted"];
$editete=$_POST["edit"];
$time=date("Y年m月d日H時i分s秒");

//編集番号のファイルの中身を出力する。
if (isset($editete)){
$lines=file($filename);
	foreach($lines as $value ){
	$line=explode("<>",$value );
	$num=$line[0];
		if($num==$editete){
			$data_num = $line[0];
			$data_name = $line[1];
			$data_comment = $line[2];
		}
	}	
}
else{
		}
?>
			<p>
				<!-- フォーム -->
				<form action = '' method = "POST">
				<!-- [名前の入力欄] -->
				<label><input type = "text" name ="name" value="<?php echo $data_name; ?>"><label><br/>
				<!-- [コメント入力欄] -->
				<label><input type = "text" name ="comment" value="<?php echo $data_comment; ?>"><label><br/>
				<!-- [hidden欄(非表示)] -->
				<input type="hidden" name="num_hidden" value="<?php if(isset($data_num)){echo $data_num;}?>"><br/>
				<!-- [送信ボタン] -->
				<input type="submit" value="送信する">
			</p>
			<p>
				<!-- [削除番号入力欄] -->
				<label><input type ="text" name ="Deleted" placeholder="削除対象番号"><label><br/>
				<!-- [送信ボタン] -->
				<input type="submit" value="削除">
				</p>
				<p>
				<!-- [編集番号入力欄] -->
				<label><input type = "text" name ="edit" placeholder="編集"><label><br/>
				<!-- [送信ボタン] -->
				<input type="submit" value="編集">
				</p>
			</from>
		</body>
<?php
//変数設定
$filename='mission_2-3_sakai.txt';
$comment=$_POST["comment"];
$name=$_POST["name"];
$delete=$_POST["Deleted"];
$editete=$_POST["edit"];
$hidden=$_POST["num_hidden"];
$time=date("Y年m月d日H時i分s秒");

//新規投稿
if (!empty($comment) && !empty($name) && empty($editete) && empty($delete)&&empty($hidden)){
	//テキストファイルに開き
	$fp=fopen($filename,"a");
	//投稿番号の設定
	$num = count( file( $filename ));	
	$num++;
	//テキストファイルに保存する文を変数に置き換える。
	$hensu=$num."<>".$name ."<>".$comment."<>". $time;
	//書き込み
	fwrite($fp,$hensu."\n");
	//閉じる
	fclose($fp);
 	//ブラウザーに表示する
 	echo "ご入力ありがとうございます。<br/>";
	 echo $time."に".$comment."を受け取りました。<br/>";
//それ以外なら
}else{
	echo "入力されていません。<br/>";
 }
 

//削除フォーム	 	
//もし削除フォームに入力されていたら
if(isset($delete)){
//テキストファイルを配列に格納する。
	$delCon = file("mission_2-3_sakai.txt");
 	$numD=$_POST["Deleted"];
   	unset($file[$numD]);
	file_put_contents("mission_2-3_sakai.txt",$file);
	$fp = fopen($filename, "a");
	for ($j = 0; $j < count($delCon); $j++){
		$delDate = explode("<>", $delCon[$j]);
		if ($delDate[0]!= $delete) {
			fwrite($fp, $delCon[$j]);
		}
		else{
		}
	}	
		fclose($fp);
}

//編集フォーム	 	
//もし編集フォームに入力されていたら
if(isset($comment) && isset($name) && !empty($hidden)){
//テキストファイルを配列に格納する。
 	$ediCon = file($filename);
 	$numE=$_POST["edit"];
	$hen=fopen($filename,"a");
 	ftruncate($hen,0); 

	for ($k = 0; $k < count($ediCon); $k++){
		$ediDate = explode("<>", $ediCon[$k]);
		$num = $ediDate[0];
		if ($ediDate[0]== $hidden) {
			fwrite($hen,$ediDate[0]."<>".$ediDate[1] ."<>".$comment."<>". $ediDate[3]);
		}			
		else{
			fwrite($hen ,$ediDate[0]."<>".$ediDate[1] ."<>".$ediDate[2] ."<>". $ediDate[3]);
		}
	}
		fclose($hen);
}

$i = 0;
//テキストファイル名の定義
$lines=file($filename);
	foreach($lines as $value ){
		$line=explode("<>",$value );
		echo $line [0]." ".$line [1]." ".$line [2]." ".$line [3],'<br>';
		$i++;
	}
?>

</html>