<?php /* Smarty version 2.6.26, created on 2010-08-06 07:28:03
         compiled from reg_event.tpl.htm */ ?>
<div id="backgr">
	<div id="event_list" >
		<div id="new_thing">
		</div>
		<a id="p_up"><div id="up"></div></a>
		<div id="list_no_up_and_down">
   			<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['block_var']['info']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<?php if ($this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 1): ?>
	 			<div>
	 				<span class="t<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
">
	 					<?php if ($this->_tpl_vars['block_var']['fin'][$this->_sections['j']['index']]['is_finished'] == 1): ?>
	 	 					<img id="<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
" src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/templates/zh_tw/images/calender_nike.jpg" onclick="opt_change(<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
)">		
						<?php else: ?>
		 					<img id="<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
" src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/templates/zh_tw/images/calender_nike_empty.jpg" onclick="opt_change(<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
)"/>		
						<?php endif; ?>
					</span>
					<span>
						<?php if ($this->_tpl_vars['block_var']['beg'][$this->_sections['j']['index']] != $this->_tpl_vars['block_var']['end'][$this->_sections['j']['index']]): ?>
							<?php echo $this->_tpl_vars['block_var']['beg'][$this->_sections['j']['index']]; ?>
~<?php echo $this->_tpl_vars['block_var']['end'][$this->_sections['j']['index']]; ?>

						<?php else: ?>
							<?php echo $this->_tpl_vars['block_var']['beg'][$this->_sections['j']['index']]; ?>

						<?php endif; ?>
					</span>
					<br />
		
					<?php if ($this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 1): ?>
						<span>
							<a id="dan" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/opt_check.php?id=<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
"><?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_name']; ?>
</a>
						</span>
					<?php elseif ($this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 0): ?>
						<span>
							<a id="safe" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/opt_check.php?id=<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
"><?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_name']; ?>
</a>
						</span>
					<?php elseif ($this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 3): ?>
						<span>
							<a id="over" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/opt_check.php?id=<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
"><?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_name']; ?>
</a>
						</span>
					<?php else: ?>
						<span>
							<a id="normal" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/opt_check.php?id=<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
"><?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_name']; ?>
</a>
						</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
  			<?php endfor; endif; ?>
			<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['block_var']['info']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<?php if ($this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 3): ?>
	 			<div>
	 				<span class="t<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
">
	 					<?php if ($this->_tpl_vars['block_var']['fin'][$this->_sections['j']['index']]['is_finished'] == 1): ?>
	 	 					<img id="<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
" src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/templates/zh_tw/images/calender_nike.jpg" onclick="opt_change(<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
)">		
						<?php else: ?>
		 					<img id="<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
" src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/templates/zh_tw/images/calender_nike_empty.jpg" onclick="opt_change(<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
)"/>		
						<?php endif; ?>
					</span>
					<span>
						<?php if ($this->_tpl_vars['block_var']['beg'][$this->_sections['j']['index']] != $this->_tpl_vars['block_var']['end'][$this->_sections['j']['index']]): ?>
							<?php echo $this->_tpl_vars['block_var']['beg'][$this->_sections['j']['index']]; ?>
~<?php echo $this->_tpl_vars['block_var']['end'][$this->_sections['j']['index']]; ?>

						<?php else: ?>
							<?php echo $this->_tpl_vars['block_var']['beg'][$this->_sections['j']['index']]; ?>

						<?php endif; ?>
					</span>
					<br />
		
					<?php if ($this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 1): ?>
						<span>
							<a id="dan" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/opt_check.php?id=<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
"><?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_name']; ?>
</a>
						</span>
					<?php elseif ($this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 0): ?>
						<span>
							<a id="safe" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/opt_check.php?id=<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
"><?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_name']; ?>
</a>
						</span>
					<?php elseif ($this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 3): ?>
						<span>
							<a id="over" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/opt_check.php?id=<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
"><?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_name']; ?>
</a>
						</span>
					<?php else: ?>
						<span>
							<a id="normal" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/opt_check.php?id=<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
"><?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_name']; ?>
</a>
						</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
  			<?php endfor; endif; ?>
			<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['block_var']['info']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<?php if ($this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 0 || $this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 2): ?>
	 			<div>
	 				<span class="t<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
">
	 					<?php if ($this->_tpl_vars['block_var']['fin'][$this->_sections['j']['index']]['is_finished'] == 1): ?>
	 	 					<img id="<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
" src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/templates/zh_tw/images/calender_nike.jpg" onclick="opt_change(<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
)">		
						<?php else: ?>
		 					<img id="<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
" src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/templates/zh_tw/images/calender_nike_empty.jpg" onclick="opt_change(<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
)"/>		
						<?php endif; ?>
					</span>
					<span>
						<?php if ($this->_tpl_vars['block_var']['beg'][$this->_sections['j']['index']] != $this->_tpl_vars['block_var']['end'][$this->_sections['j']['index']]): ?>
							<?php echo $this->_tpl_vars['block_var']['beg'][$this->_sections['j']['index']]; ?>
~<?php echo $this->_tpl_vars['block_var']['end'][$this->_sections['j']['index']]; ?>

						<?php else: ?>
							<?php echo $this->_tpl_vars['block_var']['beg'][$this->_sections['j']['index']]; ?>

						<?php endif; ?>
					</span>
					<br />
		
					<?php if ($this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 1): ?>
						<span>
							<a id="dan" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/opt_check.php?id=<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
"><?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_name']; ?>
</a>
						</span>
					<?php elseif ($this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 0): ?>
						<span>
							<a id="safe" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/opt_check.php?id=<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
"><?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_name']; ?>
</a>
						</span>
					<?php elseif ($this->_tpl_vars['block_var']['dan'][$this->_sections['j']['index']] == 3): ?>
						<span>
							<a id="over" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/opt_check.php?id=<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
"><?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_name']; ?>
</a>
						</span>
					<?php else: ?>
						<span>
							<a id="normal" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/register_wizard/opt_check.php?id=<?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_id']; ?>
"><?php echo $this->_tpl_vars['block_var']['info'][$this->_sections['j']['index']]['doc_name']; ?>
</a>
						</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
  			<?php endfor; endif; ?>
 		</div>
		<a id="p_down"><div id="down"></div></a>

		<div id="date">
			<?php echo $this->_tpl_vars['block_var']['today']; ?>

		</div>
	</div>
</div>