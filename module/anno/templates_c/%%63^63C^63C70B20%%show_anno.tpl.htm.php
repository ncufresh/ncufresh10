<?php /* Smarty version 2.6.26, created on 2010-08-06 07:36:44
         compiled from zh_tw/show_anno.tpl.htm */ ?>
<script type="text/javascript">
function delete_anno(input_tid)
{
	var is_delete_checked = confirm("確認刪除此篇公告？");
	if(is_delete_checked)
	{
		J.ajax({
			url: 'delete_ext.php',
			data: {
				action: 'op_anno_delete',
				tid: input_tid,
			},
			success: function(response){
				location.href="list_anno.php?action=delete_success";
			}
		});
	}
}
</script>
<div id="view_anno_main">
  <div class="topic"><?php echo $this->_tpl_vars['anno']['title']; ?>
</div>
  <div class="text"><?php echo $this->_tpl_vars['anno']['contents']; ?>
</div>
  <br /><br />
  <div class="view_anno_info">
  <span class="back">
  <a href ="list_anno.php"><img src="templates/zh_tw/images/back.png"></a></span>
  <?php if ($this->_tpl_vars['currmodule']->is_admin() == TRUE): ?>管理功能：
  <a title="編輯公告" href="edit_anno.php?action=edit&tid=<?php echo $this->_tpl_vars['anno']['tid']; ?>
">[編輯公告]</a>
  <a title="刪除公告" onclick="delete_anno(<?php echo $this->_tpl_vars['anno']['tid']; ?>
);">[刪除公告]</a>
   / <?php endif; ?>
   <span class="people">作者：<?php echo $this->_tpl_vars['anno']['username']; ?>
 (編輯時間：<?php echo $this->_tpl_vars['anno']['datetime']; ?>
)</span>
   <br class="clear"/>
   </div>
</div>

<?php if ($this->_tpl_vars['is_link_exist'] == TRUE): ?>
<div class="ext_main">
  <div class="ext_left">[相關連結]:</div>
  <div class="ext_right">
  <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['link_array']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  <a title="<?php echo $this->_tpl_vars['link_array'][$this->_sections['i']['index']]['title']; ?>
" target="_blank" href="<?php echo $this->_tpl_vars['link_array'][$this->_sections['i']['index']]['path']; ?>
"><?php echo $this->_tpl_vars['link_array'][$this->_sections['i']['index']]['title']; ?>
</a><br />
  <?php endfor; endif; ?>
  </div>
  <br class="clear" />
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['is_file_exist'] == TRUE): ?>
<div class="ext_main">
  <div class="ext_left">[附件檔案]:</div>
  <div class="ext_right">
  <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['file_array']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  <a title="<?php echo $this->_tpl_vars['file_array'][$this->_sections['i']['index']]['title']; ?>
" target="_blank" href="<?php echo $this->_tpl_vars['file_array'][$this->_sections['i']['index']]['path']; ?>
"><?php echo $this->_tpl_vars['file_array'][$this->_sections['i']['index']]['title']; ?>
</a><br />
  <?php endfor; endif; ?>
  </div>
  <br class="clear" />
</div>
<?php endif; ?>