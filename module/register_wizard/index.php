<?php
require_once('../../core/ac_boot.php');
$block_a = new ac_block(3); // bid到ac_block去看
$currtpl -> assign('events', $block_a -> fetch_block()); // 最後變成字串

$mon_now = date('n');
if($mon_now != 8 and $mon_now != 9) $mon_now = 9;

$mon=(empty($_GET['mon']))?$mon_now:$_GET['mon'];

$currtpl -> assign('month',$mon);
$currtpl -> add_js("page_ajax.js");
$currtpl -> display('index.tpl.htm');
?>
