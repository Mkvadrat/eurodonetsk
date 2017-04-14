<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>AJAX File uploader</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="uploader.js" ></script>
			<style type="text/css">
			body{ font-family: verdana; font-size: 12px;}
			a{ font-family:verdana; font-size:12px;text-decoration:none; color:#000000;}
			a:hover{font-family:verdana;font-size: 12px;text-decoration:underline; color: #FF0000;}
			.link{ border:0px; padding:0px; margin:0px; text-decoration:none;}
			
		</style>
	</head>
	<body id="body">
<?php
	// This is the folder where file are uploaded
	//$uploadDirectory = "testdir";    for security reasons,  hardcode the name of the directrory in imageupload.php
	require_once("AjaxFileUploader.inc.php");
	$ajaxFileUploader = new AjaxFileuploader($uploadDirectory="");	
	
	if ($_POST['count'])
	{
		$co = $_POST['count'];
		$till = 0;
		while (($till < $co)&&($till < 10))
		{
			echo $ajaxFileUploader->showFileUploader('id'.$till);
			$till++;
		}			
	}
	else
	{
		echo $ajaxFileUploader->showFileUploader('id1');
		echo $ajaxFileUploader->showFileUploader('id2');
		echo $ajaxFileUploader->showFileUploader('id3');
	}
?>
<br>
	Загрузить больше файлов:
	<form name="" method="post" action="">
	Количество файлов: <input type="text" name="count" value="<?= $till; ?>" size="5">
	<input type="submit" value="Показать"> 
	</form>

</body>
</html>