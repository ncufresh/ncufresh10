<?php

require_once("../../core/ac_boot.php");
if(!$currmodule->is_admin()){
	/*$currtpl->assign("msg","你沒有權限");
	$currtpl->display("msg.tpl.html");	
	//echo "你沒有權限";
	exit();*/
	redirect(URL_ROOT_PATH."/index.php");
	exit();
}

$currtpl -> add_css("adm.css");

$query = "SELECT * FROM `ques_form`";
$result = $currdb->sql_query($query);

$qform = array();
while($qform_1D = $currdb->sql_fetch_array($result)){
	array_push($qform,$qform_1D);
}

$currtpl->assign("qform",$qform);
$currtpl->display("adm.tpl.html");

?>
