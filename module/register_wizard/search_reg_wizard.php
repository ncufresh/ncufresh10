<?php
require_once('../../core/ac_boot.php');
/**
 * 針對模組x所存取的資料表X進行搜尋
 * 參數 $input_str: 欲搜尋的字串
 */
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
        $q_1D['doc_content'] = html_eliminate($q_1D['doc_content']);



        // 重點2：搜尋結果從關鍵字開始只節錄部分文字(約80)
        //        最後接上「...(繼續閱讀)」
        $q_1D['doc_content'] = mb_substr(   $q_1D['doc_content'],
                        mb_strpos($q_1D['doc_content'], $input_str, 0, "UTF-8"),
                        80,
                        "UTF-8") . "...(繼續閱讀)";
        // 重點3：搜尋關鍵字加強提示
        $q_1D['doc_content'] = str_replace( $input_str, "<span class\"warning_msg\">".$input_str."</span>", $q_1D['doc_content']);

        // Step3. 搜尋結果只留「標題」、「部份內文」、「連結」給BG和阿惇
        $result_1D = array();
        $result_1D['r_doc_name']   = $q_1D['doc_name'];
        $result_1D['r_content'] = $q_1D['doc_content'];
        $result_1D['r_url']     = URL_ROOT_PATH.
                                  "/module/regester_wizard/opt_check.php?id=".$q_1D['doc_id'];

        // Step4. 推入最後結果的二維陣列
        array_push($result_2D, $result_1D);
    }

    return $result_2D;
}
$result = search_reg_wizard("宿");

print_r($result);

?>