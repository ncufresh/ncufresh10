<?php
require_once('../../core/ac_boot.php');
// step.1-1  check login(login action:insert.update.send.delete)
$all_right = true;
$errmsg = "";
if($curruser->is_login())
{
     // step.2-1 action:sendmail 
     if($_GET['action'] == "send")
     {
          //get the receiver data
         $receiver_sql_source=$currdb->sql_query("SELECT * FROM `ac_user` WHERE `username` = '".$_POST['sendtowho']."'");
             // step.3-1 receiver isn't exist
            if($currdb -> sql_num_rows($receiver_sql_source) == 0 )
             {
              $all_right = false;
              $errmsg .= "該使用者不存在請確認<br/>";
             }
     	    // step.3-2 topic is empty 
     	  	 $_POST['topic'] = trim($_POST['topic']);
     	  	 if(!isset($_POST['topic'])|| $_POST['topic']=="")
     	  	 {
     	  	   $all_right = false;
     	  	   $errmsg .= "請填寫標題!<br/>";	
     	  	 }
          // step.3-3 content is empty 
     	  	 $_POST['content'] = trim($_POST['content']);
     	  	 if(!isset($_POST['content']) || $_POST['content']=="")
     	     { 
     	       $all_right = false;
     	  	   $errmsg .= "請填寫內文!<br/>";	
     	     }		 
     	  // step.3-4 number is wrong
             if(!isset($_SESSION['s_code']) || $_POST['num']!=$_SESSION['s_code'])
             {
               $all_right = false;
     	  	   $errmsg .= "認證碼錯誤<br/>";		
             }
          // step.3-5 all right -> insert
             if($all_right == true)
             {
              echo $receiver_uid['uid'];
              $receiver_uid = $currdb->sql_fetch_array($receiver_sql_source);
              $currdb->sql_query("INSERT INTO `fw10_mailbox` (sender_uid, receiver_uid, is_read, ip_addr, datetime, subject, contents) VALUES ('".$curruser->uid."','".$receiver_uid['uid']."','1','".get_client_ip_addr()."','".mktime()."','".$_POST['topic']."','".$_POST['content']."')"); 
              $currtpl -> assign('all_right', $all_right);
              $currtpl -> display('unreadmail.tpl.htm');
              redirect("unreadmail.php");
             }
          // step.3-6 something wrong go back   
             if(!$all_right)
             { 
              $currtpl -> assign('all_right',$all_right);
              $currtpl -> assign('errmsg',$errmsg);
              $currtpl -> assign('post_content',$_POST['content']);
              $currtpl -> assign('post_topic',$_POST['topic']);
              $currtpl -> assign('post_rec',$_POST['sendtowho']);
              $currtpl -> assign('all_right', $all_right);
              $currtpl -> display('sendmail.tpl.htm');
              redirect("sendmail.php");
             }
      }


     // step.2-2 action:delete and check $_GET['mid'] is int 
     if($_GET['action'] == "delete" && intval($_GET['mid']) != 0)
     {
          //check the mid is own to the right user 
          $validate_correct_user_source = $currdb->sql_query("SELECT * FROM `fw10_mailbox` WHERE `mid` = '".intval($_GET['mid'])."' AND `receiver_uid` = '".$curruser ->uid."'");
             // step.3-1 someboday attack
            if($currdb -> sql_num_rows($validate_correct_user_source) == 0 )
             {
               exit();
             }
             // step.3-2 all right -> delete
             else
             {
               $currdb->sql_query("DELETE FROM `fw10_mailbox` WHERE `mid`='".$_GET['mid']."'"); 
               $currtpl -> assign('all_right', $all_right);
               $currtpl -> display('haveread.tpl.htm');
               redirect("haveread.php", 1);
             }
      }
	// step.2-3 action:update
     if($_GET['action'] == "update")
     {
           // step.3-1 check the realname 
           $_POST['realname'] = trim($_POST['realname']);
     	   if(!isset($_POST['realname'])|| $_POST['realname']=="")
     	   {
     	  	  $all_right = false;
     	  	  $errmsg .= "請填寫姓名!<br/>";	
     	   }
           // step.3-2 check the name 
           $_POST['nickname'] = trim($_POST['nickname']);
     	   if(!isset($_POST['nickname'])|| $_POST['nickname']=="")
     	   {
     	  	  $all_right = false;
     	  	  $errmsg .= "請填寫暱稱!<br/>";	
     	   }
     	   if(mb_strlen($_POST['nickname'])>13)
     	   {
     	   	  $all_right = false;
     	   	  $errmsg .= "暱稱過長請重填<br/>";
     	    }
     	    // step.3-4 password is not the same
     	  	  if(isset($_POST['password'])&&$_POST['password']!="")
               {
              	  	 $old=$currdb -> sql_query("SELECT `password` from `ac_user` WHERE `password`='".md5($_POST['oldpassword'])."'");
     	  	         if($currdb->sql_num_rows($old)==0)
     	  	         {
     	  	         	$all_right = false;
     	  	            $errmsg .= "舊密碼輸入錯誤!<br/>";
     	  	         }
              	  	 if(!isset($_POST['password'])|| $_POST['password']!=$_POST['password_check'])
     	         	 {
     	  	            $all_right = false;
     	  	            $errmsg .= "填入密碼不相同請重新輸入!<br/>";	
     	  	         }
               }
            // step.3-5 content is empty 
     	  	 if(!isset($_POST['department']) || $_POST['department']=="請 選 擇")
     	     { 
     	       $all_right = false;
     	  	   $errmsg .= "請填寫系所<br/>";	
     	     }

            
			$avail_dep = array("請 選 擇","中文系","英文系","法文系","物理系","數學系","化學系","生科系","光電系","理學院學士班","化材系","土木系","機械系","企管系","資管系","財金系","經濟系","電機系","資工系","通訊系","地科系","大氣系","其他");
            $is_valid_dep = false;
            for($i=0; $i<count($avail_dep); $i++)
            {
                if($avail_dep[$i] == $_POST['department'])
                {
                    $is_valid_dep = true;
                    break;
                }
            }
            if(!$is_valid_dep)
            {
                $all_right = false;
                $errmsg .= "系所無效，請重新填寫<br />";
            }
     	    // step.3-6 number is wrong
             if(!isset($_SESSION['s_code']) || $_POST['num']!=$_SESSION['s_code'])
             {
               $all_right = false;
     	  	   $errmsg .= "認證碼錯誤<br/>";		
             }
             // step.3-7 check email
             if($_POST['email']!="" && validate_email($_POST['email'])==false)
             {
               $all_right = false;
     	  	   $errmsg .= "email輸入錯誤<br/>";		
             }
            // step.3-8 check head
             if(!isset($_POST['head']) || $_POST['head']=="images/head/00.jpg" || strpos($_POST['head'], "module/personal/templates/zh_tw/images/head/") === false)
             {
               	$all_right = false;
               	$errmsg .="未選擇頭像<br/>";
             }
             if($_SESSION['OLDTICKET']!=$_POST['ticket'])
             {
                $all_right = false;  //prevent repost 
             }
          // step.3-9 all right -> insert
             if($all_right == true)
             {
                if(isset($_POST['password'])&&$_POST['password']!="")
                {
		              $currdb->sql_query("UPDATE `ac_user` SET `realname`='".$_POST['realname']."', `nickname`='".$_POST['nickname']."', `department`='".$_POST['department']."', `birthday`='".$_POST['birthday']."', `self_website`='".$_POST['self_website']."',`self_intro`='".$_POST['self_intro']."',`senior_high`='".$_POST['senior_high']."',`password`='".md5($_POST['password'])."',`email`='".$_POST['email']."',`head_image`='".$_POST['head']."' WHERE `uid`='".$curruser->uid."'"); 
                      $curruser->login($curruser->username, $_POST['password']);
                redirect(URL_ROOT_PATH."/index.php");
                }
                else
	            {
	              $currdb->sql_query("UPDATE `ac_user` SET `realname`='".$_POST['realname']."', `nickname`='".$_POST['nickname']."',
	               `department`='".$_POST['department']."', `birthday`='".$_POST['birthday']."', 
	               `self_website`='".$_POST['self_website']."',`self_intro`='".$_POST['self_intro']."',
	               `senior_high`='".$_POST['senior_high']."',`email`='".$_POST['email']."',`head_image`='".$_POST['head']."' WHERE `uid`='".$curruser->uid."'"); 
	            redirect(URL_ROOT_PATH."/index.php");
	            }
              $currtpl -> assign('all_right', $all_right); 
             }
          // step.3-10 something wrong go back   
             if(!$all_right)
             { 
              $head_source = $currdb -> sql_query("SELECT * from `user_head`");
			  $head_2D =array();
			  while($head_processing_array = $currdb->sql_fetch_array($head_source))
			  {
					array_push($head_2D, $head_processing_array);
			  }
              function generate_select_box($input = null)
			{
				$display = array("請 選 擇","中國文學系","英美語文學系","法國語文學系","物理學系","數學系","化學學系","生命科學系","光電科學與工程學系","理學院學士班","化學工程與材料工程學系","土木工程學系","機械工程學系","企業管理學系","資訊管理學系","財務金融學系","經濟學系","電機工程學系","資訊工程學系","通訊工程學系","地球科學學系","大氣科學學系","其他");
				$value = array("請 選 擇","中文系","英文系","法文系","物理系","數學系","化學系","生科系","光電系","理學院學士班","化材系","土木系","機械系","企管系","資管系","財金系","經濟系","電機系","資工系","通訊系","地科系","大氣系","其他");
				
				$result = "<select name=\"department\">\n";
				for($i=0; $i<count($display); $i++)
				{
					$result .= "<option value=\"".$value[$i]."\" ".($input == $value[$i] ? "selected=\"selected\"" : "").">".$display[$i]."</option>\n";
				}
				$result .= "</select>\n";
				return $result;
			}

              $head_source = $currdb -> sql_query("SELECT * from `user_head` order by `hid` DESC");
			  $head_2D =array();
			  while($head_processing_array = $currdb->sql_fetch_array($head_source))
			  {
					array_push($head_2D, $head_processing_array);
			  }


	
function generate_select_head($input = null,$head_2D)
{
	$result = "<select name=\"head\" onChange=\"renew(this.options[this.selectedIndex].value);\">\n";
	for($i=0; $i<count($head_2D); $i++)
	{
		$result .= "<option value=\"".$head_2D[$i]['position']."\" ".($input == $head_2D[$i]['position'] ? "selected=\"selected\"" : "").">".$head_2D[$i]['headname']."</option>\n";
	}
	$result .= "</select>\n";
	return $result;
}

  $currtpl ->assign('head_box',generate_select_head($perdata_arr['head_image'],$head_2D));  		  
			  $currtpl ->assign('box',generate_select_box($_POST['department']));
			  $currtpl -> assign('head',$head_2D);
              $currtpl -> assign('all_right',$all_right);
              $currtpl -> assign('errmsg',$errmsg);
              $currtpl -> assign('post_head',$_POST['head']);
              $currtpl -> assign('post_intro',$_POST['self_intro']);
              $currtpl -> assign('post_website',$_POST['self_website']);
              $currtpl -> assign('post_email',$_POST['email']);
              $currtpl -> assign('post_bir',$_POST['birthday']);
              $currtpl -> assign('post_senior',$_POST['senior_high']);
              $currtpl -> assign('post_nickname',$_POST['nickname']);
              $currtpl -> assign('post_realname',$_POST['realname']);
              $currtpl -> assign('all_right', $all_right);
              $currtpl -> display('update.tpl.htm');
             }
      }

      // step.2-5 action:Parameter wrong
      else
      {
        	exit();
      }	
}
// step.1-2  unlogin(unlogin action:regsiter)
else 
{
	// step.2-4 action:register 
     if($_GET['action'] == "reg")
     {
           // step.3-1 check the realname 
           $_POST['realname'] = trim($_POST['realname']);
     	   if(!isset($_POST['realname'])|| $_POST['realname']=="")
     	   {
     	  	  $all_right = false;
     	  	  $errmsg .= "請填寫姓名!<br/>";	
     	   }
           // step.3-2 check the name 
           $_POST['nickname'] = trim($_POST['nickname']);
     	   if(!isset($_POST['nickname'])|| $_POST['nickname']=="")
     	   {
     	  	  $all_right = false;
     	  	  $errmsg .= "請填寫暱稱!<br/>";	
     	   }
     	   if(mb_strlen($_POST['nickname'])>13)
     	   {
     	   	  $all_right = false;
     	   	  $errmsg .= "暱稱過長 中文請在4字元內 英文請在12字元內<br/>";
     	    }
            //check the username data
         $receiver_sql_source=$currdb->sql_query("SELECT * FROM `ac_user` WHERE `username` = '".$_POST['username']."'");
             // step.3-3 this username is exist
             $_POST['username'] = trim($_POST['username']);
            if($currdb->sql_num_rows($receiver_sql_source)!=0)
            {
                     $all_right = false;
                     $errmsg .= "該帳號已有人使用!!!<br/>";
            }	
            if(!isset($_POST['username'])||$_POST['username']=="")
            {
                 $all_right = false;
                 $errmsg .= "請填寫帳號!!!<br/>";
            }
            if(!preg_match("/^[a-zA-Z0-9|_]{2,12}$/", $_POST['username']))
            {
                 $all_right = false;
                 $errmsg .= "帳號請使用英文或數字,2~12字<br/>";	
            }
            if($_POST['username'])
     	    // step.3-4 password is not the same
     	  	  if(!isset($_POST['password'])|| $_POST['password']=="")
               {
                     $all_right = false;
                     $errmsg .= "請填寫密碼!!!<br/>";
              	  	 if(!isset($_POST['password'])|| $_POST['password']!=$_POST['password_check'])
     	         	 {
     	  	            $all_right = false;
     	  	            $errmsg .= "填入密碼不相同請重新輸入!<br/>";	
     	  	         }
               }
            // step.3-5 content is empty 
     	  	 if(!isset($_POST['department']) || $_POST['department']=="請 選 擇")
     	     { 
     	       $all_right = false;
     	  	   $errmsg .= "請填寫系所<br/>";	
     	     }
            $avail_dep = array("請 選 擇","中文系","英文系","法文系","物理系","數學系","化學系","生科系","光電系","理學院學士班","化材系","土木系","機械系","企管系","資管系","財金系","經濟系","電機系","資工系","通訊系","地科系","大氣系","其他");
            $is_valid_dep = false;
            for($i=0; $i<count($avail_dep); $i++)
            {
                if($avail_dep[$i] == $_POST['department'])
                {
                    $is_valid_dep = true;
                    break;
                }
            }
            if(!$is_valid_dep)
            {
                $all_right = false;
                $errmsg .= "系所無效，請重新填寫<br />";
            }


     	    // step.3-6 number is wrong
             if(!isset($_SESSION['s_code']) || $_POST['num']!=$_SESSION['s_code'])
             {
               $all_right = false;
     	  	   $errmsg .= "認證碼錯誤<br/>";		
             }
             // step.3-7 check email
             if($_POST['email']!="" && validate_email($_POST['email'])==false)
             {
               $all_right = false;
     	  	   $errmsg .= "email輸入錯誤<br/>";		
             }
             // step.3-8 check head
             if(!isset($_POST['head']) || $_POST['head']=="請 選 擇" || strpos($_POST['head'], "module/personal/templates/zh_tw/images/head/") === false)
             {
               	$all_right = false;
               	$errmsg .="未選擇頭像<br/>";
             }
             // step.3-9 all right -> insert
             if($all_right == true)
             {
              $currdb->sql_query("INSERT INTO `ac_user` (username, realname, nickname,department, birthday, self_website, self_intro,ip_address,senior_high,password,email,head_image) VALUES ('".$_POST['username']."','".$_POST['realname']."','".$_POST['nickname']."','".$_POST['department']."','".$_POST['birthday']."','".$_POST['self_website']."','".$_POST['self_intro']."','".get_client_ip_addr()."','".$_POST['senior_high']."','".md5($_POST['password'])."','".$_POST['email']."','".$_POST['head']."')"); 
              $currdb->sql_insert_id();
              $curruser->login($_POST['username'], $_POST['password']);
              redirect("first.php?name=".$_POST['username']);
             }
          // step.3-10 something wrong go back   
             if(!$all_right)
             { 
              function generate_select_box($input = null)
			{
				$display = array("請 選 擇","中國文學系","英美語文學系","法國語文學系","物理學系","數學系","化學學系","生命科學系","光電科學與工程學系","理學院學士班","化學工程與材料工程學系","土木工程學系","機械工程學系","企業管理學系","資訊管理學系","財務金融學系","經濟學系","電機工程學系","資訊工程學系","通訊工程學系","地球科學學系","大氣科學學系","其他");
				$value = array("請 選 擇","中文系","英文系","法文系","物理系","數學系","化學系","生科系","光電系","理學院學士班","化材系","土木系","機械系","企管系","資管系","財金系","經濟系","電機系","資工系","通訊系","地科系","大氣系","其他");
				
				$result = "<select name=\"department\">\n";
				for($i=0; $i<count($display); $i++)
				{
					$result .= "<option value=\"".$value[$i]."\" ".($input == $value[$i] ? "selected=\"selected\"" : "").">".$display[$i]."</option>\n";
				}
				$result .= "</select>\n";
				return $result;
			}

              $head_source = $currdb -> sql_query("SELECT * from `user_head`");
			  $head_2D =array();
			  while($head_processing_array = $currdb->sql_fetch_array($head_source))
			  {
					array_push($head_2D, $head_processing_array);
			  }
			  $currtpl ->assign('box',generate_select_box($_POST['department']));
			  $currtpl -> assign('head',$head_2D);
              $currtpl -> assign('all_right',$all_right);
              $currtpl -> assign('errmsg',$errmsg);
              $currtpl -> assign('post_intro',$_POST['self_intro']);
              $currtpl -> assign('post_website',$_POST['self_website']);
              $currtpl -> assign('post_email',$_POST['email']);
              $currtpl -> assign('post_bir',$_POST['birthday']);
              $currtpl -> assign('post_senior',$_POST['senior_high']);
              $currtpl -> assign('post_username',$_POST['username']);
              $currtpl -> assign('post_name',$_POST['nickname']);
              $currtpl -> assign('post_realname',$_POST['realname']);
              $currtpl -> assign('all_right', $all_right);
              $currtpl -> display('register.tpl.htm');
             }
      }
}

?>
