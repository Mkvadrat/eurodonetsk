<?php
	page_xml_init();
	$w_t=date('d.m.Y');
?>

<div class="main_page"> 
	<div id="main_left_column">
		<div id="slide_show">

			<script type="text/javascript">
				$(document).ready(function(){
					$('#photos').galleryView({
						panel_width: 480,
						panel_height: 300,
						frame_width: 70,
						frame_height: 42,
						transition_speed: 1200,
						background_color: '#222',
						border: '1px solid #005713',
						easing: 'easeInOutBack',
						pause_on_hover: true,
						nav_theme: 'custom'
					});
				});
			</script>

		    <div class="rolover">
			<div id="photos" class="galleryview">
			<?php
				$i = 0;
				$images = array();
				
				$dir = 'root/adv/ru/';
				$data = opendir($dir);

				// 	rsort($a);

				while ($one = readdir($data)) {
					if($one!=='.' && $one!=='..')
						{
						$path = $dir.$one;
						
						$images[$i] = $path.'/small.jpg';
						$i++;
						
						echo '	<div class="panel">
									<img class="gwu_image" src="'.$path.'/big.jpg" /> 
									<div class="panel-overlay-block"></div>
									<div class="panel-overlay">';

						$string = file_get_contents($path.'/text.txt');
						$tag = array('[title]','[/title]','[text]','[/text]','[link]','[/link]');
						$tag_replace = array('<h2>','</h2>','<p>','</p>','<a href="','" target="_blank">Подробнее >>></a>');
						$title = str_replace($title_tag,$title_tag_replace,$string);
						echo str_replace($tag,$tag_replace,$string);
						
						echo '		</div>
								</div>';
						}
				}
				closedir ($data);
			?>
				
				<div class="panel">
					<img class="gwu_image" src="root/img/11.gif" />
					<div class="panel-overlay-block"></div>
				</div>
				
				<ul class="filmstrip">
					<?php
						$i=0;
						do {
							echo '	<li><img src="'.$images[$i].'" alt="Slide" title="Slide" /></li>';
							$i++;
						} while ($i!=sizeof($images));
					?>
				</ul>
		
			</div>
			</div>

		<noscript><img src="root/img/01.jpg" /><div>Please enable javascript!</div></noscript> 
	</div>


	
 <div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text"><a style="color:white; text-decoration:none;" href="index.php?section_id=452&id_page=767" class="link_more" ><h2 style=" font-size:97%;">Гостиницы Донецка



</h2></a></div></div>



      <div class="block_me">



	  <div class="img_for_me">



             <a href="index.php?section_id=452&id_page=767"><img alt="Гостиницы Донецка" border="0" width="134" height="172" src="/root/donchaninu/glav/hotel_room.jpg"></a>



	  </div>



	  <div class="txt_block_for_me">



	  <div class="txt_pod_me">
	   
	   
	   Гостеприимный Донецк знает, как угодить иностранному туристу. Выбор <a href="/index.php?section_id=211&id_page=232">гостиниц в Донецке</a> довольно-таки разнообразен. Гостиницы в Донецке предлагают своим посетителям уютные номера, качественный сервис и, конечно же, эстетическое удовольствие при посещении.  Если перед иностранным туристом предстанет выбор гостиницы, ему будет из чего выбрать. <a href="/index.php?section_id=452&id_page=558">Отели эконом класса, гостиницы бизнес класса</a> и класса люкс — всё это с удовольствием предлагает Донецк. Снять номер в Донецке можно от 120 грн за сутки. Конечно же, стоимость зависит от количества звёздочек — чем больше звёзд, тем дороже.



 <a href="index.php?section_id=452&id_page=767" class="link_more">>></a>



	  </div>



	  </div>



     </div>



 <div id="news"> 



 <?php echo get_main_news_preview(148,100,"width:148px;padding:0px 12px 0px 0;","width:148px;padding:0px 7px;","width:148px;padding:0px 0px 0px 12px;"); ?>



 </div> 



 </div>



 <div id="main_center_column">



  <div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text"><h2 style=" font-size:97%;"><?=get_localization_string('weather_title_string')?></h2></div></div>



   <div id="date_block">    



    <div id="header_for_weather">



     <?php echo 'Донецк, '.$w_t;



     echo '</div>';



     echo '<div id="weather_info">';



     echo '<div id="weather_pict"><img src="images/weather_clipart/'. $weather_xml->current->pict .'" width="44" height="52" /></div>';



     echo '<div id="weather_t">'.$weather_xml->current->t.'&deg;</div>';



     echo '<div id="weather_other">Ветер: '.$weather_xml->current->w.'mps<br /> Давление: '.$weather_xml->current->p.'мм<br /> Влажность: '.$weather_xml->current->h.'% </div>';



     ?>



     </div>     



   </div>



    <div id="banner_2">



     <a href="index.php?business_full=397&pm=1"><img border="0" width="236" height="250" alt="" src="root/banners/Dominic-Banner-250x250pxl.png"></a>



    </div>



    <div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text"><a style="color:white; text-decoration:none;" href="index.php?section_id=35" class="link_more" ><h1 style=" font-size:97%;">Евро-2012 в Донецке



</h1></a></div></div>



    <div style="width:236px; height:630px; text-align:justify;"><a href="index.php?section_id=35"><img alt="Евро-2012 в Донецке" width="236" height="130" alt="Евро-2012 в Донецке" style="padding: 7px 0;" src="/root/upload-files/new/news/futboll2012.jpg"></a>



   <p>Нынешний Чемпионат Европы по футболу войдет в историю как 14-й турнир, проводимый под эгидой УЕФА. По решению европейской футбольной федерации почетное право принять его делегировано  Украине и Польше.</p>



     <p> Открытие Евро 2012 запланировано на 9 июня 2012 года в Варшаве, а финальный аккорд  прозвучит 1 июля 2012 года в Киеве.</p>

    <p>По регламенту УЕФА в чемпионате Европы 2012 примут участие 16 сборных. Команды Украины и Польши, как стран-организаторов, получают право на   автоматическую квалификацию.Оставшиеся четырнадцать сборных   определяются по итогам матчей квалификационного турнира, который стартовал в августе прошлого года.</p>



    <p> За всю историю проведения европейских футбольных первенств — это третий турнир, который доверено провести двум странам одновременно. До сих пор такой чести удостаивались:  Бельгия и Нидерланды в 2000 году, а также Австрия и Швейцария в 2008 году.Сейчас отборка на Евро 2012 проходит в шести группах (от А до F) по шесть команд в каждой, а также в трех группах по пять команд. При этом, напрямую попадают в финал чемпионата Европы 2012 победители в группах и лучшая из команд, занявших вторые места. Оставшиеся восемь обладателей второго места разыграют между собой четыре путевки в финал Европы 2012 в стыковых матчах. Подготовительные хлопоты в полном разгаре. Но уже сегодня известно,чтоматчи Евро 2012 в Донецке и других принимающих городах пройдут при заполненных трибунах.  Проведенная УЕФА через интернет с 1 по 31 марта кампания по регистрации желающих приобрести билеты на Евро 2012 была успешной: поступило 12 миллионов заявок.</p><a href="index.php?section_id=35">>></a>
	
	</br>
	
	
	 
 </div>


 </div>



 <div id="main_right_column">



   <div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text"><h3 style=" font-size:97%"><?=get_localization_string('search_title_string')?></h3></div></div>



   <div id="search_block_m">    



    <form method="get" action="index.php" id="search">    



    <div id="block_pod_input">



	<input type="text" class="search_field" name="search_str">



    </div> 



    <div id="search_buttoon">



        <input type="image" src="images/search/search_ru.gif" name="search" value=" " class="button_searsh">



    </div>  



    <div id="search_direct">



     <?php /* echo get_localization_string('search_dest').': <input type="checkbox" name="special" id="special_search">' */ ?>



    </div>



    </form>    



    <form method="get" action="index.php" id="add_business">



      <input type="hidden" name="business" value="1">



      <input type="hidden" name="section_id" value="32"> 



      <input type="image" src="images/search/add_company_ru.gif" class="button_add_business">      



    </form>



   </div>



   <div id="tags_box">



     <div id="tags_text"></div>



     <div id="tags">



     <?php



          $tags = get_tags(10);



     ?>



     Для корректного отображения этого элемента вам необходимо установить FlashPlayer и включить в браузере Java Script.



     <script type="text/javascript">



     var rnumber = Math.floor(Math.random()*9999999);



     var widget_so = new SWFObject("scripts/tagcloud.swf?r="+rnumber, "tagcloudflash", "234", "200", "10", "#ffffff");



     widget_so.addParam("allowScriptAccess", "always");widget_so.addVariable("tcolor", "0x333333");



     widget_so.addVariable("tspeed", "115");



     widget_so.addVariable("distr", "true");



     widget_so.addVariable("mode", "tags");



     widget_so.addVariable("tagcloud", "<?php echo urlencode($tags); ?>");



     widget_so.write("tags");</script> 



     </div>



   </div>



   <div class="boxes_title"><div class="boxes_text"><a style="color:white; text-decoration:none;" href="index.php?business_full=401&pm=1" class="link_more" ><h2 style=" font-size:97%;">Боулинг центр Максимум



</h2></a></div></div>



<a href="index.php?business_full=401&pm=1"><img border="0" width="239px" height="359px" style="padding: 12px 0pt;" src="/root/banners/maximym_october.jpg"></a>


 <div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text"><a style="color:white; text-decoration:none;" href="/index.php?business_full=600&pm=1" class="link_more" ><h2 style=" font-size:97%;">Итальянская кухня в Донецке
</h2></a></div></div>


<div style="text-align:justify;" >

<a href="/index.php?business_full=600&pm=1"><img alt="Итальянский ресторан Adriano" width="236" height="93" alt="Итальянский ресторан Адриано" style="padding: 7px 0;" src="../root/glavnaya/adriano.jpg "></a>



Что может быть лучше, нежели ароматная, итальянская пицца «Adriano», доставленная на дом или в офис? А теперь, воспользовавшись <b><a href="index.php?business_full=600&amp;pm=2">меню ресторана</a></b> на нашем сайте Вы сможете заказать <b><a href="index.php?business_full=600&amp;pm=4">доставку</a></b> пиццы и любого блюда по Донецку. Так как пожелания каждого клиента для нас – закон, Вы можете быть уверенны в качественном исполнении каждого доставляемого блюда. Забота о каждом клиенте и его детях для  «Adriano» на первом месте. Ваши игривые малыши могут спокойно развлекаться здесь, веселиться, ведь организация детских праздников – наш козырь. Для детей – специальное <b><a href="index.php?business_full=600&amp;pm=3">детское меню</a></b>, плюс подарки и сувениры...<a href="/index.php?business_full=600&pm=1">>></a>
</div>

 
 
 </div>
 
 






    </div>



</div>