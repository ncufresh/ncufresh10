<?php /* Smarty version 2.6.26, created on 2010-12-31 15:38:51
         compiled from zh_tw/forum_problem.tpl.htm */ ?>
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
		><a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1" style="color:#333333"><?php echo $this->_tpl_vars['forum_1D']['title']; ?>
</a>
	</div>
	<br class="clear"/>&nbsp;
	<br class="clear"/>&nbsp;
</div>
<div>
	<span id="question_list_top_button"><a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1"><img src="templates/zh_tw/images/backlist.png" alt="回問題列表" /></a>
  <!--	
	<?php if ($this->_tpl_vars['cid'] != 4): ?>
		<a href="forum_ask.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&grid=<?php echo $this->_tpl_vars['forum_1D']['grid']; ?>
"><img src="templates/zh_tw/images/announce.png" alt="發表文章" /></a>
	<?php elseif ($this->_tpl_vars['cid'] == 4 && $this->_tpl_vars['admin'] == 'true'): ?>
		<a href="forum_ask.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&grid=<?php echo $this->_tpl_vars['forum_1D']['grid']; ?>
"><img src="templates/zh_tw/images/announce.png" alt="發表文章" /></a>
	<?php endif; ?>
  -->
	</span>
	
	<div class="question_page">
	<?php if ($this->_tpl_vars['state'] == 0): ?>
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['page']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
		<?php endfor; endif; ?>
	<?php elseif ($this->_tpl_vars['state'] == 1): ?>
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['page']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
		<?php endfor; endif; ?>
		...<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['last_page']; ?>
">最終頁</a>
	<?php elseif ($this->_tpl_vars['state'] == 2): ?>
		<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1">第一頁</a>...
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['page']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
		<?php endfor; endif; ?>
		...<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['last_page']; ?>
">最終頁</a>
	<?php else: ?>
		<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1">第一頁</a>...
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['page']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
		<?php endfor; endif; ?>
	<?php endif; ?>
	</div>
	<div style="padding-right:20px"><hr class="clear" /></div>
	<div id="question">
		<div id="question_left">
			<div id="question_left_photo">
				<div id="question_left_photo_inner"><img src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/<?php echo $this->_tpl_vars['forum_1D']['head_image']; ?>
" alt="頭像" width="120" height="120" />
				</div>
			</div>
			<span>暱稱：<?php echo $this->_tpl_vars['forum_1D']['nickname']; ?>
</span><br />
			<span>帳號：<?php echo $this->_tpl_vars['forum_1D']['username']; ?>
</span><br />
			<span>系所：<?php echo $this->_tpl_vars['forum_1D']['department']; ?>
</span><br />
			<span>發表時間：<br /><?php echo $this->_tpl_vars['forum_1D']['datatime']; ?>
</span>
		</div>
		<div id="question_right_up">
			<span><?php if ($this->_tpl_vars['cid'] == 1): ?>[<?php echo $this->_tpl_vars['forum_1D']['category']; ?>
]<?php endif; ?> <?php echo $this->_tpl_vars['forum_1D']['title']; ?>
</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<span>
				<?php if ($this->_tpl_vars['forum_1D']['uid'] == $this->_tpl_vars['uid'] || $this->_tpl_vars['dep_admin'] == 'true'): ?><span class="edit_button"><a href="forum_edit.php?gid=<?php echo $this->_tpl_vars['forum_1D']['gid']; ?>
">修改</a></span><?php endif; ?>
				<?php if ($this->_tpl_vars['dep_admin'] == 'true'): ?>
					<span class="delete_button"><a href="forum_delete_sql.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
">刪除</a></span>
                    <span class="place_top_button"><a href="forum_place_top.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
">置頂</a></span>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['admin'] == 'true'): ?>
					<span class="edit_button"><a href="forum_edit.php?gid=<?php echo $this->_tpl_vars['forum_1D']['gid']; ?>
">修改</a></span>
					<span class="delete_button"><a href="forum_delete_sql.php?gid=<?php echo $this->_tpl_vars['forum_1D']['gid']; ?>
&grid=<?php echo $this->_tpl_vars['forum_1D']['grid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
">刪除</a></span>
					<span class="place_top_button"><a href="forum_place_top.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
">置頂</a></span>
				<?php endif; ?>
			</span>
		</div>
		<div id="question_right_up_button">
			<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/personal/sendmail.php?what=<?php echo $this->_tpl_vars['forum_1D']['username']; ?>
"><img src="templates/zh_tw/images/mail.png" alt="寄信給他" /></a>
		</div>
		<div id="question_right_down">
			<div id="question_right_down_content">
				<?php echo $this->_tpl_vars['forum_1D']['content']; ?>

			</div>
			
		</div>
	<!--	
		<?php if ($this->_tpl_vars['cid'] != 4): ?>
		<div id="question_right_down_button">
			<a href="forum_ask.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&grid=<?php echo $this->_tpl_vars['gid']; ?>
"><img src="templates/zh_tw/images/response.png" alt="回覆" /></a>
		</div>
		<?php endif; ?>
    -->
	</div>
	<br class="clear" />
	
	
	
	<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['forum_reply_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
	<div class="question_reply">
		<div class="question_reply_left">
			<div class="question_reply_left_photo">
				<div id="question_left_photo_inner"><img src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/<?php echo $this->_tpl_vars['forum_reply_2D'][$this->_sections['j']['index']]['head_image']; ?>
" alt="頭像" width="120" height="120" />
				</div>
			</div>
			<span>暱稱：<?php echo $this->_tpl_vars['forum_reply_2D'][$this->_sections['j']['index']]['nickname']; ?>
</span><br />
			<span>帳號：<?php echo $this->_tpl_vars['forum_reply_2D'][$this->_sections['j']['index']]['username']; ?>
</span><br />
			<span>系所：<?php echo $this->_tpl_vars['forum_reply_2D'][$this->_sections['j']['index']]['department']; ?>
</span><br />
			<span>發表時間：<br /><?php echo $this->_tpl_vars['forum_reply_2D'][$this->_sections['j']['index']]['datatime']; ?>
</span>
		</div>
		<div class="question_reply_right">
		<br /><span style="float:right;padding-right:20px"><?php echo $this->_tpl_vars['floor']++; ?>
F</span>
			<div>
				<?php if ($this->_tpl_vars['forum_reply_2D'][$this->_sections['j']['index']]['uid'] == $this->_tpl_vars['uid'] || $this->_tpl_vars['dep_admin'] == 'true'): ?><span class="edit_button"><a href="forum_edit.php?gid=<?php echo $this->_tpl_vars['forum_reply_2D'][$this->_sections['j']['index']]['gid']; ?>
">修改</a></span><?php endif; ?>
				<?php if ($this->_tpl_vars['dep_admin'] == 'true'): ?>
					<span class="delete_button"><a href="forum_delete_sql.php?gid=<?php echo $this->_tpl_vars['forum_reply_2D'][$this->_sections['j']['index']]['gid']; ?>
&grid=<?php echo $this->_tpl_vars['forum_reply_2D'][$this->_sections['j']['index']]['grid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
">刪除</a></span>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['admin'] == 'true'): ?>
					<span class="edit_button"><a href="forum_edit.php?gid=<?php echo $this->_tpl_vars['forum_reply_2D'][$this->_sections['j']['index']]['gid']; ?>
">修改</a></span>
					<span class="delete_button"><a href="forum_delete_sql.php?gid=<?php echo $this->_tpl_vars['forum_reply_2D'][$this->_sections['j']['index']]['gid']; ?>
&grid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
">刪除</a></span>
				<?php endif; ?>
			</div>
			<div class="question_reply_right_content">
				<?php echo $this->_tpl_vars['forum_reply_2D'][$this->_sections['j']['index']]['content']; ?>

			</div>
		</div>
	</div>
	<?php endfor; endif; ?>
	<br class="clear"/>&nbsp;
	<div style="padding-right:20px"><hr class="clear" /></div>
	<div class="question_page">
	<?php if ($this->_tpl_vars['state'] == 0): ?>
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['page']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
		<?php endfor; endif; ?>
	<?php elseif ($this->_tpl_vars['state'] == 1): ?>
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['page']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
		<?php endfor; endif; ?>
		...<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['last_page']; ?>
">最終頁</a>
	<?php elseif ($this->_tpl_vars['state'] == 2): ?>
		<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1">第一頁</a>...
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['page']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
		<?php endfor; endif; ?>
		...<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['last_page']; ?>
">最終頁</a>
	<?php else: ?>
		<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1">第一頁</a>...
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['page']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
		<?php endfor; endif; ?>
	<?php endif; ?>
	</div>
</div>