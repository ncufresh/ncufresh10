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
/*
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
}*/
$answers = array();
$topics = array();
while($topic_1D = $currdb -> sql_fetch_array($source)){
	$username = "";
	$options = "";
	if($topic_1D['t_type'] >= 2){
			
		//從ques_aswer_option裡面用LEFT JOIN抓出option
		$o_query = "SELECT `ques_answer_option`.*,`ques_option`.`option` FROM `ques_answer_option` LEFT JOIN `ques_option` ON `ques_answer_option`.`oid`=`ques_option`.`oid` WHERE `ques_answer_option`.`tid`='".$topic_1D['tid']."'";
		$o_source = $currdb -> sql_query($o_query);
				
		while($option_1D = $currdb -> sql_fetch_array($o_source)){
			print_r($option_1D);	
			
			if($option_1D['oid'] == '0'){
				//去ques_answer抓出其他的答案
				$other_query = "SELECT * FROM `ques_answer` WHERE `tid`='".$topic_1D['tid']."' AND `uid`='".$option_1D['uid']."'";
				$other_source = $currdb -> sql_query($other_query);
				$other_ans = $currdb -> sql_fetch_array($other_source);
				$options .= $other_ans['answer'].",";
				if(empty($username)){
					$userarray =  $curruser -> getuser_array_by_uid($option_1D['uid']);	
					$username = $userarray['username'];
				}
			}
			else{
				$options .= $option_1D['option'].",";
				if(empty($username)){
					$userarray =  $curruser -> getuser_array_by_uid($option_1D['uid']);	
					$username = $userarray['username'];
				}
			}
		}
		$options = substr_replace($options,"",-1,1);
	}
	else{
		//把文字answer抓出來
		$ans_query = "SELECT * FROM `ques_answer` WHERE `tid`='".$topic_1D['tid']."'";
		$ans_source = $currdb -> sql_query($ans_query);
		$txt_ans = $currdb -> sql_fetch_array($ans_source);
		$options .= $txt_ans['answer'];
		
		$userarray =  $curruser -> getuser_array_by_uid($txt_ans['uid']);	
		$username = $userarray['username'];
		
	}
	
	//推入陣列中
	if(isset($answers[$username])){
		array_push($answers[$username],$options);
	}
	else{
		$answers[$username] = array();
		array_push($answers[$username],$options);
	}
	
	array_push($topics,$topic_1D['t_title']);
}
print_r($answers);
$currtpl -> assign("total_topics",$currdb -> sql_num_rows($source));
$currtpl -> assign("topics",$topics);
$currtpl -> assign("answers",$answers);
$currtpl -> display("showAnswer.tpl.html");
?>
