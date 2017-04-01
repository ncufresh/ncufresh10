<?php /* Smarty version 2.6.26, created on 2010-09-03 16:35:52
         compiled from zh_tw/q-body.tpl.html */ ?>
<?php if ($this->_tpl_vars['is_new']): ?>
<!--先分到new-q-body		<div class="question onEdit">

			<table><tbody>
			<tr>
				<th>問題標題</th>
				<td><input type="text" name="q_title" value="<?php echo $this->_tpl_vars['q_title']; ?>
" /></td>
			</tr>
			<tr>
				<th>問題說明</th>
				<td><input type="text" name="q_desc" value="<?php echo $this->_tpl_vars['q_desc']; ?>
"/></td>
			</tr>
			<tr>
				<th>答案類型</th>
				<td>
					<select>
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
			
<!--先用javascript實作			<div class="response">
				<input type="hidden" value="0" name="res_type[]" class="res_type" />
				
				<div class="text default">
					<input type="text" value="their answer" disabled="disabled" />
				</div>
				
				<div class="paragragh">
					<input type="text" value="their longer answer" disabled="disabled" />
				</div>
				
				<div class="multiple-choice">
				<ul>
					<li><input type="radio" /><input type="text" value="option" name="op"/></li>
					<li><input type="radio" disabled="disabled" /><input type="text"  disabled="disabled"/></li>
				</ul>
				</div>
				
				<div class="checkbox">
				<ul>
					<li><input type="checkbox" /><input type="text" value="option" name="op"/></li>
					<li disabled="disabled"><input type="checkbox"  /><input type="text" /></li>
				</ul>
				</div>
				
				<div class="list">
				<ul>
					<li><input type="text" value="option" name="op"/></li>
					<li disabled="disabled"><input type="text" /></li>
				</ul>
				</div>
				
			</div>    -->
			
<!--分到new-q-body			<div class="send">
				<button class="done" type="button" >Done</button>
				<span><input type="checkbox" name="required[]" />required </span>
			</div>
		</div>
-->

<?php else: ?>
	<!--把題目跟選項印出來-->
	<ol>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['questions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
	<li><div class="question onShow">
			<div class="editTool"><span class="delQues"><img src="templates/zh_tw/images/X.png" title="刪除問題"/></span><span class="editQues"><img src="templates/zh_tw/images/pen.png" title="編輯問題"/></span></div>
			<input type="hidden" name="tid" value="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['tid']; ?>
" />
			<label class="q_title_label"><input type="hidden" name="q_title" value="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_title']; ?>
" /><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_title']; ?>
</label>
			<?php if ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['required'] == '1'): ?>
				<input type="hidden" name="required" value="1" />
				<label class="redstar">*</label>	
			<?php else: ?>
				<input type="hidden" name="required" value="0" />
			<?php endif; ?>
			<label class="q_desc_label"><input type="hidden" name="q_desc" value="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_description']; ?>
" /><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_description']; ?>
</label>			
			<div class="response">
			<?php if ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '0'): ?>
				<input type="hidden" name="res_type" value="0" />
				<input type="text" />

			<?php elseif ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '1'): ?>
				<input type="hidden" name="res_type" value="1" />
				<textarea></textarea>
			<?php elseif ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '2'): ?>
				<input type="hidden" name="res_type" value="2" />
				<ul>
				<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['questions'][$this->_sections['i']['index']]['options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
					<li><input type="radio" name="question<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['tid']; ?>
"/><input type="hidden" name="oid[]" value="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]['oid']; ?>
" /><input type="hidden" name="opt[]" value="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]['option']; ?>
"/><label><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]['option']; ?>
</label></li>
				<?php endfor; endif; ?>
				<?php if ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['o_other'] == '1'): ?>
					<li class="addOther"><input type="radio" name="question<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['tid']; ?>
"/><input type="hidden" name="addOther" value="1" />其他:<input type="text"/></li>
				<?php endif; ?>
				</ul>
			<?php elseif ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '3'): ?>
				<input type="hidden" name="res_type" value="3" />
				<ul>
				<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['questions'][$this->_sections['i']['index']]['options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
					<li><input type="checkbox"/><input type="hidden" name="oid[]" value="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]['oid']; ?>
" /><input type="hidden" name="opt[]" value="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]['option']; ?>
"/><label><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]['option']; ?>
</label></li>
				<?php endfor; endif; ?>
				<?php if ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['o_other'] == '1'): ?>
					<li class="addOther"><input type="checkbox" name="question<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['tid']; ?>
"/><input type="hidden" name="addOther" value="1" />其他:<input type="text"/></li>
				<?php endif; ?>
				</ul>
			<?php elseif ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '4'): ?>
				<input type="hidden" name="res_type" value="4" />
				<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['questions'][$this->_sections['i']['index']]['options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
					<input type="hidden" name="oid[]" value="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]['oid']; ?>
" />
					<input type="hidden" name="opt[]" value="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]['option']; ?>
"/>
				<?php endfor; endif; ?>
				<select>
				<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['questions'][$this->_sections['i']['index']]['options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
					<option><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]['option']; ?>
</option>
				<?php endfor; endif; ?>
				</select>
			<?php endif; ?>
			</div>
		</div></li>
	<?php endfor; endif; ?>
	</ol>
<?php endif; ?>		
		