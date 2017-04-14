<?php
    require_once ('dbconnect.inc');          // создаём подключение к базе данных
    require_once ('dbtree.class_lite.php');  // подключаем класс для работы с деревом разделов
    
    $dbtree = new dbtree('sections_ru', 'section', $db);
    //$dbtree = new dbtree('sections_'.$_SESSION['lang_prefix'], 'section', $db);
 
    
 
    $s_id = (int)mysql_real_escape_string($_POST['sec_id']);
    $level = (int)mysql_real_escape_string($_POST['level']);
    
    if ($level == 2)
    {
        echo '<table class="sl_tree" cellspacing="0" cellpading="0"><tr>';
        $dbtree->Branch($s_id , array('section_id'),array('and' => array('section_level = 2', 'section_actual = 1')));
        $td_w = floor(1001 / $dbtree->RecordCount());
        $dbtree->Branch($s_id , array('section_id', 'section_name', 'section_level', 'section_url'),array('and' => array('section_level > 1', 'section_level < 4', 'section_actual = 1')));
    }
    else
    {
        echo '<table class="tl_tree" cellspacing="0" cellpading="0"><tr>';
        $dbtree->Branch($s_id , array('section_id', 'section_name', 'section_level', 'section_url'),array('and' => array('section_level = 3', 'section_actual = 1')));
        $td_w = floor(1001 / $dbtree->RecordCount());        
    }
    
    if ($level == 2)
    {
        $item = $dbtree->NextRow();
        $temp = $item;
        while ($item = $dbtree->NextRow())
        {            
            if (($temp['section_level'] < $item['section_level'])&&($temp['section_level'] == 2))
                echo '<td width="'.($td_w-35).'">'.$temp['section_name'].'</td><td onclick="fmso('.$temp['section_id'].');" width="35">#</td>';
            else
            if ($temp['section_level'] == 2)
                echo '<td width="'.($td_w).'">'.$temp['section_name'].'</td>';
           
            $temp = $item;
        }        
        if ($temp['section_level'] == 2)
            echo '<td width="'.($td_w).'">'.$temp['section_name'].'</td>';
    }
    else
        while ($item = $dbtree->NextRow())
        {
            echo '<td width="'.($td_w).'">'.$item['section_name'].'</td>';
        }
 
    echo '</tr></table>'; 
?>
