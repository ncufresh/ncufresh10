<?php /* Smarty version 2.6.26, created on 2010-08-06 07:41:15
         compiled from zh_tw/list.tpl.htm */ ?>
<div id="<?php echo $this->_tpl_vars['top_css']; ?>
"> 
<div class="bread_photo">
	  <a>
         <img src="templates/zh_tw/images/bread_1.png"/>
      </a>
</div>

<div class="bread_link">
   <a class="bread_css_1" href="index.php">系所社團</a>
	  >
   <a class="bread_css_1" href="<?php echo $this->_tpl_vars['link']; ?>
"><?php echo $this->_tpl_vars['result']['property']; ?>

       <!-- <?php if ($this->_tpl_vars['result']['category_id'] == 1): ?>
   	   <?php elseif ($this->_tpl_vars['result']['category_id'] == 2): ?>
	   <?php elseif ($this->_tpl_vars['result']['category_id'] == 3): ?>
	   <?php elseif ($this->_tpl_vars['result']['category_id'] == 4): ?>
	   <?php elseif ($this->_tpl_vars['result']['category_id'] == 5): ?>
	   <?php else: ?>
	   <?php endif; ?> -->
   </a>
      >
   <a class="bread_css_2" ><?php echo $this->_tpl_vars['result']['club_name']; ?>
</a>
</div>   
<br class="clear" />
</div>

<div id="<?php echo $this->_tpl_vars['title_css']; ?>
"> 
<?php if ($this->_tpl_vars['result']['category_id'] == 1): ?>
   <div id="club_1"> 
      <?php echo $this->_tpl_vars['result']['club_name']; ?>

   </div>
<?php else: ?>
   <div id="club"> 
      <?php echo $this->_tpl_vars['result']['club_name']; ?>

   </div>
<?php endif; ?>
</div>
<div id="content">	
	<a class="images">
         <img src="<?php echo $this->_tpl_vars['result']['img_1']; ?>
" width="350" height="255"/>　
    </a>
	<a class="images">
         <img src="<?php echo $this->_tpl_vars['result']['img_2']; ?>
" width="350" height="255"/>　
    </a>
	<br /><br />
	<?php if ($this->_tpl_vars['result']['category_id'] != 6): ?>
	<table>
	<tr>
	   <th><b class="title">‧社團簡介：</b></th>
	</tr>
	<tr>
	   <th><div class="intro"><?php echo $this->_tpl_vars['result']['intro']; ?>
</div></th>
	</tr>
	<tr>
	   <th><b class="title"><br />‧社長：</th>
	</tr>
	<tr>
	   <th><b class="title">　　　手機：</b><?php echo $this->_tpl_vars['result']['tel_1']; ?>
 </th>
	</tr>
	<tr>
	   <th><b class="title">　　　二進位ID：</b><?php echo $this->_tpl_vars['result']['bbs_id_1']; ?>
</th>
    </tr>
	<tr>
	   <th><b class="title">　　　Email：</b><a class="email_css"><?php echo $this->_tpl_vars['result']['email_1']; ?>
</a></th>
	</tr>
	<tr>
	   <th><b class="title"><br />‧副社長：</th>
    </tr>
	<tr>
	   <th><b class="title">　　　手機：</b><?php echo $this->_tpl_vars['result']['tel_2']; ?>
</th>
    </tr>
	<tr>
	   <th><b class="title">　　　二進位ID：</b><?php echo $this->_tpl_vars['result']['bbs_id_2']; ?>
 </th>
	</tr>
	<tr>
	   <th><b class="title">　　　Email：</b><a class="email_css"><?php echo $this->_tpl_vars['result']['email_2']; ?>
</a></th>
    </tr> 
	<tr>
	   <th><b class="title"><br />‧社團網站：</b><a class="link_1" href ="<?php echo $this->_tpl_vars['result']['website']; ?>
" ><?php echo $this->_tpl_vars['result']['website']; ?>
 </a></th>
	</tr>
	<tr>
	   <th><b class="title"><br />‧二進位板名：</b><?php echo $this->_tpl_vars['result']['bbs_site']; ?>
</th>
    </tr>
	</table>
	<?php else: ?>
	<table>
	<tr>
	   <th><b class="title">‧系所簡介：</b></th>
	</tr>
	<tr>
	   <th><div class="intro"><?php echo $this->_tpl_vars['result']['intro']; ?>
</div></th>
	</tr>
	<tr>
	   <th><b class="title"><br />‧系代：</th> 
	</tr>
	<tr>
	   <th><b class="title">　　　手機：</b><?php echo $this->_tpl_vars['result']['tel_1']; ?>
</th> 
	</tr>
	<tr>
	   <th><b class="title">　　　二進位ID：</b><?php echo $this->_tpl_vars['result']['bbs_id_1']; ?>
 </th>
	</tr>
	<tr>
	   <th><b class="title">　　　Email：</b><a class="email_css"><?php echo $this->_tpl_vars['result']['email_1']; ?>
 </a></th>
	</tr>
	<tr>
	   <th><b class="title"><br />‧副系代：</th>
	</tr>
	<tr>
	   <th><b class="title">　　　手機：</b><?php echo $this->_tpl_vars['result']['tel_2']; ?>
 </th>
	</tr>
	<tr>
	   <th><b class="title">　　　二進位ID：</b><?php echo $this->_tpl_vars['result']['bbs_id_2']; ?>
 </th>
	</tr>
	<tr>
	   <th><b class="title">　　　Email：</b><a class="email_css"><?php echo $this->_tpl_vars['result']['email_2']; ?>
<a> </th>
	</tr>
	<tr>
	   <th><b class="title"><br />‧系所網站：</b><a class="link_1" href ="<?php echo $this->_tpl_vars['result']['website']; ?>
" ><?php echo $this->_tpl_vars['result']['website']; ?>
</a></th>
	</tr>
	<tr>
	   <th><b class="title"><br />‧系所論壇：</b><a class="link_1" href ="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/<?php echo $this->_tpl_vars['result']['forum']; ?>
" >前往論壇</a></th>
	</tr>
	<tr>
	   <th><b class="title"><br />‧二進位板名：</b><?php echo $this->_tpl_vars['result']['bbs_site']; ?>
 </th>
	</tr>
	</table>
	<?php endif; ?>
</div>
<div id="<?php echo $this->_tpl_vars['footer_css']; ?>
"> </div>
