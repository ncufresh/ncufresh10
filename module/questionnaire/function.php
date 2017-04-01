<?php

require_once("../../core/ac_boot.php");

function has_answered($uid,$qid){
	global $currdb;	
	$query = "SELECT * FROM `ques_has_answered` WHERE `uid` = '".$uid."' AND  `qid` = '$qid'";
	$source = $currdb->sql_query($query);
	if($currdb->sql_num_rows($source) == 0){
		return false;
	}
	else{
		return true;
	}
}






?>
