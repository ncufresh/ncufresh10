<?php

   if(!defined('AC_INCLUDED'))      // 檢查有沒有引入就好
   {                                // 不需require_once(...);
        exit();                     // 沒有引入AC就關閉
   }
   
   global $currdb;
   global $curruser;
   global $currcfg;
   $block_var=array();
   $result_tem=array();
   $result_tem2 = array();
   $dan_arr = array();
   $date_beg = array();
   $date_end = array();
   $i = 0;

   //從資料庫抓標題下來
   $doc_result= $currdb->sql_query("SELECT * FROM `reg_spirit` ORDER BY `date_begin` ASC");
     
   while($data=$currdb->sql_fetch_array($doc_result))
   {
			array_push($result_tem, $data);
   }

   //結合reguser以及regspirit並抓出現在這使用者是否已經完成
   $fin_result = $currdb->sql_query("SELECT `reg_spirit`. *, `reg_user`. *  FROM `reg_spirit` LEFT JOIN `reg_user` ON `reg_spirit` .`doc_id` = `reg_user` .`doc_id` AND `uid` = '".$curruser->uid."' ORDER BY `date_begin` ASC");
   while($data=$currdb->sql_fetch_array($fin_result))
   {
		if($data['is_finished'] == 0)
		{
			if((date("Ymd"))>date("Ymd",strtotime($data['date_ending'])))//接近底線的四天還沒完成就會變成危險
			{
				$dan_arr[$i] = 3;
			}
			elseif((date("Ymd")+4)>date("Ymd",strtotime($data['date_ending'])))
			{
				$dan_arr[$i] = 1;
			}
			else
			{
				$dan_arr[$i] = 2;
			}
		}
		else
		{
			$dan_arr[$i] = 0;
		}
			$date_beg[$i] = date("n/j",strtotime($data['date_begin']));
			$date_end[$i] = date("n/j",strtotime($data['date_ending']));
			if($date_end[$i] == "12/31")   $date_end[$i] = NULL;

			array_push($result_tem2, $data);
   		$i = $i + 1;
   }
   
   $QQQQQ = date('n 月 j 日');
   
   //$block_a -> add_js("'".$currcfg.URL_ROOT_PATH."'/module/register_spirit/page_ajax.js");
   
   
   $block_var['today'] = $QQQQQ;
   $block_var['beg'] = $date_beg;   
   $block_var['end'] = $date_end;   
   $block_var['dan'] = $dan_arr;
   $block_var['info'] = $result_tem;
   $block_var['fin'] = $result_tem2;
  

?>
