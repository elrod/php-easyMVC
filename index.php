<?php
	/* This is the website entry point*/
	
	/* Display errors */

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	/* Set __SITE_PATH as a global var */
	
	$site_path= realpath(dirname(__FILE__));
	define('__SITE_PATH', $site_path);
	
	/* Include configuration file */
	include 'config.php';
	
	/* init.php initializes everything */
	include 'includes/init.php';
	
	/* Load appropriate driver for the chosen DBMS */
	switch($dbms){
		case 'mysql':
			$registry->db = new mysql_db($dbhost,$dbuser,$dbpass,$dbname,$dbport,$dbsocket);
			break;
		default:
			throw new Exception('No drivers available for this DBMS');	
	}
	
	/* Load a router instance in the registry */
	$registry->router = new router($registry);
	/* Set controllers path */
	$registry->router->set_path(__SITE_PATH . '/controller');
	
	/* Load modules manager */
	$registry->modules = new modules($registry);
	/* Autoload all modules */
	$registry->modules->load_modules(__SITE_PATH . '/modules');
	
	/* Load translationEngine */
	if($language != "disabled"){
		$registry->translationEngine = new translationEngine($language);
	}
	
	/* Load template */
	$registry->template = new template($registry);
	
	/* Load correct controller */
	$registry->router->loader();

?>
