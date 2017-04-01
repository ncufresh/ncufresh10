<?php
	require_once('../../core/ac_boot.php');
	$currtpl -> add_js("film.js");
	$currtpl -> add_css("film_style.css");
	
	$source_image= $currdb -> sql_query("SELECT `img_src` FROM `film`");
	$img_src_2D = array();
	$film_index=1;
	while($img_src_1D = $currdb -> sql_fetch_array($source_image))
	{
		$img_src_1D['film_index'] = $film_index;
		array_push($img_src_2D,$img_src_1D);
		$film_index++;
	}
	$currtpl->assign('img_src_2D',$img_src_2D);
	
	$film_amount=7;
	if(!isset($_GET['film'])||$_GET['film']>$film_amount||$_GET['film']<1)
	{
		$_GET['film']=1;
	}
	if(intval($_GET['film'])<=$film_amount && intval($_GET['film'])>=1 && $curruser -> is_login())//有登入才做
	{
		$source_browse = $currdb -> sql_query("SELECT * FROM `film_browse` WHERE `uid`='".$curruser -> uid."' AND `fid`='".intval($_GET['film'])."'");
		if($currdb -> sql_num_rows($source_browse) == 0 )	//如果這一篇完全沒有點閱過
		{
			$currdb -> sql_query("INSERT INTO `film_browse` (`fid`,`uid`,`last_browse`) VALUES ('".intval($_GET['film'])."','".$curruser -> uid."','".time()."')");
		}
		else		//如果這一篇已經點閱過(film_browse資料表中有這筆資料)  就更新最後閱讀的時間
		{
			//$currdb -> sql_query("UPDATE `film_browse`,`film` SET `film_browse`.`last_browse`='".time()."', `film`.`browse`=`film`.`browse`+1 WHERE `film_browse`.`uid`='".$curruser -> uid."' AND `film_browse`.`fid`='".intval($_GET['film'])."' AND `film_browse`.`last_browse` > ".(time()-10)." ");
			$currdb -> sql_query("UPDATE `film_browse`,`film` SET `film_browse`.`last_browse`='".time()."',`film`.`browse`=`film`.`browse`+1 WHERE `film_browse`.`uid`='".$curruser -> uid."' AND `film_browse`.`fid`='".intval($_GET['film'])."' AND `film`.`fid`='".intval($_GET['film'])."' AND `film_browse`.`last_browse` < ".(time()-300)."");	//五分鐘內點了沒有效果
		}
	}
	$source = $currdb -> sql_query("SELECT * FROM `film` WHERE `fid`=".intval($_GET['film']));
	$film_1D = $currdb -> sql_fetch_array($source) ;
	$film_src = $film_1D['youtube'];
	$film_title = $film_1D['film_title'];
	$desc = $film_1D['desc'];
	
	$currtpl->assign('film_src',$film_src);
	$currtpl->assign('film_title',$film_title);
	$currtpl->assign('desc',$desc);
	$currtpl->display('index.tpl.htm');
?>