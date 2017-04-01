<?php
	require_once('../../core/ac_boot.php');
	$currtpl -> add_css("forum_style.css");
	//$currtpl->assign('array_1D',$array_1D);
	
	//grid是0的話就是留言，grid是數字的話就是該gid的留言

	//新生問題
	$source_1 = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON `forum`.`uid`=`ac_user`.`uid` WHERE `forum`.`parent`=1 AND `forum`.`grid`=0 ORDER BY `forum`.`datatime_order` DESC LIMIT 0,3");
	//$forum_1D=array();
	$fresh_ask_2D=array();
	while($fresh_ask_1D = $currdb -> sql_fetch_array($source_1))
	{
		//$fresh_ask_1D['content'] = nl2br($fresh_ask_1D['content']);
		$fresh_ask_1D['datatime'] = date("Y/m/d H:i:s",$fresh_ask_1D['datatime']);
			
		$fresh_ask_1D['title'] = html_eliminate($fresh_ask_1D['title']);
		if(mb_strlen($fresh_ask_1D['title'], 'UTF-8') > 12)
		{
			$fresh_ask_1D['title'] = mb_substr($fresh_ask_1D['title'], 0, 12, 'UTF-8') . "...";
		}
			
		$fresh_ask_1D=htmlencode($fresh_ask_1D);  //可以直接對整個array用htmlencode
		array_push($fresh_ask_2D, $fresh_ask_1D);
	}
	$currtpl->assign('fresh_ask_2D',$fresh_ask_2D);
	//--------------------------------------------
	//社團
	$source_2 = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON `forum`.`uid`=`ac_user`.`uid` WHERE `forum`.`catid`=2 AND `forum`.`grid`=0 ORDER BY `forum`.`datatime_order` DESC LIMIT 0,3");
	//$club_1D=array();
	$club_2D=array();
	while($club_1D = $currdb -> sql_fetch_array($source_2))
	{
		//$club_1D['content'] = nl2br($club_1D['content']);
		$club_1D['datatime'] = date("Y/m/d H:i:s",$club_1D['datatime']);
			
		$club_1D['title'] = html_eliminate($club_1D['title']);
		if(mb_strlen($club_1D['title'], 'UTF-8') > 13)
		{
			$club_1D['title'] = mb_substr($club_1D['title'], 0, 13, 'UTF-8') . "...";
		}
			
		$club_1D=htmlencode($club_1D);  //可以直接對整個array用htmlencode
		array_push($club_2D, $club_1D);
	}
	$currtpl->assign('club_2D',$club_2D);
	//--------------------------------------------
	$source_3 = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON `forum`.`uid`=`ac_user`.`uid` WHERE `forum`.`parent`=3 AND `grid`=0 ORDER BY `forum`.`datatime_order` DESC LIMIT 0,3");
	//$dep_1D=array();
	$dep_2D=array();
	while($dep_1D = $currdb -> sql_fetch_array($source_3))
	{
		//$dep_1D['content'] = nl2br($dep_1D['content']);
		$dep_1D['datatime'] = date("Y/m/d H:i:s",$dep_1D['datatime']);
			
		$dep_1D['title'] = html_eliminate($dep_1D['title']);
		if(mb_strlen($dep_1D['title'], 'UTF-8') > 5)		//系所分類較長  在首頁顯示字數少一點
		{
			$dep_1D['title'] = mb_substr($dep_1D['title'], 0, 5, 'UTF-8') . "...";
		}
			
		$dep_1D=htmlencode($dep_1D);  //可以直接對整個array用htmlencode
		array_push($dep_2D, $dep_1D);
	}
	$currtpl->assign('dep_2D',$dep_2D);
	//--------------------------------------------
	$source_4 = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON `forum`.`uid`=`ac_user`.`uid` WHERE `forum`.`catid`=4 AND `forum`.`grid`=0 ORDER BY `forum`.`datatime_order` DESC LIMIT 0,3");
	//$imp_1D=array();
	$imp_2D=array();
	while($imp_1D = $currdb -> sql_fetch_array($source_4))
	{
		//$imp_1D['content'] = nl2br($imp_1D['content']);
		$imp_1D['datatime'] = date("Y/m/d H:i:s",$imp_1D['datatime']);
			
		$imp_1D['title'] = html_eliminate($imp_1D['title']);
		if(mb_strlen($imp_1D['title'], 'UTF-8') > 13)
		{
			$imp_1D['title'] = mb_substr($imp_1D['title'], 0, 13, 'UTF-8') . "...";
		}
			
		$imp_1D=htmlencode($imp_1D);  //可以直接對整個array用htmlencode
		array_push($imp_2D, $imp_1D);
	}
	$currtpl->assign('imp_2D',$imp_2D);
	
	$currtpl->display('index.tpl.htm');
?>