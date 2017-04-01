<?php
require_once('../../core/ac_boot.php');
if($curruser->is_guest())
{
   exit();	
}
else
{
		$mail_source = $currdb->sql_query("SELECT `fw10_mailbox`.*,`ac_user`.`username` FROM `fw10_mailbox` LEFT JOIN `ac_user` ON `fw10_mailbox`.`sender_uid` = `ac_user`.`uid` WHERE `receiver_uid` = '".$curruser->uid."' AND `is_read` = '1' ORDER BY `datetime` DESC");
		$unread_mail_2D=array();
		$much = $currdb -> sql_num_rows($mail_source);
		while($mail_array = $currdb->sql_fetch_array($mail_source))
		{
		    $mail_array['subject'] = strip_tags($mail_array['subject']);
            $mail_array['subject'] = mb_substr($mail_array['subject'], 0, 20, 'UTF-8');
            //$mail_array['subject'] .= "...";
		    $mail_array['subject'] = htmlencode($mail_array['subject']);
            $mail_array['contents'] = htmlencode($mail_array['contents']);
			$mail_array['datetime'] = date ("Y-m-d", $mail_array['datetime']);
			array_push($unread_mail_2D, $mail_array);
		} 
        $currtpl -> assign('much', $much);
		$currtpl -> assign('mail_arr', $unread_mail_2D);
		$currtpl -> display('unreadmail.tpl.htm');
}
?>
