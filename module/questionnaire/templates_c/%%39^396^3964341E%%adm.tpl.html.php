<?php /* Smarty version 2.6.26, created on 2010-09-03 16:35:49
         compiled from zh_tw/adm.tpl.html */ ?>
<div>
<p>點選下列問卷編輯或是<a id="new" href="new.php">新增一份問卷</a></p>

<table><tbody>
<tr>
	<th>問卷標題</th>
	<th>問卷描述</th>
	<th>刪除</th>
	<th>編輯</th>
</tr>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['qform']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<tr>
	<td><?php echo $this->_tpl_vars['qform'][$this->_sections['i']['index']]['title']; ?>
</td>
	<td><?php echo $this->_tpl_vars['qform'][$this->_sections['i']['index']]['description']; ?>
</td>
	<td class="tool"><a href="delete.php?qid=<?php echo $this->_tpl_vars['qform'][$this->_sections['i']['index']]['qid']; ?>
"><img class="delForm" src="templates/zh_tw/images/X.png" alt="刪除" title="刪除" /></a></td>
	<td class="tool"><a href="edit.php?qid=<?php echo $this->_tpl_vars['qform'][$this->_sections['i']['index']]['qid']; ?>
"><img class="editForm" src="templates/zh_tw/images/pen.png" alt="編輯" title="編輯" /></a></td>
</tr>
<?php endfor; endif; ?>
</tbody></table>
</div>