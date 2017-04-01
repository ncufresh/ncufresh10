<?php
require_once("../../core/ac_boot.php");
$aid = intval($_GET['aid']);
if($aid>0 and $aid<37)
{
	$source = mysql_query("select * from `life_life` where `aid`=".$aid."");
	$row = mysql_fetch_row($source);
	$result = mysql_query("select * from `life_bar` where `key`=".$row[2]."");
	$row1 = mysql_fetch_row($result);
	$currtpl -> assign('data',$row[1]);
	$currtpl -> assign('bar_top',$row1[1]);
	$currtpl -> assign('bar_bottom',$row1[2]);
	$currtpl -> display('view.tpl.htm');
}
?>