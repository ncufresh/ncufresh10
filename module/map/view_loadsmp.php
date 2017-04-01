<?php
require_once('../../core/ac_boot.php');
$fname = $_GET['fname'];
$currtpl -> assign('name', $fname);
$currtpl -> set_display(false);
$currtpl -> display('view_showsmp.tpl.htm');
?>