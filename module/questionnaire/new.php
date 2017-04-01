<?php
require_once('../../core/ac_boot.php');
if(!$currmodule->is_admin()){
	/*$currtpl->assign("msg","你沒有權限");
	$currtpl->display("msg.tpl.html");
	exit();*/
	redirect(URL_ROOT_PATH."/login.php?redirect_path=".URL_ROOT_PATH."/module/questionnaire/");
	exit();
}

$query = "INSERT INTO `ques_form`(`title`,`description`) VALUES('點此輸入問卷標題','')";
$currdb->sql_query($query);
$qid = mysql_insert_id();

redirect("edit.php?qid=".$qid);

?>
