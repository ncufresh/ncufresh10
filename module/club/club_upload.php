<?php
require_once('../../core/ac_boot.php');
$source=$currdb->sql_query("SELECT * FROM `club_upload`");
$iflogin=$curruser -> is_login();
if($curruser -> is_login())
{
   while($date = $currdb -> sql_fetch_array($source))
   {
      $id = $curruser->getuser_array_by_uid($date['uid']);
      $date['username']= $id['username'];
   }
}
$currtpl->assign('iflogin', $iflogin);
$currtpl->assign('date', $date);
$currtpl->display('club_upload.tpl.htm');
?>