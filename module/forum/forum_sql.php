<?php
	require_once('../../core/ac_boot.php');
	$currtpl -> add_css("forum_style.css");
	if($curruser -> is_login())
	{
        if($_SESSION['cid']==4 && !$currmodule->is_admin()) //如果用假表單傳送 想傳到精華區 恰巧他瀏覽器開著因為cookie而讓他通過is_login()  就判斷他是不是admin來阻擋他
        {
            redirect("index.php");
        }
		//session_start();  //ac_boot已經start過了
		$dep=array("中文系","英文系","法文系","物理系","數學系","化學系","生科系","光電系","理學院","化工系","土木系","機械系","企管系","資管系","財金系","經濟系","資工系","電機系","通訊系","地科系","大氣系");
		
		if(!isset($_POST['category']))	//如果沒有POST過來  可能的原因是  不是新生問題區  所以沒有傳  第二個可能是用假表單想傳到新生問題區
		{
			$post_category = "" ;
		}
		else
		{
			$post_category = trim($_POST['category']) ;
		}
		/*
			$post_category 直接 等於 $_POST['category'] 過來的值  所以是新生問題區中的分類們
			而下面會出現的 $category   若在新生問題區就是分類們  但如果在系所區就是系所名稱  如過其他的地方就是空值
		*/
		
		if($_SESSION['cid']==1)
		{
			$parent=1;
			$category=/*$_POST['category']*/ $post_category;
		}
		else if($_SESSION['cid']>=11 && $_SESSION['cid']<=31)
		{
			$parent=3;
			$category=$dep[$_SESSION['cid']-11];
		}
		else
		{
			$parent=0;
			$category=NULL;
		}
		
		//檢查是否所有欄位都填了
		$all_filled = true ;
		$wrong_message = "<ol>\n"; 		//設定錯誤訊息		//trim修剪掉空白
		if(!isset($_POST['title']))
		{
			$post_title = "" ;
		}
		else
		{
			$post_title = trim($_POST['title']);
		}
		if(/*trim($_POST['title'])*/ $post_title == "" && $_SESSION['grid']==0)  //如果是發文的話才判斷標題是否空白
		{
			$all_filled = false;
			$wrong_message .= "<li>標題未填寫</li>\n";
		}
		
		/*if(trim($_POST['category']) == "請選擇分類")*/
		if($post_category!="選課" && $post_category!="註冊" && $post_category!="住宿" && $post_category!="生活" && $post_category!="護照" && $post_category!="其他" && $_SESSION['cid']==1 && $_SESSION['grid']==0)	//都沒在分類中  而且  在新生問題中  而且  是發文不是回覆  才判斷
		{
			$all_filled = false;
			$wrong_message .= "<li>分類未選擇</li>\n";
		}
		if(trim($_POST['content']) == "")
		{
			$all_filled = false;
			$wrong_message .= "<li>內容未填寫</li>\n";
		}
		$wrong_message .= "</ol>\n";

		if($all_filled == true)
		{
			$currdb->sql_query("INSERT INTO `forum` (grid,uid,category,catid,parent,title,content,datatime,datatime_order,ip) VALUES ('".$_SESSION['grid']."','".$curruser -> uid."','".$category."','".$_SESSION['cid']."','".$parent."','"./*$_POST['title']*/$post_title."','".$_POST['content']."','".time()."','".time()."','".get_client_ip_addr()."')");
			$currdb->sql_query("UPDATE `forum` SET `datatime_order`=".time()." WHERE `gid`=".$_SESSION['grid']);//更新被回覆的問題的"排序用時間"
			//echo get_client_ip_addr();
			
			//下面小樹會用到
			$time = mktime(date("h"),date("i"),date("s"),date("m"),date("d"),date("y")) ;
			$date = date("Ymd");
			if($_SESSION['grid']==0)	//發文
			{
				//發文成功之後  會在小樹資料表那邊加special
				if($currdb -> sql_num_rows($currdb -> sql_query("SELECT * FROM `tree` WHERE `uid`"))==0)//還沒進過小樹
				{
					$currdb -> sql_query("INSERT INTO `tree` (`uid`, `firsttime`, `lasttime`, `lastdate`, `states`, `sun`, `water`, `air`, `fertilizer`, `special`) VALUES ('".$curruser->uid."', '".$time."', '".$time."', '".$date."', 1, 1, 1, 1, 0, 0)");
				}
				else
				{
					$currdb -> sql_query("UPDATE `tree` SET `special` = `special` + 1 WHERE `uid` = '".$curruser->uid."'");
				}
			}
			else		//回覆
			{
				//回覆成功之後  會在小樹資料表那邊加fertilizer
				if($currdb -> sql_num_rows($currdb -> sql_query("SELECT * FROM `tree` WHERE `uid`='".$curruser->uid."'"))==0)
				{
					$currdb -> sql_query("INSERT INTO `tree` (`uid`, `firsttime`, `lasttime`, `lastdate`, `states`, `sun`, `water`, `air`, `fertilizer`, `special`) VALUES ('".$curruser->uid."', '".$time."', '".$time."', '".$date."', 1, 1, 1, 1, 0, 0)");
				}
				else
				{
					$currdb -> sql_query("UPDATE `tree` SET `fertilizer` = `fertilizer` + 1 WHERE `uid` = '".$curruser->uid."'");
				}
				$currdb -> sql_query("UPDATE `forum` SET `reply_amount` = `reply_amount`+1 WHERE `gid` = '".$_SESSION['grid']."'");
			}
		}
		else   //有欄位沒有填 所以沒有寫入成功
		{
			$currtpl->assign('cid',$_SESSION['cid']);
			$currtpl->assign('grid',$_SESSION['grid']);
			$currtpl->assign('title',$post_title /*$_POST['title']*/);
			$currtpl->assign('category',$post_category /*$_POST['category']*/);
			$currtpl->assign('content',$_POST['content']);
			$currtpl->assign('wrong_message',$wrong_message);
			$currtpl->display('forum_ask.tpl.htm');
		}
		
		if($_SESSION['grid']==0)//表示這個是問問題，不是在回應別人，所以回到該討論區的問題列表
		{
			redirect("forum_list.php?cid=".$_SESSION['cid']."&page=1");
		}
		else  		//不然的話這個就是回覆，要回到該問題的地方
		{
			redirect("forum_problem.php?gid=".$_SESSION['grid']."&cid=".$_SESSION['cid']."&page=1");
		}
	}
	else
	{	
		redirect("../../login.php");
	}
	
?>
