<?php
if(!AC_INCLUDED)
{
	exit();
}

$main_block_var = array();

global $currdb, $currmodule, $currcounter;

// Step1. Fetch login block
$login_block = new ac_block(1);
$main_block_var['login_block'] = $login_block -> fetch_block();

// Step2. Fetch the amount of online counter
$main_block_var['online_counter']	= $currcounter -> count_online();
$main_block_var['accu_counter']		= $currcounter -> count_accu();

// Step3. Fetch the main menu
$menu_mid	= array(4,8,10,9,3,7,5,12);
$menu_title	= array("大一必讀", "中大生活", "校園導覽", "註冊精靈", "論壇專區", "系所社團", "影音專區", "關於我們");
$menu_url	= array(URL_ROOT_PATH."/module/must_read", URL_ROOT_PATH."/module/life", URL_ROOT_PATH."/module/map", URL_ROOT_PATH."/module/register_wizard", URL_ROOT_PATH."/module/forum", URL_ROOT_PATH."/module/club", URL_ROOT_PATH."/module/film", URL_ROOT_PATH."/module/aboutus");

$main_block_var['menu_a_tag'] = array();
for($i=0; $i<count($menu_title); $i++)
{
	//array_push($main_block_var['menu_a_tag'], "<a title=\"".$menu_title[$i]."\" href=\"".$menu_url[$i]."\"><span id=\"btt".($i+1)."\" class=\"btt\"".(($currmodule -> mid == $menu_mid[$i]) ? " style=\"background-image: url(".URL_ROOT_PATH."/templates/".DEFAULT_LANG."/images/bt".($i+1).".png);\"" : "")."></span></a>");
	array_push($main_block_var['menu_a_tag'], "<a title=\"".$menu_title[$i]."\" href=\"".$menu_url[$i]."\" id=\"btt".($i+1)."\" class=\"btt\"".(($currmodule -> mid == $menu_mid[$i]) ? " style=\"background-image: url(".URL_ROOT_PATH."/templates/".DEFAULT_LANG."/images/bt".($i+1).".png);\"" : "")."></a>");
}

// Step4. Fetch the sub-menu
$sub_menu_title;
$sub_menu_url;
switch($currmodule -> mid)
{
	case $menu_mid[0]:
		if($currmodule -> is_admin())
		{
			$sub_menu_title = array("大一新生區", "大一復學區", "大一相關須知", "文件下載", "新增內容", "上傳文件");
			$sub_menu_url	= array("must.php?num=1", "must.php?num=2", "must.php?num=3", "must.php?num=4", "add.php", "upload.php");
		}
		else
		{
			$sub_menu_title = array("大一新生區", "大一復學區", "大一相關須知", "文件下載");
			$sub_menu_url	= array("must.php?num=1", "must.php?num=2" ,"must.php?num=3", "must.php?num=4");
		}
		$main_block_var['sub_menu_ptop'] = 4;
		break;
	case $menu_mid[1]:
		$sub_menu_title = array("食在中大", "住宿資訊", "交通相關", "便利生活", "身心保健", "運動場所");
		$sub_menu_url	= array("view.php?aid=1", "view.php?aid=5" ,"view.php?aid=11", "view.php?aid=19", "view.php?aid=27", "view.php?aid=31");
		$main_block_var['sub_menu_ptop'] = 44;
		break;
	case $menu_mid[2]:
		$sub_menu_title = array("各系系館", "景點介紹", "建築物介紹", "綜觀圖");
		$sub_menu_url	= array("entertheme_department.php", "entertheme_view.php" ,"entertheme_building.php" ,"entertheme_together.php");
		$main_block_var['sub_menu_ptop'] = 84;
		break;
	case $menu_mid[4]:
		$sub_menu_title = array("新生問題區", "社團討論區", "系所討論區" ,"精華討論區");
		$sub_menu_url	= array("forum_list.php?cid=1&page=1", "forum_list.php?cid=2&page=1" ,"dep_list.php", "forum_list.php?cid=4&page=1");
		$main_block_var['sub_menu_ptop'] = 166;
		break;
	case $menu_mid[5]:
		$sub_menu_title = array("學術性社團", "康樂性社團", "服務性社團", "聯誼性社團", "學生組織與其他", "系學會");
		$sub_menu_url	= array("club_learning.php", "club_play.php" ,"club_service.php", "club_social.php", "club_student&else.php", "studentDepart.php");
		$main_block_var['sub_menu_ptop'] = 204;
		break;
	default:
		$sub_menu_title = array();
		$main_block_var['sub_menu_ptop'] = 0;
}

$main_block_var['sub_menu_a_tag'] = array();
for($i=0; $i<count($sub_menu_title); $i++)
{
	array_push($main_block_var['sub_menu_a_tag'], "<a title=\"".$sub_menu_title[$i]."\" href=\"".$sub_menu_url[$i]."\">".$sub_menu_title[$i]."</a>");
}
?>
