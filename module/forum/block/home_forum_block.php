<?php
if(!defined('AC_INCLUDED'))
{
	exit();
}

$block_var = array();

global $currdb, $currmodule;

// Step1. forum article data source
$forum_src = $currdb -> sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON `forum`.`uid`=`ac_user`.`uid` WHERE `forum`.`grid`=0 ORDER BY `datatime_order` DESC LIMIT 0,7");
$block_var['forum_array'] = array();
while($forum_processing = $currdb -> sql_fetch_array($forum_src))
{
	//$forum_processing['datatime'] = date("Y-m-d", $forum_processing['datatime']);
	if(mb_strlen($forum_processing['title'], 'UTF-8') > 12)
	{
		$forum_processing['title'] = mb_substr(html_eliminate($forum_processing['title']), 0, 12, 'UTF-8') . "...";
	}
	array_push($block_var['forum_array'], $forum_processing);
}

?>
