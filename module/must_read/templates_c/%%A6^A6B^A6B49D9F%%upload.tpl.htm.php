<?php /* Smarty version 2.6.26, created on 2010-08-12 00:10:26
         compiled from zh_tw/upload.tpl.htm */ ?>
<link href="../../css/index.css" rel="stylesheet" type="text/css"/>
<form action="file_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="max_file_size" value="2048000">
標題:<input name="name" type="text"><br />
<input type="file" name="myfile">
<input type="submit" value="送出">
</form>