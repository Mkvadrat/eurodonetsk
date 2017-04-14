 <div class="catalogue_item_c">
	
<?php
print '<div id="catalogue_item_menu">';
if (empty($_GET['pm']))
		$_GET['pm'] = 1;
if ($_GET['pm'] == 1)
 echo '<div class="catalogue_item_mp_a">';
else
 echo '<div class="catalogue_item_mp">';
print '<a href="index.php?business_full=327&amp;pm=1">Информация</a></div>';

if ($_GET['pm'] == 2)
 echo '<div class="catalogue_item_mp_a">';
else
 echo '<div class="catalogue_item_mp">';
print '<a href="index.php?business_full=327&amp;pm=2">Прайсы</a></div>';

if ($_GET['pm'] == 3)
 echo '<div class="catalogue_item_mp_a">';
else
 echo '<div class="catalogue_item_mp">';
print '<a href="index.php?business_full=327&amp;pm=3">Карта проезда</a></div>';

?>
</div>
<?php
if ($_GET['pm'] == 1) 
{
?>
<div class="catalogue_item_cont">
 <img src="root/packages/lite/dominik/head_logo.jpg" alt="" width="460" height="91" />

	<h3>Отель &laquo;Доминик&raquo;</h3>
	<p>&nbsp;</p>
	<p>Частный отель &laquo;Доминик&raquo;  гостеприимно открыл свои двери&nbsp; в ноябре  2007года.</p>
<img class="main_sec_image" src="root/packages/lite/dominik/night.jpg" alt="" />
		<p>Это элегантный, комфортабельный отель с величественно  красивым холлом.</p>
		<p>В отеле всего 22 номера и каждый  индивидуален и по - домашнему уютен.&nbsp;  Здесь постарались создать комфортные условия для тех, кто на время  покинул любимый дом, но не хочет менять свои привычки. Поэтому все номера  создавались с одним желанием, чтобы они напоминали приезжему собственную  спальню, в которой приятно отдохнуть после трудового дня. Все номера  оборудованы в соответствии с высокими современными требованиями.</p>
		<p>К услугам гостей уютное кафе  &laquo;Доминик&raquo; на 40 мест. Модный дизайн, современный интерьер, приятная музыка  настраивают на спокойный лад и в сочетании с разнообразием блюд и напитков  гарантируют успешность деловых переговоров, спокойный уединенный отдых или  удачное проведение веселых корпоративных праздников, свадебных и семейных  торжеств. Утром здесь завтракают гости отели, в обеденный перерыв спешат  деловые люди на бизнес-ланчи, а вечером приятно отдыхают в кругу друзей.</p>
<img class="main_sec_image_r" src="root/packages/lite/dominik/Suite-Dominik.jpg" alt="" />
		<p>Зона отдыха отеля предлагает все  условия для полноценного релакса. После жаркой сауны приятно окунуться в  лазурную воду бассейна или устроить чаепитие, сидя в плетеных креслах с видом  на живописную фреску, дарящую летнее настроение, или сыграть в бильярд.</p>
		<p>Отель расположен в центре города,  на пересечении главных улиц: Артема, Университетской и Киевского проспекта  рядом с самым большим торгово-развлекательном центром Донецк Сити. На  территории отеля имеется бесплатная охраняемая автопарковка. Такое удачное  расположение создает дополнительные удобства для наших гостей.</p>
		<p>Отель располагает двумя  конференц-залами вместимостью до30 человек для проведения семинаров, тренингов,  конференций.</p>
		<p>Отель оказывает широкий спектр  услуг и высокий уровень обслуживания.</p>
		<p>Отель награжден Дипломом  финалиста Донецкого регионального Всеукраинского конкурса качества продукции  (товаров, услуг)-&laquo;100 лучших товаров Украины в 2008 году&raquo;. Отель сертифицирован  на 3*.</p>
		<p>Установленная ценовая политика  позволяет удовлетворить спрос на доступное размещение в центре города.</p>
	<p>Отель &laquo;Доминик&raquo;-это тихий уголок в шумном городе, где всегда  Вам рады! </p>
	<p>&nbsp;</p>
</div>

<?php
}
else 
  if ($_GET['pm'] == 2) 
{
?>

<div class="catalogue_item_cont">
	<img src="root/packages/lite/dominik/head_logo.jpg" alt="" width="460" height="91" /><br />
		<h3 style="text-align: center;"><strong>Тарифы на  проживание в отеле &laquo;Доминик&raquo;</strong><br />
	<strong>Room rates at the &laquo;Dominik&raquo; Hotel</strong></h3>
<table  cellpadding="0" cellspacing="0" class="lite_tbl" width="100%">
	<tr>
		<td><p align="center"><strong>Категория    номера,&nbsp; Room category</strong></p></td>
		<td><p align="center"><strong>Описание,    Description</strong></p></td>
		<td><p align="center"><strong>Цена,    Price</strong><br />
			<strong>(грн., </strong><strong>UAN</strong><strong>)</strong></p></td>
		</tr>
	<tr>
		<td><p align="center"><strong>Standart </strong></p></td>
		<td><p align="center"><strong>Одноместный    номер</strong><br />
			<strong>Single room</strong></p></td>
		<td><p align="center"><strong>520</strong></p></td>
		</tr>
	<tr>
		<td><p align="center"><strong>Twin&nbsp;&nbsp;&nbsp; </strong><br />
			<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</strong></p></td>
		<td><p align="center"><strong>&nbsp; Однокомнатный номер с двумя односпальными    кроватями</strong><br />
			<strong>&nbsp;</strong><strong>Single room with two single beds</strong></p></td>
		<td><p align="center"><strong>600</strong></p></td>
		</tr>
	<tr>
		<td><p align="center"><strong>King</strong></p></td>
		<td><p align="center"><strong>Однокомнатный    номер с двуспальной кроватью. </strong><br />
			<strong>Single room with a King-sized bed.</strong></p></td>
		<td><p align="center"><strong>580</strong></p></td>
		</tr>
	<tr>
		<td><p align="center"><strong>King+</strong></p></td>
		<td><p align="center"><strong>Однокомнатный    номер с большой двуспальной кроватью. </strong><br />
			<strong>Single room with a King-sized bed.</strong></p></td>
		<td><p align="center"><strong>650</strong></p></td>
		</tr>
	<tr>
		<td><p align="center"><strong>Luxury</strong><br />
			<strong>King</strong></p></td>
		<td><p align="center"><strong>Представительский    однокомнатный номер с большой двуспальной кроватью. </strong><br />
			<strong>Hospitality single room with a King-sized bed.</strong></p></td>
		<td><p align="center"><strong>750</strong></p></td>
		</tr>
	<tr>
		<td><p align="center"><strong>Luxury    King</strong><br />
			<strong>&nbsp;for the    newly-married couple</strong></p></td>
		<td><p align="center"><strong>Празднично-оформленный    номер с большой двуспальной кроватью.</strong><br />
			<strong>Celebratory - decorated room with a King-sized bed.</strong></p></td>
		<td><p align="center"><strong>1000</strong></p></td>
		</tr>
	<tr>
		<td><p align="center"><strong>Business-suite</strong></p></td>
		<td><p align="center"><strong>Двухкомнатный    люкс с большой двуспальной кроватью.</strong><br />
			<strong>Two- room apartment&nbsp;    (32m2) with a King-sized bed</strong></p></td>
		<td><p align="center"><strong>1200</strong></p></td>
		</tr>
	<tr>
		<td><p align="center"><strong>Suite</strong><strong> </strong><br />
			<strong>&laquo;</strong><strong>Dominik&raquo;</strong></p></td>
		<td><p align="center"><strong>Четырехкомнатный    люкс с большой двуспальной кроватью. </strong><br />
			<strong>Four- room apartment&nbsp;    (50m2) with a King-sized bed</strong></p></td>
		<td><p align="center"><strong>1500</strong></p>
			<p align="center"><strong>&nbsp;</strong></p></td>
		</tr>
</table>
<p>С<strong>тоимость номера указана на 1 человека.&nbsp; (Проживание 2-го человека в номере + 100  грн.)</strong><br />
	<strong>The room rate is for one  person. (The charge for the second person in the room + 100 UAN.)</strong> </p>

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
            map.setCenter(new YMaps.GeoPoint(37.782776,48.034669), 14);

            var content = document.createElement('span');
            content.innerHTML = "Доминик";
            map.openBalloon(new YMaps.GeoPoint(37.782776,48.034669), content);

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
<a href="index.php?section_id=327&amp;business=2">гостиницы</a>
</div>

<div id="catalogue_item_menu">
<div class="catalogue_item_mp_a">
<a href="">Фотогалерея:</a></div>
</div>
<div class="catalogue_item_cont">
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/1.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/1.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/2.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/2.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/3.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/3.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/4.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/4.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/5.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/5.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/6.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/6.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/7.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/7.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/8.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/8.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/9.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/9.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/10.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/10.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/11.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/11.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/12.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/12.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/13.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/13.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/14.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/14.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/dominik/15.jpg" target="_blank"><img src="root/packages/lite/dominik/tumb/15.jpg" width="60" height="60" border="0" alt=""></a></div>
</div>

<div id="catalogue_item_menu">
<div class="catalogue_item_mp_a">
<a href="mailto:info@dominik-hotel.com">Контактная информация:</div>
</div>
 <div class="catalogue_item_cont">
 		 <table width="100%">
			<tbody>
 			<tr>
			<!--	<td><img class="main_sec_image" src="root/packages/lite/dominik/logo.jpg" width="60" height="60" border="0" alt="" /></td>-->
				<td>Адрес:</td>
				<td>Телефон:</td>
				<td>Факс:</td>
				<td>E-mail:</td>
				<td>Веб-сайт:</td>
			</tr>
			<tr>
				<td>Донецк, ул. Артема 142а</td>
				<td>(0622) 58-84-43, 58-93-35, (062) 306-44-25</td>
				<td>(062) 306-44-25</td>
				<td>info@dominik-hotel.com</td>
				<td>www.dominik-hotel.com</td>

			</tr>
			</tbody> 
		 </table> 		
	 </div>
</div>  
 
