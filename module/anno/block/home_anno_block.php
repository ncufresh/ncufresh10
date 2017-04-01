<?php
if(!defined('AC_INCLUDED'))
{
	exit();
}

$block_var = array();

global $currdb, $currmodule;

// Step1. Announcement data source
$anno_src = $currdb -> sql_query("SELECT * FROM `anno_topics` ORDER BY `datetime` DESC LIMIT 0,7");
$block_var['anno_array'] = array();
while($anno_processing = $currdb -> sql_fetch_array($anno_src))
{
	$anno_processing['datetime'] = date("Y-m-d", $anno_processing['datetime']);
	
	array_push($block_var['anno_array'], $anno_processing);
}

?>