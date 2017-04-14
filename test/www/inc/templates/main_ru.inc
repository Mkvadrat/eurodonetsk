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
  <script type="text/javascript" src="/root/main.js">
    <script type="text/javascript" src="/root/js/jquery.core.pack.js">
  </script></script>

  

  <noscript><img src="root/img/01.jpg" /><div>Please enable javascript!</div></noscript> 
 </div>
 <div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text"><?=get_localization_string('article_title_string')?></div></div>
      <div class="block_me">
	  <div class="img_for_me">
             <a href="index.php?section_id=197"><img border="0" width="134" height="187" src="/root/upload-files/new/news/otdix-donetsk.jpg"></a>
	  </div>
	  <div class="txt_block_for_me">
	  <div class="txt_pod_me">
	   Туризм в Донецке и Донецкой области каждым годом становится разнообразнее. Для этого создана прекрасная инфраструктура, много специальных предложений на любой вкус. Существуют центры активного отдыха, ландшафтные парки и заповедники, пешеходные и велосипедные пути, конная рекреация, верховая езда, гольф,водные и экстремальные виды спорта, разнообразные парки развлечений - всего не перечесть. Если вы любитель морских приключений, то Азовское побережье всегда радо вас принять. Оказывается, не стоит ехать в дальние края, на модные курорты. Ведь рядом – уникальные здравницы Приазовья. Прекрасные золотистые песчаные пляжи, теплая целебная вода ... <a href="index.php?section_id=197" class="link_more">>></a>
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
    <div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text">РЕПОРТАЖ</div></div>
    <div style="width:236px; height:430px; text-align:justify;"><a href="index.php?section_id=161&id_page=117"><img width="236" height="130" alt="Донецк чемпионат 2012" style="padding: 7px 0;" src="/root/upload-files/new/news/futboll2012.jpg"></a>
    Чемпионат Европы по футболу 2012 года, обычно называемый "Евро-2012", станет 14-м чемпионатом Европы по футболу, проводимым раз в четыре года под эгидой УЕФА. Турнир будет проводиться совместно Украиной и Польшей. Финальная часть начнется 9 июня 2012 года и завершится 1 июля 2012 года. Это будет третий турнир в истории европейских национальных футбольных первенств, хозяевами которого являются две страны. Первым стал чемпионат Европы 2000 года, проведённый в Бельгии и Нидерландах, вторым чемпионат Европы 2008 года, проведённый в Австрии и Швейцарии. В турнире будут участвовать 16 команд. Украина и Польша автоматически квалифицируются как страны ... <a href="index.php?section_id=161&id_page=117" class="link_more">>></a>     
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
   <div class="boxes_title"><div class="boxes_text"></div></div>
   <img border="0" width="236" height="386" src="/root/banners/uvilfantbanner.png" style="padding: 12px 0pt;">
 </div>
</div>
