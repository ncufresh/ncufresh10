<?php
require_once('../../core/ac_boot.php');
$key = $_GET['key'];
$result = $currdb -> sql_query("SELECT * FROM map_contentlist WHERE `key` = '$key'");
$row = $currdb -> sql_fetch_array($result);
$currtpl -> assign('content', $row['content']);
$currtpl -> set_display(false);
$currtpl -> display('showcontent.tpl.htm');
?>