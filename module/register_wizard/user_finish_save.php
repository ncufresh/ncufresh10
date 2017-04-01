<?php
require_once('../../core/ac_boot.php');
$result = $currdb->sql_query("SELECT * FROM `reg_user` WHERE `doc_id` = '".$_GET['did']."' AND `uid` = '".$_GET['uid']."'");

$check_have = 0;
while($data=$currdb->sql_fetch_array($result))
{
	$check_have = $data['is_finished'];
}

if($check_have == 1)
{
	$currdb->sql_query("UPDATE `reg_user` SET `is_finished` = 1 WHERE `doc_id` = '".$_GET['did']."' ADN `uid` = '".$_GET['uid']."'");
}

else
{
	$currdb->sql_query("INSERT INTO `reg_user` (uid,doc_id,is_finished) VALUES('".$_GET['uid']."', '".$_GET['did']."',1)");
}

redirect("opt_check.php?id=".$_GET['did']."");
?>