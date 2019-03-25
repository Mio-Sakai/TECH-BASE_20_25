<!DOCTYPE html>
<html lsng="ja">
	<head>
		<title>mission2-3</title>
		
			<meta charset="utf-8">
			
	</head>
<body>
<form action = '' method = "POST">

	<label><input type = “text” name ="name" placeholder="名前"><label><br/>
	<label><input type = “text” name ="comment" placeholder="コメント"><label><br/>
		 <p><input type="submit" value="送信する"></p>
	<label><input type ="text" name ="Deleted" placeholder="削除対象番号"><label><br/>
		 <p><input type="submit" value="削除"></p>
	</from>
</body>
</html>

<?php
	//保存するファイル名の定義
$filename='mission_2-3_sakai.txt';
	$lines=file($filename);

 	//入力フォーム
 if (empty($_POST["comment"] )){
 //もしコメントが空欄またはコメントのままならそのまま
 	echo "入力されていません。<br/>";
  //それ以外なら
  }else{
 	//テキストファイルに開き
$fp=fopen($filename,"a");
//投稿番号の設定
$num = count( file( $filename ));	
$num++;
//テキストファイルに保存する文を変数に置き換える。
$hensu=$num."<>".$_POST["name"] ."<>".$_POST["comment"]."<>". date("Y年m月d日H時i分s秒");
//書き込み
fwrite($fp,$hensu."\n");
//閉じる
fclose($fp);
 	//ブラウザーに表示する
 		echo "ご入力ありがとうございます。<br/>";
	 	echo date("Y年m月d日H時i分s秒")."に".$_POST["comment"]."を受け取りました。<br/>";
         }
//削除フォーム	 	
	//もし削除フォームに入力されていたら
 if(isset($_POST["Deleted"])){
 	$delete=$_POST["Deleted"];
 		 //テキストファイルを配列に格納する。
 	$delCon = file("mission_2-3_sakai.txt");
 	$nums=$_POST["Deleted_res"];
   	unset($file[$nums]);
	file_put_contents("mission_2-3_sakai.txt",$file);
	
	$fp = fopen("mission_2-3_sakai.txt", "a");
			for ($j = 0; $j < count($delCon); $j++){
				$delDate = explode("<>", $delCon[$j]);
				if ($delDate[0]!= $delete) {
					fwrite($fp, $delCon[$j]);
				}else{
				}
			}
			fclose($fp);
 }
  $i = 0;
$lines=file("mission_2-3_sakai.txt");//テキストファイル名の定義
	foreach($lines as $value ){
	$line=explode("<>",$value );
		echo $line [0]." ".$line [1]." ".$line [2]." ".$line [3],'<br>';
		$i++;
				}

 	?>