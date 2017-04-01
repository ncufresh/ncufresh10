<?php
require_once('../../core/ac_boot.php');
// step.1-1 check login
if($curruser->is_login())
{
	$persource=$currdb->sql_query("SELECT * FROM `ac_user` WHERE `uid` = '".$curruser->uid."'");
    $perdata_arr = $currdb->sql_fetch_array($persource);
    $head_source = $currdb->sql_query("SELECT * from `user_head` order by `hid` DESC");
    $head_2D =array();
    while($head_processing_array = $currdb->sql_fetch_array($head_source)) 
    {
	     array_push($head_2D, $head_processing_array);
    }
    function generate_select_box($input = null)
	{
				$display = array("請 選 擇","中國文學系","英美語文學系","法國語文學系","物理學系","數學系","化學學系","生命科學系","光電科學與工程學系","理學院學士班","化學工程與材料工程學系","土木工程學系","機械工程學系","企業管理學系","資訊管理學系","財務金融學系","經濟學系","電機工程學系","資訊工程學系","通訊工程學系","地球科學學系","大氣科學學系","其他");
				$value = array("請 選 擇","中文系","英文系","法文系","物理系","數學系","化學系","生科系","光電系","理學院學士班","化材系","土木系","機械系","企管系","資管系","財金系","經濟系","電機系","資工系","通訊系","地科系","大氣系","其他");
				
				$result = "<select name=\"department\">\n";
				for($i=0; $i<count($display); $i++)
				{
					$result .= "<option value=\"".$value[$i]."\" ".($input == $value[$i] ? "selected=\"selected\"" : "").">".$display[$i]."</option>\n";
				}
				$result .= "</select>\n";
				return $result;
	}

	
function generate_select_head($input = null,$head_2D)
{
	$result = "<select name=\"head\" onChange=\"renew(this.options[this.selectedIndex].value);\">\n";
	for($i=0; $i<count($head_2D); $i++)
	{
		$result .= "<option value=\"".$head_2D[$i]['position']."\" ".($input == $head_2D[$i]['position'] ? "selected=\"selected\"" : "").">".$head_2D[$i]['headname']."</option>\n";
	}
	$result .= "</select>\n";
	return $result;
}

  $currtpl ->assign('head_box',generate_select_head($perdata_arr['head_image'],$head_2D));  
  $currtpl ->assign('box',generate_select_box($perdata_arr['department']));    
  $all_right= true; 
  $currtpl -> add_css('jquery-ui-1.8.2.custom.css');
  $currtpl -> add_js('ui/jquery.ui.core.js',true);
  $currtpl -> add_js('ui/jquery.ui.datepicker.js',true);
  $currtpl -> assign('all_right',$all_right);
  $currtpl -> assign('head',$head_2D);
  $currtpl -> assign('perdata',$perdata_arr);
  $currtpl -> display('update.tpl.htm');	
}
// step.1-2 GO OUT
else
{
   exit();	
}
