<?php /* Smarty version 2.6.26, created on 2010-08-05 21:44:00
         compiled from zh_tw/correct.tpl.html */ ?>
<div class="quesbody">
	<div class="form_text">
	<div class="description"><?php echo $this->_tpl_vars['description']; ?>
</div>
	<div class="title"><?php echo $this->_tpl_vars['title']; ?>
</div>
	</div>

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
<div class="q_text_top"></div>
<div class="q_text_middle" >
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
			<label>此題沒有正確答案</label><br/>
		</div>
	<?php elseif ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '1'): ?>
		<div class="q_response res_area">	
			<label>此題沒有正確答案</label><br/>
		</div>
	<?php elseif ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '2'): ?>
		<div class="q_response res_radio">	
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
				<li><?php if ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['correct'][$this->_sections['j']['index']] == '1'): ?><img src="templates/zh_tw/images/correct.jpg" class="icon" /><?php else: ?><img src="templates/zh_tw/images/X.png" class="icon" /><?php endif; ?><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]; ?>
</li>
			<?php endfor; endif; ?>
			</ul>
		</div>	
	
	<?php elseif ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '3'): ?>
		<div class="q_response res_check">	
		
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
				<li><?php if ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['correct'][$this->_sections['j']['index']] == '1'): ?><img src="templates/zh_tw/images/correct.jpg" class="icon" /><?php else: ?><img src="templates/zh_tw/images/X.png" class="icon" /><?php endif; ?><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]; ?>
</li>
			<?php endfor; endif; ?>
			</ul>
		</div>	
	<?php elseif ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['t_type'] == '4'): ?>
		<div class="q_response res_list">	
		
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
				<li><?php if ($this->_tpl_vars['questions'][$this->_sections['i']['index']]['correct'][$this->_sections['j']['index']] == '1'): ?><img src="templates/zh_tw/images/correct.jpg" class="icon"/><?php else: ?><img src="templates/zh_tw/images/X.png" class="icon" /><?php endif; ?><?php echo $this->_tpl_vars['questions'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]; ?>
</li>
			<?php endfor; endif; ?>
			</ul>
		</div>
	<?php endif; ?>
</div>
<?php endfor; endif; ?>

</div>