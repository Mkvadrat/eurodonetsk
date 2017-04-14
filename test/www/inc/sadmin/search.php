<?
  $_GET['id'] = (int)$_GET['id'];    
  
function complete(){ 

      $query = $query = "INSERT INTO search_matches
                     		(matches) 
                      VALUES 
                            (' ".ltrim(rtrim(mysql_real_escape_string($_POST['matches'])))." ')";
        mysql_query($query);     
}

function show_search() {
        echo '
		<table cellspacing="0" cellpadding="2" border="1" border-collapse="collapse" style="border-collapse: collapse; border-color: lightgray; margin-top: 60px;" id="all_pages_tab_ip">' ; 
	echo '<tr class="bus_confirm_0">
		<td>ID</td><td>Текст</td><td></td>
	      </tr>'; 

		$result = mysql_query("SELECT * FROM search_matches");

        while($row = mysql_fetch_array($result))
	{ 
                echo ' 
		<tr >
		  <td class="ip_confirm_1">'.$row['id'].'</td>';
		echo  '		  
		  <td class="ip_confirm_3">'.$row['matches'].'</td>		  		  
		  <td class="ip_confirm_4"><a href="?sub_m=7&action=del&id='.$row['id'].'"><img src="../images/delete1.gif" border="0" /></a></td>
		  ';
        } 
        echo '</table>';
	echo '<br><form action="" method="post">';	
	echo 'Сочетание:&nbsp;<input type="text" name="matches" value="" size="50"> ';
	echo '&nbsp;&nbsp;<input type="submit" name="send" value="Занести">';
	echo '</form>';

} 

function show_del(){

	if ($_GET['action'] == "delyes")
		{
   		 $result = mysql_query("DELETE FROM search_matches WHERE id='".$_GET['id']."'"); 
		 echo "Данные обновлены.<br>";
		 echo '<a href="sadmin.php?sub_m=7">Вернутся</a><br> ';
		}
	else
	if ($_GET['action'] == "del")
	{   		
  		echo '<div style="margin-top:20px;font-weight: bold; color: white;	font-family: Tahoma, Arial, Geneva, sans-serif; width:410px; height:150px; border-color: black; background-color: red; padding: 20px;">
 <h3 style="text-align: center; ">Вы уверены, что ходите удалить строку соответствия?</h3>
 <br><br><a href="sadmin.php?sub_m=7" style="color: white; display:block; float:left;margin-left:25px;">НЕТ</a>
 &nbsp;&nbsp;&nbsp;&nbsp;
 <a href="sadmin.php?sub_m=7&action=delyes&id='.$_GET['id'].'" style="color: white; display:block; float:right; margin-right:25px;">ДА</a>
				 </div>';
		}

}


if($_POST['send']) complete();

if (($_GET['action'] == "del") or ($_GET['action'] == "delyes"))
      show_del();
else
show_search(); 
?> 