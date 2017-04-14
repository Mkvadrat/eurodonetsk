<?
require_once ('sadmin/dbtree.class.php');  // подключаем класс для работы с деревом разделов

// Если сессия уже была активна - восстанавливаем язык отображения для пользователя
  if ($_GET['lang'])
    $_SESSION['lng']=$_GET['lang'];

// проверка и получение префикса языка для отображения
  $lang_prefix = get_existed_languages($_SESSION['lng']);
  $tbl_lng = 'sections_'.$lang_prefix;
  $pages_lng = 'pages_'.$lang_prefix;  
  
  $_GET['id_page'] = mysql_real_escape_string($_GET['id_page']);  
  
  $dbtree = new dbtree($tbl_lng, 'section', $db);

///////////////////////////////////////////////////////////////////

function show_form($pages_lng,$tbl_lng){ 

	global $dbtree;	
	
        $result = mysql_query("SELECT * FROM ".$pages_lng." WHERE id_page = '".$_GET['id_page']."'"); 

        $row = mysql_fetch_array($result); 

	// Prepare data to view all tree
    	$dbtree->Full('');
?>

<div><table style="margin-top:50px;"></table><a href="sadmin.php?sub_m=2">Вернутся к списку статей</a><br> 	  
<form action="" method="post"> 
<table cellspacing="1" cellpadding="2"  > 
<tr>
  <td width="30%">Заголовок статьи: </td>
  <td><input type="text" name="title" value="<?=htmlspecialchars(stripslashes($row['title']));?>"></td> 
</tr>
<tr > 
  <td>Раздел:</td>
  <td>
	<SELECT NAME="section">
	<?php
        while ($item = $dbtree->NextRow())
	{
	   if ($item['name']<>'Root')
           {
		$str = str_repeat('.', 4 * $item['section_level']);
		$item['section_name'] = $str . $item['section_name'];
           }
	
	if ($row['idsec'] == $item['section_id'])
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
  <td>Заголовок страницы (Title):&nbsp;</td> 
  <td> <input type="text" name="page_title" value="<?=htmlspecialchars(stripslashes($row['page_title']));?>" class="enter" size="79"> </td> 
</tr>
<tr> 
  <td>Заголовок страницы (Meta - title):&nbsp;</td> 
  <td> <input type="text" name="metatitle" value="<?=htmlspecialchars(stripslashes($row['metatitle']));?>" class="enter" size="79"> </td> 
</tr> 
<tr > 
  <td>Теги: ключевые слова (Meta - keywords)</td> 
  <td> <input type="text" name="metakeywords" class="enter" size="79" value="<?=htmlspecialchars(stripslashes($row['metakeywords']));?>"></td> 
</tr> 
<tr > 
  <td> Описание (Meta - description)</td> 
  <td><input type="text" name="metadescription" class="enter" size="79" value="<?=htmlspecialchars(stripslashes($row['metadescription']));?>"></td> 
</tr>
<tr > 
  <td> Дата создания</td> 
  <td><input type="text" name="date" class="enter" size="15" value="<?=htmlspecialchars(stripslashes($row['date']));?>"></td> 
</tr> 
<?php
	 if ($_GET['action'] == 'top')
		echo '
		<tr ><td> Позиция на главной странице(1-9):  </td>
			 <td><input type="text" name="main" 
				class="enter" size="1" 
				value="">
			</td> 
		</tr>
		';
?>
<tr>
  <td>Текст статьи: </td>
</tr> 
<tr > 
  <td colspan="2"> 
      <textarea name="body" rows="20" cols="59" class="enter"> 

                <?// "<?=" тоже самое, что и "<? echo", т.е. вывод на экран, что выводим объясню позже ;-) ?> 
                <?=stripslashes($row['body']);?> 
      </textarea> 
  </td> 
</tr>
<tr> 
  <td  align="left"> 
      <input type="hidden" name="id_page" value="<?=$_GET['id_page'];?>"> 
      <input type="submit" value="отправить" name="edit"> 
  </td> 
</tr>
<tr>
  <td>Выбрать файл (получение пути): </td>
</tr>
<tr>
  <td colspan=2>	
	<input type="file" alt="userfile" name="userfile" size="50" readonly="true"></td>
</tr>
</table> 
</form> 

<?php 

} // функция show_form() закончилась 

///////////////////////////////////////////////////////////////////

function show_top($pages_lng,$tbl_lng){ 

	global $dbtree;
	global $lang_prefix;
	
        $result = mysql_query("SELECT * FROM ".$pages_lng." WHERE id_page = '".$_GET['id_page']."'"); 

        $row = mysql_fetch_array($result);
	
	$result = mysql_query("SELECT * FROM news_".$lang_prefix." WHERE id_page = '".$_GET['id_page']."'");
	
	$row_n = mysql_fetch_array($result);
	


?>

<div><table style="margin-top:50px;"></table><a href="sadmin.php?sub_m=2">Вернутся к списку статей</a><br> 	  
<form action="" method="post"> 
<table cellspacing="1" cellpadding="2"  > 
<tr>
  <td width="30%">Заголовок новости:</td>
  <td><input type="text" name="news_title" id="news_title" value="<?=htmlspecialchars(stripslashes($row_n['news_title']));?>"></td> 
</tr>
<tr> 
  <td>Путь к изображению:</td> 
  <td> <input type="text" name="news_image" id="news_image" value="<?=htmlspecialchars(stripslashes($row_n['news_image']));?>" class="enter" size="79"> </td> 
</tr>
<tr> 
  <td>Приоритет:</td> 
  <td> <input type="text" name="news_order" value="<?=htmlspecialchars(stripslashes($row_n['news_order']));?>" class="enter" size="10"> </td> 
</tr> 
<tr> 
  <td>Актуальность (0-1):</td> 
  <td> <input type="text" name="main_page" value="<?=htmlspecialchars(stripslashes($row_n['main_page']));?>" class="enter" size="1"> </td> 
</tr> 
<tr>
  <td>Текст новости: </td>
</tr> 
<tr > 
  <td colspan="2"> 
      <textarea name="news_text" id="news_text" rows="20" cols="59" class="enter">                 
                <?php echo ltrim(rtrim(stripslashes($row_n['news_text']))); ?> 
      </textarea> 
  </td> 
</tr> 
<tr> 
  <td  align="right"> 
      <input type="hidden" name="id_page" value="<?=$row['id_page'];?>">
      <input type="hidden" name="id_section" value="<?=$row['idsec'];?>">      
      <input type="submit" value="Отправить" name="edit">
      <input type="button" value="Предпросмотр" onclick="return openpopup('sadmin/preview.php', 'popup', 'menubar=0,location=0,scrollbars,resizable,width=230,height=350', 0);" name="preview">
  </td> 
</tr> 
</table> 
</form> 

<?php 

} // функция show_top() закончилась 

///////////////////////////////////////////////////////////////////

function complete(){ 
     	global $tbl_lng;
	global $pages_lng;

      $result = mysql_query("SELECT * FROM ".$pages_lng." WHERE id_page = '".$_POST['id_page']."'"); 
      $row = mysql_fetch_array($result); 
      $_POST['body'] = str_replace('class="main_sec_image"','',$_POST['body']);
      $_POST['body'] = str_replace('<img ','<img class="main_sec_image"',$_POST['body']);
      // проверяем не пуст ли элемент массива id_page. Если пуст, значит вставляем наши данные в БД 
      if(empty($row['id_page'])) 

            $query = "INSERT INTO ".$pages_lng."
                     		(body, 
                      		title,
				page_title,
                      		metatitle, 
                      		metakeywords, 
                      		metadescription,
				date,
				idsec) 
                      VALUES 
                            ('".ltrim(rtrim(mysql_real_escape_string($_POST['body'])))."', 
                             '".mysql_real_escape_string($_POST['title'])."',
			     '".mysql_real_escape_string($_POST['page_title'])."',
                             '".mysql_real_escape_string($_POST['metatitle'])."', 
                             '".mysql_real_escape_string($_POST['metakeywords'])."', 
                             '".mysql_real_escape_string($_POST['metadescription'])."',
			     '".date('Y-m-d H:i:s')."',			     
			     '".mysql_real_escape_string($_POST['section'])."')"; 
      else 
            $query = "UPDATE ".$pages_lng." SET 
                                     body = '".ltrim(rtrim(mysql_real_escape_string($_POST['body'])))."', 
                                     title = '".mysql_real_escape_string($_POST['title'])."',
				     page_title = '".mysql_real_escape_string($_POST['page_title'])."', 
                                     metatitle = '".mysql_real_escape_string($_POST['metatitle'])."', 
                                     metakeywords = '".mysql_real_escape_string($_POST['metakeywords'])."',
				     date = '".mysql_real_escape_string($_POST['date'])."', 
                                     metadescription = '".mysql_real_escape_string($_POST['metadescription'])."',
				    idsec =  '".mysql_real_escape_string($_POST['section'])."'
                     WHERE id_page = '".$_POST['id_page']."'"; 
      mysql_query($query); 

      echo '<h3>Данные обновлены</h3>';
}

///////////////////////////////////////////////////////////////////

function complete_top(){ 
     	global $tbl_lng;
	global $pages_lng;
	global $lang_prefix;
	global $dbtree;

      $result = mysql_query("SELECT * FROM news_".$lang_prefix." WHERE id_page = '".$_POST['id_page']."'"); 
      $row = mysql_fetch_array($result);
      
      	$result = mysql_query("SELECT max(news_order) as news_order FROM news_".$lang_prefix);
	
	$row_or = mysql_fetch_array($result);
	
	if (!empty($row['news_order']))
		$order = $_POST['news_order'];
	else
	{
		if (!empty($_POST['news_order']))
		{
			$order = $_POST['news_order'];	
		}
		else	
			$order = (int)$row_or['news_order']+1;
	}
		
	$dbtree->Ajar($_POST['id_section'],array('section_id','section_level'));
        while ($item = $dbtree->NextRow()) 
        {
            if ($item['section_level'] >= 2)
                break;
            $section_parent = $item['section_id']; 
        }
	
	if (!empty($row['$id_group']))
		$id_group = $row['$id_group'];
	else
		$id_group = $section_parent;

      // проверяем не пуст ли элемент массива id_page. Если пуст, значит вставляем наши данные в БД 
      if(empty($row['id_page'])) 

            $query = "INSERT INTO news_".$lang_prefix."
                     		(news_text,
				id_section,
                      		id_page, 
                      		id_group, 
                      		news_title, 
                      		news_image,				
				main_page,
				news_order) 
                      VALUES 
                            ('".ltrim(rtrim(mysql_real_escape_string($_POST['news_text'])))."', 
                             '".mysql_real_escape_string($_POST['id_section'])."', 
                             '".mysql_real_escape_string($_POST['id_page'])."', 
                             '".mysql_real_escape_string($id_group)."', 
                             '".mysql_real_escape_string($_POST['news_title'])."',
			     '".mysql_real_escape_string($_POST['news_image'])."',
			     '".mysql_real_escape_string($_POST['main_page'])."',
			     '".mysql_real_escape_string($order)."')";
      else 
            $query = "UPDATE news_".$lang_prefix." SET 
                                     news_text = '".ltrim(rtrim(mysql_real_escape_string($_POST['news_text'])))."', 
                                     id_section = '".mysql_real_escape_string($_POST['id_section'])."', 
                                     id_page = '".mysql_real_escape_string($_POST['id_page'])."', 
                                     id_group = '".mysql_real_escape_string($id_group)."', 
                                     news_title = '".mysql_real_escape_string($_POST['news_title'])."',
				     news_image = '".mysql_real_escape_string($_POST['news_image'])."', 
                                     main_page = '".mysql_real_escape_string($_POST['main_page'])."',
				     news_order =  '".mysql_real_escape_string($order)."'
                     WHERE id_page = '".$_POST['id_page']."'"; 
      mysql_query($query);
      
      $query = 'update '.$pages_lng.' set main = 1 WHERE id_page = "'.$_POST['id_page'].'"';
      mysql_query($query);
      
      echo '<h3>Данные обновлены</h3>';
}

function show_pages($pages_lng) {
	global $lang_prefix;
        echo '<table cellspacing="2" cellspadding="1" style="margin-top: 50px;">
		<tr>
		  <td><a href="sadmin.php?sub_m=2&id_page=new">Добавить статью</a> 
		  </td>		  
		</tr>
		<tr>
		<td>Фильтры:</td>		  
		</tr>
		<tr><td><a href="sadmin.php?sub_m=2">Все статьи</a></td>
		  <td><a href="sadmin.php?sub_m=2&filter=top">Статьи-новости</a></td>
		  </tr>
	      </table>'; 
        echo '<p><b>Выберите статью для редактирования:</b></p> 
		<table cellspacing="0" cellpadding="2" border="1" border-collapse="collapse" style="border-collapse: collapse; border-color: lightgray" id="all_pages_tab">' ; 
	echo '<tr >
		<td>Раздел</td><td>Топ</td><td align="center">&nbsp;&nbsp;Название статьи</td><td></td><td></td>
	      </tr>'; 

	if ($_GET['filter'] == 'top')
	{
		$whr = 'where pg.main = 1';
		$ordr = 'ORDER BY ns.news_order';
	}	
	else
	{
		$whr = '';
		$ordr = 'ORDER BY pg.id_page';
	}
		
	$result = mysql_query("SELECT pg.*, ns.news_order, ss.section_name FROM ".$pages_lng." pg left join news_".$lang_prefix." ns on pg.id_page = ns.id_page left join sections_".$lang_prefix." ss on pg.idsec = ss.section_id ".$whr." ".$ordr);

        while($row = mysql_fetch_array($result))
	{ 
                echo ' 
		<tr onmouseover=\'OverMnu(this, "#eeeeee");\' onmouseout=\'OutMnu(this, "");\'>
		  <td class="all_pages_td1" onmouseover="tooltip.show(\''.$row['section_name'].'\');" onmouseout="tooltip.hide();"><a href="../index.php?section_id='.$row['idsec'].'">' . $row['idsec'] . '</a></td>';
		if ($row['main'])
			echo  '<td class="all_pages_td2">'.$row['news_order'].'</td>';
		else
			echo  '<td class="all_pages_td2"></td>';
		echo  '<td class="all_pages_td3"><a href="../index.php?section_id='.$row['idsec'].'&id_page='.$row['id_page'].'">' . stripslashes($row['title']) . '</a></td> 
		  <td class="all_pages_td4"><a href="?sub_m=2&id_page='.$row['id_page'].'">  <img src="../images/edit.gif" border="0" /> </a></td> 
		  <td class="all_pages_td5"><a href="?sub_m=2&action=del&id_page='.$row['id_page'].'"><img src="../images/delete1.gif" border="0" /></a></td>
		  <td class="all_pages_td6"> '; 

	 	echo '<a href="?sub_m=2&action=top&id_page='.$row['id_page'].'"> top </a>';
		echo ' </td></tr>';
        } 
        echo '</table>'; 
} 

///////////////////////////////////////////////////////////////////

//удаление статьи

function show_del($pages_lng){

	if ($_GET['action'] == "delyes")
		{
   		 $result = mysql_query("DELETE FROM ".$pages_lng." WHERE id_page='".$_GET['id_page']."'"); 
		 echo "Данные обновлены.<br>";
		 echo '<a href="sadmin.php?sub_m=2"> Вернутся к списку статей</a><br> ';
		}
	else
	if ($_GET['action'] == "del")
	{
   		$result = mysql_query("SELECT title FROM ".$pages_lng." WHERE id_page='".$_GET['id_page']."'"); 
		$row = mysql_fetch_array($result);
  		echo '<div style="font-weight: bold; color: white;	font-family: Tahoma, Arial, Geneva, sans-serif; width:410px; height:150px; border-color: black; background-color: red; padding: 20px;">
 <h3 style="text-align: center; ">Вы уверены, что ходите удалить статью "'.$row['title'].'"?</h3>
 <br><br><a href="sadmin.php?sub_m=2" style="color: white; display:block; float:left;margin-left:25px;">НЕТ</a>
 &nbsp;&nbsp;&nbsp;&nbsp;
 <a href="sadmin.php?sub_m=2&action=delyes&id_page='.$_GET['id_page'].'" style="color: white; display:block; float:right; margin-right:25px;">ДА</a>
				 </div>';
		}

}

///////////////////////////////////////////////////////////////////

if(($_POST['edit'])and($_GET['action'] == "top"))
	complete_top();
else
if($_POST['edit']) complete(); 

if($_GET['id_page']) 
{
	if (($_GET['action'] == "del") or ($_GET['action'] == "delyes"))
		show_del($pages_lng);
	else
	if ($_GET['action'] == "top")
		show_top($pages_lng, $tbl_lng);
	else
		show_form($pages_lng, $tbl_lng);

}
else
	show_pages($pages_lng); // ну, а если мы не выбрали определенный id_page - запускаем нашу функцию выбора id_page. 
?> 
