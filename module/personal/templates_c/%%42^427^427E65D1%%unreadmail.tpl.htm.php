<?php /* Smarty version 2.6.26, created on 2010-08-06 07:28:57
         compiled from zh_tw/unreadmail.tpl.htm */ ?>
<script type="text/javascript">
J(document).ready(function(){
    setTimeout(function(){
        J('div#wait').hide('slow');
    }, 1000);
});
</script>
       <div class="m_up">
		<?php if ($this->_tpl_vars['much'] != 0): ?>	
		  <a href="unreadmail.php"><img alt="未讀訊息" src="templates/zh_tw/images/mailbox/notreadn.png"/></a>
	    <div class="in_frog"><?php echo $this->_tpl_vars['much']; ?>
</div>
          <?php else: ?>
	        <a href="unreadmail.php"><img alt="未讀訊息" src="templates/zh_tw/images/mailbox/notread.png"/></a>
	        <?php endif; ?>
	        <a href="haveread.php"><img alt="已讀訊息" src="templates/zh_tw/images/mailbox/nnread.png"/></a>
	        <a href="sendmail.php"><img alt="寄送訊息" src="templates/zh_tw/images/mailbox/nnsend.png"/></a>
      </div>
	<div class="m_back">
			<div class="mailtop">
			<div class="mail_title"><img src="templates/zh_tw/images/mailbox/mailtitle.png"/></div>
			<div class="mail_pe"><img src="templates/zh_tw/images/mailbox/mailsedt.png"/></div>
			<div class="mail_date"><img src="templates/zh_tw/images/mailbox/maildate.png"/></div>
	</div>
	<div class="mail_show">
			<?php if ($this->_tpl_vars['all_right'] == true): ?><div id="wait">發送成功!</div><?php endif; ?> 
			<?php if ($this->_tpl_vars['much'] == 0): ?>
			您沒有未讀訊息<br/>
			<?php endif; ?>
				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['mail_arr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
				<div class="mail_title">
				<img src="templates/zh_tw/images/mailbox/b.png"/>
				<a href="contents.php?read=0&mid=<?php echo $this->_tpl_vars['mail_arr'][$this->_sections['i']['index']]['mid']; ?>
&where=unread"><?php echo $this->_tpl_vars['mail_arr'][$this->_sections['i']['index']]['subject']; ?>

				</a></div>
				<div class="mail_pe"><?php echo $this->_tpl_vars['mail_arr'][$this->_sections['i']['index']]['username']; ?>
</div>
				<div class="mail_date"><?php echo $this->_tpl_vars['mail_arr'][$this->_sections['i']['index']]['datetime']; ?>
</div><br/>
			    <?php endfor; endif; ?>   
			</div>
			
	</div>