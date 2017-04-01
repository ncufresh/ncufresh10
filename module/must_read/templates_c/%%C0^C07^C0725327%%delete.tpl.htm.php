<?php /* Smarty version 2.6.26, created on 2010-08-09 11:34:58
         compiled from zh_tw/delete.tpl.htm */ ?>
<p style="font-size:30px">是否要刪除?<br /></p>
<form action="delete_finish.php?Key=<?php echo $this->_tpl_vars['Key']; ?>
&num=<?php echo $this->_tpl_vars['num']; ?>
" method="post">
<input name="send" value="是" type="submit">
</form>
<form action="must.php?num=<?php echo $this->_tpl_vars['num']; ?>
" method="post">
<input name="send" value="否" type="submit">
</form>
<hr />
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['must_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['title']; ?>
<br/>
<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['content']; ?>
<br/><p/>
<?php endfor; endif; ?>