<?php
require_once ('db_settings.php');   // файл с настройками

require_once('db_mysql.class.php');
$db = new db($hostname, $username, $password, $dbName);
$sql = 'SET NAMES utf8 COLLATE utf8_general_ci';
$db->Execute($sql);

unset($password, $username);
?>