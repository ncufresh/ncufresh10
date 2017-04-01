<?php
require_once("../../core/ac_boot.php");
if(!$currmodule->is_admin()){
	echo "你沒有權限";
	exit();
}


//刪除一個選項
$query = "DELETE FROM `ques_option` WHERE `oid`='".$_POST['oid']."'";
$currdb->sql_query($query);

?>