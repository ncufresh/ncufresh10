<?php /* Smarty version 2.6.26, created on 2010-08-06 07:29:09
         compiled from zh_tw/forum_ask.tpl.htm */ ?>
<div id="bread">
	<div id="bread_image"><img src="templates/zh_tw/images/bread.png" /></div>
	<div id="bread_text">
		<a href="index.php" style="color:#999999">論壇專區</a>
		<?php if ($this->_tpl_vars['cid'] != 1 && $this->_tpl_vars['cid'] != 2 && $this->_tpl_vars['cid'] != 4): ?>
		><a href="dep_list.php" style="color:#999999">系所列表</a>
		<?php endif; ?>
		><a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1" style="color:#999999"><?php echo $this->_tpl_vars['forum_name']; ?>
</a>
		<?php if ($this->_tpl_vars['grid'] == 0): ?>
		><span style="color:#333333">發表文章</span>
		<?php else: ?>
		><span style="color:#333333">回覆文章</span>
		<?php endif; ?>
	</div>
	<br class="clear"/>
</div>
<div id="forum_ask">
<form action="forum_sql.php" method="post" name="forum_form">
	<?php if ($this->_tpl_vars['grid'] == 0): ?>
	<span class=ask_left>文章標題：</span><span class=ask_right><input name="title" type="text" value="<?php echo $this->_tpl_vars['title']; ?>
" size="39" /></span><br class="clear"/>&nbsp;<br class="clear"/>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['cid'] == 1 && $this->_tpl_vars['grid'] == 0): ?>
	<span class=ask_left>文章分類：</span>
	<span class=ask_right><select name="category">
	<?php if ($this->_tpl_vars['category'] == "選課"): ?>
		<option value="選課" selected="selected">選課</option>
		<option value="註冊">註冊</option>
		<option value="住宿">住宿</option>
		<option value="生活">生活</option>
		<option value="護照">護照</option>
		<option value="其他">其他</option>
	<?php elseif ($this->_tpl_vars['category'] == "註冊"): ?>
		<option value="選課">選課</option>
		<option value="註冊" selected="selected">註冊</option>
		<option value="住宿">住宿</option>
		<option value="生活">生活</option>
		<option value="護照">護照</option>
		<option value="其他">其他</option>
	<?php elseif ($this->_tpl_vars['category'] == "住宿"): ?>
		<option value="選課">選課</option>
		<option value="註冊">註冊</option>
		<option value="住宿" selected="selected">住宿</option>
		<option value="生活">生活</option>
		<option value="護照">護照</option>
		<option value="其他">其他</option>
	<?php elseif ($this->_tpl_vars['category'] == "生活"): ?>
		<option value="選課">選課</option>
		<option value="註冊">註冊</option>
		<option value="住宿">住宿</option>
		<option value="生活" selected="selected">生活</option>
		<option value="護照">護照</option>
		<option value="其他">其他</option>
	<?php elseif ($this->_tpl_vars['category'] == "護照"): ?>
		<option value="選課">選課</option>
		<option value="註冊">註冊</option>
		<option value="住宿">住宿</option>
		<option value="生活">生活</option>
		<option value="護照" selected="selected">護照</option>
		<option value="其他">其他</option>
	<?php elseif ($this->_tpl_vars['category'] == "其他"): ?>
		<option value="選課">選課</option>
		<option value="註冊">註冊</option>
		<option value="住宿">住宿</option>
		<option value="生活">生活</option>
		<option value="護照">護照</option>
		<option value="其他" selected="selected">其他</option>
	<?php else: ?>
		<option>請選擇分類</option>
		<option value="選課">選課</option>
		<option value="註冊">註冊</option>
		<option value="住宿">住宿</option>
		<option value="生活">生活</option>
		<option value="護照">護照</option>
		<option value="其他">其他</option>
	<?php endif; ?>
	</select></span>
	<br class="clear"/>&nbsp;<br class="clear"/>
	<?php endif; ?>
	<span class=ask_left>文章內容：</span><span class=ask_right><textarea name="content" cols="38" rows="5"><?php echo $this->_tpl_vars['content']; ?>
</textarea></span>
	<div id="wrong_message"><?php echo $this->_tpl_vars['wrong_message']; ?>
</div>
	<div id="ask_send">
		<input type="image" src="templates/zh_tw/images/publish.png" style="border:0px"/>
	</div>
	<div id="ask_reset">
		<a title="清除重填" onClick="document.forum_form.reset();"><img src="templates/zh_tw/images/clean.png" /></a>
	</div>
</form>
</div>