<?php /* Smarty version 2.6.26, created on 2010-09-03 14:42:26
         compiled from zh_tw/askpage.tpl.html */ ?>
<div class="quesbody">
	<div class="form_text">
	<div class="title"><?php echo $this->_tpl_vars['title']; ?>
</div>
	<div class="description"><?php echo $this->_tpl_vars['description']; ?>
</div>
	</div>

<form method="post" id="questionnaire"  action="saveAnswer.php">

<input type="hidden" name="qid" value="<?php echo $_GET['qid']; ?>
">


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
<div class="questions">
	
	<div class="q_text_top">&nbsp</div>	

	<div class="q_text_middle">
		<?php if ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['required'] == 'required'): ?>
			<label class="redstar">*</label>
		<?php else: ?>
			<label class="hidden">&nbsp&nbsp</label>
		<?php endif; ?>

		<span class="q_num"><?php echo $this->_sections['i']['iteration']; ?>
.</span>
		<span class="q_title"><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_title']; ?>
</span><br/>
		<span class="q_desc"><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_description']; ?>
</span>	
	</div>

	<div class="q_text_bottom"></div>
	
	<?php if ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '0'): ?>
		<div class="q_response res_text">	
			<input type="hidden" name="type[]" value="0" />
			<label>您的答案：</label><br/>
			<input type="text" name="q<?php echo $this->_sections['i']['iteration']; ?>
" class="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['required']; ?>
" />
		</div>
	<?php elseif ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '1'): ?>
		<div class="q_response res_area">	
			<input type="hidden" name="type[]" value="1" />
			<label>您的答案：</label><br/>
			<textarea name="q<?php echo $this->_sections['i']['iteration']; ?>
" class="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['required']; ?>
"></textarea>
		</div>
	<?php elseif ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '2'): ?>
		<div class="q_response res_radio">	
			<input type="hidden" name="type[]" value="2" />
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
			<li><input type="radio" name="q<?php echo $this->_sections['i']['iteration']; ?>
" value="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['oids'][$this->_sections['j']['index']]; ?>
" class="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['required']; ?>
"/><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]; ?>
</li>
			<?php endfor; endif; ?>
			<?php if ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['o_other'] == '1'): ?>
			<li><input type="radio" name="q<?php echo $this->_sections['i']['iteration']; ?>
" value="0" class="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['required']; ?>
"/>其他：<input type="text" name="q<?php echo $this->_sections['i']['iteration']; ?>
_other"/></li>
			<?php endif; ?>
			</ul>
		</div>	
	
	<?php elseif ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '3'): ?>
		<div class="q_response res_check">	
			<input type="hidden" name="type[]" value="3" />
		
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
			<li><input type="checkbox" name="q<?php echo $this->_sections['i']['iteration']; ?>
[]" value="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['oids'][$this->_sections['j']['index']]; ?>
" class="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['required']; ?>
"/><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]; ?>
</li>
			<?php endfor; endif; ?>
			<?php if ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['o_other'] == '1'): ?>
			<li><input type="checkbox" name="q<?php echo $this->_sections['i']['iteration']; ?>
[]" value="0" class="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['required']; ?>
"/>其他：<input type="text" name="q<?php echo $this->_sections['i']['iteration']; ?>
_other"/></li>
			<?php endif; ?>
			</ul>
		</div>	
	<?php elseif ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '4'): ?>
		<div class="q_response res_list">	
			<input type="hidden" name="type[]" value="4" />
		
			<select name="q<?php echo $this->_sections['i']['iteration']; ?>
" class="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['required']; ?>
">
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
				<option value="<?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['oids'][$this->_sections['j']['index']]; ?>
" ><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]; ?>
</option>
			<?php endfor; endif; ?>
			</select>
		</div>
	<?php endif; ?>
</div>
<?php endfor; endif; ?>

<input type="submit" value="送出" />
</form>
</div>