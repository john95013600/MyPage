// <?php
	header("Content-Type:text/html; charset=utf-8");

	$fname = $_POST["filename"];
	echo $fname.".html";

	$filename = iconv('UTF-8','Big5//IGNORE',trim($fname));
	$str = "Hello World";
	$file = fopen("Sub/".$filename.".html","a+"); //開啟檔案

	fwrite($file,$str);

	fclose($file);

?>