<?php /* Smarty version 2.6.26, created on 2010-08-06 07:27:54
         compiled from zh_tw/register.tpl.htm */ ?>
<script type="text/javascript">
J(document).ready(function(){
    setTimeout(function(){
        J('div#wait').hide('slow');
    }, 5000);
});

function renew(input)
{
	J('div#head_image').html("<img src=\"<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/"+ input + "\" />");
}

 jQuery(function(J){
	J('#exampleRange').datepicker({
          rangeSelect: true,
          firstDay: 1,
          formatDate: "yy-mm-dd",
	      showOn: 'both',
          buttonImageOnly: true,
          buttonImage: 'templates/zh_tw/images/calendar.png'});
});

</script>
		<div class="top">
        </div>
		<div class="back">
			<div class="must"><div class="star">*欄位為必填項目<br/></div></div>
			<div class="text">
			<?php if ($this->_tpl_vars['all_right'] == false): ?><div id="wait"><?php echo $this->_tpl_vars['errmsg']; ?>
</div><?php endif; ?>		
				<form action="action.php?action=reg" method="post">
			     
			      <div class="head_i">
					<div id="head_image"><img src="templates/zh_tw/images/head/00.jpg"/></div>
					<br/>
					<div class="star">*</div>
					<select size=1 name="head" onChange="renew(this.options[this.selectedIndex].value);">
					    <option value="請 選 擇">請 選 擇</option>
					<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['head']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value="<?php echo $this->_tpl_vars['head'][$this->_sections['i']['index']]['position']; ?>
"><?php echo $this->_tpl_vars['head'][$this->_sections['i']['index']]['headname']; ?>
</option>
					<?php endfor; endif; ?>
					</select>
			       </div>
			     
			      <div class="area">
			 	  <div class="star">*</div><div class="q">真實姓名:</div>
			 	  <div class="form"><input type="text" name="realname" value="<?php echo $this->_tpl_vars['post_realname']; ?>
"/><br /></div>
			      <div class="star">*</div><div class="q">暱稱:</div>
			      <div class="form"><input type="text" name="nickname" value="<?php echo $this->_tpl_vars['post_nickname']; ?>
"/><br /></div>
			      <div class="star">*</div><div class="q">帳號:</div>
			      <div class="form"><input type="text" name="username" value="<?php echo $this->_tpl_vars['post_username']; ?>
"/><br /></div>
			      <div class="star">*</div><div class="q">密碼:</div>
			      <div class="form"><input type="password" name="password" /><br /></div>
			      <div class="star">*</div><div class="q">確認密碼:</div>
			      <div class="form"><input type="password" name="password_check" /><br /></div>
			      <div class="star">*</div><div class="q">系所:</div>
			      <div class="form">
			      <?php echo $this->_tpl_vars['box']; ?>
</div>
			      
			      <div class="q">畢業高中:</div>
			      <div class="form"><input type="text" name="senior_high" value="<?php echo $this->_tpl_vars['post_senior']; ?>
"/><br /></div>
			      <div class="q">生日:</div>
			      <div class="form"><input type="text" id="exampleRange" name="birthday" value=""><br /></div>
			      <div class="q">email:</div>
			      <div class="form"><input type="text" name="email" value="<?php echo $this->_tpl_vars['post_email']; ?>
"/><br /></div>
			      <div class="q">個人首頁:</div>
			      <div class="form"><input type="text" name="self_website" value="<?php echo $this->_tpl_vars['post_website']; ?>
"/><br /></div>
			      <div class="q_intro">自我介紹:</div>
			      <div class="form_intro"><textarea name="self_intro" cols="24" rows="5" class="myTextarea"><?php echo $this->_tpl_vars['post_intro']; ?>
</textarea><br /></div>
			      <div class="q">請輸入驗證碼</div>
			      <div class="form"><input type="text" name="num"/><br /></div>
			      <div class="num"><img src="../../core/lib/ac_random_im_generator.php"/><br/></div>
			      <div class="button_1"><input type="image" border="0" src="templates/zh_tw/images/data/sub.png" value="寄出" /></div>
			      <div class="button_2"><input type="reset" class="clear" value="" /> </div>
			      </form>
			     </div>
		    </div>
     </div>
      <div class="footer">
     </div>