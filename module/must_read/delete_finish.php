<?php
require_once('../../core/ac_boot.php');

// -- CHECK ADMINISTRATOR'S PERMISSION
if(!$currmodule->is_admin())
	exit();
	
// -- use intval
$Key = intval($_GET['Key']);
$num = intval($_GET['num']);

if($Key <=0 || $num <= 0)
	exit();
	
// -- Escape string/variables
$sql = $currdb -> sql_query("DELETE FROM `must_read` WHERE `Key` = '".$Key."'");
if($sql){
	redirect("must.php?num=" . $num , 2);
	echo '刪除成功!';
}
else{
	redirect("must.php?num=" . $num , 2);
	echo '刪除失敗!';
}
?>

