<?php /* Smarty version 2.6.26, created on 2010-08-06 07:28:06
         compiled from zh_tw/index.tpl.htm */ ?>
<div id="bread">
	<div id="bread_image"><img src="templates/zh_tw/images/bread.png" /></div>
	<div id="bread_text">
		<a href="index.php" style="color:#333333">論壇專區</a>
	</div>
	<br class="clear"/>&nbsp;
	<br class="clear"/>&nbsp;
</div>
<div>

<a href="forum_list.php?cid=1&page=1"><div id="forum_total_left_freshask"></div></a>
<div class="forum_total_right" >
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fresh_ask_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<div <?php if ($this->_tpl_vars['fresh_ask_2D'][$this->_sections['i']['index']]['place_top'] == 1): ?> style="font-weight:bold;"<?php endif; ?>>
		<div class="ask_title_forum_index"><a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['fresh_ask_2D'][$this->_sections['i']['index']]['gid']; ?>
&cid=<?php echo $this->_tpl_vars['fresh_ask_2D'][$this->_sections['i']['index']]['catid']; ?>
&page=1"><?php if ($this->_tpl_vars['fresh_ask_2D'][$this->_sections['i']['index']]['place_top'] == 1): ?>[置頂]<?php endif; ?>[<?php echo $this->_tpl_vars['fresh_ask_2D'][$this->_sections['i']['index']]['category']; ?>
] <?php echo $this->_tpl_vars['fresh_ask_2D'][$this->_sections['i']['index']]['title']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by&nbsp;<?php echo $this->_tpl_vars['fresh_ask_2D'][$this->_sections['i']['index']]['nickname']; ?>
</a></div><div class="ask_time_forum_index">發表時間：<?php echo $this->_tpl_vars['fresh_ask_2D'][$this->_sections['i']['index']]['datatime']; ?>
</div>
		<br class="clear" />
	</div>
	<?php endfor; endif; ?>
	<span class="more_link"><a href="forum_list.php?cid=1&page=1"><img src="templates/zh_tw/images/more.png" alt="more" /></a></span>
</div>
<br class="clear" />

<a href="forum_list.php?cid=2&page=1"><div id="forum_total_left_club"></div></a>
<div class="forum_total_right" >
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['club_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<div <?php if ($this->_tpl_vars['club_2D'][$this->_sections['i']['index']]['place_top'] == 1): ?> style="font-weight:bold;"<?php endif; ?>>
		<div class="ask_title_forum_index"><a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['club_2D'][$this->_sections['i']['index']]['gid']; ?>
&cid=<?php echo $this->_tpl_vars['club_2D'][$this->_sections['i']['index']]['catid']; ?>
&page=1"><?php if ($this->_tpl_vars['club_2D'][$this->_sections['i']['index']]['place_top'] == 1): ?>[置頂]<?php endif; ?><?php echo $this->_tpl_vars['club_2D'][$this->_sections['i']['index']]['title']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by&nbsp;<?php echo $this->_tpl_vars['club_2D'][$this->_sections['i']['index']]['nickname']; ?>
</a></div><div class="ask_time_forum_index">發表時間：<?php echo $this->_tpl_vars['club_2D'][$this->_sections['i']['index']]['datatime']; ?>
</div>
		<br class="clear" />
	</div>
	<?php endfor; endif; ?>
	<span class="more_link"><a href="forum_list.php?cid=2&page=1"><img src="templates/zh_tw/images/more.png" alt="more" /></a></span>
</div>
<br class="clear" />

<a href="dep_list.php"><div id="forum_total_left_dep"></div></a>
<div class="forum_total_right" >
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dep_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<div <?php if ($this->_tpl_vars['dep_2D'][$this->_sections['i']['index']]['place_top'] == 1): ?> style="font-weight:bold;"<?php endif; ?>>
		<div class="ask_title_forum_index"><a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['dep_2D'][$this->_sections['i']['index']]['gid']; ?>
&cid=<?php echo $this->_tpl_vars['dep_2D'][$this->_sections['i']['index']]['catid']; ?>
&page=1"><?php if ($this->_tpl_vars['dep_2D'][$this->_sections['i']['index']]['place_top'] == 1): ?>[置頂]<?php endif; ?>[<?php echo $this->_tpl_vars['dep_2D'][$this->_sections['i']['index']]['category']; ?>
] <?php echo $this->_tpl_vars['dep_2D'][$this->_sections['i']['index']]['title']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by&nbsp;<?php echo $this->_tpl_vars['dep_2D'][$this->_sections['i']['index']]['nickname']; ?>
</a></div><div class="ask_time_forum_index">發表時間：<?php echo $this->_tpl_vars['dep_2D'][$this->_sections['i']['index']]['datatime']; ?>
</div>
		<br class="clear" />
	</div>
	<?php endfor; endif; ?>
	<span class="more_link"><a href="dep_list.php"><img src="templates/zh_tw/images/more.png" alt="more" /></a></span>
</div>
<br class="clear" />

<a href="forum_list.php?cid=4&page=1"><div id="forum_total_left_imp"></div></a>
<div class="forum_total_right" >
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['imp_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<div <?php if ($this->_tpl_vars['imp_2D'][$this->_sections['i']['index']]['place_top'] == 1): ?> style="font-weight:bold;"<?php endif; ?>>
		<div class="ask_title_forum_index"><a href="forum_problem.php?gid=<?php echo $this->_tpl_vars['imp_2D'][$this->_sections['i']['index']]['gid']; ?>
&cid=<?php echo $this->_tpl_vars['imp_2D'][$this->_sections['i']['index']]['catid']; ?>
&page=1"><?php if ($this->_tpl_vars['imp_2D'][$this->_sections['i']['index']]['place_top'] == 1): ?>[置頂]<?php endif; ?> <?php echo $this->_tpl_vars['imp_2D'][$this->_sections['i']['index']]['title']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by&nbsp;<?php echo $this->_tpl_vars['imp_2D'][$this->_sections['i']['index']]['nickname']; ?>
</a></div><div class="ask_time_forum_index">發表時間：<?php echo $this->_tpl_vars['imp_2D'][$this->_sections['i']['index']]['datatime']; ?>
</div>
		<br class="clear" />
	</div>
	<?php endfor; endif; ?>
	<span class="more_link"><a href="forum_list.php?cid=4&page=1"><img src="templates/zh_tw/images/more.png" alt="more" /></a></span>
</div>
<br class="clear" />
</div>