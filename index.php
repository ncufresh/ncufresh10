<?php
require_once('core/ac_boot.php');

// Step1. Right Contents
$anno_block = new ac_block(2);
$currtpl -> assign('anno_block', $anno_block -> fetch_block());

$forum_block = new ac_block(4);
$forum_block -> add_css("forum_style.css");
$currtpl -> assign('forum_block', $forum_block -> fetch_block());

// Step3. Output
$currtpl -> display('index.tpl.htm');
?>