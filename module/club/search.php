<?php
/**
 * 針對模組x所存取的資料表X進行搜尋
 * 參數 $input_str: 欲搜尋的字串
 */
require_once('../../core/ac_boot.php');
function search_club($input_str)
{
    global $currdb;
    $result_2D = array();       // 最後搜尋結果
                                                                                
    // Step1. 針對資料表進行搜尋，最新的資料最先出現
    $q_src = $currdb -> sql_query("SELECT * FROM `club` WHERE (`club_name` LIKE '%".$input_str."%' OR `intro` LIKE '%".$input_str."%') ORDER BY `key` DESC");
	
	
    // Step2. 把每一筆從資料庫拉出來的資料都包裝成陣列
    while($q_1D = $currdb -> sql_fetch_array($q_src))
    {
        // 重點1：當SQL的內文包含HTML的話
                 // 就把HTML tag全部拿掉 (只留內文)
        $q_1D['club_name'] = html_eliminate($q_1D['club_name']);
		$q_1D['intro'] = html_eliminate($q_1D['intro']);
                                                                           
                                                                                
        // 重點2：搜尋結果從關鍵字開始只節錄部分文字(約80)
        //        最後接上「...(繼續閱讀)」
        $q_1D['club_name'] = mb_substr(   $q_1D['club_name'],
                        mb_strpos($q_1D['club_name'], $input_str, 0, "UTF-8"),
                        80,
                        "UTF-8") . "...(繼續閱讀)";
		
		$q_1D['intro'] = mb_substr(   $q_1D['intro'],
                        mb_strpos($q_1D['intro'], $input_str, 0, "UTF-8"),
                        80,
                        "UTF-8") . "...(繼續閱讀)";
                                                                                
        // 重點3：搜尋關鍵字加強提示
        $q_1D['club_name'] = str_replace( $input_str,
                            "<span class\"warning_msg\">".$input_str."</span>",
                            $q_1D['club_name']);
        $q_1D['intro'] = str_replace( $input_str,
                            "<span class\"warning_msg\">".$input_str."</span>",
                            $q_1D['intro']);                                                                        
                                                                                
                                                                                
        // Step3. 搜尋結果只留「標題」、「部份內文」、「連結」給BG和阿惇
        $result_1D = array();
        //$result_1D['r_title']   = $q_1D['title'];
		$result_1D['club_name'] = $q_1D['club_name'];
        $result_1D['r_intro'] = $q_1D['intro'];
        $result_1D['r_url']     = URL_ROOT_PATH."/module/club/list.php?number=".$q_1D['key'];

		
       // print_r($result_1D);                                                                         
        // Step4. 推入最後結果的二維陣列
        array_push($result_2D, $result_1D);
    }    
	print_r($result_2D);
    return $result_2D;
} 

echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />";
search_club("動畫社");
?>