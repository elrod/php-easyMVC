<?php

/* Load all needed classes */


/* Main controller, all users' controllers MUST extend this */
include __SITE_PATH . '/application/' . 'baseController.class.php';

/* Modules Controller, all modules' controllers MUST extend this */
include __SITE_PATH . '/application/' . 'moduleController.class.php';

/* Registry is used to store global variables */
include __SITE_PATH . '/application/' . 'registry.class.php';

/* The router is the component used to load the correct controller */
include __SITE_PATH . '/application/' . 'router.class.php';

/* The template class is used to display the correct view */
include __SITE_PATH . '/application/' . 'template.class.php';

/* This is used to load all user-made modules */
include __SITE_PATH . '/application/' . 'modules.class.php';

/* This is used to manage translations */
include __SITE_PATH . '/application/' . 'translationEngine.class.php';

/* This function autoload all models in the models folder.  *
 * note that all models files name must be called using the *
 * .class.php suffix										*/
 
function __autoload($class_name){
	$filename = strtolower($class_name . '.class.php');
	$file = __SITE_PATH . '/models/' . $filename;
	
	/* if file does not exists return false */
	if(file_exists($file) == false) return false;
	
	include($file);
}

/* Create the registry */
$registry = new registry;

?>
