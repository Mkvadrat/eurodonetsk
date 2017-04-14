<div id="lang_str"><?php echo change_language_flags('header_upline_fl');?></div>
<div class="center_menu">
<?php    
    if ($roles[0] == 1)
        echo '<div><a href="sadmin.php?sub_m=1">Редактирование категорий</a></div>';
    if ($roles[1] == 1)
        echo '<div><a href="sadmin.php?sub_m=2">Редактирование статей</a></div>';
    if ($roles[2] == 1)
        echo '<div><a href="sadmin.php?sub_m=4">Утверждение предприятий</a></div>';
    if ($roles[3] == 1)
        echo '<div><a href="sadmin.php?sub_m=6">Добавление предприятий</a></div>';
    if ($roles[4] == 1)
        echo '<div><a href="sadmin.php?sub_m=5">Баны</a></div>';
    if ($roles[5] == 1)
        echo '<div><a href="sadmin.php?sub_m=7">Настройки поиска</a></div>';       
?>
    <div><a href="sadmin.php?sub_m=3">Выход</a></div>
</div>
