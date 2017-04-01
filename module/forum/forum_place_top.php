<?php
	require_once('../../core/ac_boot.php');

    if(!isset($_GET['gid']))
    {
        redirect("index.php");
    }
    
    $source = $currdb -> sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid = ac_user.uid WHERE `gid`='".intval($_GET['gid'])."' ");
    $_SESSION['gid']=intval($_GET['gid']);
    $forum_1D = $currdb -> sql_fetch_array($source);
    //系所權限的判定
    $dep_admin = false;
    if($forum_1D['catid']>=11 && $forum_1D['catid']<=31)
    {
        $source_admin = $currdb -> sql_query("SELECT * FROM `forum_admin` WHERE `uid`='".$curruser->uid."' AND `cid`='".$forum_1D['catid']."'");
        if($currdb -> sql_num_rows($source_admin)==1)
        {
            $dep_admin = true;
        }
    }
    //系所權限判定結束

	if($currmodule -> is_admin($curruser->uid) || $dep_admin == true)
	{
		$source = $currdb -> sql_query("SELECT * FROM `forum` WHERE gid='".intval($_GET['gid'])."'");
		$place_top_status = $currdb -> sql_fetch_array($source);
		if( $place_top_status['place_top'] == 1 )
		{
			$currdb -> sql_query("UPDATE `forum` SET `place_top`=0 WHERE `gid`='".$place_top_status['gid']."'");
		}
		else if( $place_top_status['place_top'] == 0 )
		{
			$currdb -> sql_query("UPDATE `forum` SET `place_top`=1 WHERE `gid`='".$place_top_status['gid']."'");
		}
	}
    if(isset($place_top_status['catid']))
    {
	    redirect("forum_list.php?cid=".$place_top_status['catid']."&page=1");
    }
    else
    {
        redirect("index.php");
    }
?>
