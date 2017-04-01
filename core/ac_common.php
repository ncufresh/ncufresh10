<?php
/**
 * Armored Core - Common functions and constants definition
 */
define('ROOT_PATH',		str_replace(DIRECTORY_SEPARATOR, "/", realpath(dirname(__FILE__)."/../")));
define('FILE_PATH',		$_SERVER['SCRIPT_NAME']);
define('URL_ROOT_PATH',	str_replace(DIRECTORY_SEPARATOR, "/", substr(ROOT_PATH, strlen(realpath($_SERVER["DOCUMENT_ROOT"])))));
define('URL_FILE_PATH',	str_replace(ROOT_PATH, "", $_SERVER['SCRIPT_NAME']));

require_once('lib/ac_init_security.php');

/**
 * redirect(String, [int]): void
 * URL redirect to request file
 *
 * Note: Second paramater is optional, using 'second' as unit. Redirect action will be processed after '$sec' seconds.
 */
function redirect($url, $sec = 0)
{
	if(intval($sec) > 0)
	{
		header("Refresh:".$sec."; URL=".$url);
	}
	else
	{
		header("location: ".$url);
	}
}

/**
 * get_client_ip_addr(): String
 * Return client's IP address
 */
function get_client_ip_addr()
{
	$ip;
	if(getenv("HTTP_CLIENT_IP"))
	{
		$ip = getenv("HTTP_CLIENT_IP");
	}
	else
	if(getenv("HTTP_X_FORWARDED_FOR"))
	{
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	}
	else
	if(getenv("REMOTE_ADDR"))
	{
		$ip = getenv("REMOTE_ADDR");
	}
	else
	{
		$ip = '*.*.*.*';
	}
	return $ip;
}


/**
 * htmlencode(String): String
 * Replace escape characters and XML left/right brackets to HTML's display symbols
 */
function htmlencode($input_str)
{
	$origin = array("&", " ", "<", ">", "\"", "\n", "\t");
	$replacements = array("&amp;", "&nbsp;", "&lt;", "&gt;", "&quot;", "<br />\n", "&nbsp;&nbsp;&nbsp;&nbsp;");
	
	return str_replace($origin, $replacements, $input_str);
}

/**
 * html_eliminate(String): String
 * Replace all html tags to empty. For example:
 * 	input:	<a href="x.php">DISPLAY_X</a>
 * 	output: DISPLAY_X
 */
function html_eliminate($input)
{
	return preg_replace("/(<\/?)(\w+)([^>]*>)/e", "", $input);
}


/**
 * validate_email(String): bool
 * Return true if `input_str` is a valid E-mail address
 */
function validate_email($input_str)
{
	return preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*$/", $input_str) > 0;
}


/**
 * validate_ROC_sid(String): bool
 * Return true if `input_str` is a valid R.O.C idenfication number
 */
function validate_ROC_sid($input_str)
{
	if(strlen($input_str) != 10)
	{
		return false;
	}
	else
	if(substr($input_str, 1, 1)!= '1' && substr($input_str, 1, 1)!= '2')
	{
		return false;
	}
	else
	{
		$sid_sum = 0;
		switch(strtoupper(substr($input_str, 0, 1)))
		{
			case 'A':
				$sid_sum = $sid_sum + 1 + 0*9;
				break;
			case 'B':
				$sid_sum = $sid_sum + 1 + 1*9;
				break;
			case 'C':
				$sid_sum = $sid_sum + 1 + 2*9;
				break;
			case 'D':
				$sid_sum = $sid_sum + 1 + 3*9;
				break;
			case 'E':
				$sid_sum = $sid_sum + 1 + 4*9;
				break;
			case 'F':
				$sid_sum = $sid_sum + 1 + 5*9;
				break;
			case 'G':
				$sid_sum = $sid_sum + 1 + 6*9;
				break;
			case 'H':
				$sid_sum = $sid_sum + 1 + 7*9;
				break;
			case 'I':
				$sid_sum = $sid_sum + 3 + 4*9;
				break;
			case 'J':
				$sid_sum = $sid_sum + 1 + 8*9;
				break;
			case 'K':
				$sid_sum = $sid_sum + 1 + 9*9;
				break;
			case 'L':
				$sid_sum = $sid_sum + 2 + 0*9;
				break;
			case 'M':
				$sid_sum = $sid_sum + 2 + 1*9;
				break;
			case 'N':
				$sid_sum = $sid_sum + 2 + 2*9;
				break;
			case 'O':
				$sid_sum = $sid_sum + 3 + 5*9;
				break;
			case 'P':
				$sid_sum = $sid_sum + 2 + 3*9;
				break;
			case 'Q':
				$sid_sum = $sid_sum + 2 + 4*9;
				break;
			case 'R':
				$sid_sum = $sid_sum + 2 + 5*9;
				break;
			case 'S':
				$sid_sum = $sid_sum + 2 + 6*9;
				break;
			case 'T':
				$sid_sum = $sid_sum + 2 + 7*9;
				break;
			case 'U':
				$sid_sum = $sid_sum + 2 + 8*9;
				break;
			case 'V':
				$sid_sum = $sid_sum + 2 + 9*9;
				break;
			case 'W':
				$sid_sum = $sid_sum + 3 + 2*9;
				break;
			case 'X':
				$sid_sum = $sid_sum + 3 + 0*9;
				break;
			case 'Y':
				$sid_sum = $sid_sum + 3 + 1*9;
				break;
			case 'Z':
				$sid_sum = $sid_sum + 3 + 3*9;
				break;
		}
		
		$sid_sum = $sid_sum + intval(substr($input_str, 1, 1)) * 8 
							+ intval(substr($input_str, 2, 1)) * 7 
							+ intval(substr($input_str, 3, 1)) * 6 
							+ intval(substr($input_str, 4, 1)) * 5 
							+ intval(substr($input_str, 5, 1)) * 4 
							+ intval(substr($input_str, 6, 1)) * 3 
							+ intval(substr($input_str, 7, 1)) * 2 
							+ intval(substr($input_str, 8, 1)) * 1;
		
		if(substr($input_str, -1, 1) == substr((10 - ($sid_sum % 10)), -1, 1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

/**
 * validate_date(int, int, int): bool
 * Return true if input is an valid date
 */
function validate_date($input_y, $input_m, $input_d)
{
	$input_y = intval($input_y);
	$input_m = intval($input_m);
	$input_d = intval($input_d);
	
	$bool_flag = true;
	
	$bool_flag = ($input_d < 1) ? false : $bool_flag;
	
	switch($input_m)
	{
		case 1:
		case 3:
		case 5:
		case 7:
		case 8:
		case 10:
		case 12:
			$bool_flag = ($input_d > 31) ? false : $bool_flag ;
			break;
		case 4:
		case 6:
		case 9:
		case 11:
			$bool_flag = ($input_d > 30) ? false : $bool_flag ;
			break;
		case 2:
			$bool_flag = (($input_y % 4 != 0) && ($input_d > 28) ||  ($input_y % 4 == 0) && (input_d > 29)) ? false : $bool_flag ;
			break;
		default:
			$bool_flag = false;
	}
	
	return $bool_flag;
}
?>