<?
   if ($_GET['lang'])
    $_SESSION['lng']=$_GET['lang'];

// проверка и получение префикса языка для отображения
  $lang_prefix = get_existed_languages($_SESSION['lng']);
  $_GET['id'] = (int)$_GET['id'];  
  
function show_form(){ 
	global $lang_prefix;
        $result = mysql_query("SELECT * FROM catalogue_temp_".$lang_prefix." WHERE id = '".$_GET['id']."'"); 

        $row = mysql_fetch_array($result); 

?>

<div id="page_edit"></div><a href="sadmin.php?sub_m=4">Вернутся к списку предприятий</a><br> 	  
<form action="" method="post"> 
<table cellspacing="1" cellpadding="2"  > 
<tr> 
  <td>Секция:</td> 
  <td> <input type="text" name="idsec" value="<?=htmlspecialchars(stripslashes($row['idsec']));?>" size="10"> </td> 
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
  <td width="30%">Сайт: </td>
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
  <td  align="right"> 
      <input type="hidden" name="id" value="<?=$_GET['id'];?>"> 
      <input type="submit" value="Сохранить" name="edit">
      
  </td>
  <td>
      <input type="submit" value="Перенести" name="move"> 
  </td>
</tr> 
</table> 
</form> 

<?php 

} // функция show_form() закончилась 

///////////////////////////////////////////////////////////////////

function complete(){ 
      global $lang_prefix;
      $query = "UPDATE catalogue_temp_".$lang_prefix." SET 
                                     name = '".ltrim(rtrim(mysql_real_escape_string($_POST['name'])))."', 
                                     idsec = '".mysql_real_escape_string($_POST['idsec'])."', 
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

function move()
{
         global $lang_prefix;
	 $query = "INSERT INTO catalogue_".$lang_prefix." 
                     		(name, 
                      		idsec1, 
                      		tel, 
                      		email, 
                      		www,
				ind, 
                      		city,
				street, 
				house) 
                      VALUES 
                            ('".ltrim(rtrim(mysql_real_escape_string($_POST['name'])))."', 
                             '".mysql_real_escape_string($_POST['idsec'])."', 
                             '".mysql_real_escape_string($_POST['tel'])."', 
                             '".mysql_real_escape_string($_POST['email'])."', 
                             '".mysql_real_escape_string($_POST['www'])."',
                             '".mysql_real_escape_string($_POST['ind'])."', 
                             '".mysql_real_escape_string($_POST['city'])."', 
                             '".mysql_real_escape_string($_POST['street'])."',			     
			     '".mysql_real_escape_string($_POST['house'])."')";
			     
	mysql_query($query);
	
	$result = mysql_query("DELETE FROM catalogue_temp_".$lang_prefix." WHERE id='".$_GET['id']."'");
	echo '<h3>Данные обновлены</h3>';
	echo '<br><a href="sadmin.php?sub_m=4">Вернутся к списку предприятий</a><br>';
}

function show_business() {
       global $lang_prefix;
        echo '<p><b>Выберите предприятие для добавления:</b></p> 
		<table cellspacing="0" cellpadding="2" border="1" border-collapse="collapse" style="border-collapse: collapse; border-color: lightgray" id="all_pages_tab">' ; 
	echo '<tr class="bus_edit_0">
		<td>ID</td><td>Название предприятия</td><td>Секция</td><td>IP</td><td></td><td></td>
	      </tr>'; 

		$result = mysql_query("SELECT * FROM catalogue_temp_".$lang_prefix." ORDER BY id");

        while($row = mysql_fetch_array($result))
	{ 
                echo ' 
		<tr >
		  <td class="bus_edit_1">'.$row['id'].'</td>';
		echo  '
		  <td class="bus_edit_2">'.$row['name'].'</td>
		  <td class="bus_edit_3">'.$row['idsec'].'</td>
		  <td class="bus_edit_4"><a href="?sub_m=5&ip_ban='.$row['ip'].'">'.$row['ip'].'</a></td>
		  <td class="bus_edit_5"><a href="?sub_m=4&id='.$row['id'].'">  <img src="../images/edit.gif" border="0" /> </a></td> 
		  <td class="bus_edit_6"><a href="?sub_m=4&action=del&id='.$row['id'].'"><img src="../images/delete1.gif" border="0" /></a></td>
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
   		 $result = mysql_query("DELETE FROM catalogue_temp_".$lang_prefix." WHERE id='".$_GET['id']."'"); 
		 echo "Данные обновлены.<br>";
		 echo '<a href="sadmin.php?sub_m=4">Вернутся к списку предприятий</a><br> ';
		}
	else
	if ($_GET['action'] == "del")
	{
   		$result = mysql_query("SELECT name FROM catalogue_temp_".$lang_prefix." WHERE id='".$_GET['id']."'"); 
		$row = mysql_fetch_array($result);
  		echo '<div style="font-weight: bold; color: white;	font-family: Tahoma, Arial, Geneva, sans-serif; width:410px; height:150px; border-color: black; background-color: red; padding: 20px;">
 <h3 style="text-align: center; ">Вы уверены, что ходите удалить предприятие "'.$row['name'].'" из списка для утверждения?</h3>
 <br><br><a href="sadmin.php?sub_m=4" style="color: white; display:block; float:left;margin-left:25px;">НЕТ</a>
 &nbsp;&nbsp;&nbsp;&nbsp;
 <a href="sadmin.php?sub_m=4&action=delyes&id='.$_GET['id'].'" style="color: white; display:block; float:right; margin-right:25px;">ДА</a>
				 </div>';
		}

}

///////////////////////////////////////////////////////////////////


if($_POST['edit']) complete();

if($_POST['move'])
{
	move(); 
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