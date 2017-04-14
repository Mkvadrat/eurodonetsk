<?php
    ob_start();
    session_start();
    require_once ('../dbconnect.inc');          // создаём подключение к базе данных 
    require_once ('../functions_sadmin.php');
    require_once ('dbtree.class.php');
    
    if ($_GET['lang'])
    $_SESSION['lng']=$_GET['lang'];
    
    $lang_prefix = get_existed_languages($_SESSION['lng']);
    
    $dbtree = new dbtree('sections_'.$lang_prefix, 'section', $db);
    $dbtree->Full('');
    
    while ($item = $dbtree->NextRow())
    {
	if ($item['name']<>'Root')
        {
		$str = str_repeat('.', 4 * $item['section_level']);
		$item['section_name'] = $str . $item['section_name'];
        }
	
	echo '<OPTION value="'.$item['section_id'].'" >'.htmlspecialchars(stripslashes($item['section_name'])).'</OPTION>';	
    }
?>