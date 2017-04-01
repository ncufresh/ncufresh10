<?php
require_once('../../core/ac_boot.php');

$currdb->sql_query("DELETE FROM `reg_user` WHERE `uid` = '".$_GET['uid']."' AND doc_id = '".$_GET['did']."'");
redirect("opt_check.php?id=".$_GET['did']."");
?>
