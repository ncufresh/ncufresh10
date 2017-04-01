<?php
	require_once('../../core/ac_boot.php');
	if($curruser -> is_login())
	{
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
		
		if($currmodule->is_admin() || $dep_admin==true)    //因自己可以修改自己文章  所以修改的判斷多了一個$curruser->uid == $forum_1D['uid']  但是自己的文章不能刪除  故此不加入判斷中
		{
			if(intval($_GET['grid'])==0)	//表示刪除的是問題  要連所有的回覆一起刪掉
			{
				$currdb -> sql_query("DELETE FROM `forum` WHERE `gid`='".intval($_GET['gid'])."'");//刪除該問題
				$currdb -> sql_query("DELETE FROM `forum` WHERE `grid`='".intval($_GET['gid'])."'");//刪除該問題的所有回覆
			}
			else	//刪除的是單獨的回覆
			{
				$currdb -> sql_query("DELETE FROM `forum` WHERE `gid`='".intval($_GET['gid'])."' AND `grid`='".intval($_GET['grid'])."'");//刪除該單一回覆
			}
			redirect("forum_list.php?cid=".intval($_GET['cid'])."&page=1");
		}
		else
		{
			redirect("index.php");
		}
	}
	else
	{
		redirect("../../login.php?redirect_path=".URL_ROOT_PATH."/module/forum");
	}
?>
