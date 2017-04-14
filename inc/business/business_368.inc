 <div class="catalogue_item_c">
<?php
print '<div id="catalogue_item_menu">';
if (empty($_GET['pm']))
		$_GET['pm'] = 1;
if ($_GET['pm'] == 1)
 echo '<div class="catalogue_item_mp_a">';
else
 echo '<div class="catalogue_item_mp">';
print '<a href="index.php?business_full=368&pm=1">Информация</a></div>';
/*
if ($_GET['pm'] == 2)
 echo '<div class="catalogue_item_mp_a">';
else
 echo '<div class="catalogue_item_mp">';
print '<a href="vidikon.php?pm=2">Прайсы</a></div>';
*/
if ($_GET['pm'] == 3)
 echo '<div class="catalogue_item_mp_a">';
else
 echo '<div class="catalogue_item_mp">';
print '<a href="index.php?business_full=368&pm=3">Карта проезда</a></div>';

?>
</div>
<?php
if ($_GET['pm'] == 1) 
{
?>
<div class="catalogue_item_cont">
	<br/><h2>Фото-видеостудия «ВИДИКОН»</h2><br/>
	<h3>Фотограф- Вакуленко Иван</h3>
		<p>Тел.:050-472-97-27 <br />
		e-mail: neva48@mail.ru<br />
	<em>Предлагаем Вам фотосъемку праздничных и деловых  мероприятий: детских праздников, выпускных, свадеб, юбилеев, спортивных  турниров, презентаций, корпоративных праздников, выставок, фестивалей, общественных  мероприятий.</em><br />
	<em>Надежность и качество выполнения работы  ГАРАНТИРУЕМ!</em><br />
		Сделайте себе подарок! Закажите Вашу собственную ФОТО-историю<br />
	&nbsp;у фотографа &laquo;ВИДИКОН&raquo;!</p>
	<p>&nbsp;</p>
	<h3>Видеограф- Бондаренко Александр</h3>
<p>
		Тел.: 050-95-95-198, 349-20-69<br />
		e-mail: al_bondarenko@mail.ru<br />
		Производим видеосъемку корпоративного Нового Года,  выпускных, свадеб, юбилеев, детских праздников и других мероприятий. Предлагаем  съемку в двух форматах: DVD  и HDV. Съемка материала  для рекламных роликов, видеоклипов.<br />
		Наши постоянные клиенты &ndash; Наши лучшие друзья!  Присоединяйтесь! </p>
	<p>&nbsp;</p>
	<p>Наш организатор торжеств и деловых мероприятий&nbsp; подготовит и проведет Новогодний корпоратив,  выпускной, свадьбу, юбилей, детские праздники, а также организует поздравления  Деда Мороза и Снегурочки в кафе, на работе и дома. Подробности на сайте:<br />
		www.olia.donbass.name </p>
</div>

<?php
}/*
else 
  if ($_GET['pm'] == 2) 
{
}
*/
else
   if ($_GET['pm'] == 3)
   {
?>

   <div class="catalogue_item_cont">
   
        <script src="http://api-maps.yandex.ru/1.1/index.xml?key=AAmDzUsBAAAARkVWCAIAXzMCgKN58_MQUqB134Sdp-unCH0AAAAAAAAAAACbJlz2mcKc4anRgbxx6LBZ5BHPyg==" type="text/javascript"></script>
    <script type="text/javascript">
        window.onload = function () {
            var map = new YMaps.Map(document.getElementById("YMapsID"));
            map.setCenter(new YMaps.GeoPoint(37.808468,48.006195), 14);

            var content = document.createElement('span');
            content.innerHTML = "«ВИДИКОН»";
            map.openBalloon(new YMaps.GeoPoint(37.808468,48.006195), content);

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
<a href="index.php?section_id=368&amp;business=2">услуги</a>
 / 
<a href="index.php?section_id=462&amp;business=2">организация праздников</a>
</div>

<div id="catalogue_item_menu">
<div class="catalogue_item_mp_a">
<a href="index_test.php?pm=1">Бальные танцы:</a></div>
</div>
<div class="catalogue_item_cont">
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/1.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/1.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/2.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/2.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/3.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/3.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/4.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/4.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/5.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/5.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/6.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/6.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/7.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/7.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/8.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/8.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/9.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/9.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/10.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/10.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/11.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/11.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/12.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/12.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/13.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/13.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/14.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/14.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/15.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/15.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/16.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/16.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/balnie_tanci/17.jpg" target="_blank"><img src="root/packages/lite/vidikon/balnie_tanci/tumbs/17.jpg" width="60" height="60" border="0" alt=""></a></div>
</div>

<div id="catalogue_item_menu">
<div class="catalogue_item_mp_a">
<a href="index_test.php?pm=1">Новогодний утренник:</a></div>
</div>
<div class="catalogue_item_cont">
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/utrennik/1.jpg" target="_blank"><img src="root/packages/lite/vidikon/utrennik/tumbs/1.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/utrennik/2.jpg" target="_blank"><img src="root/packages/lite/vidikon/utrennik/tumbs/2.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/utrennik/3.jpg" target="_blank"><img src="root/packages/lite/vidikon/utrennik/tumbs/3.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/utrennik/4.jpg" target="_blank"><img src="root/packages/lite/vidikon/utrennik/tumbs/4.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/utrennik/5.jpg" target="_blank"><img src="root/packages/lite/vidikon/utrennik/tumbs/5.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/utrennik/6.jpg" target="_blank"><img src="root/packages/lite/vidikon/utrennik/tumbs/6.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/utrennik/7.jpg" target="_blank"><img src="root/packages/lite/vidikon/utrennik/tumbs/7.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/utrennik/8.jpg" target="_blank"><img src="root/packages/lite/vidikon/utrennik/tumbs/8.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/utrennik/9.jpg" target="_blank"><img src="root/packages/lite/vidikon/utrennik/tumbs/9.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/utrennik/10.jpg" target="_blank"><img src="root/packages/lite/vidikon/utrennik/tumbs/10.jpg" width="60" height="60" border="0" alt=""></a></div>
</div>

<div id="catalogue_item_menu">
<div class="catalogue_item_mp_a">
<a href="index_test.php?pm=1">Свадьба:</a></div>
</div>
<div class="catalogue_item_cont">
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/svadba/1.jpg" target="_blank"><img src="root/packages/lite/vidikon/svadba/tumbs/1.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/svadba/2.jpg" target="_blank"><img src="root/packages/lite/vidikon/svadba/tumbs/2.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/svadba/3.jpg" target="_blank"><img src="root/packages/lite/vidikon/svadba/tumbs/3.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/svadba/4.jpg" target="_blank"><img src="root/packages/lite/vidikon/svadba/tumbs/4.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/svadba/5.jpg" target="_blank"><img src="root/packages/lite/vidikon/svadba/tumbs/5.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/svadba/6.jpg" target="_blank"><img src="root/packages/lite/vidikon/svadba/tumbs/6.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/svadba/7.jpg" target="_blank"><img src="root/packages/lite/vidikon/svadba/tumbs/7.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/svadba/8.jpg" target="_blank"><img src="root/packages/lite/vidikon/svadba/tumbs/8.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/svadba/9.jpg" target="_blank"><img src="root/packages/lite/vidikon/svadba/tumbs/9.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/svadba/10.jpg" target="_blank"><img src="root/packages/lite/vidikon/svadba/tumbs/10.jpg" width="60" height="60" border="0" alt=""></a></div>
<div class="catalogue_pic_l"><a href="root/packages/lite/vidikon/svadba/11.jpg" target="_blank"><img src="root/packages/lite/vidikon/svadba/tumbs/11.jpg" width="60" height="60" border="0" alt=""></a></div>
</div>




<div id="catalogue_item_menu">
<div class="catalogue_item_mp_a">
<a href="">Контактная информация:</div>
</div>
 <div class="catalogue_item_cont">
 		 <table width="100%">
			<tbody>
 			<tr>
			<!--	<td><img class="main_sec_image" src="root/packages/lite/dominik/logo.jpg" width="60" height="60" border="0" alt="" /></td>-->
				<td>Адрес:</td>
				<td>Телефон:</td>
				<td>Веб-сайт:</td>
			</tr>
			<tr>
				<td>83055, г. Донецк, ул. Челюскинцев, 157</td>
				<td>(062)349-20-69</td>
				<td>www.olia.donbass.name</td>

			</tr>
			</tbody> 
		 </table> 		
	 </div>
</div>

</div>
