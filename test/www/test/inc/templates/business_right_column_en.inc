<?php $search_str_tmp = get_localization_string('search_string_name'); ?>
<div class="boxes_title"><div class="boxes_image"></div><div class="boxes_text"><?=get_localization_string('search_title_string')?></div></div>
   <div id="search_block">    
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
      <input type="image" src="images/search/add_company_en.gif" class="button_add_business">      
    </form>
   </div>
<div id="tags_box">
     <div id="tags_text"><?php echo get_localization_string(tags_title_text); ?></div>
     <div id="tags">
     <?php
          $tags = get_tags(10);
     ?>
     Для корректного отображения этого элемента вам необходимо установить FlashPlayer и включить в браузере Java Script.
     <script type="text/javascript">
     var rnumber = Math.floor(Math.random()*9999999);
     var widget_so = new SWFObject("scripts/tagcloud.swf?r="+rnumber, "tagcloudflash", "235", "200", "10", "#ffffff");
     widget_so.addParam("allowScriptAccess", "always");widget_so.addVariable("tcolor", "0x333333");
     widget_so.addVariable("tspeed", "115");
     widget_so.addVariable("distr", "true");
     widget_so.addVariable("mode", "tags");
     widget_so.addVariable("tagcloud", "<?php echo urlencode($tags); ?>");
     widget_so.write("tags");</script> 
     </div>
</div>
