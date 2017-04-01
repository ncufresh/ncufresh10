<?php /* Smarty version 2.6.26, created on 2010-09-03 16:35:52
         compiled from zh_tw/edit.tpl.html */ ?>
<?php if ($this->_tpl_vars['qform_exist']): ?>

<div class="formbody">
	
	<input type="hidden" name="qid" value="<?php echo $this->_tpl_vars['qid']; ?>
">
	<div class="q-body">
		<div class="txtbar">
			<div class="text" class="form_title"><label for="form_title_text">問卷標題</label></div>
			<input type="text" id="form_title_text" name="form_title" value="<?php echo $this->_tpl_vars['q_title']; ?>
"/><br/>
			<div class="text" class="form_desc"><label for="form_desc_text">問卷描述</label></div>
			<textarea id="form_desc_text" name="form_desc"><?php echo $this->_tpl_vars['q_desc']; ?>
</textarea>
		</div>
		
		<!--這裡要放問題編輯區塊-->
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zh_tw/".($this->_tpl_vars['qbody']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
	</div>
</div>

<div class="toolbar">
		<span id="add"><button type="button">新增問題</button></span>
		<span id="save"><button type="button">儲存問卷</button></span>
		<div id="saveMsg">&nbsp</div>
</div>

<?php else: ?>
<div>沒有此份問卷喔!!請再確認一次或是<a href="new.php">點此新增一份新的問卷</a></div>
<?php endif; ?>