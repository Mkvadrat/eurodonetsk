<!-- Файл должен находится в inc/templates/ -->
<div class="main_page">
 <div id="left_column">
      <?php require_once ('inc/templates/business_left_column_'.$lang_prefix.'.inc');?>
 </div>
 <div class="main_sec_preview" id="center_column_b">
<?php
 if (check_for_black(getRealIp()))
 {
   echo '<div class="comp_header_text">Ваш IP адрес занесён в чёрный список. Вы не можете изменять содержимое. За подробностями обратитесь к администрации сайта.</div>';
 }
 else
 {
    if($_POST['edit'])
    {
        if (((empty($_POST['name'])) or (empty($_POST['tel'])) or(empty($_POST['city'])) or(empty($_POST['street'])) or(empty($_POST['house'])))&&(!(empty($_GET['business_full']))))
        {
            echo '<div class="comp_header_text">Вы должны указать все обязательные параметры.</div>'; 
        }
        else 
        {
            
            $cpu_url = $_POST['cpu_link'];
            $id_cpu = $_POST['id_cpu'];
            
            echo '<div class="comp_header_text">Страница успешно обновлена.</div>';
            if (!(empty($_GET['business_full'])))
            {
                $name =  str_replace("'","\"",$_POST['name']);
                $phone = $_POST['tel'];
                $email = $_POST['email'];
                $www = $_POST['www'];
                $ind = $_POST['ind'];
                $city = $_POST['city'];
                $street = $_POST['street'];
                $house = $_POST['house'];
                $title = str_replace("'","\"",$_POST['title']);
                $meta1 = $_POST['keywords'];
                $meta2 = $_POST['description'];
                
                $sql = mysql_query("UPDATE catalogue_$lang_prefix SET name='$name', tel='$phone', email='$email', www='$www', ind='$ind', 
                city = '$city', street='$street', house='$house', page_title='$title', metakeywords='$meta1', metadescription='$meta2' 
                WHERE link LIKE '%index.php?business_full=$business_full%'")
                    or die("Ошибка при выполнении запроса1: ".mysql_error());
                mysql_free_result($sql);
            }
            
            $sql = mysql_querry("UPDATE cpulinks_$lang_prefix SET cpu_url='$cpu_url' WHERE id=$id_cpu")
                or die("Ошибка при выполнении запроса2: ".mysql_error());
            mysql_free_result($sql);         
        }
    }
    else
    if (!(empty($_GET['business_full'])))
    {
        $business_full = $_GET['business_full'];
        $pm = $_GET['pm'];
        $sql = mysql_query("SELECT * FROM catalogue_$lang_prefix WHERE link LIKE '%index.php?business_full=$business_full%' LIMIT 1")
            or die("Ошибка при выполнении запроса3: ".mysql_error());
        $row = mysql_fetch_array($sql);
        mysql_free_result($sql);
        
        $name = str_replace("\"","'",$row['name']);
        $phone = $row['tel'];
        $email = $row['email'];
        $www = $row['www'];
        $ind = $row['ind'];
        $city = $row['city'];
        $street = $row['street'];
        $house = $row['house'];
        $title = str_replace("\"","'",$row['page_title']);
        $meta1 = $row['metakeywords'];
        $meta2 = $row['metadescription'];
        
        $sql = mysql_query("SELECT id, cpu_url FROM cpulinks_$lang_prefix WHERE business_full=$business_full AND pm=$pm LIMIT 1")
            or die("Ошибка при выполнении запроса4: ".mysql_error());
        $row = mysql_fetch_array($sql);
        mysql_free_result($sql);
        
        $cpu_url = $row['cpu_url'];
        $id_cpu = $row['id'];     
    }
    else
    {
        $section_id = $business = $rss = $pm = $id_page = 'IS NULL';
        if (!(empty($_GET['section_id'])))
            $section_id = '= '.$_GET['section_id'];
        if (!(empty($_GET['business'])))
            $business = '= '.$_GET['business'];
        if (!(empty($_GET['rss'])))
            $rss = '= '.$_GET['rss'];
        if (!(empty($_GET['pm'])))
            $pm = '= '.$_GET['pm'];
        if (!(empty($_GET['id_page'])))
            $id_page = '= '.$_GET['id_page'];
            
        $sql = mysql_query("SELECT id, cpu_url FROM cpulinks_$lang_prefix WHERE section_id $section_id AND business $business AND rss $rss AND pm $pm AND id_page $id_page")
            or die("Ошибка при выполнении запроса5: ".mysql_error());
        $row = mysql_fetch_array($sql);
        mysql_free_result($sql);
        
        $cpu_url = $row['cpu_url'];
        $id_cpu = $row['id'];
    }
 }
?>
    <div id="comp_header_text">
        <?php 
            if (!(empty($_GET['business_full'])))
            {
              echo 'Изменить предприятие';  
            }
            else
            {
                echo 'Изменить страницу';
            }  
        ?>
    </div>
    <form id="comp_input_form" action="" method="post">
    <?php
        if (!(empty($_GET['business_full'])))
            echo ' <div class="comp_imoprtant">Название предприятия:</div>
                  <div>
                   <input type="text" name="name" value="'.$name.'" size="45">
                  </div>
                  <div class="comp_imoprtant">Телефоны:</div>
                  <div>
                   <input type="text" name="tel" value="'.$phone.'" size="45">
                  </div>
                  <div class="comp_not_imoprtant">E-mail:</div>
                  <div>
                   <input type="text" name="email" value="'.$email.'" size="45">
                  </div>
                  <div class="comp_not_imoprtant">Сайт:</div>
                  <div>
                   <input type="text" name="www" value="'.$www.'" size="45">
                  </div>
                  <div class="comp_not_imoprtant">Индекс:</div>
                  <div>
                   <input type="text" name="ind" value="'.$ind.'" size="6">
                  </div>
                  <div class="comp_imoprtant">Город:</div>
                  <div>
                   <input type="text" name="city" value="'.$city.'" size="45">
                  </div>
                  <div class="comp_imoprtant">Улица:</div>
                  <div>
                   <input type="text" name="street" value="'.$street.'" size="45">
                  </div>
                  <div class="comp_imoprtant">Дом:</div>
                  <div>
                   <input type="text" name="house" value="'.$house.'" size="25">
                  </div>
                  <div class="comp_not_imoprtant">Заголовок страницы:</div>
                  <div>
                   <input type="text" name="title" value="'.$title.'" size="45">
                  </div>
                  <div class="comp_not_imoprtant">Мета теги:</div>
                  <div>
                   <input type="text" name="keywords" value="'.$meta1.'" size="45">
                  </div>
                  <div class="comp_not_imoprtant">Мета описание:</div>
                  <div>
                   <textarea cols="45" rows="5" name="description" wrap="soft">'.$meta2.'</textarea>
                  </div>'
                  ;
    ?>
    <div class="comp_not_imoprtant">ЧПУ ссылка:</div>
    <div>
     <input type="text" name="cpu_link" value="<?php echo $cpu_url ?>" size="45">
    </div>
    <div>Выделенные поля обязательны для заполнения.</div>
    <input type="hidden" name="id_cpu" value="<?php echo $id_cpu ?>">
    <div id="comp_submit_b">                      
     <input type="submit" value="отправить" name="edit">        
    </div> 
    </form>
<?php
    unset($name,$phone,$email,$www,$ind,$city,$street,$house,$title,$meta1,$meta2,$business_full,$section_id,$business,$rss,$pm,$id_page,$id_cpu,$cpu_url);   
?>
 </div>
 <div id="right_column">
      <?php require_once ('inc/templates/business_right_column_'.$lang_prefix.'.inc');?>
 </div>
</div>
