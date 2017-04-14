<?
require_once ('sadmin/dbtree.class.php');  // подключаем класс для работы с деревом разделов
// Если сессия уже была активна - восстанавливаем язык отображения для пользователя
  if ($_GET['lang'])
    $_SESSION['lng']=$_GET['lang'];

// проверка и получение префикса языка для отображения
  $lang_prefix = get_existed_languages($_SESSION['lng']);
  $tbl_lng = sections_.$lang_prefix;
  $pages_lng = 'pages_'.$lang_prefix; 
  $_GET['id'] = (int)$_GET['id'];
  
  $dbtree = new dbtree('sections_ru', 'section', $db);
  
function show_form(){ 
	global $lang_prefix;
        $result = mysql_query("SELECT * FROM catalogue_".$lang_prefix." WHERE id = '".$_GET['id']."'"); 

        $row = mysql_fetch_array($result); 

?>

<div id="page_edit"></div><a href="sadmin.php?sub_m=6">Вернутся к списку предприятий</a><br> 	  
<form action="" method="post"> 
<table cellspacing="1" cellpadding="2"  > 
<tr> 
  <td>Секция:</td> 
  <td> <input type="text" name="idsec1" value="<?=htmlspecialchars(stripslashes($row['idsec1']));?>" size="10"> </td> 
</tr> 
<tr>
  <td width="30%">Название предприятия: </td>
  <td><input type="text" name="name" value="<?=htmlspecialchars(stripslashes($row['name']));?> " size="50"></td> 
</tr>
<tr>
  <td width="30%">Телефон: </td>
  <td><input type="text" name="tel" value="<?=htmlspecialchars(stripslashes($row['tel']));?> " size="50"></td> 
</tr>
<tr>
  <td width="30%">E-mail: </td>
  <td><input type="text" name="email" value="<?=htmlspecialchars(stripslashes($row['email']));?> " size="40"></td> 
</tr>
<tr>
  <td widmainth="30%">Сайт: </td>
  <td><input type="text" name="www" value="<?=htmlspecialchars(stripslashes($row['www']));?> " size="40"></td> 
</tr>
<tr>
  <td width="30%">Индекс: </td>
  <td><input type="text" name="ind" value="<?=htmlspecialchars(stripslashes($row['ind']));?> " size="6"></td> 
</tr>
<tr>
  <td width="30%">Город: </td>
  <td><input type="text" name="city" value="<?=htmlspecialchars(stripslashes($row['city']));?> " size="50"></td> 
</tr>
<tr>
  <td width="30%">Улица: </td>
  <td><input type="text" name="street" value="<?=htmlspecialchars(stripslashes($row['street']));?> " size="50"></td> 
</tr>
<tr>
  <td width="30%">Дом: </td>
  <td><input type="text" name="house" value="<?=htmlspecialchars(stripslashes($row['house']));?> " size="25"></td> 
</tr>
<tr>
  <td width="30%">Link: </td>
  <td><input type="text" name="link" value="<?=htmlspecialchars(stripslashes($row['link']));?> " size="50"></td> 
</tr>

<tr> 
  <td  align="right"> 
      <input type="hidden" name="id" value="<?=$_GET['id'];?>"> 
      <input type="submit" value="Сохранить" name="edit">
      
  </td>  
</tr> 
</table> 
</form> 

<?php 

} // функция show_form() закончилась 

///////////////////////////////////////////////////////////////////

function complete(){ 
	global $lang_prefix;
      $query = "UPDATE catalogue_".$lang_prefix." SET 
                                     name = '".ltrim(rtrim(mysql_real_escape_string($_POST['name'])))."', 
                                     idsec1 = '".mysql_real_escape_string($_POST['idsec1'])."',
				     link = '".mysql_real_escape_string($_POST['link'])."', 
                                     tel = '".mysql_real_escape_string($_POST['tel'])."', 
                                     email = '".mysql_real_escape_string($_POST['email'])."', 
                                     www = '".mysql_real_escape_string($_POST['www'])."',
				     ind = '".mysql_real_escape_string($_POST['ind'])."', 
                                     city = '".mysql_real_escape_string($_POST['city'])."',
				     street = '".mysql_real_escape_string($_POST['street'])."',                                      
				    house =  '".mysql_real_escape_string($_POST['house'])."'
                     WHERE id = '".$_POST['id']."'"; 
      mysql_query($query); 

      echo '<h3>Данные обновлены</h3>';
}

function show_business() {
	global $tbl_lng;
	global $lang_prefix;
	echo '<p><b><a href="sadmin.php?sub_m=6&action=add_parse">Добавить предприятие</a></b><br> ';
        echo '<b>Список предприятий:</b></p> 
		<table cellspacing="0" cellpadding="2" border="1" border-collapse="collapse" style="border-collapse: collapse; border-color: lightgray" id="all_pages_tab">' ; 
	echo '<tr class="bus_confirm_0">
		<td>ID</td><td>Секция</td><td>Название предприятия</td><td>Link</td><td></td><td></td>
	      </tr>'; 

		$result = mysql_query("SELECT cm.*, sec.section_name as snname FROM catalogue_".$lang_prefix." cm left join sections_ru sec on sec.section_id = cm.idsec1 ORDER BY id");

        while($row = mysql_fetch_array($result))
	{ 
                echo ' 
		<tr onmouseover=\'OverMnu(this, "#eeeeee");\' onmouseout=\'OutMnu(this, "");\'>
		  <td class="bus_confirm_1">'.$row['id'].'</td>';
		echo  '
		  <td class="bus_confirm_3" onmouseover="tooltip.show(\''.$row['snname'].'\');" onmouseout="tooltip.hide();">'.$row['idsec1'].'</td>
		  <td class="bus_confirm_2">'.$row['name'].'</td>		  
		  <td class="bus_confirm_4">'.$row['link'].'</td>
		  <td class="bus_confirm_5"><a href="?sub_m=6&id='.$row['id'].'">  <img src="../images/edit.gif" border="0" /> </a></td> 
		  <td class="bus_confirm_6"><a href="?sub_m=6&action=del&id='.$row['id'].'"><img src="../images/delete1.gif" border="0" /></a></td>
		  ';
        } 
        echo '</table>'; 
} 

///////////////////////////////////////////////////////////////////

//удаление статьи

function show_del(){
	global $lang_prefix;
	if ($_GET['action'] == "delyes")
		{
   		 $result = mysql_query("DELETE FROM catalogue_".$lang_prefix." WHERE id='".$_GET['id']."'"); 
		 echo "Данные обновлены.<br>";
		 echo '<a href="sadmin.php?sub_m=6">Вернутся к списку предприятий</a><br> ';
		}
	else
	if ($_GET['action'] == "del")
	{
   		$result = mysql_query("SELECT name FROM catalogue_".$lang_prefix." WHERE id='".$_GET['id']."'"); 
		$row = mysql_fetch_array($result);
  		echo '<div style="font-weight: bold; color: white;	font-family: Tahoma, Arial, Geneva, sans-serif; width:410px; height:150px; border-color: black; background-color: red; padding: 20px;">
 <h3 style="text-align: center; ">Вы уверены, что ходите удалить предприятие "'.$row['name'].'"?</h3>
 <br><br><a href="sadmin.php?sub_m=6" style="color: white; display:block; float:left;margin-left:25px;">НЕТ</a>
 &nbsp;&nbsp;&nbsp;&nbsp;
 <a href="sadmin.php?sub_m=6&action=delyes&id='.$_GET['id'].'" style="color: white; display:block; float:right; margin-right:25px;">ДА</a>
				 </div>';
		}

}

function show_add()
{
	global $dbtree;	
	?>
	<div id="page_edit"></div><a href="sadmin.php?sub_m=6">Вернутся к списку предприятий</a><br> 	  
	<form action="" method="post">
	<table cellspacing="1" cellpadding="2"  > 
	<tr> 
	  <td>Номер раздела:</td> 	  
	</tr>
	<tr> 
	  <td>
		<SELECT NAME="idsec">
		<?php		
		$dbtree->Branch(32,'',array('and' => array('section_level > 3')));
		while ($item = $dbtree->NextRow())
		{		   
	
		if (-1 == $item['section_id'])
		{
			echo '<OPTION selected VALUE="'.htmlspecialchars(stripslashes($item['section_id'])).'" >'.htmlspecialchars(stripslashes($item['section_name'])).'</OPTION>';
		}
		else
		{
			echo '<OPTION VALUE="'.htmlspecialchars(stripslashes($item['section_id'])).'" >'.htmlspecialchars(stripslashes($item['section_name'])).'</OPTION>';
		}
	
		}
		?>		
		</SELECT>		
	  </td> 	  
	</tr>
	<tr> 
	  <td>Текст для разбора:</td> 	  
	</tr>
	<tr> 
	  <td><textarea cols="130" rows="10" name="area_parse"></textarea></td> 	  
	</tr>
	<tr> 
	<td  align="left"> 
	    <input type="hidden" name="id" value="<?=$_GET['id'];?>"> 
	    <input type="submit" value="Разобрать" name="add_parse">
  	</td>  
	</tr> 
	</table> 
	</form> 
	<?php
}

function parse()
{
	global $dbtree;	
	?>
	<div id="page_edit"></div><a href="sadmin.php?sub_m=6">Вернутся к списку предприятий</a><br> 	  
	<form action="" method="post">
	<table cellspacing="1" cellpadding="2"  >		
	<tr> 
	  <td>Номер раздела:</td> 	  
	</tr>
	<tr> 
	  <td><SELECT NAME="idsec">
		<?php
		$dbtree->Branch(32,'',array('and' => array('section_level > 3')));
		while ($item = $dbtree->NextRow())
		{		   
	
		if ($_POST['idsec'] == $item['section_id'])
		{
			echo '<OPTION selected VALUE="'.htmlspecialchars(stripslashes($item['section_id'])).'" >'.htmlspecialchars(stripslashes($item['section_name'])).'</OPTION>';
		}
		else
		{
			echo '<OPTION VALUE="'.htmlspecialchars(stripslashes($item['section_id'])).'" >'.htmlspecialchars(stripslashes($item['section_name'])).'</OPTION>';
		}
	
		}
		?>		
		</SELECT></td> 	  
	</tr>
	<tr> 
	  <td>Текст для разбора:</td> 	  
	</tr>
	<tr> 
	  <td><textarea cols="130" rows="10" name="area_parse"><?=$_POST["area_parse"];?></textarea></td> 	  
	</tr>
	<tr> 
	<td  align="left"> 
	    <input type="hidden" name="id" value="<?=$_GET['id'];?>"> 
	    <input type="submit" value="Разобрать" name="add_parse">
	    <input type="submit" value="Сохранить" name="save_parse">
  	</td>  
	</tr> 
	</table> 
	</form>
	
	<?php
	
	$textarray = explode("\r\n", $_POST["area_parse"]);
	
	$out = '';
	// начало списка предприятий
	echo '<div id="center_column_b" class="main_sec_preview"> ';
	
	$new_pr = 1;
	$count = 0;
	
	foreach ($textarray as $tarr)
	{		
		if (($new_pr == 1)and(strlen(trim($tarr)) > 0))
		{
		$new_pr = 2;
		
		if ($count != 0)
		{
			$name_err = check_exist_business(trim($name_pr));
			
			if (($index == '')or($city == '')or($street == '')or($build == ''))
				$addr_err = 1;
			else
				$addr_err = 0;
				
			if (($addr_err == 1)or($name_err == 1))
				$out = $out.'<div class="catalogue_item_r">';
			else
				$out = $out.'<div class="catalogue_item">';
				
			$out = $out.'<div><img class="bus_sec_image" src="../../images/catalogue_logo.gif" width="60" height="60" border="0" alt=""></div>';
			
			if ($name_err)
				$out = $out.'<div class="catalogue_h_r">';
			else
				$out = $out.'<div class="catalogue_h">';
			
			$out = $out.$name_pr;
			$out = $out.'</div><div class="catalogue_txt"><div>';
			if ($addr_err)
				$out = $out.'<font color="red"><b>'.$index.','.$city.','.$street.','.$build.'</b></font>';
			else
				$out = $out.$index.','.$city.','.$street.','.$build;			
			$out = $out. "</div><div>".$phone;
			$out = $out.'</div><div>';
			$out = $out.'</div></div></div>';
		}		
		
		$name_pr = $tarr;		
		$count++;
		$index = '';
		$city = '';
		$street = '';
		$build = '';
		}
		
		if (strpos($tarr,'г.') !== false)
		{
		    
		    $addr_array = explode(",", $tarr);
		    $index = $addr_array[0];
		    $city = $addr_array[1];
		    $street = $addr_array[2];
		    $build = $addr_array[3]; 
		}
		
		if (strpos($tarr,'тел.:') !== false)
		{			
		    $phone = 'Телефон: '.substr($tarr,8,strlen($tarr)-5);
		}
		
		if (strlen(trim($tarr)) <= 0)
		{			
			$new_pr = 1;			
		}
	}
	$name_err = check_exist_business(trim($name_pr));
	// вывод оставшегося последнего предприятия
	if (($index == '')or($city == '')or($street == '')or($build == ''))
		$addr_err = 1;
	else
		$addr_err = 0;
			
	if (($addr_err == 1)or($name_err == 1))
		$out = $out.'<div class="catalogue_item_r">';
	else
		$out = $out.'<div class="catalogue_item">';
			
	$out = $out.'<div><img class="bus_sec_image" src="../../images/catalogue_logo.gif" width="60" height="60" border="0" alt=""></div>';
			
	if ($name_err)
		$out = $out.'<div class="catalogue_h_r">';
	else
		$out = $out.'<div class="catalogue_h">';
		
	$out = $out.$name_pr;
	$out = $out.'</div><div class="catalogue_txt"><div>';
	if ($addr_err)
		$out = $out.'<font color="red"><b>'.$index.','.$city.','.$street.','.$build.'</b></font>';
	else
		$out = $out.$index.','.$city.','.$street.','.$build;			
	$out = $out. "</div><div>".$phone;
	$out = $out.'</div><div>';
	$out = $out.'</div></div></div>';
	// конец списка предприятий
	echo $out.'</div>';
}

function save_parse()
{
	
	$textarray = explode("\r\n", $_POST["area_parse"]);
	
	$new_pr = 1;
	$count = 0;
	
	foreach ($textarray as $tarr)
	{		
		if (($new_pr == 1)and(strlen(trim($tarr)) > 0))
		{
		$new_pr = 2;
		
		if ($count != 0)
		{
			$name_err = check_exist_business(trim($name_pr));
			
			if (($index == '')or($city == '')or($street == '')or($build == ''))
				$addr_err = 1;
			else
				$addr_err = 0;
				
			if (($addr_err == 0)and($name_err == 0))
			{
				save_new_business($name_pr,$index,$city,$street,$build,'Тел: '.$phone,$_POST['idsec']);					
			}
		}
		$name_pr = $tarr;		
		$count++;
		}
		
		if (strpos($tarr,'г.') !== false)
		{
		    
		    $addr_array = explode(",", $tarr);
		    $index = $addr_array[0];
		    $city = $addr_array[1];
		    $street = $addr_array[2];
		    $build = $addr_array[3]; 
		}
		
		if (strpos($tarr,'тел.:') !== false)
		{			
		    $phone = substr($tarr,8,strlen($tarr)-5);
		}
		
		if (strlen(trim($tarr)) <= 0)
		{			
			$new_pr = 1;			
		}
	}
	$name_err = check_exist_business(trim($name_pr));
			
	if (($index == '')or($city == '')or($street == '')or($build == ''))
		$addr_err = 1;
	else
		$addr_err = 0;
		
	if (($addr_err == 0)and($name_err == 0))
	{
		save_new_business($name_pr,$index,$city,$street,$build,'Тел: '.$phone,$_POST['idsec']);	
	}

}

///////////////////////////////////////////////////////////////////


if($_POST['edit']) complete();

if ($_POST['save_parse']) save_parse();

if($_POST['add_parse'])
{
	parse();
}
else
if($_GET['action'] == 'add_parse') 
{
	show_add();
}
else
if($_GET['id']) 
{
	if (($_GET['action'] == "del") or ($_GET['action'] == "delyes"))
		show_del();
	else
		show_form();

}
else
	show_business(); // ну, а если мы не выбрали определенный id_page - запускаем нашу функцию выбора id_page. 
?> 