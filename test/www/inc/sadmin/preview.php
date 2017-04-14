<html>
<head>    
<link type="text/css" rel="stylesheet" href="../../css/style_ru.css" media="all">
<link type="text/css" rel="stylesheet" href="css/style_prev.css" media="all">
    <script type="text/javascript">
        //<![CDATA[
        function set_value()
        {
            document.getElementById("news_title_href").innerHTML = opener.document.getElementById('news_title').value;            
            var string = opener.document.getElementById('news_text').value;
            string = string.substring(0,190);
            var last_sp = string.lastIndexOf(" ");           
	
            if (last_sp == 0) 
            {
               last_sp = 190;
            }        
            string = string.substring( 0, last_sp);
            string = string + ' ...&nbsp;<a href="">&gt;&gt;</a>';
        
            document.getElementById("text_prev").innerHTML =
            '<br/><img src="../../' + opener.document.getElementById('news_image').value +
            '" alt="" width="134" height="100" class="main_news_image" id="image_prev" /><br/>' + string;
        }
    </script>
</head>
<body onload='return set_value();'>
<div class="main_news" style="width:180px; margin:30px;">
    <div class="main_news_title" id="main_news_title"><a href="" id="news_title_href"></a></div>
    <div id="text_prev" class="text_prev">                
    </div>
</div>
</body>
</html>
