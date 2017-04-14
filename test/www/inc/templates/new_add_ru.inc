<div class="main_page">
 <div id="left_column">
      <?php require_once ('inc/templates/business_left_column_'.$lang_prefix.'.inc');?>
 </div>
 <div class="main_sec_preview" id="center_column_b">
<?php
 if (check_for_black(getRealIp()))
 {
   echo '<div class="comp_header_text">Ваш IP адрес занесён в чёрный список. Вы не можете добавлять предприятия. За подробностями обратитесь к администрации сайта.</div>';
 }
 else
 if (isset($_SESSION['time_add'])&&(time() - $_SESSION['time_add'] < 120))
 {
    echo '<div class="comp_header_text">Вы не можете добавлять пердприятия чаще одного раза в 2 минуты</div>'; 
 }
 else
 {
   if($_POST['edit'])
   {
    if ((empty($_POST['name'])) or (empty($_POST['tel'])) or(empty($_POST['city'])) or(empty($_POST['street'])) or(empty($_POST['house'])))
    {
     echo '<div class="comp_header_text">Вы должны указать все обязательные параметры.</div>'; 
    }
    else
    if ($_POST['euro'] != "2012")
    {
     echo '<div class="comp_header_text">Вы не правильно ответили на контрольный вопрос!</div>'; 
    }
    else
    {     
     $_SESSION['time_add'] = time();
     $query = "INSERT INTO catalogue_temp_ru
                     		(name, 
                      		tel, 
                      		email, 
                      		www, 
                      		idsec,
				ind,
                                city, 
                      		street, 
                      		house,
                                ip) 
                      VALUES 
                            ('".mysql_real_escape_string($_POST['name'])."', 
                             '".mysql_real_escape_string($_POST['tel'])."', 
                             '".mysql_real_escape_string($_POST['email'])."', 
                             '".mysql_real_escape_string($_POST['www'])."', 
                             '".mysql_real_escape_string($_POST['idsec'])."',
                             '".mysql_real_escape_string($_POST['ind'])."',
                             '".mysql_real_escape_string($_POST['city'])."',
                             '".mysql_real_escape_string($_POST['street'])."',
                             '".mysql_real_escape_string($_POST['house'])."',
			     '".getRealIp()."')";
      mysql_query($query);                       
      echo '<div class="comp_header_text">Предприятие добавлено. После проверки администрацией сайта оно будет перемещенно в общий список.</div>';
      unset($_POST['name']);
      unset($_POST['tel']);
      unset($_POST['email']);
      unset($_POST['www']);
      unset($_POST['idsec']);
      unset($_POST['ind']);
      unset($_POST['city']);
      unset($_POST['street']);
      unset($_POST['house']);
    }    
   }
   ?>
    <div id="comp_header_text">Добавление предприятия</div>
    <form id="comp_input_form" action="" method="post"> 
      <div class="comp_imoprtant">Название предприятия:</div>
      <div>
       <input type="text" name="name" value="<?=htmlspecialchars(stripslashes($_POST['name']));?>" size="45">
      </div>
      <div class="comp_imoprtant">Телефоны:</div>
      <div>
       <input type="text" name="tel" value="<?=htmlspecialchars(stripslashes($_POST['tel']));?>" size="45">
      </div>
      <div class="comp_not_imoprtant">E-mail:</div>
      <div>
       <input type="text" name="email" value="<?=htmlspecialchars(stripslashes($_POST['email']));?>" size="45">
      </div>
      <div class="comp_not_imoprtant">Сайт:</div>
      <div>
       <input type="text" name="www" value="<?=htmlspecialchars(stripslashes($_POST['www']));?>" size="45">
      </div>
      <div class="comp_not_imoprtant">Индекс:</div>
      <div>
       <input type="text" name="ind" value="<?=htmlspecialchars(stripslashes($_POST['ind']));?>" size="6">
      </div>
      <div class="comp_imoprtant">Город:</div>
      <div>
       <input type="text" name="city" value="<?=htmlspecialchars(stripslashes($_POST['city']));?>" size="45">
      </div>
      <div class="comp_imoprtant">Улица:</div>
      <div>
       <input type="text" name="street" value="<?=htmlspecialchars(stripslashes($_POST['street']));?>" size="45">
      </div>
      <div class="comp_imoprtant">Дом:</div>
      <div>
       <input type="text" name="house" value="<?=htmlspecialchars(stripslashes($_POST['house']));?>" size="25">
      </div>
      <div class="comp_imoprtant">Укажите год, в котором будет проводится Евро в Украине\Польше:</div>
      <div>
       <input type="text" name="euro" value="" size="4">
      </div>
      <div>Выделенные поля обязательны для заполнения.</div>
      <div id="comp_submit_b">                
        <input type="hidden" name="idsec" value="<?=$_GET['section_id'];?>">      
        <input type="submit" value="отправить" name="edit">        
      </div> 
    </form>
    <?php   
 }
?>
 </div>
 <div id="right_column">
      <?php require_once ('inc/templates/business_right_column_'.$lang_prefix.'.inc');?>
 </div>
</div>
