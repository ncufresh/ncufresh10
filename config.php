<?php
/**
 * Armored Core - User defined configuration
 * Included project information / MySQL connection information / Language Setting and Main file entrance
 */
 
/*
 * information settings
 */
define('PROJECT_NAME', "NCU FreshWeb 2010");
define('PROJECT_VERSION', "20100728");

/**
 * MySQL Connection settings
 */
define('SQL_HOST', "localhost");
define('SQL_CTRL_USERNAME', "");
define('SQL_CTRL_PASSWORD', "");
define('SQL_DB_NAME', "");

/**
 * Language Settings
 */
define('DEFAULT_LANG', "zh_tw");

/**
 * Online keep-alive time for counter, unit in seconds
 */
define('ONLINE_ALIVE_TIME', 300);

/**
 * Main frame template settings
 * Comment this line if you don't need main_frame
 * 
 * Note: You can use ONLY 1 main frame of all project
 * but you can set various of `block` (i.e. sub frame) for all project
 * When you call `block_variables`
 */
define('MAIN_FRAME_EXEC', "main_frame.php");
define('MAIN_FRAME_TPL', "main_frame.tpl.htm");
?>
