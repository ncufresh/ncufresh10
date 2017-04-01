<?php
require_once('../../core/ac_boot.php');
require_once('fckeditor/fckeditor.php');

//header('Content-Type: text/html; charset=BIG5'); 

$oFCKeditor = new FCKeditor('Ncontent');
$oFCKeditor->BasePath = 'fckeditor/';

$Key = intval($_GET['Key']);
$num = intval($_GET['num']);

if($Key <= 0 || $num <= 0)
	exit();

$must_1_2D;
//$currtpl -> set_display(false);
$sql = $currdb -> sql_query("SELECT * FROM `must_read` WHERE `Key` = '".$Key."'");
if($sql){
	$must_1_2D = array();
	while($row = $currdb -> sql_fetch_array($sql))
	{
		array_push($must_1_2D, $row);
		$oFCKeditor->Value = $row['content'];
	}
}


$oFCKeditor->Width = '100%';$oFCKeditor->Height = '300';

$editor = $oFCKeditor->Create();


$currtpl -> assign('editor', $editor);
$currtpl -> assign('num', $num);
$currtpl -> assign('Key', $Key);
$currtpl -> assign('must_1_2D', $must_1_2D);

$currtpl -> display('update.tpl.htm');
?>