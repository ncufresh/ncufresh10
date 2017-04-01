<?php /* Smarty version 2.6.26, created on 2010-12-31 15:38:56
         compiled from zh_tw/forum_list.tpl.htm */ ?>
<div id="bread">
	<div id="bread_image"><img src="templates/zh_tw/images/bread.png" /></div>
	<div id="bread_text">
		<a href="index.php" style="color:#999999">論壇專區</a>
		<?php if ($this->_tpl_vars['cid'] != 1 && $this->_tpl_vars['cid'] != 2 && $this->_tpl_vars['cid'] != 4): ?>
		><a href="dep_list.php" style="color:#999999">系所列表</a>
		<?php endif; ?>
		><a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1" style="color:#333333"><?php echo $this->_tpl_vars['forum_name']; ?>
</a>
	</div>
	<br class="clear"/>&nbsp;
</div>
<br />
	<div id="forum_list_top_button"><a href="index.php"><img src="templates/zh_tw/images/backca.png" alt="回論壇首頁" /></a>
	<!--
        <?php if ($this->_tpl_vars['cid'] != 4): ?>
			<a href="forum_ask.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&grid=0"><img src="templates/zh_tw/images/announce.png" alt="發表文章"/></a>
		<?php elseif ($this->_tpl_vars['cid'] == 4 && $this->_tpl_vars['admin'] == 'true'): ?>
			<a href="forum_ask.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&grid=0"><img src="templates/zh_tw/images/announce.png" alt="發表文章"/></a>
		<?php endif; ?>
    -->
		<?php if ($this->_tpl_vars['cid'] == 1): ?>
		<div style="float:left;padding-top:15px;padding-right:12px">
		文章分類檢視：
			<select onchange="location.href=this.options[this.selectedIndex].value;" >
				<option value="forum_list.php#">請選擇</option>
				<option value="forum_list.php?select=0&amp;cid=1&amp;&page=1">全部</option>
				<option value="forum_list.php?select=1&amp;cid=1&amp;&page=1">選課</option>
				<option value="forum_list.php?select=2&amp;cid=1&amp;&page=1">註冊</option>
				<option value="forum_list.php?select=3&amp;cid=1&amp;&page=1">住宿</option>
				<option value="forum_list.php?select=4&amp;cid=1&amp;&page=1">生活</option>
				<option value="forum_list.php?select=5&amp;cid=1&amp;&page=1">護照</option>
				<option value="forum_list.php?select=6&amp;cid=1&amp;&page=1">其他</option>
          </select>
		</div>
		<?php endif; ?>
		<br class="clear"/>
	</div>
<br />
	
<div id="question_list">
	<!--<?php unset($this->_sections['i']);
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
		<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</a>
	<?php endfor; endif; ?>-->
	<?php if ($this->_tpl_vars['cid'] == 1): ?>
	<div id="forum_list_top_1">
	<?php elseif ($this->_tpl_vars['cid'] == 2): ?>
	<div id="forum_list_top_2">
	<?php elseif ($this->_tpl_vars['cid'] == 4): ?>
	<div id="forum_list_top_4">
	<?php else: ?>
	<div id="forum_list_top_3">
	<?php endif; ?>
		
		<div id="forum_list_page_select_top">
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
				<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
&select=<?php echo $this->_tpl_vars['select_num']; ?>
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
				<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
&select=<?php echo $this->_tpl_vars['select_num']; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
			<?php endfor; endif; ?>
			...<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['last_page']; ?>
&select=<?php echo $this->_tpl_vars['select_num']; ?>
">最終頁</a>
		<?php elseif ($this->_tpl_vars['state'] == 2): ?>
			<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1&select=<?php echo $this->_tpl_vars['select_num']; ?>
">第一頁</a>...
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
				<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
&select=<?php echo $this->_tpl_vars['select_num']; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
			<?php endfor; endif; ?>
			...<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['last_page']; ?>
&select=<?php echo $this->_tpl_vars['select_num']; ?>
">最終頁</a>
		<?php else: ?>
			<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1&select=<?php echo $this->_tpl_vars['select_num']; ?>
">第一頁</a>...
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
				<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
&select=<?php echo $this->_tpl_vars['select_num']; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
			<?php endfor; endif; ?>
		<?php endif; ?>
		</div>
	</div>
	
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['forum_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<div class="single_question" <?php if ($this->_tpl_vars['forum_2D'][$this->_sections['i']['index']]['place_top'] == 1): ?> style="font-weight:bold;"<?php endif; ?>>
			<div class="ask_img"><img src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/<?php echo $this->_tpl_vars['forum_2D'][$this->_sections['i']['index']]['head_image']; ?>
" alt="頭像" width="60" height="60" /></div>
			<div class="ask_title"><a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['forum_2D'][$this->_sections['i']['index']]['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1"><?php if ($this->_tpl_vars['forum_2D'][$this->_sections['i']['index']]['place_top'] == 1): ?>[置頂]<?php endif; ?><?php if ($this->_tpl_vars['cid'] == 1): ?>[<?php echo $this->_tpl_vars['forum_2D'][$this->_sections['i']['index']]['category']; ?>
]<?php endif; ?> <?php echo $this->_tpl_vars['forum_2D'][$this->_sections['i']['index']]['title']; ?>
</a></div>
			<div class="ask_time_forum_list"><?php echo $this->_tpl_vars['forum_2D'][$this->_sections['i']['index']]['datatime']; ?>
</div>
			<div class="ask_name"><?php echo $this->_tpl_vars['forum_2D'][$this->_sections['i']['index']]['nickname']; ?>
</div>
			<div class="ask_reply_amount"><?php echo $this->_tpl_vars['forum_2D'][$this->_sections['i']['index']]['reply_amount']; ?>
</div>
		</div>
	<?php endfor; endif; ?>
	
	<?php if ($this->_tpl_vars['cid'] == 1): ?>
	<div id="forum_list_bot_1">
	<?php elseif ($this->_tpl_vars['cid'] == 2): ?>
	<div id="forum_list_bot_2">
	<?php elseif ($this->_tpl_vars['cid'] == 4): ?>
	<div id="forum_list_bot_4">
	<?php else: ?>
	<div id="forum_list_bot_3">
	<?php endif; ?>
		<div id="forum_list_page_select_bot">
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
				<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
&select=<?php echo $this->_tpl_vars['select_num']; ?>
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
				<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
&select=<?php echo $this->_tpl_vars['select_num']; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
			<?php endfor; endif; ?>
			...<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['last_page']; ?>
&select=<?php echo $this->_tpl_vars['select_num']; ?>
">最終頁</a>
		<?php elseif ($this->_tpl_vars['state'] == 2): ?>
			<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1&select=<?php echo $this->_tpl_vars['select_num']; ?>
">第一頁</a>...
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
				<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
&select=<?php echo $this->_tpl_vars['select_num']; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
			<?php endfor; endif; ?>
			...<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['last_page']; ?>
&select=<?php echo $this->_tpl_vars['select_num']; ?>
">最終頁</a>
		<?php else: ?>
			<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=1&select=<?php echo $this->_tpl_vars['select_num']; ?>
">第一頁</a>...
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
				<a href="forum_list.php?cid=<?php echo $this->_tpl_vars['cid']; ?>
&page=<?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
&select=<?php echo $this->_tpl_vars['select_num']; ?>
"><?php if ($this->_tpl_vars['page'][$this->_sections['i']['index']] == $this->_tpl_vars['curr_page']): ?><span id="curr_page"><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['page'][$this->_sections['i']['index']]; ?>
<?php endif; ?></a>
			<?php endfor; endif; ?>
		<?php endif; ?>
		</div>
	</div>
	
</div>