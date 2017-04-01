<?php /* Smarty version 2.6.26, created on 2010-09-08 22:53:57
         compiled from zh_tw/must.tpl.htm */ ?>
<link href="templates/zh_tw/css/container.css" rel="stylesheet" type="text/css"/>
<div id="top<?php echo $this->_tpl_vars['num']; ?>
">
	<?php if ($this->_tpl_vars['num'] == 1): ?>　
		<a href="must.php?num=1" title="大一新生區">
	    <img id="select" src="templates/zh_tw/images/new_title_b.png"/></a>　
		<a href="must.php?num=2" title="大一復學區">
   		<img id="link" src="templates/zh_tw/images/return_title_s.png"/></a>　
		<a href="must.php?num=3" title="大一相關須知">
   		<img id="link" src="templates/zh_tw/images/related_title_s.png"/></a>　
		<a href="must.php?num=4" title="文件下載">
   		<img id="link" src="templates/zh_tw/images/download_title_s.png"/></a>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['num'] == 2): ?>　
		<a href="must.php?num=1" title="大一新生區">
	    <img id="link" src="templates/zh_tw/images/new_title_s.png"/></a>　
		<a href="must.php?num=2" title="大一復學區">
    	<img id="select" src="templates/zh_tw/images/return_title_b.png"/></a>　
		<a href="must.php?num=3" title="大一相關須知">
    	<img id="link" src="templates/zh_tw/images/related_title_s.png"/></a>　
		<a href="must.php?num=4" title="文件下載">
    	<img id="link" src="templates/zh_tw/images/download_title_s.png"/></a>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['num'] == 3): ?>　
   		<a href="must.php?num=1" title="大一新生區">
  	    <img id="link" src="templates/zh_tw/images/new_title_s.png"/></a>　
		<a href="must.php?num=2" title="大一復學區">
    	<img id="link" src="templates/zh_tw/images/return_title_s.png"/></a>　
		<a href="must.php?num=3" title="大一相關須知">
    	<img id="select" src="templates/zh_tw/images/related_title_b.png"/></a>　
		<a href="must.php?num=4" title="文件下載">
    	<img id="link" src="templates/zh_tw/images/download_title_s.png"/></a>
	<?php endif; ?>
    <?php if ($this->_tpl_vars['num'] == 4): ?>　
   		<a href="must.php?num=1" title="大一新生區">
  	    <img id="link" src="templates/zh_tw/images/new_title_s.png"/></a>　
		<a href="must.php?num=2" title="大一復學區">
    	<img id="link" src="templates/zh_tw/images/return_title_s.png"/></a>　
		<a href="must.php?num=3" title="大一相關須知">
    	<img id="link" src="templates/zh_tw/images/related_title_s.png"/></a>　
		<a href="must.php?num=4" title="文件下載">
    	<img id="select" src="templates/zh_tw/images/download_title_b.png"/></a>
	<?php endif; ?>
</div>
<div id="m<?php echo $this->_tpl_vars['num']; ?>
">
<br />
	<div class="Bleft">
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['must_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<?php if ($this->_sections['i']['iteration'] <= 15): ?>
           		<div id="main_<?php echo $this->_tpl_vars['num']; ?>
">
                	<?php if ($this->_tpl_vars['num'] != 4): ?>
						<a class="L<?php echo $this->_tpl_vars['num']; ?>
" style="color:#666666" 
	                   		href="container.php?Key=<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['Key']; ?>
&num=<?php echo $this->_tpl_vars['num']; ?>
">
	               		<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['title']; ?>
</a>
						<?php if ($this->_tpl_vars['currmodule']->is_system() == TRUE): ?>
							<a style="font-size:12px" href="update.php?Key=<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['Key']; ?>
&num=<?php echo $this->_tpl_vars['num']; ?>
">　修改</a>
							<a style="font-size:12px" href="delete.php?Key=<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['Key']; ?>
&num=<?php echo $this->_tpl_vars['num']; ?>
">刪除</a>
						<?php endif; ?>
	                <?php endif; ?>
	                <?php if ($this->_tpl_vars['num'] == 4): ?>
	                   	<a class="L<?php echo $this->_tpl_vars['num']; ?>
" style="color:#666666" 
	                   		href="file/<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['content']; ?>
">
	               		<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['title']; ?>
</a>
	                    <?php if ($this->_tpl_vars['currmodule']->is_system() == TRUE): ?>
							<a style="font-size:12px" href="delete.php?Key=<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['Key']; ?>
&num=<?php echo $this->_tpl_vars['num']; ?>
">刪除</a>
						<?php endif; ?>
					<?php endif; ?>
	   	        </div>
			<?php endif; ?>
		<?php endfor; endif; ?>
	</div>
	<div class="Bright">
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['must_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<?php if ($this->_sections['i']['iteration'] > 15): ?>
				<div id="main_<?php echo $this->_tpl_vars['num']; ?>
">
                	<?php if ($this->_tpl_vars['num'] != 4): ?>
	   					<a class="R<?php echo $this->_tpl_vars['num']; ?>
" style="color:#666666" 
    	                   	href="container.php?Key=<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['Key']; ?>
&num=<?php echo $this->_tpl_vars['num']; ?>
">
						<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['title']; ?>
</a>
   						<?php if ($this->_tpl_vars['currmodule']->is_system() == TRUE): ?>
							<a style="font-size:12px" href="update.php?Key=<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['Key']; ?>
&num=<?php echo $this->_tpl_vars['num']; ?>
">　修改</a>
							<a style="font-size:12px" href="delete.php?Key=<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['Key']; ?>
&num=<?php echo $this->_tpl_vars['num']; ?>
">刪除</a>
						<?php endif; ?>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['num'] == 4): ?>
                    	<a class="R<?php echo $this->_tpl_vars['num']; ?>
" style="color:#666666" 
	                   		href="file/<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['content']; ?>
">
	               		<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['title']; ?>
</a>
	                    <?php if ($this->_tpl_vars['currmodule']->is_system() == TRUE): ?>
							<a style="font-size:12px" href="delete.php?Key=<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['Key']; ?>
&num=<?php echo $this->_tpl_vars['num']; ?>
">刪除</a>
						<?php endif; ?>
					<?php endif; ?>
	           	</div>
			<?php endif; ?>
		<?php endfor; endif; ?>
	</div>
</div>