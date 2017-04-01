<?php /* Smarty version 2.6.26, created on 2010-08-11 22:46:26
         compiled from zh_tw/add.tpl.htm */ ?>
<?php if ($this->_tpl_vars['currmodule']->is_system() == TRUE): ?>
<form name="data" action="save.php" method="post">
    類別：
    <select name="select">
      <option value="0">請選擇</option>
      <option value="1">大一新生</option>
      <option value="2">大一復學</option>
      <option value="3">大一相關須知</option>
    </select><br>
    標題： <input name="title" type="text"><br>
   內容：<?php echo $this->_tpl_vars['editor']; ?>

  <input type="submit" value="確定發送">
</form>
<?php endif; ?>