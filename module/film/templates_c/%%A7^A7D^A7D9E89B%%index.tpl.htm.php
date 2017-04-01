<?php /* Smarty version 2.6.26, created on 2010-08-06 07:30:38
         compiled from zh_tw/index.tpl.htm */ ?>
<div>
	<div id="film_list">
		<div id="film_list_left"></div>
		<div id="film_queue">
			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['img_src_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<a href="index.php?film=<?php echo $this->_tpl_vars['img_src_2D'][$this->_sections['i']['index']]['film_index']; ?>
"><span class="film"><img src="<?php echo $this->_tpl_vars['img_src_2D'][$this->_sections['i']['index']]['img_src']; ?>
" /></span></a>
			<?php endfor; endif; ?>
		</div>
		<div id="film_list_right"></div>
	</div>
	<div id="film_show_bg">
		<div id="film_title"><?php echo $this->_tpl_vars['film_title']; ?>
</div>
		<div id="film_show"><?php echo $this->_tpl_vars['film_src']; ?>
</div>
		<div id="description"><?php echo $this->_tpl_vars['desc']; ?>
</div>
	</div>
</div>