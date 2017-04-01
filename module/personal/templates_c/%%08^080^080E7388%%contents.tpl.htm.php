<?php /* Smarty version 2.6.26, created on 2010-08-06 07:28:58
         compiled from zh_tw/contents.tpl.htm */ ?>
       <div class="m_up">
		<?php if ($this->_tpl_vars['much'] != 0): ?>	
		  <a href="unreadmail.php"><img alt="未讀訊息" src="templates/zh_tw/images/mailbox/nnnotreadn.png"/></a>
	    <div class="in_frog"><?php echo $this->_tpl_vars['much']; ?>
</div>
          <?php else: ?>
	        <a href="unreadmail.php"><img alt="未讀訊息" src="templates/zh_tw/images/mailbox/nnnotread.png"/></a>
	        <?php endif; ?>
	        <a href="haveread.php"><img alt="已讀訊息" src="templates/zh_tw/images/mailbox/nnread.png"/></a>
	        <a href="sendmail.php"><img alt="寄送訊息" src="templates/zh_tw/images/mailbox/nnsend.png"/></a>
      </div>
 
      	<div class="m_back">
		  <div class="mail_show">
			<div class="m_c_sub">寄件者：</div><div class="m_c_con"><?php echo $this->_tpl_vars['contents']['username']; ?>
</div><br/>
			<div class="m_c_sub">標題：</div><div class="m_c_con"><?php echo $this->_tpl_vars['contents']['subject']; ?>
</div><br/>
			<div class="m_c_sub">內容：</div><div class="m_c_con"><?php echo $this->_tpl_vars['contents']['contents']; ?>
</div><br/>
			<?php if ($this->_tpl_vars['where'] == 'haveread'): ?>
			<div class="m_down"><div class="m_c_back"><a href="sendmail.php?what=<?php echo $this->_tpl_vars['contents']['username']; ?>
"><img src="templates/zh_tw/images/mailbox/retowr.png"><a/></div><div class="m_c_back"><a href="haveread.php"><img src="templates/zh_tw/images/mailbox/backlast.png"><a/></div></div>
			<?php else: ?>
			<div class="m_down"><div class="m_c_back"><a href="sendmail.php?what=<?php echo $this->_tpl_vars['contents']['username']; ?>
"><img src="templates/zh_tw/images/mailbox/retowr.png"><a/></div><div class="m_c_back"><a href="unreadmail.php"><img src="templates/zh_tw/images/mailbox/backlast.png"><a/></div></div>
			<?php endif; ?>
		  </div>
		<br class="clear"/>
		</div>