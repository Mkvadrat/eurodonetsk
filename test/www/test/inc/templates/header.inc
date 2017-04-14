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
  <?php     
   echo page_currency_string();			 
  ?>
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
  <a href="index.php" ><img src="images/logo.png" alt="" /></a>  
 </div>
 <!--main banner-->
 <div id="header_banner">
	<!-- I.UA GIF 1x1 --><script type="text/javascript" language="javascript"><!--
iS='<img src="http://r.i.ua/s?u86742&p0&n'+Math.random();
iD=document;iD.cookie="iua=1";if(iD.cookie)iS+='&c1';
iS+='&d'+(screen.colorDepth?screen.colorDepth:screen.pixelDepth)
+"&w"+screen.width+'&h'+screen.height;
iT=iD.referrer.slice(7);iH=window.location.href.slice(7);
((iI=iT.indexOf('/'))!=-1)?(iT=iT.substring(0,iI)):(iI=iT.length);
if(iT!=iH.substring(0,iI))iS+='&f'+escape(iD.referrer.slice(7));
iS+='&r'+escape(iH);
iD.write(iS+'" border="0" width="1" height="1" />');
//--></script>
	<!-- End of I.UA GIF 1x1 -->

<!--bigmir)net TOP 100 Part 1-->
<script type="text/javascript" language="javascript"><!--
bmN=navigator,bmD=document,bmD.cookie='b=b',i=0,bs=[],bm={o:1,v:16858853,s:16858853,t:6,c:bmD.cookie?1:0,n:Math.round((Math.random()* 1000000)),w:0};
for(var f=self;f!=f.parent;f=f.parent)bm.w++;
try{if(bmN.plugins&&bmN.mimeTypes.length&&(x=bmN.plugins['Shockwave Flash']))bm.m=parseInt(x.description.replace(/([a-zA-Z]|\s)+/,''));
else for(var f=3;f<20;f++)if(eval('new ActiveXObject("ShockwaveFlash.ShockwaveFlash.'+f+'")'))bm.m=f}catch(e){;}
try{bm.y=bmN.javaEnabled()?1:0}catch(e){;}
try{bmS=screen;bm.v^=bm.d=bmS.colorDepth||bmS.pixelDepth;bm.v^=bm.r=bmS.width}catch(e){;}
r=bmD.referrer.slice(7);if(r&&r.split('/')[0]!=window.location.host){bm.f=escape(r);bm.v^=r.length}
bm.v^=window.location.href.length;for(var x in bm) if(/^[ovstcnwmydrf]$/.test(x)) bs[i++]=x+bm[x];
bmD.write('<sc'+'ript type="text/javascript" language="javascript" src="http://c.bigmir.net/?'+bs.join('&')+'"></sc'+'ript>');
//-->
</script>
<noscript><img src="http://c.bigmir.net/?v16858853&s16858853&t6" width="0" height="0" alt="" title="" border="0" /></noscript>
<!--bigmir)net TOP 100 Part 1-->

<!--LiveInternet counter--><script type="text/javascript"><!--
new Image().src = "//counter.yadro.ru/hit?r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random();//--></script><!--/LiveInternet-->

 </div>
</div>		
 <!--end of header infoline-->
<div id="header_menu">
<?php 
echo create_main_menu($_GET['section_id']);
?>
</div>
</div>