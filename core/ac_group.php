<?php
/**
 * Armored Core - Group Class
 * Process group category
 * 
 * Method:
 * __constructor
 *
 * (bool) is_curruser_in_group_by_gid
 * (bool) is_curruser_in_group_by_group_name
 * (array) get_group_of_curruser
 * 
 * -- Note: handler for accessing another group / user ---
 * -- MUST check perm process before execute   ---
 * 
 * (array) get_user_of_group_by_group_name
 * (array) get_user_of_group_by_gid
 * 
 * (array) getgroup_array_by_group_name
 * (bool) is_group_exist_by_group_name
 * (array) getgroup_array_by_gid
 * (bool) is_group_exist_by_gid
 */
require_once('ac_common.php');

class ac_group
{
	var $curruser;
	var $currdb;
	
	var $curr_g_arr;
	
	/**
	 * Constructor
	 */
	function __construct()
	{
		global $currcfg;
		
		// Step1. Reference initial
		$this -> currdb		= &$currcfg['DB_SOURCE'];
		$this -> curruser	= &$currcfg['USER_SOURCE'];
		
		// Step2. Select all group for corresponded `curruser`
		$this -> curr_g_arr = array();
		if(!$this -> curruser -> is_guest)
		{
			$curr_g_src = $this -> currdb -> sql_query("SELECT `ac_group_list`.`uid`, `ac_group_list`.`gid`, `ac_group`.`group_name` FROM `ac_group_list` RIGHT JOIN `ac_group` ON `ac_group_list`.`gid` = `ac_group`.`gid` WHERE `ac_group_list`.`uid` = '".$this -> curruser -> uid."' ORDER BY `ac_group_list`.`gid` ASC");
			while($curr_g_processing = $this -> currdb -> sql_fetch_array($curr_g_src))
			{
				array_push($this -> curr_g_arr, $curr_g_processing);
			}
		}
	}
	
	
	
	/**
	 * is_curruser_in_group_by_gid(int): bool
	 * Return true if curruser is in group of requested `$input_gid`
	 */
	function is_curruser_in_group_by_gid($input_gid)
	{
		$result = false;
		for($i=0; $i<count($this -> curr_g_arr); $i++)
		{
			if($this -> curr_g_arr[$i]['gid'] == $input_gid)
			{
				$result = true;
				break;
			}
		}
		return $result;
	}
	
	
	/**
	 * is_curruser_in_group_by_group_name(String): bool
	 * Return true if curruser is in group of requested `$input_group_name`
	 */
	function is_curruser_in_group_by_group_name($input_group_name)
	{
		$result = false;
		for($i=0; $i<count($this -> curr_g_arr); $i++)
		{
			if($this -> curr_g_arr[$i]['group_name'] == $input_group_name)
			{
				$result = true;
				break;
			}
		}
		return $result;
	}
	
	
	/**
	 * get_group_of_curruser(): mixed[]
	 * Return array of all groups of `curruser`
	 */
	function get_group_of_curruser()
	{
		return $curr_g_arr;
	}
	
	
	/**
	 * get_user_of_group_by_group_name(String): mixed[]
	 * Return user array of corresponded group by requested group_name
	 */
	function get_user_of_group_by_group_name($group_name)
	{
		$curr_src = $this -> currdb -> sql_query("SELECT `ac_group_list`.`uid`, `ac_group_list`.`gid`, `ac_group`.`group_name`, `ac_user`.`username` FROM `ac_group_list` RIGHT JOIN `ac_group` ON `ac_group_list`.`gid` = `ac_group`.`gid` RIGHT JOIN `ac_user` ON `ac_group_list`.`uid` = `ac_user`.`uid` WHERE `ac_group`.`group_name` = '".$group_name."'");
		$result = array();
		while($result_processing = $this -> currdb -> sql_fetch_array($curr_src))
		{
			array_push($result, $result_processing);
		}
		
		return $result;
	}
	
	
	/**
	 * get_user_of_group_by_gid(int): mixed[]
	 * Return user array of corresponded group by requested gid
	 */
	function get_user_of_group_by_gid($gid)
	{
		$curr_src = $this -> currdb -> sql_query("SELECT `ac_group_list`.`uid`, `ac_group_list`.`gid`, `ac_group`.`group_name`, `ac_user`.`username` FROM `ac_group_list` RIGHT JOIN `ac_group` ON `ac_group_list`.`gid` = `ac_group`.`gid` RIGHT JOIN `ac_user` ON `ac_group_list`.`uid` = `ac_user`.`uid` WHERE `ac_group`.`gid` = '".$gid."'");
		$result = array();
		while($result_processing = $this -> currdb -> sql_fetch_array($curr_src))
		{
			array_push($result, $result_processing);
		}
		
		return $result;
	}
	
	
	/**
	 * getgroup_array_by_group_name(String) : mixed[] / false
	 *
	 * Get group information by `group_name`
	 * (String) group_name: input group_name
	 *
	 * Note: return type is an Array
	 */
	function getgroup_array_by_group_name($group_name)
	{
		$curr_group_src = $this -> currdb -> sql_query("SELECT * FROM `ac_group` WHERE `group_name` = '".$group_name."'");
		if($this -> currdb -> sql_num_rows($curr_group_src) != 0)
		{
			$curr_group_array = $this -> currdb -> sql_fetch_array($curr_group_src);
			return $curr_group_array;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * is_group_exist(String): bool
	 * Check if current group is exist
	 *
	 * (String) group_name: input group_name
	 */
	function is_group_exist_by_group_name($group_name)
	{
		$curr_group_counting = $this -> currdb -> sql_fetch_array($curr_group_src = $this -> currdb -> sql_query("SELECT * FROM `ac_group` WHERE `group_name` = '".$group_name."'"));
		if($curr_group_counting['count(*)'] != 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * getgroup_by_gid(int): mixed[]
	 * Get group information by `gid`
	 *
	 * (int) gid: input gid
	 *
	 * Note: return type is an Array
	 */
	function getgroup_array_by_gid($gid)
	{
		$curr_group_src = $this -> currdb -> sql_query("SELECT * FROM `ac_group` WHERE `gid` = '".intval($gid)."'");
		if($this -> currdb -> sql_num_rows($curr_group_src) != 0)
		{
			$curr_group_array = $this -> currdb -> sql_fetch_array($curr_group_src);
			return $curr_group_array;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * is_group_exist(int): bool
	 * Check if current group is exist
	 *
	 * (int) gid: input gid
	 */
	function is_group_exist_by_gid($gid)
	{
		$curr_group_counting = $this -> currdb -> sql_fetch_array($curr_group_src = $this -> currdb -> sql_query("SELECT count(*) FROM `ac_group` WHERE `gid` = '".intval($gid)."'"));
		if($curr_group_counting['count(*)'] != 0)
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