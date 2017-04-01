<?php
require_once('../../core/ac_boot.php');
if($_POST['date_ending'] == NULL)
{
	$_POST['date_ending'] = "2020-12-31";
}

	$currdb->sql_query("SET NAMES 'utf-8'");
	$word_ano = nl2br($_POST['word']);
	$currdb->sql_query("INSERT INTO `reg_spirit` (doc_name,doc_content,date_begin,date_ending) VALUES('".$_POST['name']."', '".$_POST['content']."', '".$_POST['date_begin']."', '".$_POST['date_ending']."')");
	redirect("index.php");

?>