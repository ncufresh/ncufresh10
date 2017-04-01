<?php
require_once('../../core/ac_boot.php');
$key = $_GET['key'];
$sam = $_GET['samname'];
$result = $currdb -> sql_query("SELECT * FROM map_contentlist WHERE `key` = '$key'");
$row = $currdb -> sql_fetch_array($result);
$content['sample'] = $sam;
$content['text'] = $row['content'];
$currtpl -> assign('content', $content);
$currtpl -> display('view_nojs_showcontent.tpl.htm');
?>