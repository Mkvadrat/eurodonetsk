<div id="header_div">
<!--begin of header infoline-->
<?php
 page_xml_init(); 
?>
 <div id="header_upline">
  <div class="header_separator"></div>
  <!--weather-->	
  <?php
   echo '<div id="weather_pict_h"><img src="images/weather_clipart_sm/'.$weather_xml->current->pict.'" width="33" height="27" alt="weather" /></div>';
  ?>
  
  <div class="header_upline_txt_inf">						
  <?php 
   echo page_weather_string();    		 
  ?>
  </div>
  <div class="header_upline_txt1_inf">						
  
  </div>
  <!--language-->
  <div id="header_upline_lang">
   <div class="header_upline_fl"></div>
   <?php
    echo change_language_flags('header_upline_fl','25','25');
   ?>
   
  </div>
 </div>
<!--end of header infoline-->	

<div id="header_face"> 
 <!--logo-->
 <div id="header_logo">
 
  <a href="/" ><img src="images/logo.png" alt="Аренда (снять) квартиру посуточно в Донецке 2012: Economy Business Health tourism site of Donetsk city: English-language portal"/></a>  
 </div>
 <!--main banner-->
 <div id="hider_bannerer" style="position:absolute; z-index:-10; background-color:none; width:10px height:10px; margin:0px; padding:0px;">
  
<div id="header_banner">


<!--LiveInternet counter--><script type="text/javascript"><!--
new Image().src = "//counter.yadro.ru/hit?r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random();//--></script><!--/LiveInternet-->

 </div>
   


 </div>
  <P><a href="http://eurodonetsk.com/apartaments" > <h2> Аренда (снять) квартиру посуточно в Донецке</font> </h2></a> </p>
  <P><a href="http://eurodonetsk.com/apartaments" > <h2> Квартиры на сутки, посуточно в Донецке</font> </h2></a> </p>
  <P><a href="http://eurodonetsk.com/apartaments" > <h2> Снять недорого жилье в Донецке</font> </h2></a> </p>
</div>		
 <!--end of header infoline-->
<div id="header_menu">
<?php 
echo create_main_menu($_GET['section_id']);
?>
</div>
</div>