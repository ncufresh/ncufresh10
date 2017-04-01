<?php /* Smarty version 2.6.26, created on 2010-08-06 07:25:09
         compiled from login_status_block.tpl.htm */ ?>
	  <?php if ($this->_tpl_vars['curruser']->is_guest == TRUE): ?>
	  <div id="main_top_before_login">
	  <form action="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/login.php?action=login" method="post">
      <div id="login_left">
        帳號：<input name="username" type="text" style="font-size: 12px; width: 80px;" /><br />
        密碼：<input name="password" type="password" style="font-size: 12px; width: 80px;" /><br />
      </div>
      <div id="login_right">
        <input type="image" src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/templates/<?php echo $this->_tpl_vars['currcfg']['DEFAULT_LANG']; ?>
/images/login.png" style="border: 0px;" />
	<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/personal/register.php"><img alt="註冊" src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/templates/<?php echo $this->_tpl_vars['currcfg']['DEFAULT_LANG']; ?>
/images/signup.png" /></a>
      </div>
	  </form>
	  </div>
	  <?php else: ?>
	  <div id="main_top_after_login">
		<div id="login_user"><?php echo $this->_tpl_vars['curruser']->username; ?>
您好！</div>
		<div id="unread_mes">您有<?php echo $this->_tpl_vars['block_var']['much']; ?>
封未讀訊息</div>
		<div id="login_image_link">
		<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/personal"><img src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/templates/zh_tw/images/info.png" alt="個人區" /></a>
		<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/personal/unreadmail.php"><img src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/templates/zh_tw/images/mail.png" alt="信箱" /></a>
		<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/tree"><img src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/templates/zh_tw/images/tree.png" alt="我的小樹" /></a>
	  </div>
	  <div id="logout_button"><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/login.php?action=logout">[登出]</a></div>
	  <?php endif; ?>
     </div>