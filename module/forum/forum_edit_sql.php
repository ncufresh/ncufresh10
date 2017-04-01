<?php
	require_once('../../core/ac_boot.php');
	$currtpl -> add_css("forum_style.css");
	if($curruser -> is_login())
	{
		$source = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE `gid`='".$_SESSION['gid']."' ");
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
		
		if($curruser->uid == $forum_1D['uid'] || $currmodule->is_admin() || $dep_admin==true)
		{
			//檢查是否所有欄位都填了
			$all_filled = true ;
			$wrong_message = "<ol>\n"; 		//設定錯誤訊息		//trim修剪掉空白
			if($_SESSION['grid']==0)  //如果是題目的話才判斷標題是否空白
			{
				if(trim($_POST['title']) == "")	//trim會把空白弄掉  如果只輸入空白鍵也會擋下來
				{
					$all_filled = false;
					$wrong_message .= "<li>標題未填寫</li>\n";
				}
			}
			if(trim($_POST['content']) == "")
			{
				$all_filled = false;
				$wrong_message .= "<li>內容未填寫</li>\n";
			}
			$wrong_message .= "</ol>\n";
			
			if(!isset($_POST['category']))
			{
				$post_category = "" ;
			}
			else
			{
				$post_category = trim($_POST['category']) ;
			}
		
			if($all_filled==true && $_SESSION['cid']==1 )   //新生問題的時候(cid==1)     可以修改分類(category)  所以UPDATE有改category
			{
				if($post_category=="選課" || $post_category=="註冊" || $post_category=="住宿" || $post_category=="生活" || $post_category=="護照" || $post_category=="其他" && $_SESSION['grid']==0)	//如果是發文 不是回覆  要有在分類中
				{
					$currdb->sql_query("UPDATE `forum` SET `title`='".$_POST['title']."', `category`='".$post_category."', `content`='".$_POST['content']."' WHERE `gid`=".$_SESSION['gid']);
				}
				else	//修改回覆	沒有改 `title` 和 `category`
				{
					$currdb->sql_query("UPDATE `forum` SET `content`='".$_POST['content']."' WHERE `gid`=".$_SESSION['gid']);
				}
			}
			else if($all_filled==true && $_SESSION['cid']!=1)  //不是新生問題  是系所等等的時候
			{
				if($_SESSION['grid']==0)	//是修改發文
				{
					$currdb->sql_query("UPDATE `forum` SET `title`='".$_POST['title']."', `content`='".$_POST['content']."' WHERE `gid`=".$_SESSION['gid']);
				}
				else	//修改回覆
				{
					$currdb->sql_query("UPDATE `forum` SET `content`='".$_POST['content']."' WHERE `gid`=".$_SESSION['gid']);
				}
			}
			else
			{
				$currtpl->assign('gid',$_SESSION['gid']);
				$currtpl->assign('cid',$_SESSION['cid']);
				$currtpl->assign('grid',$_SESSION['grid']);
				if($_SESSION['grid']==0)	//如果是修改發文才assign
				{
					$currtpl->assign('title',$_POST['title']);
					if($_SESSION['cid']==1)	//如果是發文的新生區 才有 $_POST['category']
					{
						$currtpl->assign('category',$_POST['category']);
					}
				}
				$currtpl->assign('content',$_POST['content']);
				$currtpl->assign('wrong_message',$wrong_message);
				$currtpl->display('forum_edit.tpl.htm');
			}
			redirect("forum_problem.php?gid=".$_SESSION['gid_url']."&cid=".$_SESSION['cid']."&page=1");//forum_edit.php中有assign值給$_SESSION['gid_url']
		}
		else
		{
			redirect("index.php");
		}
	}
	else
	{
		redirect("../../login.php");
	}
?>