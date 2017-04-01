<?php
require_once("../../core/ac_boot.php");
if(!$currmodule->is_admin()){
	/*$currtpl->assign("msg","你沒有權限");
	$currtpl->display("msg.tpl.html");	
	exit();*/
	redirect(URL_ROOT_PATH."/login.php?redirect_path=".URL_ROOT_PATH."/module/questionnaire/");
	exit();
}
//刪除整份問卷
$query = "DELETE `ques_form`,`ques_topic`,`ques_option` FROM `ques_form` LEFT JOIN `ques_topic` ON `ques_form`.`qid`=`ques_topic`.`qid` LEFT JOIN `ques_option` ON  `ques_topic`.`tid` = `ques_option`.`tid`  WHERE `ques_form`.`qid` = '".$_GET['qid']."' ";
//echo $query;
$currdb->sql_query($query);
redirect("index.php");
?>
