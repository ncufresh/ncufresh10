<?php
require_once("../../core/ac_boot.php");

if($curruser -> is_guest()){
	/*$currtpl -> assign("msg","請先登入");
	$currtpl -> display("msg.tpl.html");
	exit();*/
	redirect(URL_ROOT_PATH."/login.php?redirec_path=".URL_ROOT_PATH."/module/questionnaire/");
	exit();
}

$currtpl -> add_css("index.css");

$query = "SELECT * FROM `ques_form`";
$source = $currdb -> sql_query($query);

if($currdb -> sql_num_rows($source) == 0){
	$currtpl -> assign("msg","目前沒有問卷");
	$currtpl -> display("msg.tpl.html");
	exit();
}

$form = array();
while($form_1D = $currdb->sql_fetch_array($source)){
	array_push($form,$form_1D);
}

$currtpl -> assign("form",$form);
$currtpl -> display("index.tpl.html");

?>
