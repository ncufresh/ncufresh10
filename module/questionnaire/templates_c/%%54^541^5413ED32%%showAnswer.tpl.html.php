<?php /* Smarty version 2.6.26, created on 2010-09-10 17:41:58
         compiled from zh_tw/showAnswer.tpl.html */ ?>
<div class="title"><?php echo $this->_tpl_vars['title']; ?>
</div>
<div class="description"><?php echo $this->_tpl_vars['description']; ?>
</div>

<table><tbody>
<tr>
	<th>使用者</th>
	<?php $_from = $this->_tpl_vars['topics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
	<th><?php echo $this->_tpl_vars['i']; ?>
</th>
	<?php endforeach; endif; unset($_from); ?>
</tr>

<?php $_from = $this->_tpl_vars['answers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user'] => $this->_tpl_vars['options']):
?>
<tr>
		<td><?php echo $this->_tpl_vars['user']; ?>
</td>
		<?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option_1D']):
?>
			<td><?php echo $this->_tpl_vars['option_1D']['answer']; ?>
</td>
		<?php endforeach; endif; unset($_from); ?>
</tr>
<?php endforeach; endif; unset($_from); ?>

</tbody></table>