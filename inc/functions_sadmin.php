<?php

function get_section_level($section_id)
{
    global $tbl_lng;
   
    $sql = mysql_query('SELECT section_level FROM '.$tbl_lng.' WHERE section_id = '.$section_id)
        or die('Invalid query: '.mysql_error());
        
    $row = mysql_fetch_array($sql);
    
    mysql_free_result($sql);
    
    return $row['section_level']; 
}

function get_localization_string($local_string)
{
    global $lang_prefix;
    $sql = mysql_query('SELECT * FROM localization_'.$lang_prefix.' WHERE name_local = "'.$local_string.'"')
        or die('Invalid query: '.mysql_error());
        
    $row = mysql_fetch_array($sql);
    $ret_row = $row['text_local'];
    
    mysql_free_result($sql);
    
    return $ret_row;  
}

function get_single_setting($setting_name)
{    
    $sql = mysql_query('SELECT * FROM settings WHERE setting_name = "'.$setting_name.'"')
        or die('Invalid query: '.mysql_error());
        
    $row = mysql_fetch_array($sql);
    
    mysql_free_result($sql);
    
    return $row['setting_value'];  
}

function get_existed_languages($lang)
{    
    if ($lang == '')
    {
       return get_single_setting('default_language');
    }
    
    $lang = mysql_real_escape_string($lang);
      
    $sql = mysql_query('SELECT setting_value FROM settings WHERE setting_group = 1 and setting_value="'.$lang.'"')
        or die('Invalid query: '.mysql_error());
        
    if ($row = mysql_fetch_array($sql))
    {
        mysql_free_result($sql);
        return $lang;                     
    }
    
    mysql_free_result($sql);
    
    return get_single_setting('default_language');    
}

function get_real_md($user_name)
{
   $sql = mysql_query('SELECT passwd FROM authuser WHERE uname like "'.mysql_real_escape_string($user_name).'"')
        or die('Invalid query: '.mysql_error());
        
    $row = mysql_fetch_array($sql);
    
    mysql_free_result($sql);
    
    return $row['passwd'];   
}

function change_language_flags($class_name)
{
    $flags_string = '';
    
    $sql = mysql_query('SELECT setting_value FROM settings WHERE setting_group = 1 ORDER BY setting_priority')
        or die('Invalid query: '.mysql_error());
        
    while ($row = mysql_fetch_array($sql))
    {
        $flags_string = $flags_string.'<div class="'.$class_name.'"><a href="sadmin.php?sub_m='.$_GET['sub_m'].'&lang='.
                        $row['setting_value'].'">'.$row['setting_value'].'</a></div>';
    }
    
    mysql_free_result($sql);
    
    return $flags_string;
}

function check_exist_business($business_name)
{
   $sql = mysql_query('SELECT name FROM catalogue_main WHERE name like "'.mysql_real_escape_string($business_name).'"')
        or die('Invalid query: '.mysql_error());
    
    $row = mysql_fetch_array($sql);
    
    mysql_free_result($sql);
    
    if ($row['name'] != '')
     return 1;
    else
     return 0;
}

function save_new_business($name_pr,$index,$city,$street,$build,$phone,$idsec)
{
 $query = "INSERT INTO catalogue_main
                     		(name, 
                      		tel, 
                      		idsec1, 
                      		ind, 
                      		city,
                                street,
                                house
                                ) 
                      VALUES 
                            ('".ltrim(rtrim(mysql_real_escape_string($name_pr)))."', 
                             '".mysql_real_escape_string($phone)."', 
                             '".mysql_real_escape_string($idsec)."', 
                             '".mysql_real_escape_string($index)."', 
                             '".mysql_real_escape_string($city)."',
                             '".mysql_real_escape_string($street)."',                             
			     '".mysql_real_escape_string($build)."')";
                        
 mysql_query($query);                             
}
?>