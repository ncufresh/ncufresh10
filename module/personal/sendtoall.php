<?php
require_once('../../core/ac_boot.php');
// step.1-1  check login(login action:insert.update.send.delete)
$all_right = true;
$errmsg = "";
if($curruser->is_login())
{
	if($curruser->username=="NcuFresh10")
	{
		if(isset($_POST['topic'])&&isset($_POST['content']))
		{
		   $_POST['topic'] = trim($_POST['topic']);
     	   if($_POST['topic']=="")
         	{
     	    	$all_right = false;
     	    	$errmsg .= "請填寫標題!<br/>";	
     	    }
          // step.3-3 content is empty 
     	   $_POST['content']= trim($_POST['content']);
     	   if($_POST['content']=="")
     	   { 
     	      $all_right = false;
     	      $errmsg .= "請填寫內文!<br/>";	
     	   }		 
		   if($all_right=="false")
		   {
			$currtpl -> assign('post_content',$_POST['content']);
            $currtpl -> assign('post_topic',$_POST['topic']);	
			$currtpl -> assign('errmsg',$errmsg);
			$currtpl -> assign('all_right', $all_right);
            $currtpl -> display('sendtoall.tpl.htm');
		    }
		   if($all_right=="true")
		   {
			 $num = $currdb->sql_query("SELECT count(*) from `ac_user`");
			 for($i=1;$i<=$num;$i++)
			{
			  $currdb->sql_query("INSERT INTO `fw10_mailbox` (sender_uid, receiver_uid, is_read, ip_addr, datetime, subject, contents) VALUES ('".$curruser->uid."','".$i."','1','".get_client_ip_addr()."','".mktime()."','".$_POST['topic']."','".$_POST['content']."')"); 
			}
		    $currtpl -> assign('all_right', $all_right);
            $currtpl -> display('sendtoall.tpl.htm');		
		  }
		}
		else
		{
			$all_right = false;
			$errmsg .= "請填寫標題及內文!<br/>";
			$currtpl -> assign('errmsg',$errmsg);
			$currtpl -> assign('all_right', $all_right);
		   	$currtpl -> display('sendtoall.tpl.htm');
		}
	}
	else
	{
	  exit();	
	}
}
else
{
    exit();	
}
?>