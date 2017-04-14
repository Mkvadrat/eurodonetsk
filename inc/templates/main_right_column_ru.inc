<?php $search_str_tmp = get_localization_string('search_string_name'); ?>
<div id="search_box">
<div id="main_search_form">
     <form method="get" id="searchform" action="index.php">
     <div class="main_search_input">
      <div>
      <input type="text" value="<?php echo $search_str_tmp; ?>" name="search_str" id="s" onfocus="if (this.value == '<?php echo $search_str_tmp; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo $search_str_tmp; ?>';}" />
      </div>
      <div>
      <input type="submit" id="searchsubmit" value="" />
      </div>
      </div>
     </form>
     </div>
     <div id="adv_search"><a href="index.php?adv_search_str=1"><?php echo get_localization_string('search_advanced_str_name'); ?></a>
     </div>
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
<div id="banner_2">
     <img border="0" width="236" height="250" alt="" src="root/banners/Dominic-Banner-250x250pxl.jpg">
</div>