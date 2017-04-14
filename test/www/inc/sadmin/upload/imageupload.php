<?php
/**
 * This file uploads a file in the back end, without refreshing the page
 *  
 */
@session_start();
$dirName="../../../root/pages/";
$fakedirName="/root/pages";

if (isset($_POST['id'])) {
	//$uploadFile=$_GET['dirname']."/".$_FILES[$_POST['id']]['name']; for security reasons,  hardcode the name of the directrory.
	//@mkdir($dirName,0777);

	$uploadFile="$dirName/".$_FILES[$_POST['id']]['name'];
	
	if(!is_dir($_GET['dirname'])) {
		echo '<script> alert("Failed to find the final upload directory: $dirName);</script>';
	}
	if (!file_exists($dirName.'/'.$_FILES[$_POST['id']]['name']))
	{
	if (!copy($_FILES[$_POST['id']]['tmp_name'], $dirName.'/'.$_FILES[$_POST['id']]['name'])) {	
		echo '<script> alert("Failed to upload file");</script>';
	}
	}
	else
		echo '<script> alert("Такой файл уже существует");</script>';
}
else {
	// for secority reason either remove the extentions or rectrict uploaded not to upload / run scripts like file.php else they can misuse the disk space 
	//$uploadFile=$_GET['dirname']."/".$_GET['filename']; // removed for security reasons (happend with my demo )
	$uploadFile="$dirName/".$_GET['filename'];
	$fakeuploadFile="$fakedirName/".$_GET['filename'];
	if (file_exists($uploadFile)) {
		chmod($uploadFile,0755);
		echo "File uploaded: '$fakeuploadFile'&nbsp;&nbsp;&nbsp;";	
	}
	else {
		echo "<img src='loading.gif' alt='loading...' />";
	}
}
?>
