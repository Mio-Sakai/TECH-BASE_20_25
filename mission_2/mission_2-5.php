<!DOCTYPE html>
<html lsng="ja">
	<head>
		<title>mission2-5</title>
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
$password_set=$_POST["password_set"];
$password_del=$_POST["password_del"];
$password_edi=$_POST["password_edi"];


//編集番号のファイルの中身を出力する。
if (!empty($editete) && !empty($password_edi)){
$lines=file($filename);
	foreach($lines as $value){
	$line=explode("<>",$value );
		if($line[0] == $editete && $line[4] == $password_edi){
			$data_num = $line[0];
			$data_name = $line[1];
			$data_comment = $line[2];
		}
		else{
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
				<label>▼名前<label><br/>
				<label><input type = "text" name ="name" value="<?php echo $data_name; ?>"><label><br/>
				<!-- [コメント入力欄] -->
				<label>▼コメント<label><br/>
				<label>	<input type = "text" name ="comment" value="<?php echo $data_comment; ?>"><label><br/>
				<!-- [パスワード入力欄] -->
				<label>▼パスワード<label><br/>
				<label><input type = "text" name ="password_set" placeholder="パスワード"><label><br/>
				<!-- [hidden欄(非表示)] -->
				<input type="hidden" name="num_hidden" value="<?php if(isset($data_num)){echo $data_num;}?>">
				<!-- [送信ボタン] -->
				<input type="submit" value="送信する">
			</p>
			<p>
				<!-- [削除番号入力欄] -->
				<label><input type ="text" name ="Deleted" placeholder="削除対象番号"><label><br/>
				<!-- [パスワード入力欄] -->
				<label>▼パスワード<label><br/>
				<label><input type = "text" name ="password_del" placeholder="パスワード"><label><br/>
				<!-- [送信ボタン] -->
				<input type="submit" value="削除">
				</p>
				<p>
				<!-- [編集番号入力欄] -->
				<label><input type = "text" name ="edit" placeholder="編集"><label><br/>
				<!-- [パスワード入力欄] -->
				<label>▼パスワード<label><br/>
				<label><input type = "text" name ="password_edi" placeholder="パスワード"><label><br/>

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
$password_set=$_POST["password_set"];
$password_del=$_POST["password_del"];
$password_edi=$_POST["password_edi"];


//新規投稿
if (!empty($comment) && !empty($name) && empty($editete) && empty($delete) && empty($hidden) && !empty($password_set)){
	//テキストファイルに開き
	$fp=fopen($filename,"a");
	//投稿番号の設定
	$num = count( file( $filename));	
	$num++;
	//テキストファイルに保存する文を変数に置き換える。
	$hensu=$num."<>".$name ."<>".$comment."<>". $time."<>".$password_set."<>"."新規";
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
if(isset($delete) && isset($password_del)){
//テキストファイルを配列に格納する。
	$delCon = file($filename);
   	$fp = fopen($filename, "a");
   	ftruncate($fp,0); 
	for ($j = 0; $j < count($delCon); $j++){
		$delDate = explode("<>", $delCon[$j]);
		if($delDate[0]==$delete && $delDate[4]==$password_del){
		}
		else{
			fwrite($fp, $delCon[$j]);
				}
			}
	fclose($fp);
}
else{
}

//編集フォーム	 	
//もし編集フォームに入力されていたら
if(isset($comment) && isset($name) && !empty($hidden) && !empty($password_set)){
//テキストファイルを配列に格納する。
 	$ediCon = file($filename);
	$hen=fopen($filename,"a");
 	ftruncate($hen,0); 
	for ($k = 0; $k < count($ediCon); $k++){
		$ediDate = explode("<>", $ediCon[$k]);
		if ($ediDate[0]== $hidden && $ediDate[4] ==$password_set) {
			$ediGo=$ediDate[0]."<>".$ediDate[1] ."<>".$comment."<>". $ediDate[3]."<>".$ediDate[4]."<>"."編集";
			fwrite($hen,$ediGo."\n");
		}		
		else{
			$ediNo=$ediDate[0]."<>".$ediDate[1] ."<>".$ediDate[2]."<>". $ediDate[3]."<>".$ediDate[4]."<>".$ediDate[5];
			fwrite($hen,$ediNo);	
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