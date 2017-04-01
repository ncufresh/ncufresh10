<?php

require_once("../../core/ac_boot.php");

if(!$currmodule -> is_admin()){
	$currtpl -> assign("msg","你沒有權限");
	$currtpl -> display("msg.tpl.html");
	exit();
}
if(!isset($_GET['qid'])){
	$currtpl -> display("noForm.tpl.html");	
	exit();
}


//抓出問卷的標題＆描述
$query = "SELECT * FROM `ques_form` WHERE `qid` = '".intval($_GET['qid'])."'";
$source = $currdb -> sql_query($query);
$form = $currdb -> sql_fetch_array($source);
$currtpl -> assign("title",$form['title']);
$currtpl -> assign("description",$form['description']);

//抓出使用者名稱以及他們的答案
$query = "SELECT * FROM `ques_topic` WHERE `qid` = '".intval($_GET['qid'])."'";
$source = $currdb -> sql_query($query);
//把問卷的tid及題目都抓出來
$topics = array();
$topic_1D = $currdb -> sql_fetch_array($source);
$tid = $topic_1D['tid'];
array_push($topics,$topic_1D['t_title']);
while($topic_1D = $currdb -> sql_fetch_array($source)){
	$tid .= ",".$topic_1D['tid'];
	array_push($topics,$topic_1D['t_title']);
}
//echo $tid;
//抓出使用者的答案
$answers = array();
$ans_query = "SELECT `uid`,`answer` FROM `ques_answer` WHERE `tid` IN (".$tid.") ORDER BY `uid`";
//echo $ans_query;
$ans_source = $currdb -> sql_query($ans_query);
$pre_uid = 0 ;//用來判斷是不是同一個user
//把陣列抓成answers[username][options]
while($answer_1D = $currdb -> sql_fetch_array($ans_source)){
		
	if($answer_1D['uid'] != $pre_uid){
		$userarray = $curruser -> getuser_array_by_uid($pre_uid);	
		//echo isset($user_ans);
		if(isset($user_ans)){
			$answers[$userarray['username']] = $user_ans;	
		}
		$user_ans = array();
	}
	//echo $answer_1D['answer'];
	array_push($user_ans,$answer_1D['answer']);	
	//print_r($user_ans);
	$pre_uid = $answer_1D['uid']; 
}

$userarray = $curruser -> getuser_array_by_uid($pre_uid);	
if(isset($user_ans)){
	$answers[$userarray['username']] = $user_ans;	
}

/*while($topic_1D = $currdb -> sql_fetch_array($source)){
	$ans_query = "SELECT * FROM `ques_answer` WHERE `tid`='".$topic_1D['tid']."'";
	$ans_source = $currdb -> sql_query($ans_query);
	if($currdb -> sql_num_rows($source) == 1){
		$option_1D = $currdb -> sql_fetch_array($ans_source);
		array_push($answers,$option_1D);
	}
	else if($currdb -> sql_num_rows($source) > 1){
		//把多個選項的格式改成opt1,opt2,opt3...
		$option_1D = $currdb -> sql_fetch_array($ans_source);
		$multiple = $option_1D['answer'];
		while($option_1D = $currdb -> sql_fetch_array($ans_source)){
			$multiple .= ",".$option_1D['answer'];
		}
		$option_1D['answer'] = $multiple;
		array_push($answers,$option_1D);
	}
	array_push($topics,$topic_1D['t_title']);
}*/
//print_r($answers);
$currtpl -> assign("total_topics",$currdb -> sql_num_rows($source));
$currtpl -> assign("topics",$topics);
$currtpl -> assign("answers",$answers);
$currtpl -> display("showAnswer.tpl.html");
?>
