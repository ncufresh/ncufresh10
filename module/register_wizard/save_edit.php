<?php
require_once('../../core/ac_boot.php');
$currdb->sql_query("UPDATE `reg_spirit` SET `doc_name` = '".$_POST['name']."', `doc_content` = '".$_POST['content']."', `date_begin` = '".$_POST['date_begin']."', `date_ending` = '".$_POST['date_ending']."' WHERE `doc_id` = '".$_POST['did']."'");

redirect("opt_check.php?id=".$_POST['did']."");
?>
