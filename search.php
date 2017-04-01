<?php
require_once('core/ac_boot.php');

//搜尋地圖函式開始
function search_map($input_str)
{
    global $currdb;
    $result_2D = array();       // 最後搜尋結果

    // Step1. 針對資料表進行搜尋，最新的資料最先出現
    $map_src = $currdb -> sql_query("SELECT * FROM `map_contentlist` WHERE `title` LIKE '%".$input_str."%' OR `content` LIKE '%".$input_str."%'");

    // Step2. 把每一筆從資料庫拉出來的資料都包裝成陣列
    while($map_1D = $currdb -> sql_fetch_array($map_src))
    {
		
        // 重點1：當SQL的內文包含HTML的話
                  //就把HTML tag全部拿掉 (只留內文)
		$map_1D['title'] = trim($map_1D['title']);
        $map_1D['title'] = html_eliminate($map_1D['title']);
		$map_1D['content'] = trim($map_1D['content']);
        $map_1D['content'] = html_eliminate($map_1D['content']);



        // 重點2：搜尋結果從關鍵字開始只節錄部分文字(約80)
        //        最後接上「...(繼續閱讀)」
        $map_1D['content'] = "...".mb_substr(   $map_1D['content'],mb_strpos($map_1D['content'], $input_str, 0, "UTF-8"),80,"UTF-8") . "...(繼續閱讀)";

        // 重點3：搜尋關鍵字加強提示
        $map_1D['content'] = str_replace( $input_str,"<span class=\"warning_msg\">".$input_str."</span>",$map_1D['content']);

        // Step3. 搜尋結果只留「標題」、「部份內文」、「連結」給BG和阿惇
        $result_1D = array();
        $result_1D['r_title']   = $map_1D['title'];
        $result_1D['r_content'] = $map_1D['content'];
		
		$ary=array('', 'p07', 'p03', 'm0', 'j0', 'c0', 'd0', 'h0', 'b0', 'a0', 'p04', '', '', '', '', 'p06', '', '', '', 'p08', 'f0', 'd01', 'b01', 'a01', 'f01', 'l01', 'k01', 'c01', 'g01', 'n01', 'e01', 'i01', 'pine2', 'p05', 'pq01', 'k0', 'c0', 'i0', '', 'j01', 'm01', '', '', '', 'p09');
		switch($map_1D['category'])
		{
			case 'building': 
				$result_1D['r_url']     = URL_ROOT_PATH."/module/map/building_nojs_loadcontent.php?key=".$map_1D['key']."&samname=".$ary[$map_1D['key']];
				break;
			case 'department':
				$result_1D['r_url']     = URL_ROOT_PATH."/module/map/department_nojs_loadcontent.php?key=".$map_1D['key']."&samname=".$ary[$map_1D['key']];
				break;
			case 'view':
				$result_1D['r_url']     = URL_ROOT_PATH."/module/map/view_nojs_loadcontent.php?key=".$map_1D['key']."&samname=".$ary[$map_1D['key']];
				break;
		}
		
        

        // Step4. 推入最後結果的二維陣列
        array_push($result_2D, $result_1D);
    }

    return $result_2D;
}
//搜尋地圖函式結束

//搜尋註冊精靈函式開始
function search_reg_wizard($input_str)
{
    global $currdb;
    $result_2D = array();       // 最後搜尋結果

    // Step1. 針對資料表進行搜尋，最新的資料最先出現
    $q_src = $currdb -> sql_query("SELECT * FROM `reg_spirit` WHERE `doc_name` LIKE '%".$input_str."%' OR `doc_content` LIKE '%".$input_str."%'");

    // Step2. 把每一筆從資料庫拉出來的資料都包裝成陣列
    while($q_1D = $currdb -> sql_fetch_array($q_src))
    {
		
        // 重點1：當SQL的內文包含HTML的話
        //       就把HTML tag全部拿掉 (只留內文)
		$q_1D['doc_name'] = trim($q_1D['doc_name']);
		$q_1D['doc_name'] = html_eliminate($q_1D['doc_name']);
		$q_1D['doc_content'] = trim($q_1D['doc_content']);
        $q_1D['doc_content'] = html_eliminate($q_1D['doc_content']);



        // 重點2：搜尋結果從關鍵字開始只節錄部分文字(約80)
        //        最後接上「...(繼續閱讀)」
        $q_1D['doc_content'] = "...".mb_substr(   $q_1D['doc_content'],mb_strpos($q_1D['doc_content'], $input_str, 0, "UTF-8"),80,"UTF-8") . "...(繼續閱讀)";
        // 重點3：搜尋關鍵字加強提示
        $q_1D['doc_content'] = str_replace( $input_str, "<span class=\"warning_msg\">".$input_str."</span>", $q_1D['doc_content']);

        // Step3. 搜尋結果只留「標題」、「部份內文」、「連結」給BG和阿惇
        $result_1D = array();
        $result_1D['r_title']   = $q_1D['doc_name'];
        $result_1D['r_content'] = $q_1D['doc_content'];
        $result_1D['r_url']     = URL_ROOT_PATH."/module/register_wizard/opt_check.php?id=".$q_1D['doc_id'];

        // Step4. 推入最後結果的二維陣列
        array_push($result_2D, $result_1D);
    }

    return $result_2D;
}
//搜尋註冊精靈函式結束

//搜尋論壇函式開始
function search_forum($input_str)
{
    global $currdb;
    $result_2D = array();       // 最後搜尋結果

    // Step1. 針對資料表進行搜尋，最新的資料最先出現
    $forum_src = $currdb -> sql_query("SELECT * FROM `forum` WHERE `title` LIKE '%".$input_str."%' OR `content` LIKE '%".$input_str."%' ORDER BY `datatime` DESC");

    // Step2. 把每一筆從資料庫拉出來的資料都包裝成陣列
    while($forum_1D = $currdb -> sql_fetch_array($forum_src))
    {
        // 重點1：當SQL的內文包含HTML的話
                  //就把HTML tag全部拿掉 (只留內文)
		$forum_1D['title'] = trim($forum_1D['title']);
		$forum_1D['title'] = html_eliminate($forum_1D['title']);	
		$forum_1D['content'] = trim($forum_1D['content']);
        $forum_1D['content'] = html_eliminate($forum_1D['content']);



        // 重點2：搜尋結果從關鍵字開始只節錄部分文字(約80)
        //        最後接上「...(繼續閱讀)」
        $forum_1D['content'] = mb_substr(   $forum_1D['content'],mb_strpos($forum_1D['content'], $input_str, 0, "UTF-8"),80,"UTF-8") . "...(繼續閱讀)";

        // 重點3：搜尋關鍵字加強提示
        $forum_1D['content'] = str_replace( $input_str,"<span class=\"warning_msg\">".$input_str."</span>",$forum_1D['content']);

        // Step3. 搜尋結果只留「標題」、「部份內文」、「連結」給BG和阿惇
        $result_1D = array();
        $result_1D['r_title']   = $forum_1D['title'];
        $result_1D['r_content'] = $forum_1D['content'];
		if($forum_1D['grid']==0)
		{
			$gid=$forum_1D['gid'];
		}
		else
		{
			$gid=$forum_1D['grid'];
		}
        $result_1D['r_url']     = URL_ROOT_PATH."/module/forum/forum_problem.php?gid=".$gid."&amp;cid=".$forum_1D['catid']."&amp;page=1";

        // Step4. 推入最後結果的二維陣列
        array_push($result_2D, $result_1D);
    }

    return $result_2D;
}
//搜尋論壇函式結束

//搜尋系所社團函式開始
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
		$q_1D['club_name'] = trim($q_1D['club_name']);
        $q_1D['club_name'] = html_eliminate($q_1D['club_name']);
		$q_1D['intro'] = trim($q_1D['intro']);
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
                            "<span class=\"warning_msg\">".$input_str."</span>",
                            $q_1D['club_name']);
        $q_1D['intro'] = str_replace( $input_str,
                            "<span class=\"warning_msg\">".$input_str."</span>",
                            $q_1D['intro']);                                                                        
                                                                                
                                                                                
        // Step3. 搜尋結果只留「標題」、「部份內文」、「連結」給BG和阿惇
        $result_1D = array();
        //$result_1D['r_title']   = $q_1D['title'];
		$result_1D['r_title'] = $q_1D['club_name'];
        $result_1D['r_content'] = $q_1D['intro'];
        $result_1D['r_url']     = URL_ROOT_PATH."/module/club/list.php?number=".$q_1D['key'];

		
       // print_r($result_1D);                                                                         
        // Step4. 推入最後結果的二維陣列
        array_push($result_2D, $result_1D);
    }    
    return $result_2D;
} 
//搜尋系所社團函式結束

//搜尋中大生活函式開始
function search_life($input_str)
{
    global $currdb;
    $result_2D = array();       // 最後搜尋結果

    // Step1. 針對資料表進行搜尋，最新的資料最先出現
    $q_src = $currdb -> sql_query("SELECT * FROM `life_life` WHERE `data` LIKE '%".$input_str."%' ");

    // Step2. 把每一筆從資料庫拉出來的資料都包裝成陣列
    while($q_1D = $currdb -> sql_fetch_array($q_src))
    {
        // 重點1：當SQL的內文包含HTML的話
                 // 就把HTML tag全部拿掉 (只留內文)
		$q_1D['data'] = trim($q_1D['data']);
        $q_1D['content'] = html_eliminate($q_1D['data']);

        // 重點2：搜尋結果從關鍵字開始只節錄部分文字(約80)
        //        最後接上「...(繼續閱讀)」
        $q_1D['content'] = mb_substr(   $q_1D['content'], mb_strpos($q_1D['content'], $input_str, 0, "UTF-8"),80,"UTF-8") . "...(繼續閱讀)";

        // 重點3：搜尋關鍵字加強提示
        $q_1D['content'] = str_replace( $input_str, "<span class=\"warning_msg\">".$input_str."</span>", $q_1D['content']);

        // Step3. 搜尋結果只留「標題」、「部份內文」、「連結」給BG和阿惇
        $result_1D = array();
        $result_1D['r_title']   = $q_1D['title'];
        $result_1D['r_content'] = $q_1D['content'];
        $result_1D['r_url']     = URL_ROOT_PATH."/module/life/view.php?aid=".$q_1D['aid'];

        // Step4. 推入最後結果的二維陣列
        array_push($result_2D, $result_1D);
    }
    return $result_2D;

}
//搜尋中大生活函式結束

//搜尋大一必讀函式開始
function search_must_read($input_str)
{
    global $currdb;
    $result_2D = array();       // 最後搜尋結果
                                                                                
    // Step1. 針對資料表進行搜尋，最新的資料最先出現
    $q_src = $currdb -> sql_query("SELECT * FROM `must_read` WHERE `content` LIKE '%".$input_str."%' ORDER BY `Key` DESC");
                                                                                
    // Step2. 把每一筆從資料庫拉出來的資料都包裝成陣列
    while($q_1D = $currdb -> sql_fetch_array($q_src))
    {
        // 重點1：當SQL的內文包含HTML的話   就把HTML tag全部拿掉 (只留內文)
		$q_1D['content'] = trim($q_1D['content']);
        $q_1D['content'] = html_eliminate($q_1D['content']);
                                                                                

        // 重點2：搜尋結果從關鍵字開始只節錄部分文字(約80)
        //        最後接上「...(繼續閱讀)」
        $q_1D['content'] = mb_substr(   $q_1D['content'], mb_strpos($q_1D['content'], $input_str, 0, "UTF-8"), 80, "UTF-8") . "...(繼續閱讀)";
                                                                                
        // 重點3：搜尋關鍵字加強提示
        $q_1D['content'] = str_replace( $input_str, "<span class=\"warning_msg\">".$input_str."</span>", $q_1D['content']);
                                                                                
        // Step3. 搜尋結果只留「標題」、「部份內文」、「連結」給BG和阿惇
        $result_1D = array();
        $result_1D['r_title']   = $q_1D['title'];
        $result_1D['r_content'] = $q_1D['content'];
        $result_1D['r_url']     = URL_ROOT_PATH."/module/must_read/container.php?Key=".$q_1D['Key']."&num=".$q_1D['num'];
                                                                                
        // Step4. 推入最後結果的二維陣列
        array_push($result_2D, $result_1D);
    }
                                                                                
    return $result_2D;
}
//搜尋大一必讀函式開始


//開始搜尋
if(trim($_POST['search'])!="")
{
	$input_str = html_eliminate($_POST['search']) ;
	//順序是 大一必讀 中大生活 校園導覽 註冊精靈 論壇 系所社團
	$result = array(search_must_read($input_str), search_life($input_str), search_map($input_str), search_reg_wizard($input_str), search_forum($input_str), search_club($input_str));
	$final_result = array();
	
	for($i=0; $i<count($result); $i++)
	{
		$final_result = array_merge($final_result, $result[$i]);
	}
}
//echo $_POST['search'];
$currtpl -> assign('final_result',$final_result);
$currtpl -> display('search.tpl.htm');
/*$i=0;
while($i<10)
{
	echo $final_result[$i]['r_title'];
	$i++;
}*/
/*echo "<pre>";
print_r($final_result);
echo "</pre>";*/

?>