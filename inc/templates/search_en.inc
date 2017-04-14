<div class="main_page">
 <div id="left_column">
   <?php require_once ('inc/templates/section_left_column_'.$lang_prefix.'.inc');?>
 </div>
 <div id="center_column_b"> 
 <?php get_search_results($_GET['search_str'],(int)$_GET['page'],$_GET['special']); ?>
 </div>
 <div id="right_column">
   <?php require_once ('inc/templates/section_right_column_'.$lang_prefix.'.inc');?>
 </div>
</div>