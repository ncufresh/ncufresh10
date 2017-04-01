<?php
require_once('../../core/ac_boot.php');
if(!$curruser -> is_login())
	exit();

//$time = mktime(date("h"),date("i"),date("s"),date("m"),date("d"),date("y")) ;
$time = mktime(date("h"),date("i"),date("s"),date("m"),date("d"),date("y")) ;
$date = date("Ymd");

$uid = $curruser -> uid;
$sql = $currdb -> sql_query("SELECT * FROM `tree` WHERE `uid` = '".$uid."' ORDER BY `Key` DESC");


//第一次進入小樹
if($currdb -> sql_num_rows($sql) != 1)
{
	$sql = $currdb -> sql_query("INSERT INTO `tree` 
				(`uid`, `firsttime`, `lasttime`, `lastdate`, `states`, `sun`, `water`, `air`, `fertilizer`, `special`) 
						VALUES ('".$uid."', '".$time."', '".$time."', '".$date."', 1, 1, 1, 1, 0, 0)");
	$sql = $currdb -> sql_query("SELECT * FROM `tree` WHERE `uid` = '".$uid."' ORDER BY `Key` DESC");
}


$tree = $currdb -> sql_fetch_array($sql);

//最後一次登入與最新登入時間差
$day = ($time - $tree[3]) / 86400 ;
$day = intval($day);
if($day >= 1)
{
	//幾天沒登入 扣幾個
	$currdb -> sql_query("UPDATE `tree` SET `sun` -= '".$day."' , `water` -= '".$day."' , `air` -= '".$day."' 
																						WHERE `uid` = '".$uid."'");
}

//2天沒上 物品是0  就退化
if($day>=2 && $tree[7]==0 && $tree[8]==0 && $tree[9]==0 && $tree[6]!=1)
{
	$currdb -> sql_query("UPDATE `tree` SET `states` = `states`-1 WHERE `uid` = '".$uid."'");
}


if($tree[4] - $date != 0)
{
	//當天第一次登入  各給1個
	$currdb -> sql_query("UPDATE `tree` SET `sun` = '".$tree[7]."'+1 , `water` =  '".$tree[8]."'+1 , `air` = '".$tree[9]."'+1
														WHERE `uid` = '".$uid."'");
}
else
{
	//當天再度登入  隨機給1個
	while($tree[5] > 0)
	{
		$rand = rand(1,3);
		switch($rand)
		{
			case 1:
				$currdb -> sql_query("UPDATE `tree` SET `sun` = '".$tree[7]."'+1 WHERE `uid` = '".$uid."'");
				break;
			case 2:
				$currdb -> sql_query("UPDATE `tree` SET `water` = '".$tree[8]."'+1 WHERE `uid` = '".$uid."'");
				break;
			case 3:
				$currdb -> sql_query("UPDATE `tree` SET `air` = '".$tree[9]."'+1 WHERE `uid` = '".$uid."'");
				break;
		}
		$tree[5] -= 1;
	}
}
//領完歸零
$currdb -> sql_query("UPDATE `tree` SET `logintimes` = 0 WHERE `uid` = '".$uid."'");


//紀錄最後一次登入的秒數 and 年月日
$currdb -> sql_query("UPDATE `tree` SET `lasttime` = '".$time."' , `lastdate` =  '".$date."' WHERE `uid` = '".$uid."'");


//進化
$DAYS = intval(($tree[3] - $tree[2]) / 86400) ; 
if($tree[6]==4 && $tree[7]>=10 && $tree[8]>=10 && $tree[9]>=10 && $DAYS >= 8)
{
	$tree[6] += 1;
	$currdb -> sql_query("UPDATE `tree` SET 
			`firsttime` = '".$time."' , `states` = '".$tree[6]."' , `sun` = `sun`-10 , `water` = `water`-10 , `air` = `air`-10
																						WHERE `uid` = '".$uid."'");
}
else if($tree[6]==3 && $tree[7]>=6 && $tree[8]>=7 && $tree[9]>=8 && $DAYS >= 5)
{
	$tree[6] += 1;
	$currdb -> sql_query("UPDATE `tree` SET 
			`firsttime` = '".$time."' , `states` = '".$tree[6]."' , `sun` = `sun`-6 , `water` = `water`-7 , `air` = `air`-8
																						WHERE `uid` = '".$uid."'");
}
else if($tree[6]==2 && $tree[7]>=5 && $tree[8]>=6 && $tree[9]>=6 && $DAYS >= 5)
{
	$tree[6] += 1;
	$currdb -> sql_query("UPDATE `tree` SET 
			`firsttime` = '".$time."' , `states` = '".$tree[6]."' , `sun` = `sun`-5 , `water` = `water`-6 , `air` = `air`-6
																						WHERE `uid` = '".$uid."'");
}
else if($tree[6]==1 && $tree[7]>=4 && $tree[8]>=4 && $tree[9]>=4 && $DAYS >= 4)
{
	$tree[6] += 1;
	$currdb -> sql_query("UPDATE `tree` SET 
			`firsttime` = '".$time."' , `states` = '".$tree[6]."' , `sun` = `sun`-4 , `water` = `water`-4 , `air` = `air`-4
																						WHERE `uid` = '".$uid."'");
}

//換物品
while(1)
{
	$ya = $currdb -> sql_query("SELECT `fertilizer` , `special` FROM `tree` WHERE `uid` = '".$uid."'");
	$po = $currdb -> sql_fetch_array($ya);
	if($po[0] >= 5)
	{
		$currdb -> sql_query("UPDATE `tree` SET `fertilizer` = `fertilizer`-5 , `special` = `special`+1 WHERE `uid` = '".$uid."'");
	}
	else if($po[0] < 5)
	{
		break;
	}
}

//show種類
switch($tree[6])
{
	case 1:
		$msg = "種子";
		break;
	case 2:
		$msg = "豆芽苗";
		break;
	case 3:
		$msg = "小樹苗";
		break;
	case 4:
		$msg = "中樹苗";
		break;
	case 5:
		$msg = "大樹";
		break;
}

//資料已更新 再SELECT一次
$sql = $currdb -> sql_query("SELECT * FROM `tree` WHERE `uid` = '".$uid."' ORDER BY `Key` DESC");
$tree = $currdb -> sql_fetch_array($sql);

$currtpl -> assign('msg', $msg);
$currtpl -> assign('tree', $tree);

$currtpl -> display('index.tpl.htm');
?>