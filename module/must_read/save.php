<?php
require_once('../../core/ac_boot.php');

// -- CHECK ADMINISTRATOR'S PERMISSION
if(!$currmodule->is_admin())
	exit();


// -- use intval
$num = intval($_POST['select']);
$title = $_POST['title'];
$content = $_POST['content'];

// -- if $num <= 0, knocked out
if($num <= 0)
	exit();

$desc;
switch($num)
{
case 1:
	$desc = "大一新生區";
	break;
case 2:
	$desc = "大一復學區";
	break;
case 3:
	$desc = "大一相關須知";
	break;
}
if(/*intval($select)*/$num > 0){
	if($title != NULL && $content != NULL){
		
		// -- Escape variables/string
		$sql = $currdb -> sql_query("INSERT INTO `must_read` (`num` , `title` , `content`, `desc`) 
															VALUES ('".$num."' , '".$title."' , '".$content."' , '".$desc."')");
		if($sql)
		{
			// -- using redirect
			redirect("add.php" , 1);
			echo "新增成功";
		}
		else
		{
			// -- using redirect
			redirect("add.php" , 1);
			echo "新增失敗";
		}
	}
	else{
		// -- using redirect
		redirect("add.php" , 1);
		echo "資料不可為空";
	}
}
else{
	// -- using redirect
	redirect("add.php" , 1);
	echo "尚未填選類別";
}
?>
