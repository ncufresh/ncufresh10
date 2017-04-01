<?php
require_once("../../core/ac_boot.php");

//確認權限
if($curruser->is_guest()){
	/*$currtpl->assign("msg","請先登入");
	$currtpl->display("msg.tpl.html");
	exit();*/
	redirect(URL_ROOT_PATH."/login.php?redirect_path=".URL_ROOT_PATH."/module/questionnaire/");
	exit();
}


extract($_POST,EXTR_SKIP);


$errorMsg = "";
$all_filled = true;

$query_chk = "SELECT `tid`,`required` FROM `ques_topic` WHERE `qid` = '".intval($qid)."' ORDER BY `tid` ASC";
$source_chk = $currdb -> sql_query($query_chk);
$tid = array();
$required = array();

while($chk_1D = $currdb -> sql_fetch_array($source_chk)){
	array_push($tid,$chk_1D['tid']);
	array_push($required,$chk_1D['required']);
}


for($i=0;$i<count($tid);$i++){
	$query = "";

	/*if($type[$i]==3){
		$ans = "q".($i+1);	
		$options = "";
		foreach($$ans as $val){
			$options .= $val.",";
			//echo $query;
		}
		$options = substr_replace($options,'',-1,1);	
		$query = "INSERT INTO `ques_answer` (`tid`,`uid`,`answer`) VALUES('".$tid[$i]."','".$curruser->uid."','".$options."')"; 
		//echo $query;
		$currdb->sql_query($query);
	}*/
	if($type[$i] == 3){//多選checkbox
		$ans = "q".($i+1);	
		
		if(is_null($$ans) && $required[$i] == 1){//確認是否有回答
			$errorMsg .= "第".($i+1)."題沒填喔！<br />";	
			$all_filled = false;
			//$currtpl->display("msg.tpl.html");
		}
		else{	
			$options = "";
			foreach($$ans as $val){
				if($val=='0'){
					$other_ans = $ans."_other";
					$other_query = "INSERT INTO `ques_answer` (`tid`,`uid`,`answer`) VALUES('".$tid[$i]."','".$curruser->uid."','".htmlencode($$other_ans)."')";
					$currdb -> sql_query($other_query);
				}
			
				$options .= "('".$tid[$i]."','".$curruser->uid."','".htmlencode($val)."'),";
			
			}
			$options = substr_replace($options,';',-1,1);	
			$query = "INSERT INTO `ques_answer_option` (`tid`,`uid`,`oid`) VALUES".$options; 
			//echo $query;
			$currdb->sql_query($query);
		}
	}
	else if($type[$i] ==2 ){//單選radio
		$ans = "q".($i+1);

		if(is_null($$ans) && $required[$i] == 1){//確認是否有回答	
			$errorMsg .= "第".($i+1)."題沒填喔！<br />";	
			$all_filled = false;
			//$currtpl->display("msg.tpl.html");
		}
		else{
			$query = "INSERT INTO `ques_answer_option` (`tid`,`uid`,`oid`) VALUES('".$tid[$i]."','".$curruser->uid."','".htmlencode($$ans)."')";
			$currdb->sql_query($query);
		
			if($$ans=="0"){
				$other_ans = $ans."_other";
				$other_query = "INSERT INTO `ques_answer` (`tid`,`uid`,`answer`) VALUES ('".$tid[$i]."','".$curruser->uid."','".htmlencode($$other_ans)."')";
				$currdb -> sql_query($other_query);
			}
		}
	}
	else if($type[$i]==4){
		
		$ans = "q".($i+1);	

		if(is_null($$ans) && $required[$i] == 1){//確認是否有回答
			$errorMsg .= "第".($i+1)."題沒填喔！<br />";	
			$all_filled = false;
			//$currtpl->display("msg.tpl.html");
		}
		else{
			$query = "INSERT INTO `ques_answer_option` (`tid`,`uid`,`oid`) VALUES('".$tid[$i]."','".$curruser->uid."','".htmlencode($$ans)."')";
			//echo $query;
			$currdb->sql_query($query);
		}
	}
	else{
		$ans = "q".($i+1);	

		if(is_null($$ans) && $required[$i] == 1){//確認是否有回答
			$errorMsg .= "第".($i+1)."題沒填喔！<br />";	
			$all_filled = false;
			//$currtpl->display("msg.tpl.html");
		}
		else{
			$query = "INSERT INTO `ques_answer` (`tid`,`uid`,`answer`) VALUES('".$tid[$i]."','".$curruser->uid."','".htmlencode($$ans)."')";
			//echo $query;
			$currdb->sql_query($query);
		}
	}
}

if($all_filled){
	//寫入has_answered資料表
	$answered_query = "INSERT INTO `ques_has_answered` (`uid`,`qid`) VALUES('".$curruser -> uid."','".$qid."')";
	$currdb -> sql_query($answered_query);
	$currtpl->assign("msg","感謝您的填寫，「2010大一生活知訊網」祝福您有最美好的大學生活！");
}
else{
	$currtpl -> assign("msg",$errorMsg);
}
$currtpl->display("msg.tpl.html");

?>
