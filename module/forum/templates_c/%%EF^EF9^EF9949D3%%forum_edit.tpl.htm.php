<?php /* Smarty version 2.6.26, created on 2010-08-06 07:31:36
         compiled from zh_tw/forum_edit.tpl.htm */ ?>
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
		><span style="color:#333333">修改文章</span>
	</div>
	<br class="clear"/>
</div>
<div id="forum_edit">
<form action="forum_edit_sql.php" method="post" name="forum_edit_form">
	<?php if ($this->_tpl_vars['grid'] == 0): ?>
	<span class=ask_left>文章標題：</span><span class=ask_right><input name="title" type="text" value="<?php echo $this->_tpl_vars['title']; ?>
" /></span><br /><br />
	<?php endif; ?>
	<?php if ($this->_tpl_vars['cid'] == 1 && $this->_tpl_vars['grid'] == 0): ?>
	<span class=ask_left>分類：</span>
	<span class=ask_right><select name="category">
	<?php if ($this->_tpl_vars['category'] == "選課"): ?>
		<option selected="selected" value="選課">選課</option>
		<option value="註冊">註冊</option>
		<option value="住宿">住宿</option>
		<option value="生活">生活</option>
		<option value="護照">護照</option>
		<option value="其他">其他</option>
	<?php elseif ($this->_tpl_vars['category'] == "註冊"): ?>
		<option value="選課">選課</option>
		<option selected="selected" value="註冊">註冊</option>
		<option value="住宿">住宿</option>
		<option value="生活">生活</option>
		<option value="護照">護照</option>
		<option value="其他">其他</option>
	<?php elseif ($this->_tpl_vars['category'] == "住宿"): ?>
		<option value="選課">選課</option>
		<option value="註冊">註冊</option>
		<option selected="selected" value="住宿">住宿</option>
		<option value="生活">生活</option>
		<option value="護照">護照</option>
		<option value="其他">其他</option>
	<?php elseif ($this->_tpl_vars['category'] == "生活"): ?>
		<option value="選課">選課</option>
		<option value="註冊">註冊</option>
		<option value="住宿">住宿</option>
		<option selected="selected" value="生活">生活</option>
		<option value="護照">護照</option>
		<option value="其他">其他</option>
	<?php elseif ($this->_tpl_vars['category'] == "護照"): ?>
		<option value="選課">選課</option>
		<option value="註冊">註冊</option>
		<option value="住宿">住宿</option>
		<option value="生活">生活</option>
		<option selected="selected" value="護照">護照</option>
		<option value="其他">其他</option>
	<?php elseif ($this->_tpl_vars['category'] == "其他"): ?>
		<option value="選課">選課</option>
		<option value="註冊">註冊</option>
		<option value="住宿">住宿</option>
		<option value="生活">生活</option>
		<option value="護照">護照</option>
		<option selected="selected" value="其他">其他</option>
	<?php endif; ?>
	</select></span>
	<br /><br />
	<?php endif; ?>
	<span class=ask_left>文章內容：</span><span class=ask_right><textarea name="content" cols="40" rows="4"><?php echo $this->_tpl_vars['content']; ?>
</textarea></span>
	<div id="wrong_message"><?php echo $this->_tpl_vars['wrong_message']; ?>
</div>
	<div id="ask_send" >
		<input type="image" src="templates/zh_tw/images/publish.png" style="border:0px" />
	</div>
	<div id="ask_reset">
		<a title="清除重填" onClick="document.forum_edit_form.reset();"><img src="templates/zh_tw/images/clean.png" /></a>
	</div>
</form>

</div>