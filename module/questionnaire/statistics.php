<?php
require_once("../../core/ac_boot.php");

if(!$currmodule->is_admin()){
	/*$currtpl -> assign("msg","你沒有權限");
	$currtpl -> display("msg.tpl.html");
	exit();*/
	redirect(URL_ROOT_PATH."/login.php?redirect_path=".URL_ROOT_PATH."/module/questionnaire/");
	exit();
}

$currtpl -> add_css("statistics.css");

//抓出問卷標題和描述 
$query = "SELECT `title`,`description` FROM `ques_form`  WHERE `qid` = '".intval($_GET['qid'])."'";
$source = $currdb -> sql_query($query);
$form = $currdb -> sql_fetch_array($source);
$currtpl -> assign("title",$form['title']);
$currtpl -> assign("description",$form['description']);

//抓出題目
$t_query = "SELECT `tid`,`t_title` FROM `ques_topic` WHERE `qid` = '".intval($_GET['qid'])."' AND `t_type` > 1"; 
$t_source = $currdb -> sql_query($t_query);
$opt_count = array();
while($topic_1D = $currdb -> sql_fetch_array($t_source)){
	$count_query = "SELECT `ques_option`.`oid`,`ques_option`.`option`,COUNT(`ques_answer_option`.`uid`) FROM `ques_option` LEFT JOIN `ques_answer_option` ON `ques_answer_option`.`oid` = `ques_option`.`oid` AND `ques_answer_option`.`tid` = '".$topic_1D['tid']."' WHERE `ques_option`.`tid` = '".$topic_1D['tid']."' OR `ques_option`.`tid` = '0'  GROUP BY `oid`";
	//echo $count_query;
	$count_source = $currdb -> sql_query($count_query);
	$options = array();
	while($option_1D = $currdb->sql_fetch_array($count_source)){
		$option_1D['count'] = $option_1D['COUNT(`ques_answer_option`.`uid`)'];
		array_push($options,$option_1D);
	}
	
	array_push($opt_count,array('topic' => $topic_1D['t_title'] ,'options' => $options));
}
//print_r($opt_count);

$currtpl -> assign("opt_count",$opt_count);
$currtpl -> display("statistics.tpl.html");



?>
