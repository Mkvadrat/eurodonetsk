 <div class="catalogue_item_c">

<?php
print '<div id="catalogue_item_menu">';
if (empty($_GET['pm']))
		$_GET['pm'] = 1;
if ($_GET['pm'] == 1)
 echo '<div class="catalogue_item_mp_a">';
else
 echo '<div class="catalogue_item_mp">';
print '<a href="index.php?business_full=139&pm=1">Информация</a></div>';

if ($_GET['pm'] == 2)
 echo '<div class="catalogue_item_mp_a">';
else
 echo '<div class="catalogue_item_mp">';
print '<a href="index.php?business_full=139&pm=2">Прайсы</a></div>';

if ($_GET['pm'] == 3)
 echo '<div class="catalogue_item_mp_a">';
else
 echo '<div class="catalogue_item_mp">';
print '<a href="index.php?business_full=139&pm=3">Карта проезда</a></div>';

?>
</div>
<?php
if ($_GET['pm'] == 1) 
{
?>
<div class="catalogue_item_cont">
<div class="postimage"><img src="root/packages/lite/ekonat/logo1.jpg" width="440" height="176" border="0" alt="" /></div>

<h3>Любой уровень сложности<br>
Установка Доставка Монтаж<br>
Гарантия 12 лет<br>
Работаем по Донецку и Донецкой области<br>
Замер - БЕСПЛАТНО<br></h3>
<div class="postimage"><img src="root/packages/lite/ekonat/foto2.jpg" width="440" height="633" border="0" alt=""></div>

</div>

<?php
}
else 
  if ($_GET['pm'] == 2) 
{
?>

<div class="catalogue_item_cont">

<h3>Прайс-лист на устройство и установку натяжных потолков</h3>
 		 <table width="100%" class="lite_tbl tabletext">
 			 <tr>
			 	<td>Франция глянец - до 10 метров</td>  
			 	<td>270 грн.</td> 
			 </tr>
			 <tr>
			 	<td>с 10 м.кв до 20 м.кв</td> 			 
			 	<td>230 грн.</td> 
			 </tr>
			 <tr>
			 	<td>больше 20 м.кв</td> 			 
			 	<td>210 грн.</td> 
			 </tr>
			 <tr>
			 	<td>Франция матовый</td>
			 	<td>от 200 грн до 180 грн.</td>
			 </tr>
 			 <tr>
			 	<td>Франция сатин</td>
			 	<td>от 200 грн до 180 грн.</td>
			 </tr>
 			 <tr>
			 	<td>Бесшовные Германия</td>  
			 	<td>300 грн.</td> 
			 </tr>
			 <tr>
			 	<td>Бесшовные Италия</td> 			 
			 	<td>300 грн.</td> 
			 </tr>
			 <tr>
			 	<td>больше 20 м.кв</td> 			 
			 	<td>210 грн.</td> 
			 </tr>
		 </table> 
			<p>Цена указана за м.кв. под ключ - с учетом стоимости профиля, центровки швов, обхода труб, дополнительных углов, установки люстры.  </p> 

			<h3>Дополнительные работы:</h3>
 		 <table width="100%" class="lite_tbl">
 			 <tr>
			 	<td>Установка светильника</td>  
			 	<td>60 грн./шт</td> 
			 </tr>
			 <tr>
			 	<td>Криволинейность</td> 			 
			 	<td>65 грн./м. погонный</td> 
			 </tr>
			 <tr>
			 	<td>Раскладка</td> 			 
			 	<td>110 грн./м. погонный</td> 
			 </tr>
			 <tr>
			 	<td>Переход во второй уровень</td>
			 	<td>450 грн./м. погонный</td>
			 </tr>
 			 <tr>
			 	<td>Брус под потолочный карниз</td>
			 	<td>40 грн./м. погонный</td>
			 </tr>
 			 <tr>
			 	<td>Пластиковая заглушка</td>
			 	<td>30 грн./м.погонный </td>
			 </tr>			 
		 </table> 

</div>
<?php
}
else
   if ($_GET['pm'] == 3)
   {
?>

   <div class="catalogue_item_cont">
   
    <script src="http://api-maps.yandex.ru/1.1/index.xml?key=AAmDzUsBAAAARkVWCAIAXzMCgKN58_MQUqB134Sdp-unCH0AAAAAAAAAAACbJlz2mcKc4anRgbxx6LBZ5BHPyg==" type="text/javascript"></script>
    <script type="text/javascript">
        window.onload = function () {
            var map = new YMaps.Map(document.getElementById("YMapsID"));
            map.setCenter(new YMaps.GeoPoint(37.862624,48.002154), 14);

            var content = document.createElement('span');
            content.innerHTML = "Эко Нат";
            map.openBalloon(new YMaps.GeoPoint(37.862624,48.002154), content);

            map.addControl(new YMaps.ToolBar());
            map.addControl(new YMaps.Zoom());
            map.addControl(new YMaps.MiniMap());
            map.addControl(new YMaps.ScaleLine());
        }	
	
    </script>


     <p>83059, г. Донецк, Пр.Ильича 109а, оф. 306а, 3этаж</p>
	 <div id="YMapsID" style="width:100%;height:450px"></div>
   </div>

<?php
   } 
?>


<div id="catalogue_item_menu">
<div class="catalogue_item_mp_a">
<a href="index.php?section_id=32&amp;business=1">Категория:</a></div>
</div>
<div class="catalogue_item_cont">
<a href="index.php?section_id=2&amp;business=1">бизнес</a>
 / 
<a href="index.php?section_id=32&amp;business=1">предприятия</a>
 / 
<a href="index.php?section_id=368&amp;business=2">услуги</a>
 / 
<a href="index.php?section_id=383&amp;business=2">строительные услуги</a>
</div>
<div id="catalogue_item_menu">
<div class="catalogue_item_mp_a">
<a href="mailto:mars600@list.ru">Контактная информация:</div>
</div>
 <div class="catalogue_item_cont">
 		 <table width="100%">
			<tbody>
 			<tr>
			<!--	<td><img class="main_sec_image" src="root/packages/lite/dominik/logo.jpg" width="60" height="60" border="0" alt="" /></td>-->
				<td>Адрес:</td>
				<td>Телефон:</td>
				<td>E-mail:</td>
				<td>Веб-сайт:</td>
			</tr>
			<tr>
				<td>83059, г. Донецк, пр.Ильича 109а, оф. 306а, 3этаж; <br>
				83114, г. Донецк, ул. Университетская, 80, оф. 334</td>
				<td>(0622)97-22-74, (062)207-30-51, (050)933-55-51</td>				
				<td>mars600@list.ru</td>
				<td>www.potolok.gorod.dn.ua</td>

			</tr>
			</tbody> 
		 </table> 		
	 </div>
</div>  
