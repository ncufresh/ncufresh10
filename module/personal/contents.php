<?php
require_once('../../core/ac_boot.php');
if ($_GET['read'] == 0)
{
  $read = $currdb->sql_query("UPDATE `fw10_mailbox` SET `is_read`='".$_GET['read']."' WHERE `mid`='".$_GET['mid']."'");
}
$contents_source = $currdb->sql_query("SELECT `fw10_mailbox`.*,`ac_user`.`username` FROM `fw10_mailbox` LEFT JOIN `ac_user` ON `fw10_mailbox`.`sender_uid` = `ac_user`.`uid` WHERE `mid` = '".$_GET['mid']."'");
$contents_arr = $currdb->sql_fetch_array($contents_source);

$contents_arr['title'] = htmlencode($contents_arr['subject']);
$contents_arr['contents'] = htmlencode($contents_arr['contents']);

$currtpl -> assign('where',$_GET['where']);
$currtpl -> assign('read',$read);
$currtpl -> assign('contents', $contents_arr);
$currtpl -> display('contents.tpl.htm');
?>
