<?php
if(!defined('AC_INCLUDED'))
{
	exit();
}
global $currdb,$currtpl,$curruser;
$mail_source = $currdb->sql_query("SELECT * FROM `fw10_mailbox` WHERE `receiver_uid`='".$curruser->uid."' AND `is_read`='1'");
$block_var = array();
$block_var['much'] = $currdb -> sql_num_rows($mail_source);
?>