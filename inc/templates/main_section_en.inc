<div id="adress"><?php show_adress_path($_GET['section_id']); ?></div>
<div class="main_page">
 <div id="left_column">
    <?php require_once ('inc/templates/section_left_column_'.$lang_prefix.'.inc');?>
 </div>
 <div class="main_sec_preview" id="center_column"> 
  <?php echo get_section_articles($_GET['section_id'], $_GET['id_page']); ?>
 </div>
 <div id="right_column">
      <?php require_once ('inc/templates/section_right_column_'.$lang_prefix.'.inc');?>
 </div>
</div>
