<?php
	require_once('../../core/ac_boot.php');
	$currtpl -> add_css("forum_style.css");

	$source_ask = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE `gid`=".intval($_GET['gid'])." AND `grid`=0 ORDER BY `forum`.`datatime_order` DESC ");
	$forum_1D = $currdb -> sql_fetch_array($source_ask);
	//$forum_1D['content'] = nl2br($forum_1D['content']);  //不用這個 多了會有顯示出<br />
	$forum_1D['datatime'] = date("Y/m/d H:i:s",$forum_1D['datatime']);
	$forum_1D=htmlencode($forum_1D);  //可以直接對整個array用htmlencode
	$currtpl->assign('forum_1D',$forum_1D);
	
	$source_reply = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE  `grid`=".intval($_GET['gid'])." ORDER BY `forum`.`datatime_order` ASC LIMIT ".(10*(intval($_GET['page'])-1)).",10 ");
	$forum_reply_2D=array();
	while($forum_reply_1D = $currdb -> sql_fetch_array($source_reply))
	{
		//$forum_reply_1D['content'] = nl2br($forum_reply_1D['content']);//不能加這行
		$forum_reply_1D['datatime'] = date("Y/m/d H:i:s",$forum_reply_1D['datatime']);
		$forum_reply_1D=htmlencode($forum_reply_1D);
		array_push($forum_reply_2D, $forum_reply_1D);
	}
	$currtpl->assign('forum_reply_2D',$forum_reply_2D);
	
	
	$currtpl->assign('cid',intval($_GET['cid']));
	$currtpl->assign('gid',intval($_GET['gid']));
	$currtpl->assign('grid',$forum_1D['grid']);
	
	$currtpl->assign('uid',$curruser->uid);
	
	//分頁程式開始
	$source_reply_page = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE  `grid`=".intval($_GET['gid'])." ORDER BY `forum`.`datatime_order` ASC ");	
	$num = $currdb -> sql_num_rows($source_reply_page);
	$page=array();		//分頁
	//ceil($num/10)是最大頁數
	//state 0:甚麼都沒有
	if(intval($_GET['page'])<=3 && ceil($num/10)-intval($_GET['page'])<=2)
	{
		for($i=0;$i<$num/10;$i++)
		{
			$page[$i]=$i+1;
		}
		$state=0;
	}
	
	//state 1:最後面有最終頁
	else if(intval($_GET['page'])<=3 && ceil($num/10)>3)
	{
		$last_page=ceil($num/10);
		if(intval($_GET['page'])==1)
		{
			for($i=0;$i<ceil($num/10) && $i<3;$i++)
			{
				$page[$i]=$i+1;
			}
		}
		else if(intval($_GET['page'])==2)
		{
			for($i=0;$i<ceil($num/10) && $i<4;$i++)
			{
				$page[$i]=$i+1;
			}
		}
		else if(intval($_GET['page'])>=3)
		{
			for($i=intval($_GET['page'])-1-2;$i<ceil($num/10) && $i<intval($_GET['page'])-1-2+5;$i++)//-1是index從0開始  -2是要往前兩項
			{
				$page[$i]=$i+1;
			}
		}
		$currtpl->assign('last_page',$last_page);
		$state=1;
	}
	
	else if(ceil($num/10)-intval($_GET['page'])<=2)		//state 3:最前面有第一頁
	{
		if(ceil($num/10)-intval($_GET['page'])==0)
		{
			$curr_page=ceil($num/10)-2;
			for($i=0;$i<3;$i++)
			{
				$page[$i]=$curr_page;
				$curr_page++;
			}
		}
		else if(ceil($num/10)-intval($_GET['page'])==1)
		{
			$curr_page=ceil($num/10)-3;
			for($i=0;$i<4;$i++)
			{
				$page[$i]=$curr_page;
				$curr_page++;
			}
		}
		else if(ceil($num/10)-intval($_GET['page'])==2)
		{
			$curr_page=ceil($num/10)-4;
			for($i=0;$i<5;$i++)
			{
				$page[$i]=$curr_page;
				$curr_page++;
			}
		}
		$state=3;
	}
	else 	//state 2:最後面有最終頁　最前面有第一頁
	{
		$curr_page=intval($_GET['page'])-2;
		for($i=0;$i<5;$i++)
		{
			$page[$i]=$curr_page;
			$curr_page++;
		}
		$last_page=floor($num/10)+1;
		$currtpl->assign('last_page',$last_page);
		$state=2;
	}
	
	$currtpl->assign('state',$state);
	$currtpl->assign('page',$page);
	$currtpl->assign('curr_page',intval($_GET['page']));
	//分頁程式結束
	
	//該版的版主可以修改該版的所有文章
	$dep_admin=false;
	if(intval($_GET['cid'])>=11 && intval($_GET['cid'])<=31)
	{
		$source_admin = $currdb->sql_query("SELECT * FROM `forum_admin` WHERE `uid`='".$curruser -> uid."' AND `cid`='".intval($_GET['cid'])."'");
		if($currdb -> sql_num_rows($source_admin)==1)
		{
			$dep_admin=true;
		}
	}
	$currtpl->assign('dep_admin',$dep_admin);
	
	$admin=false;
	if($currmodule -> is_admin($curruser -> uid))
	{
		$admin=true;
	}
	$currtpl -> assign('admin',$admin);
	
	//顯示現在式在哪個論壇
	$dep=array("中文系","英文系","法文系","物理系","數學系","化學系","生科系","光電系","理學院","化工系","土木系","機械系","企管系","資管系","財金系","經濟系","資工系","電機系","通訊系","地科系","大氣系");
	if(intval($_GET['cid'])==1)
	{
		$forum_name="新生問題區";
	}
	else if(intval($_GET['cid'])==2)
	{
		$forum_name="社團討論區";
	}
	else if(intval($_GET['cid'])==4)
	{
		$forum_name="精華討論區";
	}
	else
	{
		$forum_name="系所社團區--".$dep[intval($_GET['cid'])-11];
	}
	$currtpl->assign('forum_name',$forum_name);
    //顯示幾樓
	$floor=1;
    $floor=(intval($_GET['page'])-1)*10+1;
	$currtpl->assign('floor',$floor);

	$currtpl->display('forum_problem.tpl.htm');
?>
