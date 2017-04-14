 <div class="catalogue_item_c">
	
<?php
print '<div id="catalogue_item_menu">';
if (empty($_GET['pm']))
		$_GET['pm'] = 1;
if ($_GET['pm'] == 1)
 echo '<div class="catalogue_item_mp_a">';
else
 echo '<div class="catalogue_item_mp">';
print '<a href="index.php?business_full=390&amp;pm=1">Информация</a></div>';

if ($_GET['pm'] == 3)
 echo '<div class="catalogue_item_mp_a">';
else
 echo '<div class="catalogue_item_mp">';
print '<a href="index.php?business_full=390&amp;pm=3">Карта проезда</a></div>';

?>
</div>
<style>
.catalogue_item_cont p {
color:black;
margin:10px;
text-align:justify;
text-indent:30px;
}
</style>
<?php
if ($_GET['pm'] == 1) 
{
?>

<div class="catalogue_item_cont"> 
<img src="root/armenia/logo.png" alt="" />
<div style="padding: 0pt 35px;">
<img class="main_sec_image" src="root/armenia/first.jpg" alt="" style="float: right;" />
	<p><b>Кафе "Армения"</b> идеально подойдет для проведения разного рода мероприятий.</p>
	<p>В новом большом <b>банкетном зале на 120 персон</b> приглашаем отметить свадьбы, юбилеи, банкеты и другие торжества.</p>
	<p>Зал выполнен в нежных персиковых тонах, высокие стены украшают фигурные светильники и ниши с изящными статуэтками. Резной потолок венчают роскошные классические люстры с множеством ламп, отчего зал просто залит светом, а терракотовые занавеси завершают внутреннее убранство зала. Для проведения конференций, презентаций, семинаров в зале предусмотрен большой плазменный экран. Также Вы можете взять с собой Ваш любимый фильм и посмотреть его на большом экране.</p><img class="main_sec_image" src="root/armenia/second.jpg" alt=""  />
	<p>Второй зал рассчитан на <b>25 персон</b>. Тут можно отдохнуть в кругу близких людей, посмотреть трансляцию футбольных матчей на плазменном экране или попеть в караоке. Для небольших компаний или деловых переговоров рады предложить <b>4 отдельных помещения</b>.</p>
	<p>Также у нас проводят выездные свадебные церемонии. </p>
	<p>Вблизи <b>кафе  «Армения»</b> расположена Покровская церковь, где  новобрачные совершают  обряд венчания, а  сразу после него молодожены  и гости отправляются в кафе, где проводится официальная  роспись представителями ЗАГСа.   На свадьбу можно пригасить священника для освящения стола.  На свадьбах в <b>кафе «Армения»</b>   бесплатно украшают зал – одеваются праздничные чехлы для мебели, скатерти. </p>
	<p>В меню Вы найдете разнообразные блюда европейской и национальной армянской кухни. Непременно отведайте шашлык (7 видов), люля-кебаб (4 вида)  или национальное блюдо хаш. Ваши торжества будет сопровождать живая музыка, но Вы также можете пригласить своих музыкантов.
</p>

	<center>В теплое время года для Вас открыта летняя площадка. </center>
	<center>Для удобства  предусмотрена парковка (неохраняемая). </center>
	<center><b>Ждем наших гостей  с 11:00 - 23:00 </b></center>
 <img src="root/armenia/vine.png" alt="" />
	<p>&nbsp;</p>
</div>
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
            map.setCenter(new YMaps.GeoPoint(37.866314,48.008721), 14);

            var content = document.createElement('span');
            content.innerHTML = "«Армения»";
            map.openBalloon(new YMaps.GeoPoint(37.866314,48.008721), content);

            map.addControl(new YMaps.ToolBar());
            map.addControl(new YMaps.Zoom());
            map.addControl(new YMaps.MiniMap());
            map.addControl(new YMaps.ScaleLine());
        }
    </script>


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
<a href="index.php?section_id=389&amp;business=2">отдых и развлечения</a>
 / 
<a href="index.php?section_id=390&amp;business=2">кафе</a>
</div>

<div id="catalogue_item_menu">
<div class="catalogue_item_mp_a">
<a href="">Фотогалерея:</a></div>
</div>
<div class="catalogue_item_cont">
<div class="catalogue_pic_l"><a href="root/armenia/1.jpg" target="_blank"><img src="root/armenia/1_s.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/armenia/2.jpg" target="_blank"><img src="root/armenia/2_s.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/armenia/3.jpg" target="_blank"><img src="root/armenia/3_s.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/armenia/4.jpg" target="_blank"><img src="root/armenia/4_s.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/armenia/5.JPG" target="_blank"><img src="root/armenia/5_s.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/armenia/6.JPG" target="_blank"><img src="root/armenia/6_s.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/armenia/7.JPG" target="_blank"><img src="root/armenia/7_s.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/armenia/8.JPG" target="_blank"><img src="root/armenia/8_s.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/armenia/9.JPG" target="_blank"><img src="root/armenia/9_s.jpg" width="60" height="60" border="0" alt=""></a></div>
</div>
<div id="catalogue_item_menu">
<div class="catalogue_item_mp_a">
<a href="mailto:info@dominik-hotel.com">Контактная информация:</div>
</div>
 <div class="catalogue_item_cont">
 		 <table width="100%">
			<tbody>
 			<tr>
			<!--	<td><img class="main_sec_image" src="" width="60" height="60" border="0" alt="" /></td>-->
				<td>Адрес:</td>
				<td>Телефон:</td>
				<td>Факс:</td>
				<td>E-mail:</td>
				<td>Веб-сайт:</td>
			</tr>
			<tr>
				<td>Донецк, просп. Красногвардейский, 4б</td>
				<td>+38(062) 345-62-53</td>
				<td>+38(062) 345-62-53</td>
				<td></td>
				<td></td>

			</tr>
			</tbody> 
		 </table> 		
	 </div>
</div>  
 
