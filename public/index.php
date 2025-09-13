<?php
define('PREVENT_DIRECT_ACCESS', TRUE);
/*
 *---------------------------------------------------------------
 * SYSTEM DIRECTORY NAME
 *---------------------------------------------------------------
 */
	$system_path 			= '../scheme';

/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 */
	$application_folder 	= '../app';

/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 */
	$public_folder			= '.';

/*
 * ------------------------------------------------------
 * Define Application Constants
 * ------------------------------------------------------
 */
define('ROOT_DIR',  dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('SYSTEM_DIR', ROOT_DIR . $system_path . DIRECTORY_SEPARATOR);
define('APP_DIR', ROOT_DIR . $application_folder . DIRECTORY_SEPARATOR);
define('PUBLIC_DIR', $public_folder);

/*
 * ------------------------------------------------------
 * Setup done? Then Hurray!
 * ------------------------------------------------------
 */
require_once SYSTEM_DIR . 'kernel/LavaLust.php';
?>
