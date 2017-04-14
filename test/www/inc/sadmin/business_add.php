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
  
  if ($lang_prefix = 'ru')
	$business_sec = 32;
  else
	$business_sec = 456;
  
  $dbtree = new dbtree('sections_'.$lang_prefix, 'section', $db);
  
function show_form(){ 
	global $lang_prefix;
	global $dbtree;
        $result = mysql_query("SELECT * FROM catalogue_".$lang_prefix." WHERE id = '".$_GET['id']."'"); 
	
        $row = mysql_fetch_array($result); 

?>
<script type="text/javascript">
	var new_select;
	var new_number;
	var temp;
	
	function sel_change(obj)
	{
		obj.options[obj.selectedIndex].defaultSelected = true;
		obj.options[obj.selectedIndex].selected = true;
	}
	
	function add_sec()
	{
		$.ajax(
		{
		url: 'sadmin/list.php?lang=<?php echo $lang_prefix; ?>',
		type: 'GET',
		success: function(data)
		{
			temp = $("#sections").html();			
			$("#sections").html('<tr><td>Раздел</td><td><select NAME="idsec_' + new_number +'" onchange="sel_change(this)">' + data + '</select></td></tr>'+temp);
			new_number++;
                }
		});			
	}
</script>
<div id="page_edit"></div><a href="sadmin.php?sub_m=6">Вернутся к списку предприятий</a>&nbsp;&nbsp;&nbsp;<b><a href="#" onclick="add_sec();return;">Добавить раздел</a></b><br> 	  
<form action="" method="post"> 
<table cellspacing="1" cellpadding="2"  >
<tbody id="sections">
<?php
 global $business_sec;
 $num = 0;
 $arr = explode(";",$row['idsec']);
 $opt_arr;
 
 $dbtree->Full('');

 while ($item = $dbtree->NextRow())
 {
	if ($item['name']<>'Root')
        {
		$str = str_repeat('.', 4 * $item['section_level']);
		$item['section_name'] = $str . $item['section_name'];
        }
	
	$opt_arr[$num] = '<OPTION value="'.$item['section_id'].'" >'.htmlspecialchars(stripslashes($item['section_name'])).'</OPTION>';
	$num++;
 }
 
 $num = 0;
  
 
 foreach ($arr as $id)
 {
	if ($id != "")
	{		
	print '<tr> 
	 <td>Раздел:</td> 
	 <td><SELECT NAME="idsec_'.$num.'">';
	foreach ($opt_arr as $opt)
	{
		$opt = str_replace('value="'.$id.'" ',' selected value="'.$id.'"', $opt);
		echo $opt;
	}
	print '</SELECT></td> 
	</tr>';
	}
	$num++;
 }
 $num--;
 echo '<script type="text/javascript">new_number = '.$num.';</script>'; 
?>
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
  <td  align="left"> 
      <input type="hidden" name="id" value="<?=$_GET['id'];?>"> 
      <input type="submit" value="Сохранить" name="edit">
      <input type="hidden" name="action" value="add_parse">
      <input type="submit" value="Предоплаченное" name="paid">      
  </td>  
</tr>
</tbody>
</table> 
</form> 

<?php 

} // функция show_form() закончилась

///////////////////////////////////////////////////////////////////
function paid(){ 
	global $lang_prefix;
	
        $result = mysql_query("SELECT * FROM catalogue_".$lang_prefix." cm left join business_".$lang_prefix." bm on bm.business_id = cm.id WHERE cm.id = '".$_GET['id']."'"); 
	
?>
<script type="text/javascript">	
	var new_page;
	var temp;	
	
	function add_page()
	{
		temp = $("#pages").html();			
		$("#pages").html(temp + '<tr><td>Номер страницы: </td></tr><tr><td><input type="text" name="page_' + new_page + '" value="" size="50"></td></tr><tr><td>Страница:</td></tr><tr><td><textarea cols="130" rows="10" name="area_' + new_page + '"></textarea></td></tr>');
		new_page++;
	}
</script>
<div id="page_edit"></div><a href="sadmin.php?sub_m=6&amp;id=<?php echo $_GET['id']; ?>">Вернутся к предприятию</a>&nbsp;&nbsp;&nbsp;<b><a href="#" onclick="add_page();return;">Добавить страницу</a></b><br> 	  
<form action="" method="post"> 
<table cellspacing="1" cellpadding="2">
<tbody id="pages">
<?php
 $i = 0;
 while ($item = mysql_fetch_array($result))
 {
	if ($i == 0)
	{
		print '<tr><td width="30%">Короткое имя предприятия (На английском - псевдоним. Если поле не пустое считается, что предприятие имеет страницы): </td></tr><tr>
	<td><input type="text" name="short_name" value="'.htmlspecialchars(stripslashes($item['short_name'])).'" size="50"></td>
</tr>';
	}
	print '<tr><td>Номер страницы: </td></tr>
	<tr><td><input type="text" name="page_'.$i.'" value="'.htmlspecialchars(stripslashes($item['page_num'])).'" size="50"></td></tr>
	<tr><td>Страница:</td></tr>
	<tr><td><textarea cols="130" rows="10" name="area_'.$i.'">'.$item['page'].'</textarea></td></tr>';
	$i++;
 }
 if ($i == 0)
 {
	print '<tr><td width="30%">Короткое имя предприятия (На английском - псевдоним. Если поле не пустое считается, что предприятие имеет страницы): </td></tr><tr>
	<td><input type="text" name="short_name" value="" size="50"></td>
</tr>';
 }
  echo '<script type="text/javascript">new_page = '.$i.';</script>';
?>
<tr> 
  <td  align="left"> 
      <input type="hidden" name="id" value="<?=$_GET['id'];?>">
      <input type="hidden" name="action" value="add_parse">	
      <input type="hidden" name="paid" value="true"> 
  </td>  
</tr>
</tbody>
</table>
 <input type="submit" value="Сохранить" name="paid_edit">
</form> 

<?php 

} // функция show_form() закончилась 

///////////////////////////////////////////////////////////////////

function complete(){ 
	global $lang_prefix;
	$str = '';
	for ($i=0; $i < 100; $i++)
	{
		if ($_POST['idsec_'.$i])
		{
			$str = $str.$_POST['idsec_'.$i].';';	
		}
		else
			break;
	}
	
      $query = "UPDATE catalogue_".$lang_prefix." SET 
                                     name = '".ltrim(rtrim(mysql_real_escape_string($_POST['name'])))."', 
                                     idsec = '".mysql_real_escape_string($str)."',				     
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

function complete_paid(){ 
	global $lang_prefix;

           
	$query = "UPDATE catalogue_".$lang_prefix." SET 
                                     short_name = '".$_POST['short_name']."'
                     WHERE id = '".$_POST['id']."'"; 
        echo $query;         
        mysql_query($query);
      
      $i = 0;
      while ($i < 100)
      {
	if ($_POST['page_'.$i])
	{
	
	$result = mysql_query("SELECT cc.id, bb.id FROM catalogue_".$lang_prefix." cc inner join business_".$lang_prefix." bb on cc.id = bb.business_id WHERE cc.id = '".$_POST['id']."' and bb.page_num='".$_POST['page_'.$i]."'"); 
	$row = mysql_fetch_array($result);
        
      
	if(empty($row['id'])) 
            $query = "INSERT INTO business_".$lang_prefix."
                     		(business_id,
				page_num,
				page
                      		) 
                      VALUES 
                            ('".mysql_real_escape_string($_POST['id'])."', 
                             '".mysql_real_escape_string($_POST['page_'.$i])."',                             
			     '".mysql_real_escape_string($_POST['area_'.$i])."')";
        else 
            $query = "UPDATE business_".$lang_prefix." SET                                     
                                     page = '".mysql_real_escape_string($_POST['area_'.$i])."'                                     
                     WHERE business_id = '".$_POST['id']."' and page_num='".$_POST['page_'.$i]."'"; 
        mysql_query($query);
	}
	$i++;
      }
      echo '<h3>Данные обновлены</h3>';
}


function show_business() {
	global $tbl_lng;
	global $lang_prefix;
	echo '<p><b><a href="sadmin.php?sub_m=6&action=add_parse">Добавить предприятие</a></b><br> ';
        echo '<b>Список предприятий:</b></p> 
		<table cellspacing="0" cellpadding="2" border="1" border-collapse="collapse" style="border-collapse: collapse; border-color: lightgray" id="all_pages_tab">' ; 
	echo '<tr class="bus_confirm_0">
		<td>ID</td><td>Секция</td><td>Название предприятия</td><td></td><td></td>
	      </tr>'; 

		$result = mysql_query("SELECT cm.*, sec.section_name as snname FROM catalogue_".$lang_prefix." cm left join sections_".$lang_prefix." sec on sec.section_id = substring(cm.idsec,1, LOCATE(';', cm.idsec)) ORDER BY id");

        while($row = mysql_fetch_array($result))
	{ 
                echo ' 
		<tr onmouseover=\'OverMnu(this, "#eeeeee");\' onmouseout=\'OutMnu(this, "");\'>
		  <td class="bus_confirm_1">'.$row['id'].'</td>';
		echo  '
		  <td class="bus_confirm_3" onmouseover="tooltip.show(\''.$row['snname'].'\');" onmouseout="tooltip.hide();">'.substr($row['idsec'],0,strpos($row['idsec'],';')).'</td>
		  <td class="bus_confirm_2">'.$row['name'].'</td>		  		  
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
	global $business_sec;
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
		$dbtree->Branch($business_sec,'',array('and' => array('section_level > 3')));
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

if($_POST['paid_edit']) complete_paid();

if ($_POST['save_parse']) save_parse();

if($_POST['paid'])
{
	paid();
}
else
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