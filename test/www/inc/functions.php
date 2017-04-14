<?php
function get_section_level($section_id)
{
    global $tbl_lng;
   
    $sql = mysql_query('SELECT section_level FROM '.$tbl_lng.' WHERE section_id = "'.$section_id.'"')
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

function get_rss_setting($rss_id)
{    
    $sql = mysql_query('SELECT * FROM rss WHERE id = "'.$rss_id.'"')
        or die('Invalid query: '.mysql_error());
        
    $row = mysql_fetch_array($sql);
    
    mysql_free_result($sql);
    
    return $row['rss_string'];  
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

function page_xml_init()
{
   global $weather_xml, $nbu_xml;
   $f_weather_xml = get_single_setting('xml_weather_link');
   $f_nbu_xml = get_single_setting('xml_nbu_link');   

   if (file_exists($f_weather_xml))
   {
      $weather_xml = simplexml_load_file($f_weather_xml);
   }
   if (file_exists($f_nbu_xml))
   {
      $nbu_xml = simplexml_load_file($f_nbu_xml);  
   }     
}

function page_weather_string()
{
    global $weather_xml;
    global $lang_prefix;
    $presure_str = get_localization_string('wether_wind_string');
    $wind_str = get_localization_string('wether_presure_string');
    
    return $weather_xml->current->t.'&deg;&nbsp;/&nbsp;'.$weather_xml->current->w.$presure_str.'&nbsp;/&nbsp;'.
           $weather_xml->current->p.$wind_str.'&nbsp;/&nbsp;'.$weather_xml->current->h.'%&nbsp;&nbsp;&nbsp;&nbsp;'; 
}

function page_currency_check()
{ 
    $sql = mysql_query('SELECT setting_name, setting_value FROM settings WHERE setting_group = 2 ORDER BY setting_priority')
        or die('Invalid query: '.mysql_error());
    
    $position = 1;
    
    while (list($row[$position],$row[$position+1]) = mysql_fetch_array($sql))
    {        
        $position = $position + 2;
    }
    
    mysql_free_result($sql);
    
    return $row;
}

function page_currency_string()
{
    global $nbu_xml;
    $return_string = '';
    
    $currency_array = page_currency_check();
    
    foreach ($nbu_xml->item as $item)
    {
       $position = array_search('CURRENCY_'.$item->char3,$currency_array);
       
       if ($position)
       {
            $dot_pos = strpos($item->rate,addslashes('.'));			   
            $w_t=substr($item->rate, 0, $dot_pos+3);
            $return_string = $return_string.$currency_array[$position+1].': '.$w_t.'&nbsp;&nbsp;';    
       }
    }
    
    return $return_string;
}

function page_currency_block()
{
    global $nbu_xml;
    $return_string = '';
    
    $currency_array = page_currency_check();
    
    foreach ($nbu_xml->item as $item)
    {
       $position = array_search('CURRENCY_'.$item->char3,$currency_array);
       
       if ($position)
       {
            $dot_pos = strpos($item->rate,addslashes('.'));			   
            $w_t=substr($item->rate, 0, $dot_pos+3);
            $return_string = $return_string.'<div class="down_stripe_el">&nbsp;&nbsp;&nbsp;  <img src="images/course_cliart/CURRENCY_'.$item->char3.'.gif" width="20" height="25" /></div><div class="down_stripe_el" style="margin-top:4px;">'. $w_t. " </div>";    
       }
    }
    
    return $return_string;
}
function get_business_association($business_id, $lang_current, $lang_new)
{
    $business_id = (int)mysql_real_escape_string($business_id);
    
    $sql = mysql_query('SELECT '.$lang_new.'_id FROM business_compare WHERE '.$lang_current.'_id = "'.$business_id.'"')
        or die('Invalid query: '.mysql_error());
        
    $row = mysql_fetch_array($sql);
    
    mysql_free_result($sql);
    
    return $row[$lang_new.'_id'];
}
function change_language_flags($class_name, $width, $height)
{
    global $lang_prefix;
    $flags_string = '';
    
    $sql = mysql_query('SELECT setting_value FROM settings WHERE setting_group = 1 ORDER BY setting_priority')
        or die('Invalid query: '.mysql_error());
        
    while ($row = mysql_fetch_array($sql))
    {                                
        if ($_GET['business_full'])
        {
            if ($new_id = get_business_association($_GET['business_full'],$lang_prefix,$row['setting_value']))
            {
            $flags_string = $flags_string.'<div class="'.$class_name.'"><a href="index.php?lang='.
                        $row['setting_value'].'&amp;business_full='.$new_id.'&amp;pm=1"><img src="images/flags/fl_'.
                        $row['setting_value'].'.png" width="'.$width.'" height="'.$height.'" alt="'.$row['setting_value'].'"/></a></div>';
            }
            else
            $flags_string = $flags_string.'<div class="'.$class_name.'"><a href="index.php?lang='.
                        $row['setting_value'].'"><img src="images/flags/fl_'.
                        $row['setting_value'].'.png" width="'.$width.'" height="'.$height.'" alt="'.$row['setting_value'].'"/></a></div>';
        }
        else
            $flags_string = $flags_string.'<div class="'.$class_name.'"><a href="index.php?lang='.
                        $row['setting_value'].'"><img src="images/flags/fl_'.
                        $row['setting_value'].'.png" width="'.$width.'" height="'.$height.'" alt="'.$row['setting_value'].'"/></a></div>';

    }
    
    mysql_free_result($sql);
    
    return $flags_string;
}

function get_adress($section_id)
{
    global $dbtree;
    
    $level = get_section_level($section_id);
    $adress_path = array($level, '', '','', '', '','');
    
    $dbtree->Ajar($section_id , array('section_id', 'section_name', 'section_level'));
    
    while ($item = $dbtree->NextRow())
    {
        if ($level < $item['section_level'])
            break;
        
        if ($item['section_level'] == 1)
        {
            $adress_path[1] =  $item['section_id'];
            $adress_path[2] =  $item['section_name'];   
        }
        if ($item['section_level'] == 2)
        {
            $adress_path[3] =  $item['section_id'];
            $adress_path[4] =  $item['section_name'];
        }
        if (($item['section_id'] == $section_id)||(($item['section_level'] == 3)&&($level == 4)))
        {
            $adress_path[5] =  $item['section_id'];
            $adress_path[6] =  $item['section_name'];
            
            if ($item['section_id'] == $section_id)
                break;
        }
        if ($item['section_level'] == 4)
            break; 
    }
    
    return $adress_path;
}
function show_adress_path($section_id)
{
    global $lang_prefix;
    
    $fl = 1;
    $pos = 2;
    $adress_path = get_adress($section_id);
    
    echo '&nbsp;';
    
    while ($adress_path[0])
    {
        if ($fl)        
            $fl = 0;      
        else        
            echo '&raquo;&nbsp;';
            
        $sql = mysql_query('SELECT section_url FROM sections_'.$lang_prefix.' WHERE section_id = "'.$adress_path[$pos-1].'"')        
            or die('Invalid query: '.mysql_error());
        
        $row = mysql_fetch_array($sql);
        
        if ($row['section_url'] != '')
            echo '<a href="'.$row['section_url'].'">'.$adress_path[$pos].'</a>&nbsp;';
        else
            echo '<a href="index.php?section_id='.$adress_path[$pos-1].'">'.$adress_path[$pos].'</a>&nbsp;';
        
        $adress_path[0] = $adress_path[0] - 1;
        $pos = $pos + 2;
    }
}

function create_main_menu($section_id)
{
    global $dbtree;
    global $dbtree_s;
    global $lang_prefix;
    $gl_num = 0;
    $gl_num_1 = 0;
    
    if (!empty($section_id))
    {       
        $adress_path = get_adress($section_id);
    }
            
    $sql = mysql_query('SELECT section_id, section_name, section_url FROM sections_'.$lang_prefix.' WHERE section_actual = 1 and section_level = 1 ORDER BY section_order')
        or die('Invalid query: '.mysql_error());
    
    echo '<table id="f_g_b" cellspacing="0" cellpadding="0"><tbody><tr><td class="l_s"></td>';
        
    while ($row = mysql_fetch_array($sql))
    {
        $dbtree->Branch($row['section_id'] , array('section_id', 'section_name', 'section_level', 'section_url'),array('and' => array('section_level = 2', 'section_actual = 1')));
        
        if ($row['section_url'] == '')
            $url_path = 'index.php?section_id='.$row['section_id'];
        else
            $url_path = $row['section_url'];
        //$item = $dbtree->NextRow();        
       
        if ($item = $dbtree->NextRow())
        {
            if ($row['section_id'] == $adress_path[1])
            {
                $str_show = 'style="background-color: rgb(236, 93, 14);"';
                $str_vis = 'style="visibility: visible;"';
                $old_f1 = 's_g_b'.$gl_num;
                $old_td1 = 'f_p_b'.$gl_num;
            }
            else
            {
                $str_show = '';
                if (!empty($section_id))
                    $str_vis = 'style="visibility: hidden;"';
                else
                    $str_vis = '';
            }
                
            echo '<td class="f_p_b" id="f_p_b'.$gl_num.'" '.$str_show.'>
                    <table cellspacing="0" cellpadding="0" class="f_p_t">
                        <tbody>
                            <tr>
                            <td><a href="'.$url_path.'">'.$row['section_name'].'</a>
                            </td>
                            <td class="f_p_i" onclick="change(\'s_g_b'.$gl_num.'\',\'s_g_t'.$gl_num_1.'\',\'1\', \'f_p_b'.$gl_num.'\', \'s_p_b'.$gl_num_1.'\')">
                                <table class="s_g_b" id="s_g_b'.$gl_num.'" cellspacing="0" cellpadding="0" '.$str_vis.'>
                                <tbody>
                                    <tr>';                                    
            

            do
            {
                if ($item['section_id'] == $adress_path[3])
                {
                    //$str_show = 'style="background-color: rgb(236, 93, 14);"';
                    $str_show = '';                    
                    $old_f2 = 's_g_t'.$gl_num_1;
                    $old_td2 = 's_p_b'.$gl_num_1;
                }
                else
                    $str_show = '';                    
            
                if ($item['section_url'] == '')
                    $url_path_s = 'index.php?section_id='.$item['section_id'];
                else
                    $url_path_s = $item['section_url'];
                
                $dbtree_s->Branch($item['section_id'] , array('section_id', 'section_name', 'section_level', 'section_url'),array('and' => array('section_level = 3', 'section_actual = 1')));
                
                //$item_s = $dbtree_s->NextRow();                
                
                if ($item_s = $dbtree_s->NextRow())
                {     
                    echo '<td class="s_p_b" id="s_p_b'.$gl_num_1.'" '.$str_show.'>
						<table cellspacing="0" cellpadding="0" class="f_p_t">
						<tbody>
							<tr>
							<td>
								<a href="'.$url_path_s.'">'.$item['section_name'].'</a>			
							</td>
							<td class="f_p_it" onclick="change(\'s_g_b'.$gl_num.'\',\'s_g_t'.$gl_num_1.'\',\'2\', \'f_p_b'.$gl_num.'\', \'s_p_b'.$gl_num_1.'\')">								
								<table class="s_g_t" id="s_g_t'.$gl_num_1.'" cellspacing="0">
								<tbody>
								<tr>';
                    do
                    {
                        if ($item_s['section_url'] == '')
                        $url_path_t = 'index.php?section_id='.$item_s['section_id'];
                    else
                        $url_path_t = $item_s['section_url'];
                        
                        echo '<td class="s_p_b"><a href="'.$url_path_t.'">'.$item_s['section_name'].'</a></td>';
                    } while ($item_s = $dbtree_s->NextRow());
                    
                    echo '</tr></tbody></table></td></tbody></table></td>';
                    $gl_num_1++;
                }
                else
                {
                    echo '<td class="s_p_b"><a href="'.$url_path_s.'">'.$item['section_name'].'</a></td>';
                }
                
            } while ($item = $dbtree->NextRow());
            
            echo '</tr></tbody></table></td></tbody></table></td>';
            $gl_num++;
        }
        else
        {
          echo '<td class="f_p_b"><a href="'.$url_path.'">'.$row['section_name'].'</a></td>';
        }  
    }
    
    mysql_free_result($sql);
    
    echo '<td class="r_s"></td></tr></tbody></table>';
    
    if (!empty($section_id))
    {
        echo '<script language="JavaScript">flag = 1;old_f1="'.$old_f1.'";old_td1="'.$old_td1.'";old_f2="'.$old_f2.'";old_td2="'.$old_td2.'";</script>';     
    }
    
    return '';
}

function footer_menu()
{
    global $tbl_lng;
    $result_str = '';
    $first = true;
    
    $sql = mysql_query('SELECT section_id, section_name, section_level, section_url FROM '.$tbl_lng.' WHERE section_level = 1 ORDER BY section_order')
      or die("Invalid query: " . mysql_error()); 
    while($row = mysql_fetch_array($sql))  
    {
        if ($row['section_url'] != '')
        {
            if ($first)
            {
              $first = false;
              $result_str = $result_str.'<a class="header_menu2_txt" href="' . $row["section_url"] . '">' . $row["section_name"] . '</a>';
            }
            else
            {
                $result_str = $result_str.'<img src="images/footer_s.png" width="26" height="20" alt="" /><a class="header_menu2_txt" href="' . $row["section_url"] . '">' . $row["section_name"] . '</a>';
            }
        }
        else
        {
            if ($first)
            {
              $first = false;
              $result_str = $result_str.'<a class="header_menu2_txt" href="index.php?section_id=' . $row["section_id"] . '">' . $row["section_name"] . '</a>';
            }
            else
            {
                $result_str = $result_str.'<img src="images/footer_s.png" width="26" height="20" alt="" /><a class="header_menu2_txt" href="index.php?section_id=' . $row["section_id"] . '">' . $row["section_name"] . '</a>';
            }
            
        }
    }
    
    mysql_free_result($sql);
   
    return $result_str;
}
function get_news_array($image_width, $image_height)
{
    global $news_array;
    global $news_title_array;
    global $lang_prefix;
    $numchar = get_single_setting('main_news_text_lenght_'.$lang_prefix);    
    
    $position = 0;
    
    $sql = mysql_query('SELECT * from news_'.$lang_prefix.' where main_page = true ORDER BY news_order desc')
      or die("Invalid query: " . mysql_error());
      
    while($row = mysql_fetch_array($sql))  
    {
        
        $news_preview = '<br /><img src="'.$row['news_image'].'" alt="" width="'.$image_width.'" height="'.$image_height.'" class="main_news_image" /><br />';
        $str = stripslashes($row['news_text']);
        
        // находим позицию последнего слова (пробела) в новости
        $last_sp = strripos(substr($str, 0, $numchar)," ");
	
        if ($last_sp === false) 
        {
            $last_sp = $numchar;
        }        
        $str = $news_preview.substr($str, 0, $last_sp);
        
        if ($row['id_page'] == 0)
        {
           $str = $str.' ...&nbsp;<a href="index.php?section_id='.$row['id_section'].'">&gt;&gt;</a>';
           $news_title_array[$position] = stripslashes('<a class="news_link" href="index.php?section_id='.$row['id_section'].'">'.$row['news_title'].'</a>');
        }
        else
        {
           $str = $str.' ...&nbsp;<a href="index.php?section_id='.$row['id_section'].'&amp;id_page='.$row['id_page'].'">&gt;&gt;</a>';
           $news_title_array[$position] = stripslashes('<a class="news_link" href="index.php?section_id='.$row['id_section'].'&amp;id_page='.$row['id_page'].'">'.$row['news_title'].'</a>');
        }
       
        $news_array[$position] = stripslashes($str);
        
        $position++;
    }
    
    mysql_free_result($sql);
    
    return 0;
}

function get_main_news_preview($image_width, $image_height, $additional_style_1, $additional_style_2, $additional_style_3)
{
    global $news_array;
    global $news_title_array;
    $out = '';    
    
    get_news_array($image_width, $image_height);
    
    $out = '<div class="main_news">';
    $count = 0;
    while ($count < get_single_setting('main_news_count'))
    {
       $out = $out.'<div class="main_news_title">'.$news_title_array[$count].'</div>';
       $out = $out.'<div class="main_news_title_c">'.$news_title_array[($count+1)].'</div>';
       $out = $out.'<div class="main_news_title">'.$news_title_array[($count+2)].'</div>';
       $out = $out.'<div style="'.$additional_style_1.'">'.$news_array[$count].'</div>';
       $out = $out.'<div style="'.$additional_style_2.'">'.$news_array[($count+1)].'</div>';
       $out = $out.'<div style="'.$additional_style_3.'">'.$news_array[($count+2)].'</div>';
       $count += 3;
    }
    $out = $out.'</div>';
    
    return $out;    
}

function get_section_massive_article($section_id, $id_page)
{
    global $pages_lng;
    global $count_rows;
    $is_page = false;
    $numchar = get_single_setting('main_section_text_lenghth');
    $count_articles = get_single_setting('main_section_count_articles');
    
    
    $sql = mysql_query('SELECT title, body, idsec, id_page FROM '.$pages_lng.' WHERE id_page='.$id_page.' and idsec='.$section_id.' LIMIT 1')
      or die("Invalid query: " . mysql_error()); 
    if($row = mysql_fetch_array($sql))  
    {  		
        $out[0] =  stripslashes($row['title']);
        $out[1] =  stripslashes($row['body']);
        $is_page = true;
    }
    
    mysql_free_result($sql);
    
    if ($_GET['page'])
        $page = ((int)$_GET['page'] - 1) * $count_articles;
    else
        $page = 0;
 
    if (!$is_page)
    {
        $sql = mysql_query('SELECT title, body, idsec, id_page FROM '.$pages_lng.' WHERE idsec="'.$section_id.'" ORDER BY date DESC LIMIT '.$page.' , '.$count_articles)
            or die("Invalid query: " . mysql_error());
        
        $sql1 = mysql_query('SELECT count(id_page) as count_rows FROM '.$pages_lng.' WHERE idsec="'.$section_id.'"')    
            or die("Invalid query: " . mysql_error());
    
        $row1 = mysql_fetch_array($sql1);
        $count_rows = $row1['count_rows'];
    }
    else
    {
        $sql = mysql_query('SELECT title, body, idsec, id_page FROM '.$pages_lng.' WHERE id_page <>'.$id_page.' and idsec="'.$section_id.'"ORDER BY date DESC LIMIT '.$page.' , '.$count_articles)
            or die("Invalid query: " . mysql_error());
        
        $sql1 = mysql_query('SELECT count(id_page) as count_rows FROM '.$pages_lng.' WHERE id_page <>'.$id_page.' and idsec="'.$section_id.'"')    
            or die("Invalid query: " . mysql_error());
    
        $row1 = mysql_fetch_array($sql1);
        $count_rows = $row1['count_rows'];
    }
    
    $pos = 2;
    
    while($row = mysql_fetch_array($sql))  
    {
        if (!$is_page)
        {
            $out[0] =  stripslashes($row['title']);
            $out[1] =  stripslashes($row['body']);
            $is_page = true;
            continue;
        }
        
        $last_sp = strripos(substr($row['body'], 0, $numchar)," ");
	
        if ($last_sp === false) 
        {
            $last_sp = $numchar;
        }        
        $str = substr($row['body'], 0, $last_sp);
        
        $str = strip_tags(stripslashes($str));
        
        $out[$pos] = $row['title'];
        $out[$pos+1] = $str.' ...&nbsp;<a href="index.php?section_id='.$row['idsec'].'&amp;id_page='.$row['id_page'].'">&gt;&gt;</a>';
        $pos += 2; 
    }
    
    mysql_free_result($sql);
    
    return $out;
}

function get_section_articles($section_id, $id_page)
{
    global $count_rows;
    $out = '';
    $number = 0;    
    $count_articles = get_single_setting('main_section_count_articles');
    $section_massive = get_section_massive_article($section_id, $id_page);

    while ($number<=$count_articles)
    {
        if ($section_massive[$number*2] == '')
            break;

        $out = $out.'<div class="main_sec_preview_title">'.$section_massive[$number*2].'</div><div>'.$section_massive[$number*2+1].'</div>';
        $number++;
    }
    
    if ($number != 0)
    {    
        $out = $out.'<div class="article_pages">';
    
        $page = 1;    
        for ($i = 1; $i < $count_rows; $i++)
        {
            $out = $out.'<a href="index.php?section_id='.(int)$_GET['section_id'].'&page='.$page.'">'.$page.' </a>';
            $i = $i + $count_articles - 1;
            $page++;
        }
        $out = $out.'</div>';
    }
    else
    {
        $out = '<div class="main_sec_preview_title">'.get_localization_string('page_not_found_title').'</div><div>'.get_localization_string('page_not_found').'</div>';    
    }
    
    return $out;
}

function get_tags($tags_count)
{
    global $lang_prefix;
    $sql = mysql_query('SELECT * FROM tags_'.$lang_prefix.' WHERE tag_actual = 1 LIMIT '.$tags_count)
        or die('Invalid query: '.mysql_error());
    
    $ret_row = '<tags>';
    while ($row = mysql_fetch_array($sql))
    {
        $ret_row = $ret_row.'<a href="'.$row['tag_link'].'" style="font-size: 15pt">'.$row['tag_title'].'</a>';
    }    
    
    $ret_row = $ret_row.'</tags>';
    
    mysql_free_result($sql);
    
    return $ret_row; 
}


function get_page_title($id_section_current, $id_page_current, $id_business_full_current)
{
  global $pages_lng;
  global $tbl_lng;
  $ret_str = '';
  
  if(!empty($id_page_current))
  {  
  $sql = mysql_query('SELECT * FROM  '.$pages_lng.'  WHERE id_page ="'.$id_page_current.'" LIMIT 1');

  $row_m = mysql_fetch_array($sql);
  mysql_free_result($sql);
  //если нет тайтла - ставим название рубрики или самой статьи
  if ($row_m['page_title'] != '')
    $title = $row_m['page_title'];
  else
    $title = $row_m['title'];
  
  if ($pages_lng == 'en')  
    $ret_str = '<title>Euro-2012 Donetsk : '.$title.'  </title>'."\n";
  else 
    $ret_str = '<title>'.$title.': Евро-2012 Донецк  </title>'."\n";
   
  $ret_str = $ret_str.'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n".'<meta name="keywords" content="'.$row_m['metakeywords'].'" />'."\n".'<meta name="description" content="'.$row_m['metadescription'].'" />'."\n";  
  }    
  else
  if (!empty($id_section_current))
  {
    $sql = mysql_query('SELECT * FROM  '.$tbl_lng.'  WHERE section_id ="'.$id_section_current.'" LIMIT 1');

    $row_s = mysql_fetch_array($sql);
    
    mysql_free_result($sql);
    
    if ($row_s['page_title'] != '')
        $title = $row_s['page_title'];
    else
        $title = $row_s['section_name'];
    
    $ret_str = '<title>Euro-2012 Donetsk : '.$title.' : Евро-2012 Донецк </title>'."\n";  
	
    $ret_str = $ret_str.'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n".'<meta name="keywords" content="'.$row_s['section_name'].'" />'."\n";      
  }
  else
  if(!empty($id_business_full_current))
  {
	 $sql = mysql_query('SELECT * FROM  '.$tbl_lng.'  WHERE id ="'.$id_business_full_current.'" LIMIT 1');

    $row_s = mysql_fetch_array($sql);
    
    mysql_free_result($sql);
    
    if ($row_s['page_title'] != '')
        $title = $row_s['page_title'];
    else
        $title = $row_s['section_name'];
    
    $ret_str = '<title>Euro-2012 Donetsk : '.$title.' ----: Евро-2012 Донецк </title>'."\n";  
    $ret_str = $ret_str.'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n".'<meta name="keywords" content="'.$row_s['section_name'].'" />'."\n";        
  }
  else
  {  //главная у нас или все остальное
    $ret_str = '<title>Euro-2012 Donetsk : Экономика бизнес инвестиции Медицина туризм сайт города Донецка : англоязычный портал : Евро-Донецк 2012</title>'."\n".'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n";    
  }
  
  return $ret_str;
}

function get_sub_menu_news($section_id)
{
    global $dbtree;
    global $pages_lng;
    $flag = 0;
    $fl = 0;
    $section_level = get_section_level($section_id);
    $pos = 0;
    $sub_count = get_single_setting('section_sub_news_count');
    $numchar = get_single_setting('section_sub_news_text');
    $out = '<div class="sub_menu_title">'.get_localization_string('sub_menu_title').'</div><div class="sub_menu"><ul class="sub_menu_list">';
    
    if ($section_id > 0)
    {     
        $dbtree->Ajar($section_id,array('section_id','section_level','section_name','section_url'),array('and' => array('section_level <> 0','section_actual = 1')));
        while ($item = $dbtree->NextRow()) 
        {
            if ($item['section_level'] == 4)
            {
                $flag = 1;
                if ($item['section_id'] == $section_id)
                    $select_class = 'class="sub_menu_list_select"';
                else
                    $select_class = "";
                    
                if ($item['section_url'] != '')
                {
                    $out = $out.'<li><a '.$select_class.' href="'.$item['section_url'].'">'.$item['section_name'].'</a></li>';
                }
                else
                {
                    $out = $out.'<li><a '.$select_class.' href="index.php?section_id='.$item['section_id'].'">'.$item['section_name'].'</a></li>';
                }
            }
            if ($item['section_level'] > $section_level)
            {
                $mass_sec_id[$pos] = $item['section_id'];
                $pos++;
            }
        }
    }
    if ($flag == 1)
    {
        $out = $out.'</ul></div>';
    }
    else
    {
       $out = ''; 
    }
    if ($pos != 0)
    {    
        $pos = 0;
        $sql = mysql_query('SELECT id_page, idsec, body FROM '.$pages_lng.' WHERE idsec in ('.implode(', ',$mass_sec_id).')')
            or die('Invalid query: '.mysql_error());
        
        $out_s = $out_s.'<div class="sub_menu_preview_title">'.get_localization_string('sub_menu_text_title').'</div>';
        while (($row = mysql_fetch_array($sql))&&($pos < $sub_count))
        {
            preg_match_all("/<img.*?src=[\"|'](.*?)[\"|'].*?>/i",substr($row['body'],0,600),$urlimg);
            $str_img = $urlimg[0][0];
            
            //поменять на превью!!!
            $str_img = str_replace('class="main_sec_image"','class="main_sec_image" width="80" height="80" ',$str_img);            
            //$str_img = substr($str_img, strpos($str_img,"src=")+5, $numchar);
            //$str_img = substr($str_img, 0, strpos($str_img,"\""));           
            
            $str = strip_tags($row['body']);
            $last_sp = strripos(substr($str, 0, $numchar)," ");
	
            if ($last_sp === false) 
            {
                $last_sp = $numchar;
            }        
            $str = substr($str, 0, $last_sp);            
        
            if ($str_img != '')
            {
                $out_s = $out_s.'<div class="sub_menu_preview">'.$str_img.$str.' ...&nbsp;<a href="index.php?section_id='.$row['idsec'].'&amp;id_page='.$row['id_page'].'">&gt;&gt;</a></div>';
                //$out_s = $out_s.'<div class="sub_menu_preview"><img class="main_sec_image" src="'.$str_img.'?w=80&amp;h=80" alt="" />'.$str.' ...&nbsp;<a href="index.php?section_id='.$row['idsec'].'&amp;id_page='.$row['id_page'].'">&gt;&gt;</a></div>';
            }
            else
            {
                $out_s = $out_s.'<div class="sub_menu_preview">'.$str.' ...&nbsp;<a href="index.php?section_id='.$row['idsec'].'&amp;id_page='.$row['id_page'].'">&gt;&gt;</a></div>';
            }
            $pos++;
            $fl++;
        }
        if ($fl == 0)
            $out_s = '';
    
        mysql_free_result($sql);
    }
    return $out.$out_s;
}

function get_business_sections($section_id)
{
    global $dbtree;
    $out = '<div id="business_block">';    
    $sect_4 = 0;
    
    $dbtree->Branch($_GET['section_id'] , array('section_id', 'section_name', 'section_level'),array('and' => array('section_level > 2')));
    while ($item = $dbtree->NextRow())
    {
        if (($item['section_level'] == 3)&&($sect_4 == 1))
        {
            $out = $out.'</div>';
            $sect_4 = 0;
        }
        if (($item['section_level'] == 3))
        {
            $out = $out.'<div class="business_title"><a href="index.php?section_id='.$item['section_id'].'&amp;business=2">'.$item['section_name'].'</a></div><div class="business_list">';            
        }
        if (($item['section_level'] == 4))
        {
            $out = $out.'<a href="index.php?section_id='.$item['section_id'].'&amp;business=2">'.$item['section_name'].'</a><br />';
            $sect_4 = 1;
        }        
    }
    
    $out = $out.'</div></div>';
    
    return $out;
}

function get_alphabet($section_id, $get_n)
{
    global $ch_alpha;
    $out = '';
    $alphabet_ru = array("","А","Б","В","Г","Д","Е","Ж","З","И","Й","К","Л","М","Н","О","П","Р","С","Т","У","Ф","Х","Ц","Ч","Ш","Щ","Ъ","Ы","Ь","Э","Ю","Я");
    $alphabet_re = array("","ra","rb","rv","rg","rd","re","rj","rz","ri","ry","rk","rl","rm","rn","ro","rp","rr","rs","rt","ru","rf","rh","rc","rch","rsh","rsch","rtz","riy","rmz","ree","ryu","rya");
    $alphabet_en = array("","A","B","C","D","E","F","G","H","I","K","L","M","N","O","P","Q","R","S","T","V","X","Y","Z");
    $key = array_search($get_n, $alphabet_re);
    
    if ($key)
        $ch = $alphabet_ru[$key];
    else
    {
        $string = strtoupper($get_n);
        $key = array_search($string, $alphabet_en);
	if ($key)
            $ch = $alphabet_en[$key];
    }

    $out = $out.'<div class="alpha_ru">';

    for ($i=1;$i<33;$i++)
    {
        if ($alphabet_ru[$i] <>  $ch)
            $out = $out.'<div class="alpha_item"><a href="index.php?section_id=' . $section_id . '&amp;business=2&amp;n=' . strtolower($alphabet_re[$i]) . '" >' . $alphabet_ru[$i] . '</a></div>';
        else
        {
            $out = $out.'<div class="alpha_item"><a href="index.php?section_id=' . $section_id . '&amp;business=2&amp;n=' . strtolower($alphabet_re[$i]) . '" style="color: #EC5D0E;">' . $alphabet_ru[$i] . '</a></div>';
            $ch_alpha = $alphabet_ru[$i];
        }
    }
    $out = $out.'</div>';				

    $out = $out.'<div class="alpha_en">';

    for ($i=1;$i<24;$i++)
    {
        if ($alphabet_en[$i] <>  $ch)
            $out = $out.'<div class="alpha_item"><a href="index.php?section_id=' . $section_id . '&amp;business=2&amp;n=' . strtolower($alphabet_en[$i]) . '" >' . $alphabet_en[$i] . '</a></div>';
        else
        {
            $out = $out.'<div class="alpha_item"><a href="index.php?section_id=' . $section_id . '&amp;business=2&amp;n=' . strtolower($alphabet_en[$i]) . '"  style="color: #EC5D0E;">' . $alphabet_en[$i] . '</a></div>';
            $ch_alpha = $alphabet_en[$i];    
        }
    }
    $out = $out.'</div>';		

    return $out;
}

function get_enterprise($section_id)
{
    global $ch_alpha;
    global $dbtree;
    global $lang_prefix;
    
    $out = '';
    $level = get_section_level($section_id);
    $pos = 0;
  
    if ($ch_alpha != '')
        $alpha_where = ' and name like "'.$ch_alpha.'%" ';
    else
        $alpha_where = '';
    
    if ($level == 3)
    {
        $dbtree->Branch($_GET['section_id'] , array('section_id', 'section_level'),array('and' => array('section_level > 3')));
        while ($item = $dbtree->NextRow()) 
        {
            $mass[$pos] = $item['section_id'];
            $pos++;    
        }
        
        $sql = mysql_query('SELECT name, logo, link, ind, city, street, house, email, tel, www FROM catalogue_'.$lang_prefix.' WHERE idsec1 in ('.implode(', ',$mass).') '.$alpha_where.' ORDER BY order_s, name')
        or die('Invalid query: '.mysql_error());
    }
    else
    {
        $sql = mysql_query('SELECT name, logo, link, ind, city, street, house, email, tel, www FROM catalogue_'.$lang_prefix.' WHERE idsec1 = ('.$section_id.') '.$alpha_where.' ORDER BY    order_s, name')
        or die('Invalid query: '.mysql_error());
    }
    
    while ($row = mysql_fetch_array($sql))
    {
        $out = $out.'<div class="catalogue_item">';

        if ($row['logo'])
            $out = $out.'<div><img class="bus_sec_image" src="' . $row['logo'] . '" width="60" height="60" border="0" alt=""></div>';
        else
            $out = $out.'<div><img class="bus_sec_image" src="../images/catalogue_logo.gif" width="60" height="60" border="0" alt=""></div>';
    
        $out = $out.'  <div class="catalogue_h">';
    
        if ($row['link'])
            $out = $out.'<a href="' . $row['link'] . '">' . stripslashes($row['name']) . '</a>';
        else
            $out = $out.$row['name'];

        $out = $out.'</div><div class="catalogue_txt"><div>';

        if (trim($row['ind']) <> "")
           $out = $out.$row['ind'] .", ";

        if (trim($row['city']) <> "")
           $out = $out.$row['city'] .", ";

        if (trim($row['street']) <> "")
           $out = $out.$row['street'] .", ";

        if (trim($row['house']) <> "")
           $out = $out.$row['house'];

        $out = $out."</div><div>";


        if (trim($row['email']) <> "")
            $out = $out."E-mail: " . $row['email'];
        
        if (trim($row['tel']) <> "")
            $out = $out.'<br>'.$row['tel'];

        $out = $out.'</div><div>';

        if (trim($row['www']) <> "")
            $out = $out.$row['www'];

        $out = $out.'</div></div></div>';
    }    
    mysql_free_result($sql);
   
    return $out;
}

function GetRealIp()
{
 /*if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
 {
   $ip=$_SERVER['HTTP_CLIENT_IP'];
 }
 elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
 {
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
 }
 else
 {
   $ip=$_SERVER['REMOTE_ADDR'];
 }*/
 return $_SERVER['REMOTE_ADDR'];
}

function check_for_black($ip)
{
    $sql = mysql_query('SELECT id FROM black_list WHERE ip = "'.$ip.'"')
        or die('Invalid query: '.mysql_error());
        
    if ($row = mysql_fetch_array($sql))
    {
        mysql_free_result($sql);
        return 1;
    }
    else
    {
        mysql_free_result($sql);
        return 0;
    }
}

function get_search_results($string_search, $page, $search_in_bus)
{
    global $pages_lng;
    global $tbl_lng;
    global $dbtree;
    global $lang_prefix;
    $string_search_orig = $string_search;
    $result = '';
    $page = (int)$page;
    
    $search_in_bus1 = 1;
    
    if (!empty($search_in_bus))   
    if ($search_in_bus == 'on')
        $search_in_bus1 = 0;
        
    if ($search_in_bus === 0)
        $search_in_bus1 = 1;
    

    $alphabet_ru = array("А","Б","В","Г","Д","Е","Ж","З","И","Й","К","Л","М","Н","О","П","Р","С","Т","У","Ф","Х","Ц","Ч","Ш","Щ","Ъ","Ы","Ь","Э","Ю","Я");
    $alphabet_re = array("ra","rb","rv","rg","rd","re","rj","rz","ri","ry","rk","rl","rm","rn","ro","rp","rr","rs","rt","ru","rf","rh","rc","rch","rsh","rsch","rtz","riy","rmz","ree","ryu","rya");
    $alphabet_en = array("","A","B","C","D","E","F","G","H","I","K","L","M","N","O","P","Q","R","S","T","V","X","Y","Z");
      
    $search = array ("'<script[^>]*?>.*?</script>'si",  // Вырезает javaScript
        "'<[\/\!]*?[^<>]*?>'si",           // Вырезает HTML-теги
        "'([\r\n])[\s]+'",                 // Вырезает пробельные символы
        "'&(quot|#34);'i",                 // Заменяет HTML-сущности
        "'&(amp|#38);'i",
        "'&(lt|#60);'i",
        "'&(gt|#62);'i",
        "'&(nbsp|#160);'i",
        "'&(iexcl|#161);'i",
        "'&(cent|#162);'i",
        "'&(pound|#163);'i",
        "'&(copy|#169);'i",
        "'&#(\d+);'e");                    // интерпретировать как php-код
    $replace = array ("",
        "",
        "\\1",
        "\"",
        "&",
        "<",
        ">",
        " ",
        chr(161),
        chr(162),
        chr(163),
        chr(169),
        "chr(\\1)");
    
    if ($search_in_bus1)
    {
        $m_pos = 0;
        $dbtree->branch(2 , array('section_id', 'section_name', 'section_level'));
        while ($item = $dbtree->NextRow()) 
        {
            $m_list[$m_pos] = $item['section_id'];
            $m_pos++;    
        }
        if ($m_pos != 0)
          $str_wh = implode(', ',$m_list);
    }
    
    $string_search = preg_replace($search, $replace, $string_search);
    if (strlen($string_search) <= 3)
    {
        echo get_localization_string('search_error');
        return;
    }
    $string_search = mysql_real_escape_string($string_search); 
    
    echo '<div class="search_prev"><div class="search_prev_d">'.get_localization_string('search_text').'&nbsp;</div><div class="search_prev_t">"'.stripslashes($string_search).'"</div></div><div class="search_main_p"><a href="index.php?search_str='.stripslashes($string_search).'&amp;special=on">'.get_localization_string('search_dest').'</a></div>';
    
    if ($search_in_bus1)
    {
    $sql = mysql_query("SELECT count(cm.id) as count_rows FROM catalogue_".$lang_prefix." cm inner join sections_".$lang_prefix." sr on sr.section_id = cm.idsec1 WHERE cm.name LIKE '%".$string_search."%' or sr.section_name LIKE '%".$string_search."%'")    
    	or die("Invalid query: " . mysql_error());
    }
    else
    {
    $sql = mysql_query("select count(id_page) as count_rows
                            from 

                            (select id_page
                            from ".$pages_lng." 
                            WHERE MATCH (title,body,metakeywords) AGAINST ('".$string_search."')
                            
                            union
                            
                            select id_page
                            from ".$pages_lng." 
                            WHERE (body LIKE '%".$string_search."%' OR title LIKE '%".$string_search."%' OR metakeywords LIKE '%".$string_search."%') and id_page not in (select id_page from ".$pages_lng." WHERE MATCH (title,body,metakeywords) AGAINST ('".$string_search."'))
                            ) as res");
    }
    $row = mysql_fetch_array($sql);
    $count_rows = $row['count_rows'];
    
    mysql_free_result($sql);

    if ($page != 0)
        $page = ($page - 1) * 15;
        
    $i_s = $page;

    // echo "CREATE TEMPORARY TABLE temp_search(idsec int, id_page int, title varchar(255), body text); insert into temp_search (select idsec, id_page, title, body from ".$pages_lng." WHERE (body LIKE '%".$string_search." %' OR title LIKE '%".$string_search." %' OR metakeywords LIKE '%".$string_search." %')); insert into temp_search (select idsec, id_page, title, body from ".$pages_lng." WHERE (body LIKE '%".$string_search."%' OR title LIKE '%".$string_search."%' OR metakeywords LIKE '%".$string_search."%' and body not LIKE '%".$string_search." %' OR title not LIKE '%".$string_search." %' OR metakeywords not LIKE '%".$string_search." %')); select * from temp_search LIMIT ".$page." , 15;".'<br>';
    if ($search_in_bus1)
    {
        $sql = mysql_query("SELECT * from search_matches where matches like '% ".$string_search." %'")    
    	or die("Invalid query: " . mysql_error());
                
        $ss_t = '';
        
        if ($row = mysql_fetch_array($sql))
        {
            $keywords = split (" ", $row['matches']);
            foreach ($keywords as $key)
                if ($key != "")
                    if ($ss_t == '')
                        $ss_t = $ss_t." cm.name LIKE '%".$key."%' or sr.section_name LIKE '%".$key."%'";
                    else
                        $ss_t = $ss_t." or cm.name LIKE '%".$key."%' or sr.section_name LIKE '%".$key."%'"; 
        }
        else
            $ss_t = "cm.name LIKE '%".$string_search."%' or sr.section_name LIKE '%".$string_search."%'";
        
    $sql = mysql_query("SELECT name, idsec1, section_name FROM catalogue_".$lang_prefix." cm inner join sections_".$lang_prefix." sr on sr.section_id = cm.idsec1 WHERE in_search = 1 and ".$ss_t." ORDER BY order_s, name")    
    	or die("Invalid query: " . mysql_error());
    }
    else
    {
        $sql = mysql_query("select *, (char_length(res.body) - char_length(REPLACE(res.body,'".$string_search."',''))) div  char_length('".$string_search."') as count_substr
                            from 

                            (select idsec, id_page, title, body, 0 as full_compare
                            from ".$pages_lng." 
                            WHERE MATCH (title,body,metakeywords) AGAINST ('".$string_search."')
                            
                            union
                            
                            select idsec, id_page, title, body, 1 as full_compare
                            from ".$pages_lng." 
                            WHERE (body LIKE '%".$string_search."%' OR title LIKE '%".$string_search."%' OR metakeywords LIKE '%".$string_search."%') and id_page not in (select id_page from ".$pages_lng." WHERE MATCH (title,body,metakeywords) AGAINST ('".$string_search."'))
                            ) as res                             
                            ORDER BY full_compare, count_substr DESC
                            LIMIT ".$page." , 15")
  	or die("Invalid query: " . mysql_error());
    }
    
    while($row = mysql_fetch_array($sql))
    {      
    // Необходимо удалить все HTML-теги, секции javascript, пробельные символы. 
        if ($search_in_bus1)
        {
            $i_s++;
            $text = preg_replace($search, $replace, $row['name']);

            if ($lang_prefix == 'ru')
            {
                $key = array_search(substr($text, 0, 2), $alphabet_ru);
                $ch = $alphabet_re[$key]; 
            }
            else
            {
                $key = array_search(substr($text, 0, 1), $alphabet_en);
                $ch = $alphabet_en[$key]; 
            }
            echo '<div class="search_main"><div class="search_link">'.$i_s.".&nbsp;<a href=index.php?section_id=".$row['idsec1']."&amp;business=2&amp;n=".$ch.">".stripslashes($row["name"]).' ('.stripslashes($row["section_name"]).')</a></div></div>';            
        }
        else
        {
        $text = preg_replace($search, $replace, $row['body']);        
	$search_count = substr_count($text, stripslashes($string_search)); //число вхождений	
	$search_pos = strpos($text, $string_search); //позиция первого вхождения
        $search_count++;
	if ($search_count > 0)
	{
            
            $i_s++;
            
            $last_sp = strripos(substr($text, $search_pos, 200)," ");
	
            if ($last_sp === false) 
            {
                $last_sp = $numchar;
            }        
            $search_txt = substr($text, $search_pos, $last_sp);
            //$search_txt = str_replace(stripslashes($string_search),"<b>".stripslashes($string_search)."</b>",$search_txt);
            $search_count--;
            echo '<div class="search_main"><div class="search_link">'.$i_s.".&nbsp;<a href=index.php?section_id=".$row['idsec']."&id_page=".$row['id_page'].">".stripslashes($row["title"]).'</a></div><div class="search_matches">'.get_localization_string('search_matches').'&nbsp;'.$search_count."</div>";
            echo '<div class="search_comment">'.get_localization_string('search_text_s').'</div><div class="search_text">'.$search_txt.'</div></div>';
	}
        }
    };
    
    echo '<div class="search_pages">';
    $page = 1;
    for ($i = 1; $i < $count_rows; $i++)
    {
        if ($search_in_bus1)
        {
            echo '<a href="index.php?search_str='.$string_search_orig.'&page='.$page.'&amp;special=1">'.$page.' </a>';
        }
        else        
            echo '<a href="index.php?search_str='.$string_search_orig.'&page='.$page.'">'.$page.' </a>';
        $i = $i + 14;
        $page++;
    }
    echo '</div>';
    
    mysql_free_result($sql);
}

function show_rss($rss)
{
    $f_rss_xml = get_rss_setting((int)$rss);
    $count = get_single_setting('rss_count');
    $current = 0;

    if (file_exists($f_rss_xml))
    {
        $rss_xml = simplexml_load_file($f_rss_xml);
        
        foreach ($rss_xml->channel->item as $item)
        {
            if ($current >= $count)
                break;            
            
            if ($item->enclosure['type'] == 'image/jpeg')
            {
                $img = '<div><img class="rss_sec_image" src="'.$item->enclosure['url'].'" /></div>';
                $body_class = 'rss_preview_body_i';
            }
            else
            {
                $img = '';
                $body_class = 'rss_preview_body';
            }
            
            echo '<div class="rss_preview_title">'.$item->title.'</div><div class="'.$body_class.'">'.$img.$item->description.'</div><div class="rss_preview_link"><a href="'.$item->link.'">&gt;&gt;</a></div>';

            $current++;
        }                              
    }
}

?>