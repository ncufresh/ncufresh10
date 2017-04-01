<?php
require_once('../../core/ac_boot.php');
if($curruser->is_guest())
{
   //exit();
    redirect(URL_ROOT_PATH."/login.php?redirect_path=".urlencode(URL_ROOT_PATH."/module/personal/sendmail.php?what=".$_GET['what']));
}
else
{
  $mail_source = $currdb->sql_query("SELECT `fw10_mailbox`.*,`ac_user`.`username` FROM `fw10_mailbox` LEFT JOIN `ac_user` ON `fw10_mailbox`.`sender_uid` = `ac_user`.`uid` WHERE `receiver_uid` = '".$curruser->uid."' AND `is_read` = '1' ORDER BY `datetime` DESC");
  $unread_mail_2D=array();
  $much = $currdb -> sql_num_rows($mail_source);
  $currtpl -> assign('post_rec',$_GET['what']);
  $currtpl -> assign('much', $much);
  $currtpl -> display('sendmail.tpl.htm');
}
?>
