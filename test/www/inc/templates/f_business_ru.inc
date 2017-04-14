<div class="paid_d_c">
<?php 
  get_paid($_GET['n_id'],$_GET['pm']);
?>
<div id="paid_d_menu">
<div class="paid_d_mp">
<a href="">Категория:</a></div>
</div>
<div class="paid_d_cont">
<?php get_paid_path($_GET['n_id']); ?>
</div>
<div id="paid_d_menu">
<div class="paid_d_mp">
<a href="">Фотогалерея:</a></div>
</div>
<div class="paid_d_cont">
<script type="text/javascript" src="scripts/jquery.lightbox.min.js?show_linkback=false&show_helper_text=false&show_info=true&show_extended_info=true&keys.close=z&keys.prev=q&keys.next=e&text.image=Фото&text.of=из&text.close=Закрыть&text.download=Загрузить" id="lightbox-script-lightbox"></script>
<link type="text/css" rel="stylesheet" href="css/lightbox.css" media="all">
<?php
  get_paid_gallery($_GET['n_id']);
?>
</div>
<div id="paid_d_menu">
<div class="paid_d_mp">
<a href="">Контактная информация:</a></div>
</div>
 <div class="paid_d_cont">
 		 <table width="100%">
			<tbody>
 			<tr>			
				<td>Адрес:</td>
				<td>Телефон:</td>
				<td>E-mail:</td>
				<td>Веб-сайт:</td>
			</tr>
			<tr>
                                <?php get_paid_essentials($_GET['n_id']); ?>
			</tr>
			</tbody> 
		 </table> 		
	 </div>
</div>
