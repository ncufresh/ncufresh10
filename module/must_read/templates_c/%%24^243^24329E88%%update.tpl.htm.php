<?php /* Smarty version 2.6.26, created on 2010-08-06 16:58:21
         compiled from zh_tw/update.tpl.htm */ ?>
<?php if ($this->_tpl_vars['currmodule']->is_system() == TRUE): ?>
<form name="data" action="update_finish.php?Key=<?php echo $this->_tpl_vars['Key']; ?>
&num=<?php echo $this->_tpl_vars['num']; ?>
" method="post" onsubmit="procCheck();">
   <a href="must.php?num=<?php echo $this->_tpl_vars['num']; ?>
">回上一頁</a><br />
   原標題:<?php echo $this->_tpl_vars['must_1_2D'][0]['title']; ?>
<br />
   新標題:<input name="Ntitle" type="text" /><br />
   內容
   <?php echo $this->_tpl_vars['editor']; ?>

  <input type="submit" value="確定修改">
</form>

<?php endif; ?>