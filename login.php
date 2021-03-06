<?php
require_once('core/ac_boot.php');

/**
 * @param: $_GET['redirect_path]
 * @param: $_POST['redirect_path']
 *
 * Please filled in absolute path INSTEAD OF relative path
 * After login success, `login.php` will redirect to the url you need
 */

if(isset($_GET['action']) && $_GET['action'] == "login")
{
	$currtpl -> set_display(false);
	$result = $curruser -> login($_POST['username'], $_POST['password']);
	
	$redirect_path = "";
	if(isset($_POST['redirect_path']) && $_POST['redirect_path'] != null)
	{
		$redirect_path = $_POST['redirect_path'];
	}
	//------------------------------------------
    $currdb -> sql_query("UPDATE `tree` SET `logintimes` = `logintimes`+1 WHERE `uid` = '".$curruser -> uid."'");
    setcookie("username", $_POST['username'], time()+2592000);
    setcookie("password", md5($_POST['password']), time()+2592000);
	//------------------------------------------
	redirect($result ? ($redirect_path == "" ? URL_ROOT_PATH : $redirect_path) : ( $redirect_path == "" ? URL_ROOT_PATH."/login.php?action=login_failed" : URL_ROOT_PATH."/login.php?action=login_failed&redirect_path=".urlencode($redirect_path) ));
}
else
if(isset($_GET['action']) && $_GET['action'] == "logout")
{
	$currtpl -> set_display(false);
    $curruser -> logout();
    setcookie("username", "");
    setcookie("password", "");
	
	$redirect_path = "";
	if(isset($_POST['redirect_path']) && $_POST['redirect_path'] != null)
	{
		$redirect_path = $_POST['redirect_path'];
	}
	
	redirect($redirect_path == "" ? URL_ROOT_PATH : $redirect_path);
}
else
{
	if($curruser -> is_guest)
	{
		if(isset($_GET['action']) && $_GET['action'] == "login_failed")
		{
			$currtpl -> assign('warning_msg', true);
		}
		
		if(isset($_GET['redirect_path']) && $_GET['redirect_path'] != null)
		{
			$currtpl -> assign('redirect_path', $_GET['redirect_path']);
		}
		
		$currtpl -> display('login.tpl.htm');
	}
	else
	{
		redirect(URL_ROOT_PATH);
	}
}
?>
