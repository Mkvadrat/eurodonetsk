<div id="adress"><?php show_adress_path($_GET['section_id']); ?></div>
<div class="main_page">
 <div id="left_column">
      <?php require_once ('inc/templates/business_left_column_'.$lang_prefix.'.inc');?>
 </div>
 <div class="main_sec_preview" id="center_column_b">  
  <?php get_alphabet($_GET['section_id'],$_GET['n']); ?>
  <?php get_enterprise($_GET['section_id']); ?>
  <?php
  if (get_section_level($_GET['section_id'])==4)
   echo '<div class="comp_add"><form method="get" action="index.php">      
      <input type="hidden" name="new_add" value="1">
      <input type="hidden" name="section_id" value="'.$_GET['section_id'].'">
      <input type="image" src="images/search/add_company_en.gif">      
      </form></div>';
  ?>
 </div>
 <div id="right_column">
      <?php require_once ('inc/templates/business_right_column_'.$lang_prefix.'.inc');?>
 </div>
</div>
