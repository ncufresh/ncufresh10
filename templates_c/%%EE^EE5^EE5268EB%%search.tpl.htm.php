<?php /* Smarty version 2.6.26, created on 2010-08-06 07:35:09
         compiled from zh_tw/search.tpl.htm */ ?>
<div style="width:614px">
	<img src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/templates/zh_tw/images/title.png" /><br /><br />
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['final_result']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<img src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/templates/zh_tw/images/ll.png" /><br /><br />
		<a target="_blank" href="<?php echo $this->_tpl_vars['final_result'][$this->_sections['i']['index']]['r_url']; ?>
"><span class="search_page_title"><?php echo $this->_tpl_vars['final_result'][$this->_sections['i']['index']]['r_title']; ?>
</span><br /><span class="search_page_content"><?php echo $this->_tpl_vars['final_result'][$this->_sections['i']['index']]['r_content']; ?>
</span></a><br /><br />
	<?php endfor; endif; ?>
	<img src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/templates/zh_tw/images/ll.png" /><br /><br />&nbsp;
</div>