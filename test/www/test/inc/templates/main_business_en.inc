<div id="adress"><?php show_adress_path($_GET['section_id']); ?></div>
<div class="main_page">
 <div id="left_column">
      <?php require_once ('inc/templates/business_left_column_'.$lang_prefix.'.inc');?>
 </div>
 <div class="main_sec_preview" id="center_column"> 
  <?php echo get_business_sections($_GET['section_id']); ?>
 </div>
 <div id="right_column">
      <?php require_once ('inc/templates/business_right_column_'.$lang_prefix.'.inc');?>
 </div>
</div>
