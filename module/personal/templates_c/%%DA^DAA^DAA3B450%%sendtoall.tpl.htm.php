<?php /* Smarty version 2.6.26, created on 2010-08-11 21:14:47
         compiled from zh_tw/sendtoall.tpl.htm */ ?>
<?php if ($this->_tpl_vars['all_right'] == 'true'): ?>
寄信成功!
<?php else: ?>
<?php echo $this->_tpl_vars['errmsg']; ?>

<?php endif; ?>
<form action="sendtoall.php" method="post">
標題<input type="text" name="topic" value="<?php echo $this->_tpl_vars['post_topic']; ?>
"/><br />
內容<textarea name="content" cols="24" rows="5" class="myTextarea"><?php echo $this->_tpl_vars['post_content']; ?>
</textarea><br />
<input type="submit" value="寄出" /> 
</form>