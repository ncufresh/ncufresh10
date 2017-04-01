<?php
require_once('../../core/ac_boot.php');
$key = $_GET['key'];
$sam = $_GET['samname'];
$table = $_GET['table'];
$result = $currdb -> sql_query("SELECT * FROM map_contentlist WHERE `key` = '$key'");
$result_table = $currdb -> sql_query("SELECT * FROM map_contentlist WHERE `key` = '$table'");
$row = $currdb -> sql_fetch_array($result);
$table = $currdb -> sql_fetch_array($result_table);
$content['sample'] = $sam;
$content['table'] = $table['content'];
$content['text'] = $row['content'];
$currtpl -> assign('content', $content);
$currtpl -> display('building_nojs_showcontent.tpl.htm');
?>