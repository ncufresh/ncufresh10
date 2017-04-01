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

if(empty($required)){
	$required = "";
}

if(empty($tid)){ 
	
	//新增題目
	$query = "INSERT INTO `ques_topic`(qid,t_type,t_title,t_description,o_other,required) VALUES('".$qid."','".$res_type."','".$q_title."','".$q_desc."','".$addOther."','".$required."')";
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
	$query = "UPDATE `ques_topic` SET `qid`='".$qid."', `t_type`='".$res_type."', `t_title`='".$q_title."', `t_description`='".$q_desc."', `o_other`='".$addOther."',`required`='".$required."' WHERE `tid`='".$tid."'";
	$currdb->sql_query($query);
	//echo $query;
	if($res_type == 2 || $res_type == 3 || $res_type == 4 ){
		for($i=0;$i < count($opt);$i++){
			if(empty($oid[$i])){ //新增的選項
				$o_query = "INSERT INTO `ques_option`(`tid`,`option`) VALUES('".$tid."','".$opt[$i]."')";
				//echo $o_query;
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
?>

<div class="editTool"><span class="delQues"><img src="templates/zh_tw/images/X.png"title="刪除問題"/></span><span class="editQues" ><img src="templates/zh_tw/images/pen.png" title="編輯問題"/></span></div>
<input type="hidden" name="tid" value="<?php echo $tid;?>"/>
<label class="q_title_label"><input type="hidden" name="q_title" value="<?php echo $q_title;?>" /><?php echo $q_title;?></label>
<?php if($required == 1){?>
<input type="hidden" name="required" value="1"/>
<label class="redstar">*</label>
<?php }else{?>
<input type="hidden" name="required" value="0" />
<?php }?>
<label class="q_desc_label"><input type="hidden" name="q_desc" value="<?php echo $q_desc;?>" /><?php echo $q_desc;?></label>
<div class="response">
<?php 
switch($res_type){
	case '0':
		echo '<input type="hidden" name="res_type" value="0" /><input type="text" />';
	break;
	
	case '1':
		echo '<input type="hidden" name="res_type" value="1" /><textarea></textarea>';
	break;
	
	case '2':
		echo '<input type="hidden" name="res_type" value="2" /><ul>';
		foreach($opt as $key=>$option){
			echo '<li><input type="radio" name="question'.$tid.'"/><input type="hidden" name="oid[]" value="'.$oid_all[$key].'" /><input type="hidden" name="opt[]" value="'.$option.'"/><label>'.$option.'</label></li>';
		}
		if($addOther==1) echo '<li class="addOther"><input type="radio" name="question'.$tid.'"/><input type="hidden" name="addOther" value="1" />其他:<input type="text"/></li>';
		echo '</ul>';
	break;
	
	case '3':
		echo '<input type="hidden" name="res_type" value="3" /><ul>';
		foreach($opt as $key=>$option){
			echo '<li><input type="checkbox" name="question'.$tid.'"/><input type="hidden" name="oid[]" value="'.$oid_all[$key].'" /><input type="hidden" name="opt[]" value="'.$option.'" /><label>'.$option.'</label></li>';
		}
		if($addOther==1) echo '<li class="addOther"><input type="checkbox" name="question'.$tid.'"/><input type="hidden" name="addOther" value="1" />其他:<input type="text"/></li>';
		echo '</ul>';
	break;
	
	case '4':
		echo '<input type="hidden" name="res_type" value="4" />';
		foreach($opt as $key=>$option){
			echo '<input type="hidden" name="oid[]" value="'.$oid_all[$key].'" /><input type="hidden" name="opt[]" value="'.$option.'" />';
		}

		echo '<select>';
		foreach($opt as $option){
			echo '<option>'.$option.'</option>';
		}
		echo '</select>';
	break;
}
?>
</div>
