<?php
require_once('../../core/ac_boot.php');

// Step1. List all announcements
$anno_src = $currdb -> sql_query("SELECT * FROM `anno_topics` ORDER BY `datetime` DESC");
$anno_array = array();
while($anno_processing = $currdb -> sql_fetch_array($anno_src))
{
	$anno_processing['datetime'] = date("Y-m-d H:i:s", $anno_processing['datetime']);
	
	array_push($anno_array, $anno_processing);
}
$currtpl -> assign('anno_array', $anno_array);

// Step2. assign the corresponded system message
switch($_GET['action'])
{
	case "insert_success":
		$currtpl -> assign('warning_msg', "公告已新增");
		break;
		
	case "update_success":
		$currtpl -> assign('warning_msg', "公告已更新");
		break;
		
	case "delete_success":
		$currtpl -> assign('warning_msg', "公告已刪除");
		break;
}

// Step3. Output the template
$currtpl -> display('list_anno.tpl.htm');
?>