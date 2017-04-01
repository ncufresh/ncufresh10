<?php
require_once('../../core/ac_boot.php');
//print_r($_POST);
extract($_POST,EXTR_SKIP);

if(!$currmodule->is_admin()){
	echo "你沒有權限";
	exit();
}

$query = "UPDATE `ques_form` SET `title` = '".nl2br($form_title)."', `description` = '".nl2br($form_desc)."' WHERE `qid`='".$qid."' ";
$currdb->sql_query($query);

?>
