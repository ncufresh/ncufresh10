<?php
/**
 * Armored Core - Boot
 * Initialize settings and configuration
 */

define('AC_INCLUDED', true);
session_start();

// Step1. Include configuration/setting file of required settings
require_once('ac_common.php');
ac_session_init();

require_once(ROOT_PATH.'/config.php');
require_once(ROOT_PATH.'/core/ac_database.php');
require_once(ROOT_PATH.'/core/ac_user.php');
require_once(ROOT_PATH.'/core/ac_group.php');
require_once(ROOT_PATH.'/core/ac_template.php');
require_once(ROOT_PATH.'/core/ac_module.php');
require_once(ROOT_PATH.'/core/ac_block.php');
require_once(ROOT_PATH.'/core/lib/fw10_online_counter.php');

$currcfg = array();
$currcfg['ROOT_PATH']		= ROOT_PATH;
$currcfg['URL_ROOT_PATH']	= URL_ROOT_PATH;
$currcfg['FILE_PATH']		= FILE_PATH;
$currcfg['URL_FILE_PATH']	= URL_FILE_PATH;
$currcfg['DEFAULT_LANG']	= DEFAULT_LANG;
$currcfg['CSS_HEADER']		= "";
$currcfg['JS_HEADER']		= "";

$currdb		= new ac_database(SQL_HOST, SQL_CTRL_USERNAME, SQL_CTRL_PASSWORD, SQL_DB_NAME);
$currcfg['DB_SOURCE']		= &$currdb;

$curruser	= new ac_user();
$currcfg['USER_SOURCE']		= &$curruser;

$currgroup	= new ac_group();
$currcfg['GROUP_SOURCE']	= &$currgroup;

$currmodule	= new ac_module();
$currcfg['MODULE_SOURCE']	= &$currmodule;

$currtpl	= new ac_template();
$currcfg['TPL_SOURCE']		= &$currtpl;

$currcounter= new fw10_online_counter();
$currcfg['COUNTER_SOURCE']	= &$currcounter;

$currtpl -> assign('curruser',	$curruser);
$currtpl -> assign('currgroup',	$currgroup);
$currtpl -> assign('currmodule',$currmodule);

// Step2. Security check for banned IP and magic quotes addition
ac_magic_quote_add($_GET);
ac_magic_quote_add($_POST);

// Step3. Add jquery & global CSS
$currtpl -> add_css('style.css', true);
$currtpl -> add_js("jquery-1.4.2.js", true);
$currtpl -> add_js("DD_belatedPNG.js", true);
$currtpl -> add_js("fw2010_init.js", true);

// Step4. Ticket Generate
$_SESSION['OLDTICKET'] = isset($_SESSION['NEWTICKET']) ? $_SESSION['NEWTICKET'] : "";
$_SESSION['NEWTICKET'] = md5("ArmoredCore".mktime());
$currtpl -> assign('ACticket', $_SESSION['NEWTICKET']);
//modified by BigZ at 20100806_2303, Jessee at 20100808_1603

?>
