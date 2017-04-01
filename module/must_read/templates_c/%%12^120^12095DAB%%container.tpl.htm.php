<?php /* Smarty version 2.6.26, created on 2010-08-06 07:28:27
         compiled from zh_tw/container.tpl.htm */ ?>
<link href="templates/zh_tw/css/container.css" rel="stylesheet" type="text/css"/>
<div>
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
	<div id="mid<?php echo $this->_tpl_vars['num']; ?>
">
		<div id="mid_c">
        	<a href="must.php?num=<?php echo $this->_tpl_vars['num']; ?>
" title="回上一頁">
  		    <img src="templates/zh_tw/images/back.png"/></a>　
			<hr />
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
			<?php echo $this->_tpl_vars['must_2D'][$this->_sections['i']['index']]['content']; ?>
<br/>
			<?php endfor; endif; ?>
		</div>
	</div>
    <div id="bottom<?php echo $this->_tpl_vars['num']; ?>
"><br /><br /></div>
</div>