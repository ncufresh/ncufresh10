<?php /* Smarty version 2.6.26, created on 2010-09-08 01:09:11
         compiled from zh_tw/statistics.tpl.html */ ?>
<div class="statistics">

	<div class="title"><?php echo $this->_tpl_vars['title']; ?>
</div>
	<div class="description"><?php echo $this->_tpl_vars['description']; ?>
</div>

	<table><tbody>
		<tr>
			<th>問題</th><th>選項</th><th>人數</th>				
		</tr>
		<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['opt_count']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['name'] = 'i';
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
			<?php unset($this->_sections['j']);
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['opt_count'][$this->_sections['i']['index']]['options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['name'] = 'j';
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
			<tr>
				<?php if ($this->_sections['j']['iteration'] == 1): ?>
					<td rowspan="<?php echo $this->_sections['j']['total']; ?>
"><?php echo $this->_tpl_vars['opt_count'][$this->_sections['i']['index']]['topic']; ?>
</td>
				<?php endif; ?>	
					<td><?php echo $this->_tpl_vars['opt_count'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]['option']; ?>
</td><td><?php echo $this->_tpl_vars['opt_count'][$this->_sections['i']['index']]['options'][$this->_sections['j']['index']]['count']; ?>
</td>
			</tr>
			<?php endfor; endif; ?>
		<?php endfor; endif; ?>
	</tbody></table>

</div>