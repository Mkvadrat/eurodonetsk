<?php
require_once ('dbconnect.inc');          // создаём подключение к базе данных 
require_once ('functions.php');          // подключаем файл с функциями

$weather_url = get_single_setting('url_weather');
$nbu_url = get_single_setting('url_nbu');

$weather_xml = '../'.get_single_setting('xml_weather_link');
$nbu_xml = '../'.get_single_setting('xml_nbu_link');

function download($filename, $url)
{
    //$url = urlencode($url);

    $file = file_get_contents($url);

    if ($file)
        file_put_contents($filename, $file);
    else
    {
    //    echo 'Update faild<br>';
    }
}

function update($xml,$url)
{
    if (file_exists($xml))
    {
        unlink($xml);    
    }

    download($xml,$url);
}

update($weather_xml, $weather_url);
update($nbu_xml, $nbu_url);

$sql = mysql_query('select * from rss where actual = 1')
    or die('Invalid query: '.mysql_error());
   
while ($row = mysql_fetch_array($sql))
{    
   update('../'.$row['rss_string'], $row['link']); 
}
    
mysql_free_result($sql);
?>