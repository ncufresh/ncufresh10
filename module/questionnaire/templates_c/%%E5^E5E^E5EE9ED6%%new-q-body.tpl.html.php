<?php /* Smarty version 2.6.26, created on 2010-08-04 22:51:39
         compiled from zh_tw/new-q-body.tpl.html */ ?>
	<ol>
		<li><div class="question onEdit">

			<table><tbody>
			<tr>
				<th>問題標題</th>
				<td><input type="text" name="q_title" value="點此輸入問題" /></td>
			</tr>
			<tr>
				<th>問題說明</th>
				<td><input type="text" name="q_desc" value=""/></td>
			</tr>
			<tr>
				<th>答案類型</th>
				<td>
					<select class="res_type">
						<option selected="selected">文字</option>
						<option>段落</option>
						<option>單選</option>
						<option>勾選</option>
						<option>清單</option>
					</select>
				</td>
			</tr>
			</tbody></table>
			
			<div class="response">
				<input type="hidden" value="0" name="res_type" class="res_type" />
				
				<div class="text">
					<input type="text" value="their answer" disabled="disabled" />
				</div>
			</div>
			<div class="send">
				<button class="done" type="button" >問題完成</button>
				<span><input type="checkbox" name="required" value="1"/>設為必填 </span>
			</div>
		</div></li>
	</ol>