// <?php
	header("Content-Type:text/html; charset=utf-8");

	$fname = $_POST["filename"];

	$str = $_POST["content"];
	$str = str_replace('\\"', '"', $str);
	echo $fname.".html";
	echo "<br>".$str;

	$filename = iconv('UTF-8','Big5//IGNORE',trim($fname));//因為window檔名預存格式是Big5

	$file = fopen("Sub/".$filename.".html","w"); //開啟檔案  

	fwrite($file,$str);

	fclose($file);

?>