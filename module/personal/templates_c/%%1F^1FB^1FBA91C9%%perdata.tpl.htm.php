<?php /* Smarty version 2.6.26, created on 2010-08-23 20:36:25
         compiled from zh_tw/perdata.tpl.htm */ ?>
<div class="top"></div>
<div class="p_back">
  <div class="p_text">	
    <div class="p_head">
    <img src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/<?php echo $this->_tpl_vars['perdata']['head_image']; ?>
" vspace=8/>
    <?php if ($this->_tpl_vars['perdata']['uid'] == $this->_tpl_vars['curruser']->uid): ?>
    <a href="update.php"><img src="templates/zh_tw/images/data/rewr.png"/></a><?php endif; ?>
    </div>
	<div class="p_left">
		<?php if ($this->_tpl_vars['perdata']['uid'] == $this->_tpl_vars['curruser']->uid): ?>
		姓名:<br/>
		<?php endif; ?>
		暱稱:<br/>
		帳號:<br/>
		系所:<br/>
		生日:<br/>
		<?php if ($this->_tpl_vars['perdata']['uid'] == $this->_tpl_vars['curruser']->uid): ?>
		電子郵件:<br/>
		<?php endif; ?>
		畢業高中:<br/>
		個人首頁:<br/>
		自我介紹:<br/>
	</div>
	<div class="p_right">
		<?php if ($this->_tpl_vars['perdata']['uid'] == $this->_tpl_vars['curruser']->uid): ?>
		<?php echo $this->_tpl_vars['perdata']['realname']; ?>
<br/>
		<?php endif; ?>
		<?php echo $this->_tpl_vars['perdata']['nickname']; ?>
<br/>
		<?php echo $this->_tpl_vars['perdata']['username']; ?>
<br/>
		<?php echo $this->_tpl_vars['perdata']['department']; ?>
<br/>
		<?php echo $this->_tpl_vars['perdata']['birthday']; ?>
<br/>
		<?php if ($this->_tpl_vars['perdata']['uid'] == $this->_tpl_vars['curruser']->uid): ?>
		<?php echo $this->_tpl_vars['perdata']['email']; ?>
<br/>
		<?php endif; ?>
		<?php echo $this->_tpl_vars['perdata']['senior_high']; ?>
<br/>
		<?php echo $this->_tpl_vars['perdata']['self_website']; ?>
<br/>
		<?php echo $this->_tpl_vars['perdata']['self_intro']; ?>
<br/>
    </div>
  </div>
</div>
<div class="p_footer"></div>