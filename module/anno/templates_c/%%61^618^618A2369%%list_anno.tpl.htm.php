<?php /* Smarty version 2.6.26, created on 2010-08-06 07:36:04
         compiled from zh_tw/list_anno.tpl.htm */ ?>

<link rel="stylesheet" type="text/css" href="style.css" />

<?php if ($this->_tpl_vars['warning_msg'] != ""): ?>
<span class="warning_msg"><?php echo $this->_tpl_vars['warning_msg']; ?>
</span>
<br /><br >

<?php endif; ?>
<div class="list_title">
<?php if ($this->_tpl_vars['currmodule']->is_admin()): ?><a title="新增公告" href="edit_anno.php?action=new">[新增公告]</a><?php endif; ?>
</div>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['anno_array']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if ($this->_tpl_vars['anno_array'][$this->_sections['i']['index']]['is_display'] == TRUE || $this->_tpl_vars['currmodule']->is_admin() == TRUE): ?>
<div class="list_anno">
  <div class="list_anno_title"><a title="<?php echo $this->_tpl_vars['anno_array'][$this->_sections['i']['index']]['title']; ?>
" href="show_anno.php?tid=<?php echo $this->_tpl_vars['anno_array'][$this->_sections['i']['index']]['tid']; ?>
"><?php if ($this->_tpl_vars['anno_array'][$this->_sections['i']['index']]['is_display'] == 0 && $this->_tpl_vars['currmodule']->is_admin() == 1): ?><span class="warning_msg">[尚未發布] </span><?php endif; ?><?php echo $this->_tpl_vars['anno_array'][$this->_sections['i']['index']]['title']; ?>
</a></div>
  <div class="list_anno_info"><?php echo $this->_tpl_vars['anno_array'][$this->_sections['i']['index']]['datetime']; ?>
</div>
  <br class="clear" />
</div>
<?php endif; ?>
<?php endfor; endif; ?>