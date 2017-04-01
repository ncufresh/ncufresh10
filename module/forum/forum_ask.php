<?php
	require_once('../../core/ac_boot.php');
	$currtpl -> add_css("forum_style.css");
	if($curruser -> is_login())
	{
		session_start();
        if(intval($_GET['cid'])>31 || intval($_GET['cid'])<1 || (intval($_GET['cid'])==4 && !$currmodule->is_admin() ))         //確認有這個論壇  以及  要在精華區發文的話要是admin
        {
            redirect("index.php");
        }
        $source = $currdb->sql_query("SELECT * FROM `forum` WHERE `gid` = '".intval($_GET['grid'])."'");
        if($currdb->sql_num_rows($source) == 0 && intval($_GET['grid']) != 0 )   //如果現在是回應 且 有該回應所對應的文章才讓它回應  不然就跳回首頁
        {
            redirect("index.php");
        }
		$_SESSION['cid']=intval($_GET['cid']);
		$_SESSION['grid']=intval($_GET['grid']);  //grid是0的話就是問題 不是的話就是該對應問題的回覆
		$currtpl->assign('cid',$_SESSION['cid']);
		$currtpl->assign('grid',$_SESSION['grid']);  //grid是0的話 才是發問  才需要選分類
		
		//顯示現在式在哪個論壇
		$dep=array("中文系","英文系","法文系","物理系","數學系","化學系","生科系","光電系","理學院","化工系","土木系","機械系","企管系","資管系","財金系","經濟系","資工系","電機系","通訊系","地科系","大氣系");
		if($_SESSION['cid']==1)
		{
			$forum_name="新生問題區";
		}
		else if($_SESSION['cid']==2)
		{
			$forum_name="社團討論區";
		}
		else if($_SESSION['cid']==4)
		{
			$forum_name="精華討論區";
		}
		else
		{
			$forum_name="系所討論區--".$dep[$_SESSION['cid']-11];
		}
		$currtpl->assign('forum_name',$forum_name);
			
		
		$currtpl->display('forum_ask.tpl.htm');
	}
	else
	{
		redirect("../../login.php?redirect_path=".urlencode(URL_ROOT_PATH."/module/forum/forum_ask.php?cid=".intval($_GET['cid'])."&grid=".intval($_GET['grid']))."");
	}
?>
