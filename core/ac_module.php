<?php
/**
 * Armored Core - Module handler
 */
require_once('ac_common.php');

class ac_module
{
	var $currdb;
	var $curruser;
	var $currgroup;
	
	var $mid;
	var $module_name;
	var $is_module_install;
	
	/**
	 * Constructor
	 * Check if each module has been set and installed properly
	 */
	function __construct()
	{
		global $currcfg;
		
		// Step1. Database/User connection
		$this -> currdb		= &$currcfg['DB_SOURCE'];
		$this -> curruser	= &$currcfg['USER_SOURCE'];
		$this -> currgroup	= &$currcfg['GROUP_SOURCE'];
		
		// Step2. Build module info from path of current script
		$module_info = explode("/" ,substr($_SERVER['SCRIPT_FILENAME'], strlen(ROOT_PATH)));
		$this -> module_name = (count($module_info) > 2) ? $module_info[2] : "system";
		
		$module_db_src = $this -> currdb -> sql_query("SELECT * FROM `ac_module` WHERE `module_name` = '".$this -> module_name."'");
		
		if($this -> currdb -> sql_num_rows($module_db_src) != 0)
		{
			$this -> is_module_install = true;
			
			$module_db_arr = $this -> currdb -> sql_fetch_array($module_db_src);
			$this -> mid = $module_db_arr['mid'];
		}
		else
		{
			$this -> is_module_install = false;
			echo "<strong>Armored Core</strong>: ac_module:: __construct(): module <strong><u>". $this -> module_name ."</u></strong> is not installed properly. Please reinstall this module.";
			exit();
		}
	}
	
	
	/**
	 * is_perm(int, String): bool
	 * Permission handler
	 * Common function for `is_valid(int)`, `is_admin(int)` and `is_system(int)`
	 * Return true if `curruser` has permission
	 */
	function is_perm($field, $input_uid = null)
	{
		$result = false;
		
		// Step1. Check for group permission
		$curr_src = $this -> currdb -> sql_query("SELECT `ac_perm`.`".$field."` FROM `ac_perm` RIGHT JOIN `ac_group_list` ON `ac_perm`.`u_g_id` = `ac_group_list`.`gid` WHERE `ac_perm`.`u_g_type` = 'group' AND `ac_perm`.`mid` = '".($field == "is_system" ? 1 : $this -> mid)."' AND `ac_group_list`.`uid` ='".($input_uid == null ? $this -> curruser -> uid : $input_uid)."'");
		while($curr_processing = $this -> currdb -> sql_fetch_array($curr_src))
		{
			$result = (intval($curr_processing[$field]) == 1) ? true : false;
		}
		
		// Step2. Check for user permission. If there are still settings for user, overwrite it.
		$curr_src = $this -> currdb -> sql_query("SELECT `".$field."` FROM `ac_perm` WHERE `u_g_type` = 'user' AND `u_g_id` = '".($input_uid == null ? $this -> curruser -> uid : $input_uid)."' AND `mid` = '".($field == "is_system" ? 1 : $this -> mid)."'");
		while($curr_processing = $this -> currdb -> sql_fetch_array($curr_src))
		{
			$result = (intval($curr_processing[$field]) == 1) ? true : false;
		}
		
		return $result;
	}

	/**
	 * is_system(int): bool
	 * 
	 * Permission handler
	 * Return true if `curruser` is system administrator
	 * Note: `$input_uid` must be int uid
	 */
	function is_system($input_uid = null)
	{
		return $this -> is_perm("is_system", $input_uid);
	}
	
	/**
	 * is_admin(int): bool
	 * 
	 * Permission handler
	 * Return true if `curruser` is administrator of this module
	 * Note: `$input_uid` must be int uid
	 */
	function is_admin($input_uid = null)
	{
		return $this -> is_system() ? true : $this -> is_perm("is_admin", $input_uid);
	}
	
	/**
	 * is_valid(int): bool
	 *
	 * Permission handler
	 * Return true if `curruser` is valid of this module
	 * Note: `$input_uid` must be int uid
	 */
	function is_valid($input_uid = null)
	{
		return $this -> is_system() ? true : $this -> is_perm("is_valid", $input_uid);
	}
}
?>