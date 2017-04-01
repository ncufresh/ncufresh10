<?php
require_once("../../core/ac_boot.php");


if(!$currmodule->is_admin()){
	/*$currtpl->assign("msg","你沒有權限");
	$currtpl->display("msg.tpl.html");
	exit();*/
	redirect(URL_ROOT_PATH."/login.php?redirect_path=".URL_ROOT_PATH."/module/questionnaire/");
	exit();
}


extract($_POST,EXTR_SKIP);


$errorMsg = "";
$all_filled = true;

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
		
		if(empty($$ans)){//確認是否有回答
			$errorMsg .= "第".($i+1)."題沒填喔！<br />";	
			$all_filled = false;
			//$currtpl->display("msg.tpl.html");
		}
		else{	
			$reset_query = "UPDATE `ques_option` SET `correct` = 0 WHERE `tid` = '".$tid[$i]."'";
			$currdb -> sql_query($reset_query);
			foreach($$ans as $val){
				//答案應該沒有在其他的吧＝＝	
				/*if($val=='0'){
					$other_ans = $ans."_other";
					$other_query = "INSERT INTO `ques_answer` (`tid`,`uid`,`answer`) VALUES('".$tid[$i]."','".$curruser->uid."','".$$other_ans."')";
					$currdb -> sql_query($other_query);
				}*/
			
				$query = "UPDATE `ques_option` SET `correct` = 1 WHERE `oid` = '".$val."'"; 
				//echo $query;
				$currdb->sql_query($query);
			
			}
		}
	}
	else if($type[$i] ==2 ){//單選radio
		$reset_query = "UPDATE `ques_option` SET `correct` = 0 WHERE `tid` = '".$tid[$i]."'";
		$currdb -> sql_query($reset_query);
		
		$ans = "q".($i+1);
		if(empty($$ans)){//確認是否有回答	
			$errorMsg .= "第".($i+1)."題沒填喔！<br />";	
			$all_filled = false;
			//$currtpl->display("msg.tpl.html");
		}
		else{
			$query = "UPDATE `ques_option` SET `correct` = 1 WHERE `oid` = '".$$ans."'"; 
			$currdb->sql_query($query);

			//沒有其他的答案
			/*if($$ans=="0"){
				$other_ans = $ans."_other";
				$other_query = "INSERT INTO `ques_answer` (`tid`,`uid`,`answer`) VALUES ('".$tid[$i]."','".$curruser->uid."','".$$other_ans."')";
				$currdb -> sql_query($other_query);
			}*/
		}
	}
	else if($type[$i]==4){
		$reset_query = "UPDATE `ques_option` SET `correct` = 0 WHERE `tid` = '".$tid[$i]."'";
		$currdb -> sql_query($reset_query);
		
		$ans = "q".($i+1);	

		if(empty($$ans)){//確認是否有回答
			$errorMsg .= "第".($i+1)."題沒填喔！<br />";	
			$all_filled = false;
			//$currtpl->display("msg.tpl.html");
		}
		else{
			$query = "UPDATE `ques_option` SET `correct` = 1 WHERE `oid` = '".$$ans."'"; 
			//echo $query;
			$currdb->sql_query($query);
		}
	}
	//只有選擇題有答案
	/*else{
		$ans = "q".($i+1);	

		if(empty($$ans)){//確認是否有回答
			$errorMsg .= "第".($i+1)."題沒填喔！<br />";	
			$all_filled = false;
			//$currtpl->display("msg.tpl.html");
		}
		else{
			$query = "INSERT INTO `ques_answer` (`tid`,`uid`,`answer`) VALUES('".$tid[$i]."','".$curruser->uid."','".$$ans."')";
			//echo $query;
			$currdb->sql_query($query);
		}
	}*/
}

if($all_filled){
	//寫入has_answered資料表
	$currtpl->assign("msg","答案卷已建立完成");
}
else{
	$currtpl -> assign("msg",$errorMsg);
}
$currtpl->display("msg.tpl.html");

?>
