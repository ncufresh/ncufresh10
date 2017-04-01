<?php
require_once('../../core/ac_boot.php');

$source = $currdb -> sql_query("SELECT * FROM `club`
					            WHERE `key`='".$_GET['number']."'");


$result = $currdb -> sql_fetch_array($source);
$result['intro']= nl2br($result['intro']);
if (file_exists($result['img_1'])) 
{
    if (file_exists($result['img_2'])) 
    {
	   ;
    }
    else 
   {
       $result['img_2']='templates/zh_tw/images/nophoto.jpg';
   }
}
 else 
{
    $result['img_1']='templates/zh_tw/images/nophoto.jpg';
	$result['img_2']='templates/zh_tw/images/nophoto.jpg';
}								
/* echo $result['category_id']; */

	
			   switch ($result['category_id'])
				{
					case 1:
					    $type_top="top_1";
						$type_title="title_1";
						//$type_content="content_1";
						$type_footer="footer_1";
						$link = "club_learning.php";
						$currtpl -> assign('top_css', $type_top);
						$currtpl -> assign('title_css', $type_title);
						$currtpl -> assign('footer_css', $type_footer);
						$currtpl -> assign('link', $link);
						break;
					case 2:
						$type_top="top_2";
						$type_title="title_2";
						//$type_content="content_2";
						$type_footer="footer_2";
						$link = "club_play.php";
						$currtpl -> assign('top_css', $type_top);
						$currtpl -> assign('title_css', $type_title);
						$currtpl -> assign('footer_css', $type_footer);
						$currtpl -> assign('link', $link);
						break;
					case 3:
						$type_top="top_3";
						$type_title="title_3";
						//$type_content="content_3";
						$type_footer="footer_3";
						$link = "club_service.php";
						$currtpl -> assign('top_css', $type_top);
						$currtpl -> assign('title_css', $type_title);
						$currtpl -> assign('footer_css', $type_footer);
						$currtpl -> assign('link', $link);
						break;
					case 4:
						$type_top="top_4";
						$type_title="title_4";
						//$type_content="content_4";
						$type_footer="footer_4";
						$link = "club_social.php";
						$currtpl -> assign('top_css', $type_top);
						$currtpl -> assign('title_css', $type_title);
						$currtpl -> assign('footer_css', $type_footer);
						$currtpl -> assign('link', $link);
						break;
					case 5:
						$type_top="top_5";
						$type_title="title_5";
						//$type_content="content_5";
						$type_footer="footer_5";
						$link = "club_student&else.php";
						$currtpl -> assign('top_css', $type_top);
						$currtpl -> assign('title_css', $type_title);
						$currtpl -> assign('footer_css', $type_footer); 
						$currtpl -> assign('link', $link);
						break;
					case 6:
						$type_top="top_6";
						$type_title="title_6";
						//$type_content="content_6";
						$type_footer="footer_6";
						$link = "studentDepart.php";
						$currtpl -> assign('top_css', $type_top);
						$currtpl -> assign('title_css', $type_title);
						$currtpl -> assign('footer_css', $type_footer);
						$currtpl -> assign('link', $link);
						break;
					default:
						echo "ERROR!!";
				}


$currtpl -> assign('result', $result);
$currtpl -> display('list.tpl.htm');
?>