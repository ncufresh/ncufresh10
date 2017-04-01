<?php 		
		require_once('../../core/ac_boot.php');
		if($curruser -> is_login())
		{
			    mysql_query("
				INSERT INTO `club_upload` (`uid`,`club_name`,`club_property`,`phone1`,`bbsID1`,`mail1`,`phone2`,`bbsID2`,`mail2`,`userfile1`,`userfile2`,`introduce`,`website`,`bbs`)
						     VALUES ('".$curruser->uid."','".$_POST["club_name"]."','".$_POST["club_property"]."','".$_POST["phone1"]."','".$_POST["bbsID1"]."','".$_POST["mail1"]."','".$_POST["phone2"]."','".$_POST["bbsID2"]."','".$_POST["mail2"]."','".$_POST["userfile1"]."','".$_POST["userfile2"]."','".$_POST["introduce"]."','".$_POST["website"]."','".$_POST["bbs"]."')");
	            $currdb -> sql_close();
		        header("Location:club.php");
		}				
?>