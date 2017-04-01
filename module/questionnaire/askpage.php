<?php

require_once("../../core/ac_boot.php");
require_once("function.php");

//判斷權限
if(!$currmodule->is_admin()){
	if($curruser -> is_guest()){
		/*$currtpl -> assign("msg","請先登入");
		$currtpl -> display("msg.tpl.html");
		exit();*/
		redirect(URL_ROOT_PATH."/login.php?redirect_path=".URL_ROOT_PATH."/module/questionnaire/");
		exit();
	}	

	if(has_answered($curruser->uid,intval($_GET['qid']))){
		$currtpl->assign("msg","您已經回答過這份問卷囉");
		$currtpl->display("msg.tpl.html");
		exit();
	}
}
$currtpl -> add_js("jquery.validate.js");
$currtpl -> add_js("validation.js");
$currtpl -> add_css("ncufresh.css");

//由get的qid抓出問卷標題＆描述
$query = "SELECT * FROM `ques_form` WHERE `qid`='".$_GET['qid']."'";
$source = $currdb -> sql_query($query);
if($currdb -> sql_num_rows($source) != 0){
	$qform = $currdb -> sql_fetch_array($source);

	//指派問卷標題＆描述
	$currtpl -> assign("title",$qform['title']);
	$currtpl -> assign("description",$qform['description']);

	//抓出問題放入array
	$questions = array();
	$q_query = "SELECT * FROM `ques_topic` WHERE `qid`='".$_GET['qid']."' ORDER BY `tid` ASC";
	$q_source = $currdb -> sql_query($q_query);
	//echo $q_query;
	while($question_1D = $currdb -> sql_fetch_array($q_source)){

		//問題類型是單選 多選 清單
		$options = array();
		$oids = array();
		if($question_1D['t_type'] >=2 ){
			//抓出選項放入array並且推到問題的array裡
			$o_query = "SELECT `oid`,`option` FROM `ques_option` WHERE `tid`='".$question_1D['tid']."' ORDER BY `oid` ASC";
			$o_source = $currdb -> sql_query($o_query);
			while($option_1D = $currdb -> sql_fetch_array($o_source)){
					array_push($options,$option_1D['option']);
					array_push($oids,$option_1D['oid']);
			}
			$question_1D['options'] = $options;
			$question_1D['oids'] = $oids;
			
		}
	//	print_r($question_1D);
		if($question_1D['required'] == "1"){
			$question_1D['required'] = "required";
		}
		else{
			$question_1D['required'] = "";
		}
		array_push($questions,$question_1D);
	}
	//print_r($questions);
	$currtpl -> assign("questions",$questions);
	$currtpl -> display("askpage.tpl.html");
}
//抓不到題目
else{
	$currtpl -> display("noForm.tpl.html");
}
 
?>