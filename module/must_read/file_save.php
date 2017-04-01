<?php
require_once('../../core/ac_boot.php');

// -- CHECK ADMINISTRATOR'S PERMISSION
if(!$currmodule->is_admin())
	exit();

if(is_uploaded_file($_FILES['myfile']['tmp_name']))
{
	$name = $_POST['name'];
	$upload = "file";
	if(!is_dir($upload) || !is_writable($upload) || empty($name)) die("無法寫入");
	
	$File_Extension = explode(".",$_FILES['myfile']['name']);
	$File_Extension = $File_Extension[count($File_Extension)-1];
	$file = date("YmdHis").".".$File_Extension;
	copy($_FILES['myfile']['tmp_name'], $upload."/".$file);
	if(empty($file))
	{
		echo "上傳錯誤!";	
	}
	else
	{
		// Escape string/variables
		$sql = $currdb -> sql_query("INSERT INTO `must_read` (`num` , `title` , `content`) VALUES(4 , '".$name."' , '".$file."')");
		if($sql)
		{
			// use function redirect()
			redirect("upload.php", 2);
			echo "新增成功";
		}
		else
		{
			// use function redirect()
			redirect("upload.php", 2);
			echo "新增失敗";
		}
	}
}
else
{
	// use function redirect()
	redirect("upload.php");
}
?>