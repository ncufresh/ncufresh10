<?php
require_once('../../core/ac_boot.php');

$Ncontent = $_POST['Ncontent'];
$Ntitle = $_POST['Ntitle'];
$Key = intval($_GET['Key']);
$num = intval($_GET['num']);

if($Key <= 0 || $num <= 0)
	exit();

if($Ncontent != NULL && $Ntitle != NULL)
{
	$sql = $currdb -> sql_query("UPDATE `must_read` SET `content` = '".$Ncontent."', `title` = '".$Ntitle."' 
																					WHERE `Key` = '".$Key."'");
	if($sql)
	{
		redirect("container.php?Key=".$Key."&num=".$num , 2);
		echo "修改成功";
	}
	else
	{
		redirect("container.php?Key=".$Key."&num=".$num , 2);
		echo "修改失敗";
	}
}
else
{
	redirect("container.php?Key=".$Key."&num=".$num , 2);
	echo "資料不可為空";
}
?>