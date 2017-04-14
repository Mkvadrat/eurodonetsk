<?php
ob_start();
session_start();
//session_register('lng');

error_reporting(0);

setlocale(LC_ALL, 'ru_RU.UTF-8');

if(isset ($_GET['business_full'] ) && $_GET['business_full']=='640'){
	header("HTTP/1.1 301 Moved Permanently");
	switch($_GET['pm']){
		case '1':
		header("Location: http://www.garmonia.dn.ua");
		break;
		case '2':
		header("Location: http://www.garmonia.dn.ua/detskaya-akademiya-garmoniya-donetsk-kontakty.html");
		break;
	}
	
exit();
}
if(isset ($_GET['business_full'] ) && $_GET['business_full']=='630'){
	header("HTTP/1.1 301 Moved Permanently");
	switch($_GET['pm']){
		case '2':
		header("Location: http://www.beauty-club.dn.ua/ru/zal/parikmakherskii.html");
		break;
		case '43':
		header("Location: http://www.beauty-club.dn.ua/ru/portfolio.html");
		break;
		case '34':
		header("Location: http://www.beauty-club.dn.ua/ru/magazin.html");
		break;
		case '44':
		header("Location: http://www.beauty-club.dn.ua/ru/kontakty.html");
		break;
		case '12':
		header("Location: http://www.beauty-club.dn.ua/ru/zal/manikyur.html");
		break;		
		default:
		header("Location: http://www.beauty-club.dn.ua/ru");
		break;
	}
	
exit();
}
require_once ('inc/dbconnect.inc');          // создаём подключение к базе данных 
require_once ('inc/functions.php');          // подключаем файл с функциями
require_once ('inc/dbtree.class_lite.php');  // подключаем класс для работы с деревом разделов

// Если сессия уже была активна - восстанавливаем язык отображения для пользователя
  if ($_GET['lang'])
    $_SESSION['lng']=$_GET['lang'];

// проверка и получение префикса языка для отображения
  $lang_prefix = get_existed_languages($_SESSION['lng']);
  $tbl_lng = 'sections_'.$lang_prefix;
  $pages_lng = 'pages_'.$lang_prefix;
  $catalogue_lng = 'catalogue_'.$lang_prefix;
    
  cpu_to_norm($_SERVER['REQUEST_URI']);
  
  $_GET['section_id'] = (int)mysql_real_escape_string($_GET['section_id']);
  $_GET['id_page'] = (int)mysql_real_escape_string($_GET['id_page']);
  $_GET['business'] = (int)mysql_real_escape_string($_GET['business']);
  $_GET['business_full'] = (int)mysql_real_escape_string($_GET['business_full']);
  $_GET['pm'] = (int)mysql_real_escape_string($_GET['pm']);
  $_GET['ie6confirm'] = (int)mysql_real_escape_string($_GET['ie6confirm']);
  $_GET['rss'] = (int)mysql_real_escape_string($_GET['rss']);
  
  $user_agent = $_SERVER['HTTP_USER_AGENT'];
  if (stripos($user_agent, 'MSIE 6.0') !== false && stripos($user_agent, 'MSIE 8.0') === false && ($_GET['ie6confirm'] != 1) && stripos($user_agent, 'MSIE 7.0') === false)
  {
    header ("Location: /ie6/ie6_".$lang_prefix.".html");
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="'.$lang_prefix.'" lang="'.$lang_prefix.'">';
?>

<head>
<?php echo get_page_title($_GET['section_id'], $_GET['id_page'], $_GET['business_full'] ); ?>
<base href="http://www.eurodonetsk.com/" />
<link media="all" href="css/style_<?php echo $lang_prefix; ?>.css" rel="stylesheet" type="text/css" />
<link media="all" href="css/styleaccordion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/swfobject.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>
<script type="text/javascript" src="scripts/menu.js"></script>
<script type="text/javascript" src="scripts/gw_menu.js"></script>
<script type="text/javascript" src="scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="scripts/jquery-galleryview-1.0.1/jquery.galleryview-1.0.1-pack.js"></script>
<script type="text/javascript" src="scripts/jquery-galleryview-1.0.1/jquery.timers-1.1.2.js"></script>
</head>
<body onload="show_gwu();">
<?php
// создаём дерево для рубрик сайта
$dbtree = new dbtree($tbl_lng, 'section', $db); // Create new object
$dbtree_s = new dbtree($tbl_lng, 'section', $db); // Create new object
?>
<div id="container">
<!--headder begin-->
<?php require_once ('inc/templates/header.inc'); ?>
<!--headder end-->
<?
   if (!(empty($_GET['set_cpulinks'])))
  {
    echo set_cpulinks();
    unset($_GET);
  }
  
  if (!(empty($_GET['change_page'])))
  {
    if (file_exists('inc/templates/change_page.inc'))
    {
   	 include ('inc/templates/change_page.inc');
    }
    else
	 header ("Location: /index.php");    
  }  
  else
  if (!(empty($_GET['search_str'])))
  {
    if (file_exists('inc/templates/search_'.$lang_prefix.'.inc'))
    {
   	include ('inc/templates/search_'.$lang_prefix.'.inc');
    }
    else
	 header ("Location: /index.php");    
  }
  else
  if (!(empty($_GET['adv_search_str'])))
  {
    if (file_exists('inc/templates/adv_search_'.$lang_prefix.'.inc'))
    {
   	 include ('inc/templates/adv_search_'.$lang_prefix.'.inc');
    }
    else
	 header ("Location: /index.php");
    
  }
  else
  if (!(empty($_GET['rss'])))
  {
    if (file_exists('inc/templates/rss_'.$lang_prefix.'.inc'))
    {
   	 include ('inc/templates/rss_'.$lang_prefix.'.inc');
    }
    else
	 header ("Location: /index.php");
  }
  else
  if ($_GET['business'] == 1)
  {
    if (file_exists('inc/templates/main_business_'.$lang_prefix.'.inc'))
    {
   	 include ('inc/templates/main_business_'.$lang_prefix.'.inc');
    }
    else
	 header ("Location: /index.php");   
  }  
  else
  if ($_GET['business'] == 2)
  {
    if (file_exists('inc/templates/current_business_'.$lang_prefix.'.inc'))
    {
   	 include ('inc/templates/current_business_'.$lang_prefix.'.inc');
    }
    else
	 header ("Location: /index.php");    
  }  
  else
  if (!(empty($_GET['business_full'])))
  {
    if (file_exists('inc/business/business_'.$_GET['business_full'].'.inc'))
    {
   	 include ('inc/business/business_'.$_GET['business_full'].'.inc');
    }
    else
	 header ("Location: /index.php");      
  }  
  else
  if (!(empty($_GET['new_add'])))
  {
    if (file_exists('inc/templates/new_add_'.$lang_prefix.'.inc'))
    {
   	 include ('inc/templates/new_add_'.$lang_prefix.'.inc');
    }
    else
	 header ("Location: /index.php");    
  }  
  else
  if (!(empty($_GET['section_id'])))
  {
    if (file_exists('inc/templates/main_section_'.$lang_prefix.'.inc'))
    {
   	 include ('inc/templates/main_section_'.$lang_prefix.'.inc');
    }
    else
	 header ("Location: /index.php");     
  }  
  else
  {
    if (file_exists('inc/templates/main_'.$lang_prefix.'.inc'))
    {
   	include ('inc/templates/main_'.$lang_prefix.'.inc');
    }
    else
	 header ("Location: /index.php");
    
  }
 
  require_once ('inc/templates/footer.inc');  
?>
</div>
<!-- end conteiner -->
</div>
<!-- end pager -->
<!-- позиционирование элементов меню -->
<script language="JavaScript">
    var pos = document.getElementById('f_g_b').offsetLeft;
    var obj = getElementsByClass('s_g_b',null,'table');
    for(i=0;i<obj.length;i++){
      obj[i].style.left = pos+"px";
    }
    var ua = navigator.userAgent;
    if ((ua.indexOf('Gecko') != -1)&&(ua.indexOf('Chrome') == -1))
    {
      obj = getElementsByClass('s_g_t',null,'table');
      for(i=0;i<obj.length;i++){
        obj[i].style.left = pos+"px";
      }
    }
</script>
</body>
</html>

<?php
ob_flush();
$db->Close();
?>
