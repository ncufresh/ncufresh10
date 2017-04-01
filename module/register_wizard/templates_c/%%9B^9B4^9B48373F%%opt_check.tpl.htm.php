<?php /* Smarty version 2.6.26, created on 2010-08-06 07:31:11
         compiled from zh_tw/opt_check.tpl.htm */ ?>
<div>

<div id="calender_all">
	<div id="calender_index_top">
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['document']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<?php if ($this->_tpl_vars['document'][$this->_sections['i']['index']]['doc_id'] == $this->_tpl_vars['did']): ?>
				<div id="title">
					<?php echo $this->_tpl_vars['document'][$this->_sections['i']['index']]['doc_name']; ?>

				</div>
				<?php if ($this->_tpl_vars['currmodule']->is_admin($this->_tpl_vars['curruser']->uid)): ?>
					<div id="edit_del">
						<a href="edit_or_del.php?msg=edit&did=<?php echo $this->_tpl_vars['did']; ?>
">修改</a>
						<a href="edit_or_del.php?msg=del&did=<?php echo $this->_tpl_vars['did']; ?>
">刪除</a> 
					</div>
				<?php endif; ?>
			<?php endif; ?>
		<?php endfor; endif; ?>
	</div>
	<div id="calender_index_mid"> 
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['document']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<?php if ($this->_tpl_vars['document'][$this->_sections['i']['index']]['doc_id'] == $this->_tpl_vars['did']): ?>
				<div id="content">
					<?php echo $this->_tpl_vars['document'][$this->_sections['i']['index']]['doc_content']; ?>

				</div>
			<?php endif; ?>
		<?php endfor; endif; ?>	
	</div>					
	<div id="calender_index_buttom">
		<div id="status">
			<?php if ($this->_tpl_vars['curruser']->is_guest()): ?>
				狀態：<span>請先登入</span>
				<div id="buttom_block"></div>
			<?php else: ?>
				<?php if ($this->_tpl_vars['check'] == 1 && $this->_tpl_vars['check_end'] == 1): ?>
					<?php if ($this->_tpl_vars['finish'][0]['is_finished'] == 1): ?>
						狀態：<span id="safed">完成</span>
						<a href="user_finish_del.php?uid=<?php echo $this->_tpl_vars['curruser']->uid; ?>
&did=<?php echo $this->_tpl_vars['did']; ?>
">
							<div id="del_fin"></div>
						</a>
					<?php else: ?>
						狀態：<span id="dan">未完成</span>
						<a href="user_finish_save.php?uid=<?php echo $this->_tpl_vars['curruser']->uid; ?>
&did=<?php echo $this->_tpl_vars['did']; ?>
">
							<div id="fin"></div>
						</a>
					<?php endif; ?>
				<?php else: ?>
					<?php if ($this->_tpl_vars['check_end'] == 0): ?>
						<?php if ($this->_tpl_vars['finish'][0]['is_finished'] == 1): ?>
							狀態：<span id="safed">完成</span>
							<div id="buttom_block"></div>
						<?php else: ?>
							狀態：過期
							<div id="buttom_block"></div>
						<?php endif; ?>
					<?php else: ?>
						狀態：時間未到
						<div id="buttom_block"></div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['document']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<?php if ($this->_tpl_vars['document'][$this->_sections['i']['index']]['doc_id'] == $this->_tpl_vars['did']): ?>
				<?php if ($this->_tpl_vars['front']['doc_id']): ?>
					<a title="<?php echo $this->_tpl_vars['front']['doc_name']; ?>
" href="opt_check.php?id=<?php echo $this->_tpl_vars['front']['doc_id']; ?>
"><span id="former_pic"></span></a>
					<a id="former" href="opt_check.php?id=<?php echo $this->_tpl_vars['front']['doc_id']; ?>
"><?php echo $this->_tpl_vars['front']['doc_name']; ?>
</a>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['later']['doc_id']): ?>
					<a title="<?php echo $this->_tpl_vars['later']['doc_name']; ?>
" href="opt_check.php?id=<?php echo $this->_tpl_vars['later']['doc_id']; ?>
"><span id="later_pic"></span></a>
					<a id="later" href="opt_check.php?id=<?php echo $this->_tpl_vars['later']['doc_id']; ?>
"><?php echo $this->_tpl_vars['later']['doc_name']; ?>
</a>
				<?php endif; ?>
			<?php endif; ?>
		<?php endfor; endif; ?>
		<a title="回月曆" href="index.php"><div id="return_calender"></div></a>
	</div>
</div>
<?php echo $this->_tpl_vars['events']; ?>
	
</div>