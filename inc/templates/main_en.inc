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
				
				$dir = 'root/adv/en/';
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
	
	
	

 <div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text">

  <a style="color:white; text-decoration:none;" href="index.php?section_id=523" class="link_more" ><h2 style=" font-size:97%;">The best cafes, restaurants, clubs, bars, pubs, pizzerias in Donetsk.

</h2></a></div></div>

      <div class="block_me">

	  <div class="img_for_me">

             <a href="index.php?section_id=523"><img alt="Donetsk restaurants,  clubs, bars, pubs, pizzerias, cafes in Donetsk" border="0" width="220" height="170" src="root/bari_resorani/kruglyj_stol.jpg"></a>

	  </div>

	  <div class="txt_block_for_me">

	  <div class="txt_pod_me">

	      Many <a href="index.php?section_id=501">restaurants and cafes in Donetsk</a> will offer you not only dishes of Oriental and European cuisine but also cultural program. The list of catering establishments is not limited to <a href="index.php?section_id=524">cafes</a> and <a href="index.php?section_id=523">restaurants</a>. There are coffee shops in Donetsk, where you will offer dozens of recipes for aromatic and divine beverages. There is a <a href="index.php?lang=en&business_full=400&pm=1">brewery</a>, which will offer you a real (no preservatives added) amber-colored drink. Nightclubs in Donetsk will offer you a variety of entertainment.  <a href="index.php?section_id=523" class="link_more">>></a>

	  </div>

	  </div>

     </div>

 <div id="news"> 

 <?php echo get_main_news_preview(148,100,"width:148px;padding:0px 12px 0px 0;","width:148px;padding:0px 7px;","width:148px;padding:0px 0px 0px 12px;"); ?>

 </div> 

 </div>

 <div id="main_center_column">

  <div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text"><?=get_localization_string('weather_title_string')?></div></div>

   <div id="date_block">    

    <div id="header_for_weather">

     <?php echo $weather_xml->city->name.', '.$w_t;

     echo '</div>';

     echo '<div id="weather_info">';

     echo '<div id="weather_pict"><img src="images/weather_clipart/'. $weather_xml->current->pict .'" width="44" height="52" /></div>';

     echo '<div id="weather_t">'.$weather_xml->current->t.'&deg;</div>';

     echo '<div id="weather_other">Wind: '.$weather_xml->current->w.'mps<br /> Pressure: '.$weather_xml->current->p.'мм<br /> Humidity: '.$weather_xml->current->h.'% </div>';

     ?>

     </div>     

   </div>

    <div id="banner_2">

     <a href="index.php?business_full=398&pm=1"><img border="0" width="236" height="250" alt="" src="root/banners/Dominic-Banner-250x250pxl.jpg"></a>

    </div>

        <div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text">

        <a style="color:white; text-decoration:none;" href="index.php?section_id=531" class="link_more" >

        <h2 style=" font-size:97%;">Donetsk City Climate</h2></a></div></div>

    <div style="width:236px; height:430px; text-align:justify;"><a href="index.php?section_id=531"><img alt="

Donetsk City Climate" width="236" height="130" alt="" style="padding: 7px 0;" src="/root/1AboutDonetsk/Donetsk-Ukraine-map.png"></a>

    <b>City Donetsk</b> is located in the centre of the  <b>Donbass</b>, southern part of upland, called the <b>Donetsk ridge</b>. Total area of the city is 358 km ². The total extent of <b>Donetsk</b> from the east to west is 55 km and from north to south 38 km.



Besides that <b>Donetsk</b> is located in the steppe zone, more exactly in the upper reaches of the river Kalmius. Regional centre surrounded by small hills, rivers, lakes and forests. And along with all nearby cities, the capital of Donbass is a part of the Donetsk metropolitan area (Donetsk - Makeevka - Khartsizk). 


<div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text">

        <a style="color:white; text-decoration:none;" href="index.php?section_id=471" class="link_more">

        <h2 style=" font-size:97%;">Euro 2012 in Donetsk</h2></a></div></div>



<a href="index.php?section_id=471"><img alt="European Football Championship 2012" width="236" height="140" style="padding: 7px 0;" src="/root/2012.jpg"></a>

The UEFA European Football Championship 2012, commonly called Euro-2012 will be 14-th European Football Championship, held every four years under the auspices of UEFA. The tournament will be conducted jointly with Ukraine and Poland. The final part will begin on June 9, 2012 and will end on July 1, 2012 This will be the third tournament in the history of European national football championships, the owners of which are the two countries. The first was European Championships 2000 held in Belgium and Netherlands, the second European Championship 2008 held in Austria and Switzerland.The tournament will involve 16 teams. Ukraine and Poland will automatically qualify as host country. The remaining 14 teams will be determined on the basis of qualifying round matches, which begins in August 2010. The draws will take place on February 7, 2010 in Warsaw ...<a href="index.php?section_id=471" class="link_more">>></a>     

    </div>

 </div>

 <div id="main_right_column">

   <div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text"><?=get_localization_string('search_title_string')?></div></div>

   <div id="search_block_m">    

    <form method="get" action="index.php" id="search">    

    <div id="block_pod_input">

	<input type="text" class="search_field" name="search_str">

    </div> 

    <div id="search_buttoon">

        <input type="image" src="images/search/search_en.gif" name="search" value=" " class="button_searsh">

    </div>       

    </form>    

    <form method="get" action="index.php" id="add_business">

      <input type="hidden" name="business" value="1">

      <input type="hidden" name="section_id" value="616">

      <input type="hidden" name="lang" value="en">  

      <input type="image" src="images/search/add_company_en.gif" class="button_add_business">      

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

   <div class="boxes_title"><div class="boxes_text"><a style="color:white; text-decoration:none;" href="index.php?section_id=468&id_page=430" class="link_more" ><h2 style=" font-size:97%;">Advertisment on Donetsk portal

</h2></a></div></div>

<a href="index.php?business_full=401&pm=1"><img alt="Advertisment on Portal eurodonetsk.com" border="0" width="236" height="450" style="padding: 12px 0pt;" src="/root/banners/maximym_june.jpg"></a>

 </div>

</div>

