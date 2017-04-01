<?php
require_once('fckeditor/fckeditor.php');
require_once('../../core/ac_boot.php');
if(!$currmodule -> is_admin())
	exit();
	
$currtpl -> display('upload.tpl.htm');
?>