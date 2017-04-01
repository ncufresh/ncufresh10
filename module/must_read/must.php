<?php
require_once('../../core/ac_boot.php');

// --use intval
$num = intval($_GET['num']);
if($num <= 0)
	exit();
	
$sql = $currdb -> sql_query("SELECT `Key`, `num`, `title`, `content` FROM `must_read` WHERE `num` = '".$num."' ORDER BY `Key` ASC");

$must_2D = array();
while($row = $currdb -> sql_fetch_array($sql))
{
	array_push($must_2D, $row);
}

$i = 0;
while(1)
{
	if(mb_strlen($must_2D[$i]['title'], 'UTF-8') > 14)
	{
   		$must_2D[$i]['title'] = mb_substr($must_2D[$i]['title'], 0, 14, 'UTF-8') . "...";
	}
	$i += 1;
	if($must_2D[$i]==NULL)
		break;
}

$currtpl -> assign('num', $num);
$currtpl -> assign('must_2D', $must_2D);

$currtpl -> display('must.tpl.htm');
?>