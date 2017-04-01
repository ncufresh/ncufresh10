<?php
require_once('../../core/ac_boot.php');
// step.1-1 check login
if($curruser->is_login())
{
	$persource=$currdb->sql_query("SELECT * FROM `ac_user` WHERE `uid` = '".intval($_GET['uid'])."'");
    $perdata_arr = $currdb->sql_fetch_array($persource);
    $perdata_arr['self_intro'] = nl2br($perdata_arr['self_intro']);
    $perdata_arr = htmlencode($perdata_arr);
  $currtpl -> assign('perdata',$perdata_arr);
  $currtpl -> display('perdata.tpl.htm');	
}
// step.1-2 GO OUT
else
{
   exit();	
}
