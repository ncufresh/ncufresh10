<?php
	require_once('../../core/ac_boot.php');
	$currtpl -> add_css("forum_style.css");
	//$currtpl->assign('array_1D',$array_1D);
	
    if(!isset($_GET['select']))     //如果沒有用get傳select過來
    {
        $select_num = 0;
    }
    else        //如果有傳get過來
    {
        if(intval($_GET['select'])<0 || intval($_GET['select']>6))
        {
            $select_num = 0;
        }
        else
        {
            $select_num = intval($_GET['select']);
        }
    }

	$select_arr = array("全部","選課","註冊","住宿","生活","護照","其他");
	/*if(intval($_GET['select'])>=0 && intval($_GET['select'])<=6)
	{
		$select = $select_arr[intval($_GET['select'])];
	}*/
	$select = $select_arr[$select_num];
	/*if(!isset($_GET['select']))   //這裡不可以加intval
	{
		$select_num = 0;
	}*/
	/*if(intval($_GET['select'])>=0 && intval($_GET['select'])<=6)
	{
		$select_num = intval($_GET['select']) ;
	}*/
	$currtpl->assign('select_num',$select_num);
	
	if(intval($_GET['cid'])==1)   //新生問題
	{
		if($select=="全部")	//如果沒有選分類
		{
			$source = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE `parent`=1 AND `grid`=0 ORDER BY `forum`.`place_top` DESC, `forum`.`datatime_order` DESC LIMIT ".(10*(intval($_GET['page'])-1)).",10 ");
			$source_page = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE `parent`=1 AND `grid`=0 ORDER BY `forum`.`datatime_order` DESC ");
		}
		else
		{
			$source = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE `parent`=1 AND `grid`=0 AND `category`='".$select."' ORDER BY `forum`.`place_top` DESC, `forum`.`datatime_order` DESC LIMIT ".(10*(intval($_GET['page'])-1)).",10 ");
			$source_page = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE `parent`=1 AND `grid`=0 AND `category`='".$select."' ORDER BY `forum`.`datatime_order` DESC ");
		}
	}
	else if(intval($_GET['cid'])>=2 && intval($_GET['cid'])<=32)  
	{
		//$source = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE `catid`=".$_GET['cid']." AND `grid`=0 ORDER BY `forum`.`datatime_order` DESC LIMIT ".(10*($_GET['page']-1)).",10 ");
		$source = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE `catid`=".intval($_GET['cid'])." AND `grid`=0 ORDER BY `forum`.`place_top` DESC, `forum`.`datatime_order` DESC LIMIT ".(10*(intval($_GET['page'])-1)).",10 ");
		$source_page = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE `catid`=".intval($_GET['cid'])." AND `grid`=0 ORDER BY `forum`.`datatime_order` DESC ");
	}
		
	$forum_2D=array();
	while($forum_1D = $currdb -> sql_fetch_array($source))
	{
		//$forum_1D['content'] = nl2br($forum_1D['content']);
		$forum_1D['datatime'] = date("Y/m/d H:i:s",$forum_1D['datatime']);
			
		$forum_1D['title'] = html_eliminate($forum_1D['title']);
		if(mb_strlen($forum_1D['title'], 'UTF-8') > 13)
		{
			$forum_1D['title'] = mb_substr($forum_1D['title'], 0, 13, 'UTF-8') . "...";
		}
			
		$forum_1D=htmlencode($forum_1D);  //可以直接對整個array用htmlencode
		array_push($forum_2D, $forum_1D);
	}
	$currtpl->assign('forum_2D',$forum_2D);
	$currtpl->assign('cid',intval($_GET['cid']));
		
	//分頁程式開始
	$num = $currdb -> sql_num_rows($source_page);
	$page=array();		//分頁
	if(intval($_GET['page'])<=3 && ceil($num/10)-intval($_GET['page'])<=2)
	{
		for($i=0;$i<$num/10;$i++)
		{
			$page[$i]=$i+1;
		}
		$state=0;
	}
	
	//ceil($num/10)是最大頁數
	else if(intval($_GET['page'])<=3 && ceil($num/10)>3)//state 1:最後面有最終頁
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
	
	$admin=false;
	if($currmodule -> is_admin($curruser -> uid))
	{
		$admin=true;
	}
	$currtpl->assign('admin',$admin);
		
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
		$forum_name="系所討論區--".$dep[intval($_GET['cid'])-11];
	}
	$currtpl->assign('forum_name',$forum_name);
	
	
		
	$currtpl->display('forum_list.tpl.htm');
?>
