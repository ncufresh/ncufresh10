<?php /* Smarty version 2.6.26, created on 2010-08-11 21:08:41
         compiled from zh_tw/sendmail.tpl.htm */ ?>
<script type="text/javascript">
J(document).ready(function(){
    setTimeout(function(){
        J('div#wait').hide('slow');
    }, 3000);
});
</script>
      <div class="m_up">
		<?php if ($this->_tpl_vars['much'] != 0): ?>	
		  <a href="unreadmail.php"><img alt="未讀訊息" src="templates/zh_tw/images/mailbox/nnnotreadn.png"/></a>
	    <div class="in_frog"><?php echo $this->_tpl_vars['much']; ?>
</div>
          <?php else: ?>
	        <a href="unreadmail.php"><img alt="未讀訊息" src="templates/zh_tw/images/mailbox/nnnotread.png"/></a>
	        <?php endif; ?>
        <a href="haveread.php"><img alt="已讀訊息" src="templates/zh_tw/images/mailbox/nnread.png"/></a>
        <a href="sendmail.php"><img alt="寄送訊息" src="templates/zh_tw/images/mailbox/send.png"/></a>
      </div>
<div class="m_back">
  <div class="s_area">
		<!-- leave message --!>
<?php if ($this->_tpl_vars['all_right'] == false): ?><div id="wait"><?php echo $this->_tpl_vars['errmsg']; ?>
</div><?php endif; ?>
		以下欄位均不可留空<br/>
		<form action="action.php?action=send" method="post">
		 <div class="s_text"> 
			  <div class="s_q">收件人ID：</div>
			  <div class="s_q">標題：</div>
			  <div class="s_q_content">內容：</div>		  
			  <div class="s_q">請輸入驗證碼</div>
		</div>  
  <div class="s_right">		
		<div class="s_form">
			  <div class="s_form"><input type="text" name="sendtowho" value="<?php echo $this->_tpl_vars['post_rec']; ?>
"/><br /></div>
			  <div class="s_form"><input type="text" name="topic" value="<?php echo $this->_tpl_vars['post_topic']; ?>
"/><br /></div>
			  <div class="s_form_contnet"><textarea name="content" cols="24" rows="5" class="myTextarea"><?php echo $this->_tpl_vars['post_content']; ?>
</textarea><br /></div>
			  <div class="s_form"><input type="text" name="num"/><br /></div>
			  <div class="s_form"><img src="../../core/lib/ac_random_im_generator.php"/></div>
			  <div class="s_send"><input type="image" border="0" src="templates/zh_tw/images/mailbox/sub.png" value="寄出" />
			  <input type="reset" class="s_clear" value="" /> 
              <?php if ($this->_tpl_vars['curruser']->username == 'NcuFresh10'): ?><a href="sendtoall.php">全站寄信</a><?php endif; ?></div>
        </div>
        </form>
  </div>
  </div>
</div>