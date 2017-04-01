<?php
require_once('../../core/ac_boot.php');
$block_a = new ac_block(3); // bid到ac_block去看
$currtpl -> assign('events', $block_a -> fetch_block()); // 最後變成字串

$result = $currdb->sql_query("SELECT * FROM `reg_spirit` ORDER BY `date_begin`");
$result_tem = array();
$result_tem2 = array();
$check_date = "0";
$check_date_end = "0";
$front = array();
$later = array();
$fixed_i = 0;

$total = $currdb->sql_num_rows($result);
   
while($data=$currdb->sql_fetch_array($result))
{
   		$data['doc_content'] = nl2br($data['doc_content']);
   		array_push($result_tem, $data);   				
}

for($i=0;$i<$total;$i++)
{
	if($result_tem[$i]['doc_id'] == $_GET['id'])
	{
		$fixed_i = $i;
		$check_date=$result_tem[$i]['date_begin'];
		$check_date_end=$result_tem[$i]['date_ending'];
	}
}
$front = $result_tem[$fixed_i-1];
$later = $result_tem[$fixed_i+1];


$fin_result = $currdb->sql_query("SELECT * FROM `reg_user` WHERE `doc_id` = '".$_GET['id']."' AND `uid` = '".$curruser->uid."'");
   while($data=$currdb->sql_fetch_array($fin_result))
   {
		array_push($result_tem2, $data);
   }

if((date("Ymd")) >= date("Ymd",strtotime($check_date))) $check_date = 1;
else $check_date = 0;

if((date("Ymd")) <= date("Ymd",strtotime($check_date_end))) $check_date_end = 1;
else $check_date_end = 0;


$currtpl -> assign('front',$front);
$currtpl -> assign('later',$later);
$currtpl -> assign('check',$check_date);
$currtpl -> assign('check_end',$check_date_end);
$currtpl -> assign('finish',$result_tem2);
$currtpl -> assign('document',$result_tem);
$currtpl -> assign('did',$_GET['id']);
$currtpl -> add_js("page_ajax.js");
$currtpl -> display('opt_check.tpl.htm');
?>