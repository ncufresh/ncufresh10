<?php
	require_once('../../core/ac_boot.php');
	$currtpl -> add_css("forum_style.css");
	if($curruser -> is_login())
	{
		//session_start();
		$source = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE `gid`='".intval($_GET['gid'])."' ");
		$_SESSION['gid']=intval($_GET['gid']);
		$forum_1D = $currdb -> sql_fetch_array($source);

        //系所權限的判定
        $dep_admin = false ;
        if($forum_1D['catid']>=11 && $forum_1D['catid']<=31)
        {
            $source_admin = $currdb->sql_query("SELECT * FROM `forum_admin` WHERE `uid`='".$curruser -> uid."' AND `cid`='".$forum_1D['catid']."'");
            if($currdb -> sql_num_rows($source_admin)==1)
            {
                $dep_admin=true;
            }
        }
        //$currtpl->assign('dep_admin',$dep_admin);
        //系所權限判定結束

		if($curruser->uid == $forum_1D['uid'] || $currmodule->is_admin() || $dep_admin==true)		//怕使用者直接在修改時在網址直接輸入gid 想改別人文章
		{
			$_SESSION['grid']=$forum_1D['grid'];
			if($forum_1D['grid']==0)//表示這篇是問題  不是回覆
			{
				$_SESSION['gid_url']=intval($_GET['gid']);   //把這篇文章gid存起來
			}
			else		//表示是回覆
			{
				$_SESSION['gid_url']=$forum_1D['grid'];  //把這篇回覆對應到的文章gid存起來
			}
			$currtpl->assign('grid',$forum_1D['grid']);
			$currtpl->assign('category',$forum_1D['category']);
			$_SESSION['cid']=$forum_1D['catid'];
			$currtpl->assign('cid',$forum_1D['catid']);
			//$currtpl->assign('forum_1D',$forum_1D);  //分開傳吧  這樣value不要吃<{$forum_1D.title}>這種型態 吃通用的<{$title}>  (content亦同)  在剛開啟修改以及修改時有錯誤導回來時才會正常顯示   改成以下兩行
			$currtpl->assign('title',$forum_1D['title']);
			$currtpl->assign('content',$forum_1D['content']);
		
			//顯示現在式在哪個論壇
			$dep=array("中文系","英文系","法文系","物理系","數學系","化學系","生科系","光電系","理學院","化工系","土木系","機械系","企管系","資管系","財金系","經濟系","資工系","電機系","通訊系","地科系","大氣系");
			if($forum_1D['catid']==1)
			{
				$forum_name="新生問題區";
			}
			else if($forum_1D['catid']==2)
			{
				$forum_name="社團討論區";
			}
			else if($forum_1D['catid']==4)
			{
				$forum_name="精華討論區";
			}
			else
			{
				$forum_name="系所討論區--".$dep[$forum_1D['catid']-11];
			}
			$currtpl->assign('forum_name',$forum_name);
		
			$currtpl->display('forum_edit.tpl.htm');
		}
		else
		{
			redirect("index.php");
		}
	}
	else
	{
		redirect("../../login.php?redirect_path=".urlencode(URL_ROOT_PATH."/module/forum/forum_edit.php?gid=".intval($_GET['gid'])."&cid=".$forum_1D['catid'])."");
	}
?>
