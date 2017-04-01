<?php
require_once("../../core/ac_boot.php");
if(!$currmodule->is_admin()){
	echo "你沒有權限";
	exit();
}


//刪除一個問題
$query = "DELETE `ques_topic`,`ques_option` FROM `ques_topic` LEFT JOIN `ques_option` ON `ques_topic`.`tid` = `ques_option`.`tid`  WHERE `ques_topic`.`tid`='".$_POST['tid']."'";
$currdb->sql_query($query);

?>
