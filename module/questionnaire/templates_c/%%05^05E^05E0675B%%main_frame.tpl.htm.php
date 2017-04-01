<?php /* Smarty version 2.6.26, created on 2010-06-03 10:42:38
         compiled from C:/AppServ/www/ncufresh/ArmoredCore/templates/zh_tw/main_frame.tpl.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ArmoredCore PHP Framework</title>
<?php echo $this->_tpl_vars['currcfg']['CSS_HEADER']; ?>

<?php echo $this->_tpl_vars['currcfg']['JS_HEADER']; ?>

</head>

<body>
<div id="main">
  <div id="main_up_border"></div>
  <div id="main_banner"></div>
  <div id="main_menubar">
    <a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
"><div class="menu_button" align="center">回到首頁</div></a>
	<?php if ($this->_tpl_vars['currmodule']->is_system() == TRUE): ?>
    <a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/ac_admin/"><div class="menu_button" align="center">管理模組</div></a>
	<?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/gbook/"><div class="menu_button" align="center">留言模組</div></a>
	<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/questionnaire/"><div class="menu_button" align="center">問卷系統</div></a>
	<form action="search.php" method="get">
	<div class="search_bar">
	<input type="text" name="keyword" />
	<input type="submit" name="submit" value="搜尋" />
	</div>
	</form>
  </div>
  <div id="main_container">
  <?php echo $this->_tpl_vars['MAIN_CONTENTS_BLOCK']; ?>

  <br class="clear">
  </div>
  <div id="main_footer"><center>2010 (c) ArmoredCore PHP Framework</center></div>
</div>
</body>
</html>