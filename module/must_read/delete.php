<?php
require_once('../../core/ac_boot.php');

if(!$currmodule->is_admin())
	exit();
	
$Key = intval($_GET['Key']);
$num = intval($_GET['num']);
if($Key <=0 || $num <= 0)
	exit();

$sql = $currdb -> sql_query("SELECT * FROM `must_read` WHERE `Key` = '".$Key."'");

$must_2D = array();
while($row = $currdb -> sql_fetch_array($sql))
{
	array_push($must_2D, $row);
}

$currtpl -> assign('Key', $Key);
$currtpl -> assign('num', $num);
$currtpl -> assign('must_2D', $must_2D);

$currtpl -> display('delete.tpl.htm');
?>