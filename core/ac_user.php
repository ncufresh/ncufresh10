<?php
/**
 * Armored Core - User Class
 * Processing login, logout or authorization about user
 * 
 * Note:
 * If you want to porting ArmoredCore to another database, you must
 * configure the "required data field" to correspond data field in
 * other database's corresponded data field.
 *
 * Method:
 * __construct
 *
 * (bool) login
 * (bool) logout
 *
 * (bool) is_login
 * (bool) is_guest
 * 
 * 
 * -- Note: handler for accessing another user ---
 * -- MUST check perm process before execute   ---
 *
 * (array) getuser_array_by_username
 * (bool) is_user_exist_by_username
 * (array) getuser_array_by_uid
 * (bool) is_user_exist_by_uid
 */
require_once('ac_common.php');

define('ac_sys_name', "ac_user");

class ac_user
{
	var $currdb;
	var $currgroup;
	
	var $uid;
	var $username;
	var $is_guest;
	
	/**
	 * Constructor
	 */
	function __construct()
	{
		global $currcfg;
		
		$this -> currdb		= &$currcfg['DB_SOURCE'];
		$this -> currgroup	= &$currcfg['GROUP_SOURCE'];
		
		$this -> is_guest	= true;
		
		if(isset($_SESSION['username']) && isset($_SESSION['password']))
		{
			$this -> login($_SESSION['username'], $_SESSION['password'], true);
        }
        else
        if(isset($_COOKIE['username']) && $_COOKIE['username'] != "" && isset($_COOKIE['password']) && $_COOKIE['password'] != "")
        {
            $_SESSION['username'] = $_COOKIE['username'];
            $_SESSION['password'] = $_COOKIE['password'];

            $this -> login($_SESSION['username'], $_SESSION['password'], true);
        }
	}
	
	/**
	 * login(String, String): bool
	 * Making requested user login, setting cookies and return login status
	 *
	 * NOTE: (1) Third paramater MUST BE FALSE for user input dialog, or user_db will be cracked easily
	 *       (2) `$is_pass_encoding_processed` can be true only for $_SESSION login
	 *
	 * (String) username: Input username
	 * (String) password: Input password
	 */
	function login($username = null, $password = null, $is_pass_encoding_processed = false)
	{
		if($username != null && $password != null)
		{
			// Check if username & password are valid
			$curr_user_src = $this -> currdb -> sql_query("SELECT * FROM `ac_user` WHERE `username` = '".$username."' AND `password` = '".(!$is_pass_encoding_processed ? ac_user_db_password_en_alg($password) : $password)."'");
			
			if($this -> currdb -> sql_num_rows($curr_user_src) != 0)
			{
				$this -> is_guest = false;
				$curr_user_array = $this -> currdb -> sql_fetch_array($curr_user_src);
				
				$_SESSION['uid']		= $curr_user_array['uid'];
				$_SESSION['username']	= $curr_user_array['username'];
				$_SESSION['password']	= $curr_user_array['password'];	// Record the ENCODED password (such as password after md5 processed)
				
				$this -> uid		= $curr_user_array['uid'];
				$this -> username	= $curr_user_array['username'];
				
				return true;
			}
			else
			{
				$this -> is_guest = true;
				return false;
			}
		}
		else
		{
			$this -> is_guest = true;
			return false;
		}
	}
	
	/**
	 * logout(): bool
	 * Clear current session/login user
	 */
	function logout()
	{
		$_SESSION['uid']		= NULL;
		$_SESSION['username']	= NULL;
		$_SESSION['password']	= NULL;
		
		$this -> is_guest = true;
		
		return true;
	}
	
	
	/**
	 * is_login(): bool
	 * Check if current session is login
	 */
	function is_login()
	{
		return !($this -> is_guest);
	}
	
	
	/**
	 * is_guest(): bool
	 * Check if current session is guest
	 */
	function is_guest()
	{
		return $this -> is_guest;
	}
	
	
	/**
	 * getuser_by_username(String): mixed[] / false
	 * Get user information by `username`
	 * 
	 * (String) username: input username
	 *
	 * Note: return type is an Array
	 */
	function getuser_array_by_username($username)
	{
		$curr_user_src = $this -> currdb -> sql_query("SELECT * FROM `ac_user` WHERE `username` = '".$username."'");
		if($this -> currdb -> sql_num_rows($curr_user_src) != 0)
		{
			$curr_user_array = $this -> currdb -> sql_fetch_array($curr_user_src);
			return $curr_user_array;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * is_user_exist(String): bool
	 * Check if current user is exist
	 *
	 * (String) username: input username
	 */
	function is_user_exist_by_username($username)
	{
		$curr_user_counting = $this -> currdb -> sql_fetch_array($curr_user_src = $this -> currdb -> sql_query("SELECT * FROM `ac_user` WHERE `username` = '".$username."'"));
		if($curr_user_counting['count(*)'] != 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * getuser_by_uid(int): mixed[]
	 * Get user information by `uid`
	 *
	 * (int) uid: input uid
	 *
	 * Note: return type is an Array
	 */
	function getuser_array_by_uid($uid)
	{
		$curr_user_src = $this -> currdb -> sql_query("SELECT * FROM `ac_user` WHERE `uid` = '".intval($uid)."'");
		if($this -> currdb -> sql_num_rows($curr_user_src) != 0)
		{
			$curr_user_array = $this -> currdb -> sql_fetch_array($curr_user_src);
			return $curr_user_array;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * is_user_exist(int): bool
	 * Check if current user is exist
	 *
	 * (int) uid: input uid
	 */
	function is_user_exist_by_uid($uid)
	{
		$curr_user_counting = $this -> currdb -> sql_fetch_array($curr_user_src = $this -> currdb -> sql_query("SELECT count(*) FROM `ac_user` WHERE `uid` = '".intval($uid)."'"));
		if($curr_user_counting['count(*)'] != 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>
