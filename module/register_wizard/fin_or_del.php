<?php
require_once('../../core/ac_boot.php');
$result = $currdb->sql_query("SELECT * FROM `reg_user` WHERE `uid` = '".$curruser->uid."' AND `doc_id` = '".$_POST['doc_id']."'");
$date_result = $currdb->sql_query("SELECT * FROM `reg_spirit` WHERE `doc_id` = '".$_POST['doc_id']."'");
$check_din = 0;
$date_begin = 0;
$date_ending = 0;
$testid = $_POST['doc_id'];

while($data=$currdb->sql_fetch_array($date_result))
{
	$date_begin = $data['date_begin'];
	$date_ending = $data['date_ending'];
}
if($curruser->is_guest())
{ 
echo "<script>alert ('請先登入');</script>";
echo "<img id=".$testid." src=\"templates/zh_tw/images/calender_nike_empty.jpg\" onclick=\"opt_change(".$testid.")\"/>";
}

else
{
	if((date("Ymd"))<date("Ymd",strtotime($date_begin)))
	{
		echo "<script>alert ('時間未到');</script>";	
		echo "<img id=".$testid." src=\"templates/zh_tw/images/calender_nike_empty.jpg\" onclick=\"opt_change(".$testid.")\"/>";
	}
	elseif((date("Ymd"))>date("Ymd",strtotime($date_ending)))
	{
		echo "<script>alert ('太晚摟');</script>";
		echo "<img id=".$testid." src=\"templates/zh_tw/images/calender_nike_empty.jpg\" onclick=\"opt_change(".$testid.")\"/>";
	}
	else
	{
		while($data=$currdb->sql_fetch_array($result))
		{
			$check_fin = $data['is_finished'];
		}
		if($check_fin == 1)
		{
			$currdb->sql_query("DELETE FROM `reg_user` WHERE `uid` = '".$curruser->uid."' AND `doc_id` = '".$_POST['doc_id']."'");
			echo "<img id=".$testid." src=\"templates/zh_tw/images/calender_nike_empty.jpg\" onclick=\"opt_change(".$testid.")\"/>";
		}
		elseif($check_fin == 0)
		{
			$currdb->sql_query("INSERT INTO `reg_user` (uid,doc_id,is_finished) VALUES('".$curruser->uid."', '".$_POST['doc_id']."',1)");
			echo "<img id=".$testid." src=\"templates/zh_tw/images/calender_nike.jpg\" onclick=\"opt_change(".$testid.")\"/>";
		}
	}
}
?>