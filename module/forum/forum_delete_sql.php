<?php
	require_once('../../core/ac_boot.php');
	if($curruser -> is_login())
	{
		$source = $currdb->sql_query("SELECT * FROM `forum` LEFT JOIN `ac_user` ON forum.uid=ac_user.uid WHERE `gid`='".intval($_GET['gid'])."' ");
		$_SESSION['gid']=intval($_GET['gid']);
		$forum_1D = $currdb -> sql_fetch_array($source);

        //�t���v�����P�w
        $dep_admin = false ;
        if($forum_1D['catid']>=11 && $forum_1D['catid']<=31)
        {
            $source_admin = $currdb->sql_query("SELECT * FROM `forum_admin` WHERE `uid`='".$curruser -> uid."' AND `cid`='".$forum_1D['catid']."'");
            if($currdb -> sql_num_rows($source_admin)==1)
            {
                $dep_admin=true;
            }
        }
        //$currtpl->assign('dep_admin',$dep_admin);
        //�t���v���P�w����
		
		if($currmodule->is_admin() || $dep_admin==true)    //�]�ۤv�i�H�ק�ۤv�峹  �ҥH�ק諸�P�_�h�F�@��$curruser->uid == $forum_1D['uid']  ���O�ۤv���峹����R��  �G�����[�J�P�_��
		{
			if(intval($_GET['grid'])==0)	//��ܧR�����O���D  �n�s�Ҧ����^�Ф@�_�R��
			{
				$currdb -> sql_query("DELETE FROM `forum` WHERE `gid`='".intval($_GET['gid'])."'");//�R���Ӱ��D
				$currdb -> sql_query("DELETE FROM `forum` WHERE `grid`='".intval($_GET['gid'])."'");//�R���Ӱ��D���Ҧ��^��
			}
			else	//�R�����O��W���^��
			{
				$currdb -> sql_query("DELETE FROM `forum` WHERE `gid`='".intval($_GET['gid'])."' AND `grid`='".intval($_GET['grid'])."'");//�R���ӳ�@�^��
			}
			redirect("forum_list.php?cid=".intval($_GET['cid'])."&page=1");
		}
		else
		{
			redirect("index.php");
		}
	}
	else
	{
		redirect("../../login.php?redirect_path=".URL_ROOT_PATH."/module/forum");
	}
?>
