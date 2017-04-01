<?php
require_once("../../core/ac_boot.php");
if(!$currmodule->is_admin()){
	echo "你沒有權限";
	exit();
}

//print_r($_POST);

extract($_POST,EXTR_SKIP);
if(empty($addOther)) $addOther = 0;

?>

			<input type="hidden" name="tid" value="<?php echo $tid?>"/>
			<table><tbody>
			<tr>
				<th>問題標題</th>
				<td><input type="text" name="q_title" value="<?php echo $q_title?>" /></td>
			</tr>
			<tr>
				<th>問題說明</th>
				<td><input type="text" name="q_desc" value="<?php echo $q_desc?>"/></td>
			</tr>
			<tr>
				<th>答案類型</th>
				<td>
					<select class="res_type">
						<option <?php if($res_type==0) echo 'selected="selected"';?>>文字</option>
						<option <?php if($res_type==1) echo 'selected="selected"';?>>段落</option>
						<option <?php if($res_type==2) echo 'selected="selected"';?>>單選</option>
						<option <?php if($res_type==3) echo 'selected="selected"';?>>勾選</option>
						<option <?php if($res_type==4) echo 'selected="selected"';?>>清單</option>
					</select>
				</td>
			</tr>
			</tbody></table>

<?php if($res_type==0){?>			
			<div class="response">
				<input type="hidden" value="0" name="res_type" class="res_type" />
				
				<div class="text">
					<input type="text" value="their answer" disabled="disabled" />
				</div>
			</div>

<?php }else if($res_type==1){?>			
			
			<div class="response">
				<input type="hidden" value="1" name="res_type" class="res_type" />
				<div class="paragragh">
					<input type="text" value="their longer answer" disabled="disabled" />
				</div>
			</div>
<?php }else if($res_type==2){?>				
			<div class="response">	
				<div class="multiple-choice">
				<input type="hidden" value="2" name="res_type" class="res_type" />
				<ul>
				<?php for($i=0; $i < count($opt); $i++){?>
					<li><input type="radio" name="options" /><input type="hidden" name="oid[]" value="<?php echo $oid[$i];?>" /><input type="text" value="<?php echo $opt[$i];?>" name="opt[]"/><img class="delOpt" src="templates/zh_tw/images/X.png" title="刪除"/></li>
				<?php }?>				
					<li class="disabled"><input type="radio" name="options"/><input type="hidden" /><input type="text" value="點此新增選項"/></li>
				<?php if($addOther==0){?>
					<li class="addOther"><input type="hidden" name="addOther" value="0"/>or <span class="addOtherOpt" >加入 "其他"</span></li>
				<?php }else{?>
					<li class="addOther"><input type="radio" />其他:<input type="hidden" name="addOther" value="1"/><input type="text" class="disabled_opt" disabled="disabled" value="Their own answer"/><img src="templates/zh_tw/images/X.png" class="delOtherOpt" title="刪除"/></li>
				<?php }?>
				</ul>
				</div>
			</div>
<?php }else if($res_type==3){?>			
			<div class="response">
				<div class="checkbox">
				<input type="hidden" value="3" name="res_type" class="res_type" />
				<ul>
				<?php for($i=0; $i < count($opt); $i++){?>
					<li><input type="checkbox" /><input type="hidden" name="oid[]" value="<?php echo $oid[$i];?>" /><input type="text" value="<?php echo $opt[$i];?>" name="opt[]"/><img class="delOpt" src="templates/zh_tw/images/X.png" title="刪除"/></li>
				<?php }?>
					<li class="disabled"><input type="checkbox"/><input type="hidden" /><input type="text" value="點此新增選項" /></li>
				<?php if($addOther==0){?>
					<li class="addOther"><input type="hidden" name="addOther" value="0"/>or <span class="addOtherOpt" >加入 "其他"</span></li>
				<?php }else{?>
					<li class="addOther"><input type="checkbox"/>其他:<input type="hidden" name="addOther" value="1"/><input type="text" class="disabled_opt" disabled="disabled" value="Their own answer"/><img src="templates/zh_tw/images/X.png" class="delOtherOpt" titile="刪除"/></li>
				<?php }?>
				</ul>
				</div>
			</div>
<?php }else if($res_type==4){?>
			<div class="response">
				<div class="list">
				<input type="hidden" value="4" name="res_type" class="res_type" />
				<ul>
				<?php for($i=0; $i < count($opt); $i++){?>
					<li><input type="hidden" name="oid[]" value="<?php echo $oid[$i];?>" /><input type="text" value="<?php echo $opt[$i];?>" name="opt[]"/><img class="delOpt" src="templates/zh_tw/images/X.png" title="刪除"/></li>
				<?php }?>	
					<li class="disabled"><input type="text" value="點此新增選項" /></li>
				</ul>
				</div>	
			</div>    
<?php }?>			
			<div class="send">
				<button class="done" type="button" >問題完成</button>
<?php if($required=="1"){ ?>
				<span><input type="checkbox" name="required" checked="checked" value="1"/>設為必填</span>
<?php }else{?>
				<span><input type="checkbox" name="required" value="1"/>設為必填</span>
<?php }?>
			</div>



