<?php
ob_start();
session_start();
 require_once ('dbconnect.inc');          // создаём подключение к базе данных 
 require_once ('functions_sadmin.php');   // подключаем файл с функциями
 $session_length = get_single_setting('admin_session_length');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link media="all" href="sadmin/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="sadmin/tooltip/style.css" />
<script type="text/javascript" language="javascript" src="sadmin/tooltip/script.js"></script>
<script type="text/javascript" src="../scripts/md5.js"></script>
<script type="text/javascript" src="../scripts/jquery-1.3.2.min.js"></script>
<script TYPE="text/javascript">
<!-- 
function encode(text)
{
document.forms[0].elements[2].value = md5(document.forms[0].elements[1].value);
document.forms[0].elements[1].value = "";
}
function OverMnu(mnu, color)
{
mnu.style.backgroundColor=color;
}
function OutMnu(mnu)
{
mnu.style.backgroundColor='';
}
//<![CDATA[
function openpopup(url, name, options, fullscreen) {
 var fullurl = url;
 var windowobj = window.open(fullurl, name, options);
 if (!windowobj) {
 return true;
 }
 if (fullscreen) {
 windowobj.moveTo(0, 0);
 windowobj.resizeTo(screen.availWidth, screen.availHeight);
 }
 windowobj.focus();
 return false;
}
//-->
</script>
<!-- TinyMCE -->
<?php if (($_GET['action'] != 'top')&&($_GET['action'] != 'add_parse')&&($_POST['action'] != 'add_parse'))
{
?>
<script type="text/javascript" src="../scripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "sadmin/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<?php }
?>
<!-- /TinyMCE -->
</head>
<body>
<noscript><br/>Admin-panel just work with enabled javascript!</noscript>
<?php
if ($_SESSION['time'] > 0)
{
    if ((time() - $_SESSION['time'] > $session_length)and(!isset($_POST['md'])))
    {
        echo "<br/>Current admin-panel session is time-out. Relogin!";
        $_SESSION['time'] = time();
        $_SESSION['user_name'] = "";
        $_SESSION['md'] = "";
    }
    else
    {
        $_SESSION['time'] = time(); 
    }
}
else
{
    $_SESSION['time'] = time();
    $_SESSION['user_name'] = "";
}
if((isset($_POST['md']) and $_POST['md'] != "")||($_SESSION['user_name'] != ""))
{    
    if (isset($_POST['user_name']))
    {
        $real_md = get_real_md(mysql_real_escape_string($_POST['user_name']));

        if ($real_md == $_POST['md'])
        {
            $_SESSION['user_name'] = $_POST['user_name'];
            $_SESSION['md'] = $_POST['md'];
        }
        else
        {            
            $_SESSION['user_name'] = "";
            $_SESSION['md'] = "";
        }
    }    
    if ($_SESSION['user_name'] != "")
    {
        $real_md = get_real_md(mysql_real_escape_string($_SESSION['user_name']));
        if ($real_md == $_SESSION['md'])
        {            
            require_once ('sadmin/sindex.php');
        }
    }
    else
    {
        echo '<br/>Error. Wrong user or password.';
        require_once ('sadmin/slogin.php'); 
    }
}
else
{
   require_once ('sadmin/slogin.php');  
}
?>

</body>
</html>
<?php
ob_flush();
?>