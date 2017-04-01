<?php

require_once('../../core/ac_boot.php');
//print_r($_POST);
extract($_POST,EXTR_SKIP);

if(!$currmodule->is_admin()){
	echo "你沒有權限";
	exit();
}

//所有選項的oid
$oid_all = array();
//$addOther預設值
if(empty($addOther)){
	$addOther = 0;
}

if(empty($tid)){ 
	
	//新增題目
	$query = "INSERT INTO `ques_topic`(qid,t_type,t_title,t_description,o_other) VALUES('".$qid."','".$res_type."','".$q_title."','".$q_desc."','".$addOther."')";
	//echo $query;
	$currdb -> sql_query($query);
	$tid = mysql_insert_id();
	//echo $tid;
	
	if($res_type ==2 || $res_type ==3 || $res_type ==4){
		//新增選項
		foreach($opt as $option){
			$o_query = "INSERT INTO `ques_option`(`tid`,`option`) VALUES('".$tid."','".$option."')";
			//echo $o_query;
			$currdb -> sql_query($o_query);
			array_push($oid_all,mysql_insert_id());
		}
		//print_r( $oid_all);
	}
}
else{
	//update
	$query = "UPDATE `ques_topic` SET `qid`='".$qid."', `t_type`='".$res_type."', `t_title`='".$q_title."', `t_description`='".$q_desc."', `o_other`='".$addOther."' WHERE `tid`='".$tid."'";
	$currdb->sql_query($query);
	echo $query;
	if($res_type == 2 || $res_type == 3 || $res_type == 4 ){
		for($i=0;$i < count($opt);$i++){
			if(empty($oid[$i])){ //新增的選項
				$o_query = "INSERT INTO `ques_option`(`tid`,`option`) VALUES('".$tid."','".$opt[$i]."')";
				echo $o_query;
				$currdb->sql_query($o_query);
				array_push($oid_all,mysql_insert_id());
			}
			else{
				$o_query = "UPDATE `ques_option` SET `option`='".$opt[$i]."' WHERE `option` != '".$opt[$i]."' AND `oid` = '".$oid[$i]."'";
				//echo $o_query;
				$currdb->sql_query($o_query);
				array_push($oid_all,$oid[$i]);
			}
		}
		//print_r($oid_all);
	}
	else{
		$o_query = "DELETE FROM `ques_option` WHERE `tid`='".$tid."' ";
		$currdb->sql_query($o_query);
	}
}
//tid似乎應該是用資料庫的才對

echo $tid;
?>

