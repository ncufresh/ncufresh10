<?php /* Smarty version 2.6.26, created on 2010-08-06 08:00:07
         compiled from /FRESH_WWW/ncufresh10/templates/zh_tw/main_frame.tpl.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>2010 國立中央大學 大一生活知訊網</title>
<?php echo $this->_tpl_vars['currcfg']['CSS_HEADER']; ?>

<?php echo $this->_tpl_vars['currcfg']['JS_HEADER']; ?>

</head>

<body>
<!--[if lte IE 6]>
 <div style="background:#DDECFF; padding:10px; border:#FFFFFF solid 5px; font-size: 12px; margin: auto;">
 <strong>瀏覽器版本為Microsoft Internet Explorer 6.0或以下</strong> - 目前使用的瀏覽器已不被本站支援，建議更換為：
 <a target="_blank" href="http://www.microsoft.com/taiwan/windows/internet-explorer/worldwide-sites.aspx"><u>Microsoft Internet Explorer 8.0</u></a>、
 <a target="_blank" href="http://moztw.org/"><u>Mozilla Firefox</u></a>或
 <a target="_blank" href="http://www.google.com/chrome"><u>Google瀏覽器</u></a>
 </div>
<![endif]-->
<div id="main_top">
  <div id="main_top_banner">
    <div id="main_top_status">
	<a title="回首頁" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
">回首頁</a>&nbsp;&nbsp;
	<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/webmap/map.php">網站地圖</a>&nbsp;&nbsp;
	<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/personal/phoneme.php">聯絡我們</a>&nbsp;&nbsp;
	<a title="中大首頁" target="_blank" href="http://www.ncu.edu.tw">中大首頁</a>&nbsp;&nbsp;
	累計人次:<?php echo $this->_tpl_vars['main_block_var']['accu_counter']; ?>
&nbsp;&nbsp;
	線上人數:<?php echo $this->_tpl_vars['main_block_var']['online_counter']; ?>
&nbsp;&nbsp;
	<div style="padding-left:676px;">
		<form action="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/search.php" method="post">
			<div style="float:left">
				<input type="text" name="search" />
			</div>
			<div style="padding-top:2px;padding-left:1px;float:left">
				<input type="image" src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/templates/zh_tw/images/search.png" style="border:0px"/>
			</div>
		</form>
	</div>
	</div>
    <a title="2010 國立中央大學 大一生活知訊網 首頁" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
"><span id="banner_click"></span></a>
    <?php echo $this->_tpl_vars['main_block_var']['login_block']; ?>

  </div>
</div>
<div id="main_bottom">
  <div id="main_bottom_inner">
    <div id="menu">
      <?php $_from = $this->_tpl_vars['main_block_var']['menu_a_tag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu_button']):
?>
      <?php echo $this->_tpl_vars['menu_button']; ?>

      <?php endforeach; endif; unset($_from); ?>
    </div>
    <div id="sub_menu" style="padding-top: <?php echo $this->_tpl_vars['main_block_var']['sub_menu_ptop']; ?>
px">
      <?php $_from = $this->_tpl_vars['main_block_var']['sub_menu_a_tag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub_menu_button']):
?>
      <?php echo $this->_tpl_vars['sub_menu_button']; ?>
<br />
      <?php endforeach; endif; unset($_from); ?>
	  &nbsp;
    </div>
    <div id="contents">
      <?php echo $this->_tpl_vars['MAIN_CONTENTS_BLOCK']; ?>

    </div>
    <br class="clear" />
  </div>
  <div id="main_bottom_bottom">
    <div id="copyright">
    主辦單位：<a title="國立中央大學" target="_blank" href="http://www.ncu.edu.tw">國立中央大學</a> <a title="學務處" target="_blank" href="http://osa-55.adm.ncu.edu.tw">學務處</a> 承辦單位：<a title="諮商中心" target="_blank" href="http://love.adm.ncu.edu.tw:8080/NCU_Counsel/home_show.php">諮商中心</a> 執行單位：2010 大一生活知訊網工作團隊<br />
    地址：320-01 桃園縣中壢市五權里2鄰中大路300號 電話：(03) 422-7151 #57261 版權所有：2010 大一生活知訊網工作團隊
    </div>
  </div>
  <br class="clear" />
</div>
</body>
</html>