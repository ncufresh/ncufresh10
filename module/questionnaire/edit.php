<?php
require_once("../../core/ac_boot.php");

if(!$currmodule->is_admin()){
	/*$currtpl->assign("msg","你沒有權限");
	$currtpl->display("msg.tpl.html");	
	exit();*/
	redirect(URL_ROOT_PATH."/login.php?redirect_path=".URL_ROOT_PATH."/module/questionnaire/");
	exit();
}

$currtpl->add_js("lib.js");
$currtpl->add_js("action.js");
$currtpl->add_css("editForm.css");

$query = "SELECT * FROM `ques_form` WHERE qid='".$_GET['qid']."'";
$result = $currdb->sql_query($query);
//echo $query;
if($currdb->sql_num_rows($result)!=0){
	//把問卷的標題和描述都抓出來
	$qform=$currdb->sql_fetch_array($result);
	//print_r($qform);
	$q_title = $qform['title'];
	$q_desc = $qform['description']; 
	
	//把問題抓出來
	$result = $currdb->sql_query("SELECT * FROM `ques_topic` WHERE qid='".$_GET['qid']."' ORDER BY `tid`");
	
	//沒有題目=>新的問卷
	if($currdb->sql_num_rows($result) == 0){
		$currtpl->assign("qbody","new-q-body.tpl.html");
	}
	else{
		//所有的問題
		$questions = array();
		while($question_1D = $currdb->sql_fetch_array($result)){ //一次抓一筆
		
			//抓出options
			if($question_1D['t_type'] == 2 || $question_1D['t_type'] == 3 || $question_1D['t_type'] == 4 ){
				//抓出一個option
				$o_result = $currdb->sql_query("SELECT * FROM `ques_option` WHERE tid='".$question_1D['tid']."' ORDER BY `oid` ASC");
				$options = array();//用來存所有的option
				while($option_1D = $currdb->sql_fetch_array($o_result)){
					array_push($options,$option_1D);
				}
				/*if($question_1D['o_other'] == 1){
					$currtpl->assign("hasOther",true);
				}
				else{
					$currtpl->assign("hasOther",false);
				}*/
				//推到$question_1D['options']
				$question_1D['options'] = $options;
			}
			//推到二維陣列
			array_push($questions,$question_1D);
		}
		$currtpl->assign("qbody","q-body.tpl.html");
		$currtpl->assign("questions",$questions);
	}
	
	$currtpl->assign("qform_exist",true);
	$currtpl->assign("qid",$_GET['qid']);
	$currtpl->assign("q_title",str_replace("<br />","",$q_title));
	$currtpl->assign("q_desc",str_replace("<br />","",$q_desc));

}
else{
	$currtpl->assign("qform_exist",false);
}

$currtpl->display('edit.tpl.html');

?>
