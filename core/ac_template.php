<?php
/**
 * Armored Core - Templates Class
 * HTML and PHP template engine extended from Smarty
 */
require_once('lib_3rd/Smarty/Smarty.class.php');
require_once('ac_common.php');
require_once(ROOT_PATH.'/config.php');

class ac_template extends Smarty
{
	/**
	 * If current process needs apply main frame, than the value
	 * of `$is_main_frame_using would` be true.
	 *
	 * Default: true
	 */
	var $is_main_frame_using;
	var $currcfg;
	var $module_path;
	
	/**
	 * Constructor
	 */
	function __construct()
	{
		global $currcfg;
		$this -> Smarty();
		
		$this -> left_delimiter		= '<{';
		$this -> right_delimiter	= '}>';
		
		// $this -> template_dir	= ($input_tpl_dir == null) ? ROOT_PATH."/templates"		: $input_tpl_dir;
		$module_info			= explode("/" ,substr($_SERVER['SCRIPT_FILENAME'], strlen(ROOT_PATH)));
		$this -> module_path	= (count($module_info) > 2) ? ("/module/".$module_info[2]) : "";
		
		$this -> template_dir	= ROOT_PATH.($this -> module_path)."/templates";
		$this -> compile_dir	= ROOT_PATH.($this -> module_path)."/templates_c";
		
		$this -> is_main_frame_using	= (defined('MAIN_FRAME_EXEC') && defined('MAIN_FRAME_TPL'));
		$this -> currcfg				= &$currcfg;
	}
	
	
	/**
	 * display(String): String
	 *
	 * Overridding function `display` in Smarty with multi-language and multi-block support
	 * echo the processed result of HTML
	 */
	function display($input_tpl_file, $cache_id = null, $compile_id = null)
	{
		if($this -> init_check())
		{
			$result = "";
			if($this -> is_main_frame_using)
			{
				// Step1. Require main frame executable file
				require_once(ROOT_PATH."/".MAIN_FRAME_EXEC);
				$this -> assign('main_block_var', $main_block_var);
				
				/**
				 * Optional:
				 * All templates will be added 'style.css' and 'jquery-*.js' automatically.
				 * If you need to close this function, remove the code bellow this block
				 */
				 
				/* ----- COMMENT CODE UNDER THIS LINE IF YOU DON'T NEED THIS FUNCTION ----- */
				if($this -> currcfg['MODULE_SOURCE'] -> module_name != "system")
				{
					$this -> add_css('style.css');
				}
				/* ----- COMMENT CODE OVER THIS LINE IF YOU DON'T NEED THIS FUNCTION ----- */
				
				
				// Step2. Fetch `currcfg` as current global settings
				$this -> assign('currcfg',		$this -> currcfg);
				$this -> assign('curruser',		$this -> currcfg['USER_SOURCE']);
				$this -> assign('currgroup',	$this -> currcfg['GROUP_SOURCE']);
				$this -> assign('currmodule',	$this -> currcfg['MODULE_SOURCE']);
				
				// Step3. Fetch main frame template file
				$this -> assign('MAIN_CONTENTS_BLOCK', $this -> fetch(DEFAULT_LANG."/".$input_tpl_file));
				
				// Step4. Final output
				Smarty::display(ROOT_PATH."/templates/".DEFAULT_LANG."/".MAIN_FRAME_TPL);
			}
			else
			{
				$this -> assign('currcfg', $this -> currcfg);
				$this -> assign('curruser',		$this -> currcfg['USER_SOURCE']);
				$this -> assign('currgroup',	$this -> currcfg['GROUP_SOURCE']);
				$this -> assign('currmodule',	$this -> currcfg['MODULE_SOURCE']);
				
				
				Smarty::display(DEFAULT_LANG."/".$input_tpl_file);
			}
		}
		else
		{
			echo "<strong>Armored Core</strong>: ac_template:: display(): This method can't be accessed by side-template or block. Please retry by class `ac_block`.";
		}
		
		//$this -> currcfg['DB_SOURCE'] -> sql_print_msg();
	}
	
	/**
	 * init_check(bool = true): bool
	 *
	 * Templates checker before initialization
	 * Stop template system and show the warning message if $this has been called by object of `ac_block` or `MAIN_FRAME_EXEC`
	 */
	function init_check($is_display = true)
	{
		if(basename($_SERVER['SCRIPT_NAME'])==MAIN_FRAME_EXEC)
		{
			if($is_display)
			{
				echo "<strong>Armored Core</strong>: ac_template:: object of `ac_template` can't be called by `MAIN_FRAME_EXEC` or objects of `ac_block`.<br />";
			}
			return false;
		}
		else
		{
			return true;
		}
	}
	
	/**
	 * add_css(String, bool): bool
	 *
	 * CSS (Cascading Style Sheets) adder
	 * Note: you must put your `*.css` file in `templates` directory or `module/[module_name]/templates` directory
	 *
	 * Note: if you want to add CSS file from root, 2nd paramater must be 'true'
	 */
	function add_css($file_name, $main_frame = false)
	{		
		if($main_frame && file_exists(ROOT_PATH."/templates/".DEFAULT_LANG."/".$file_name))
		{
			$this -> currcfg['CSS_HEADER'] .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"".URL_ROOT_PATH."/templates/".DEFAULT_LANG."/".$file_name."\" />\n";
			return true;
		}
		else
		if(!$main_frame && file_exists($this -> template_dir."/".DEFAULT_LANG."/".$file_name))
		{
			$this -> currcfg['CSS_HEADER'] .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"".URL_ROOT_PATH.($this -> module_path)."/templates/".DEFAULT_LANG."/".$file_name."\" />\n";
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	 * add_css_text(String): void
	 *
	 * CSS (Cascading Style Sheets) pure-text adder
	 */
	function add_css_text($input_str)
	{
		$this -> currcfg['CSS_HEADER'] .= "<style type=\"text/css\">\n".$input_str."\n</style>";
	}
	
	/**
	 * add_js(String, bool): bool
	 *
	 * JS (JavaScript) adder
	 * Note: you must put your `*.js` file in `lib` directory or `module/lib` directory
	 */
	function add_js($file_name, $main_frame = false)
	{
		if($main_frame && file_exists(ROOT_PATH."/lib/".$file_name))
		{
			$this -> currcfg['JS_HEADER'] .= "<script type=\"text/javascript\" src=\"".URL_ROOT_PATH."/lib/".$file_name."\"></script>\n";
			return true;
		}
		else
		if(!$main_frame && file_exists(ROOT_PATH.($this -> module_path)."/lib/".$file_name))
		{
			$this -> currcfg['JS_HEADER'] .= "<script type=\"text/javascript\" src=\"".URL_ROOT_PATH.($this -> module_path)."/lib/".$file_name."\" /></script>\n";
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * add_js_text(String): void
	 *
	 * JS (JavaScript) pure-text adder
	 */
	function add_js_text($input_str)
	{
		$this -> currcfg['JS_HEADER'] .= "<script type=\"text/javascript\">\n".$input_str."\n</script>";
	}
	
	/**
	 * set_display(bool): void
	 * 
	 * main_frame will displayed if input is true, otherwise main_frame will be disabled
	 */
	function set_display($input)
	{
		if(is_bool($input))
		{
			$this -> is_main_frame_using = $input;
		}
	}
}

?>
