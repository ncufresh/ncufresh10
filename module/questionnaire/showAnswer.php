<?php

require_once("../../core/ac_boot.php");

if(!$currmodule -> is_admin()){
	/*$currtpl -> assign("msg","你沒有權限");
	$currtpl -> display("msg.tpl.html");
	exit();*/
	redirect(URL_ROOT_PATH."/login.php?redirect_path=".URL_ROOT_PATH."/module/questionnaire/");
	exit();
}
if(!isset($_GET['qid'])){
	$currtpl -> display("noForm.tpl.html");	
	exit();
}

$currtpl -> add_css("showAnswer.css");

//抓出問卷的標題＆描述
$query = "SELECT * FROM `ques_form` WHERE `qid` = '".intval($_GET['qid'])."'";
$source = $currdb -> sql_query($query);
$form = $currdb -> sql_fetch_array($source);
$currtpl -> assign("title",$form['title']);
$currtpl -> assign("description",$form['description']);

//抓出問題
$topics = array();
$t_query = "SELECT `t_title` FROM `ques_topic` WHERE `qid` = '".intval($_GET['qid'])."' ORDER BY `ques_topic`.`tid`";
$t_source = $currdb -> sql_query($t_query);
while($topic_1D = $currdb -> sql_fetch_array($t_source)){
	array_push($topics,$topic_1D['t_title']);
}


//抓出使用者uid
$query = "SELECT `ques_has_answered`.*,`ac_user`.`username`  FROM `ques_has_answered` LEFT JOIN `ac_user` USING(`uid`)  WHERE `qid` = '".intval($_GET['qid'])."'";
$source = $currdb -> sql_query($query);
$all_answer = array();
while($answered_user = $currdb -> sql_fetch_array($source)){ //把回答過的user一個一個抓出來
	$user_ans_query = "SELECT `ques_topic` . * , `ques_answer_option`.`oid` ,`ques_option`.`option` ,  `ques_answer`.`answer` FROM  `ques_topic` LEFT JOIN  `ques_answer_option` ON  `ques_topic`.`tid` =  `ques_answer_option`.`tid` AND  `ques_answer_option`.`uid` ='".$answered_user['uid']."' AND  `ques_topic`.`t_type` >1 LEFT JOIN `ques_option` USING (`oid`) LEFT JOIN  `ques_answer` ON  `ques_topic`.`tid` =  `ques_answer`.`tid` AND  `ques_answer`.`uid` ='".$answered_user['uid']."' AND (`ques_topic`.`t_type` <=1 OR  `ques_answer_option`.`oid` =0) WHERE  `qid` = '".intval($_GET['qid'])."' ORDER BY `ques_topic`.`tid`";
	$user_ans_source = $currdb -> sql_query($user_ans_query);
	$user_ans = array();
	while($user_ans_1D = $currdb -> sql_fetch_array($user_ans_source)){
		switch ($user_ans_1D['t_type']){
			case '0':
			case '1':
				$user_ans[$user_ans_1D['tid']] = array('topic' => $user_ans_1D['t_title'],'answer' => $user_ans_1D['answer']);
			break;
			case '2':
				if($user_ans_1D['oid'] == 0){
					$user_ans[$user_ans_1D['tid']] = array('topic' => $user_ans_1D['t_title'],'answer' => $user_ans_1D['answer']);
				}
				else{
					$user_ans[$user_ans_1D['tid']] = array('topic' => $user_ans_1D['t_title'],'answer' => $user_ans_1D['option']);
				}
			break;
			case '3':
				if($user_ans_1D['oid'] == 0){
					$prefix = (isset($user_ans[$user_ans_1D['tid']]['answer']))? $user_ans[$user_ans_1D['tid']]['answer']:"";		
					$multi = $prefix."其他：".$user_ans_1D['answer'];
					$user_ans[$user_ans_1D['tid']] = array('topic' => $user_ans_1D['t_title'],'answer' => $multi);
				}
				else{
					$prefix = (isset($user_ans[$user_ans_1D['tid']]['answer']))? $user_ans[$user_ans_1D['tid']]['answer']:"";		
					$multi = $prefix.",".$user_ans_1D['option'];
					$user_ans[$user_ans_1D['tid']] = array('topic' => $user_ans_1D['t_title'],'answer' => $multi);
				}
			break;
			case '4':
				$user_ans[$user_ans_1D['tid']] = array('topic' => $user_ans_1D['t_title'],'answer' => $user_ans_1D['option']);
			break;
		}
	}
	$all_answer[$answered_user['username']] = $user_ans;

}

//print_r($all_answer);

$currtpl -> assign("total_topics",$currdb -> sql_num_rows($source));
$currtpl -> assign("topics",$topics);
$currtpl -> assign("answers",$all_answer);
$currtpl -> display("showAnswer.tpl.html");
?>
