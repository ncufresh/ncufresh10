<?php
  require_once('../../core/ac_boot.php');
  $uid=$currdb -> sql_query("SELECT `uid` FROM `ac_user` WHERE `username` = '".$_GET['name']."'");
  $time = mktime(date("h"),date("i"),date("s"),date("m"),date("d"),date("y")) ;
  $date = date("Ymd");
  $topic="歡迎使用大一生活知訊網";
    $topic_2="小樹撫養守則";
  $content_1 ="親愛的".$_GET['name']."您好：
  　　您已完成２０１０大一生活知訊網的註冊手續，非常感謝您的使用！以下有幾點提醒各位：    一、首頁的最新公告區將不定期更新，相關訊息將寄至您的個人信箱中，請定期收信。    二、有關小樹的養育守則，將於下一封信中作詳細說明，請詳細閱讀。    三、對於知訊網網站使用上如有任何問題，歡迎寄站內信給知訊網工作團隊，我們將盡快為您解答。　　　　　　(使用網頁左上角的『聯絡我們』即可寄信給工作人員 )　　再次感謝您的使用，祝您使用愉快。                            ２０１０大一生活知訊網團隊　敬上";
  $content_2 ="
   各位新生你們好，歡迎你們使用2010知訊網，
   當申辦知訊網的帳號後，有沒有注意到您獲得了一顆種子呢？    要如何讓這顆種子平安長大呢？
   
   以下是一些能幫助您順利照顧小樹的撫養說明：
   小樹總共有五個成長階段，
   通過了五個生長階段後就會變成茁壯的大樹囉！！
   每次上站都會獲得一些可以幫助小樹生長的東西，
   要進入下一個生長階段需要收集到特定的物品以及經歷一些成長天數
   為了讓小樹平安長大，各位新生們可以好好利用知訊網～
   
   使用知訊網的功能即可獲得幫助小樹成長的物品喔！！
   以下是獲得的方法：   每次登入會獲得一些成長必須的　陽光，水及空氣   發表文章一篇可以獲得　特級肥料一包   注意！！若是發表沒有意義或是惡意文章將會被系統刪除喔！   回應文章一則可以獲得　普通肥料一包！   注意！！如果一天沒有登入知訊網，
   小樹就會因為缺乏照料而損失一些成長必須的東西(陽光，水或空氣)
   如果庫存空無一物維持兩天的話，
   小樹就會因為缺乏營養和照料而退化至前一成長階段噢！
   請各位新生們好好利用知訊網，
   這樣一來，不只可以在入學前對中大更了解，
   也能做好入學前的各種準備喲！	
   接下來我們就看看小樹需要收集到哪些東西才能順利成長變成茁壯的大樹吧！
   第一階段：要收集 陽光*4 水*4 空氣*4 以及經過4天成長期   第二階段：要收集 陽光*5 水*6 空氣*6以及經過5天成長期   第三階段：要收集 陽光*6 水*7 空氣*8以及經過5天成長期   第四階段：要收集 陽光*10 水*10 空氣*10以及經過8天成長期   第五階段：要收集 陽光*12 水*12 空氣*12以及經過8天成長期   (注意！！成長期晉升一個階段後 之前收集到的東西就消失了喔！)	
   另外值得注意的是～收集五個普通肥料可以換成一個特級肥料   獲得十五個特級肥料的新生，
   我們將以抽獎決定數名幸運者獲得諮商中心特別準備的精美禮物喔！！！   請各位新生們好好照顧你們的小樹吧～！	2010知訊網關心您～！^_____^";

  $uidname = $currdb->sql_fetch_array($uid);
  $currdb -> sql_query("INSERT INTO `tree` (`uid`, `firsttime`, `lasttime`, `lastdate`, `states`, `sun`, `water`, `air`, `fertilizer`, `special`) VALUES ('".$uidname['uid']."','".$time."','".$time."','".$date."',1,1,1,1,0,0)");

  $currdb -> sql_query("INSERT INTO `fw10_mailbox` (sender_uid, receiver_uid, is_read, ip_addr, datetime, subject, contents) VALUES (142,'".$uidname['uid']."',1,'".get_client_ip_addr()."','".mktime()."','".$topic."','".$content_1."')");
$currdb -> sql_query("INSERT INTO `fw10_mailbox` (sender_uid, receiver_uid, is_read, ip_addr, datetime, subject, contents) VALUES (142,'".$uidname['uid']."',1,'".get_client_ip_addr()."','".mktime()."','".$topic_2."','".$content_2."')");

  $say = "註冊成功!";
  redirect('../../index.php',1);
  $currtpl -> assign('say',$say);
  $currtpl -> display('first.tpl.htm');
?>
