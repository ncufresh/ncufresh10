<?php
require_once('../../core/ac_boot.php');
if ($curruser->username=="root")
{
	$fif_source = $currdb->query("SELECT * from `tree` where `special` >15 ORDER BY `uid`");
	$fif_2D =array();
	while($fif_processing_array = $currdb->sql_fetch_array($fif_source))
	{
		array_push($fif_2D, $fif_processing_array);
	}
	$same_source = $currdb->query("SELECT `tree`.`uid` , `tree`.`special` , `ac_user`.`username` FROM `tree`	LEFT JOIN `ac_user` ON `tree`.`uid` = `ac_user`.`uid`	WHERE `tree`.`special` >15	ORDER BY `tree`.`special` DESC");
	$same_2D =array();
	while($same_processing_array = $currdb->sql_fetch_array($same_source))
	{
		array_push($same_2D, $same_processing_array);
	}
	$currtpl -> assign('fif',$fif_2D);
	$currtpl -> assign('same',$same_2D);
    $currtpl -> display('showtree.tpl.htm');
}
else
{
    exit();	
}
?>