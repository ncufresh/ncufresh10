<?php
require_once('../../core/ac_boot.php');
if($_GET['msg'] == "edit")
{
	$result_tem = array();
	$result = $currdb->sql_query("SELECT * FROM `reg_spirit` WHERE `doc_id` = '".$_GET['did']."'");
	while($data = $currdb->sql_fetch_array($result))
	{
   		array_push($result_tem, $data);
	}
	$currtpl -> assign('did', $_GET['did']);
	$currtpl -> assign('default', $result_tem);
	$currtpl -> display('edit.tpl.htm');
}

if($_GET['msg'] == "del")
{
	$currdb->sql_query("DELETE FROM `reg_spirit` WHERE `doc_id` = '".$_GET['did']."'");
	redirect("index.php");	
}
?>