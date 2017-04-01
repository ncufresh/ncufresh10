<?php /* Smarty version 2.6.26, created on 2010-08-06 07:25:09
         compiled from home_forum_block.tpl.htm */ ?>
<div id="forum_main_block">
  <div id="forum_title_block">
  <a title="檢視所有公告" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/forum">more...</a>
  </div>
  
  <?php $_from = $this->_tpl_vars['block_var']['forum_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['forum_item']):
?>
  <div class="forum_item_block">
    <span class="forum_item_title"><a class="forum_link" title="<?php echo $this->_tpl_vars['forum_item']['title']; ?>
" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/forum/forum_problem.php?gid=<?php echo $this->_tpl_vars['forum_item']['gid']; ?>
&cid=<?php echo $this->_tpl_vars['forum_item']['catid']; ?>
&page=1"></a></span>
	<span class="forum_item_info_title">
		<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/forum/forum_problem.php?gid=<?php echo $this->_tpl_vars['forum_item']['gid']; ?>
&cid=<?php echo $this->_tpl_vars['forum_item']['catid']; ?>
&page=1"><?php if ($this->_tpl_vars['forum_item']['catid'] == 1 || $this->_tpl_vars['forum_item']['parent'] == 3): ?>[<?php echo $this->_tpl_vars['forum_item']['category']; ?>
]<?php endif; ?><?php echo $this->_tpl_vars['forum_item']['title']; ?>
</a>
	</span>
	<span class="forum_item_info_author"><?php echo $this->_tpl_vars['forum_item']['nickname']; ?>
</span>
  </div>
  <?php endforeach; endif; unset($_from); ?>
  <br class="clear" />
</div>