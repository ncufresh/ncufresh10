<?php
require_once('fckeditor/fckeditor.php');
require_once('../../core/ac_boot.php');

if($currmodule -> is_admin())
{
	$oFCKeditor = new FCKeditor('content');
	$oFCKeditor->BasePath = 'fckeditor/';
	$oFCKeditor->Value = "write something";

	$oFCKeditor->Width = '100%';$oFCKeditor->Height = '275';

	$editor = $oFCKeditor->Create();

	$currtpl -> assign('editor', $editor);
	
	$currtpl -> display('add.tpl.htm');
}
?>