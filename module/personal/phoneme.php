<?php
  require_once('../../core/ac_boot.php');
if($curruser->is_login())
{
  redirect('sendmail.php?what=NcuFresh10');
}
else
{
  redirect(URL_ROOT_PATH."/login.php?redirect_path=".URL_ROOT_PATH."/module/personal/sendmail.php?what=NcuFresh10");	
}
?>