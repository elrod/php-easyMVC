<?php
	/* Questo è l'unico punto di ingresso al sito, per cui qua si inizializza tutto */
	
	/* Abilita visualizzazione degli errori */

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	/* Setto __SITE_PATH come variabile globale */
	
	$site_path= realpath(dirname(__FILE__));
	define('__SITE_PATH', $site_path);
	
	/* Includo il file di configurazione */
	include 'config.php';
	
	/* Chiamo lo script php di inizializzazione */
	include 'includes/init.php';
	
	/* In base al DBMS scelto, carico il driver appropriato */
	switch($dbms){
		case 'mysql':
			$registry->db = new mysql_db($dbhost,$dbuser,$dbpass,$dbname,$dbport,$dbsocket);
			break;
		default:
			throw new Exception('Non ci sono driver disponibili per il DBMS scelto');	
	}
	
	/* Carico il router nel registro */
	$registry->router = new router($registry);
	/* Setto il path dei controller, in modo che il router sappia dove cercarli */
	$registry->router->set_path(__SITE_PATH . '/controller');
	
	/* Carico il gestore dei moduli */
	$registry->modules = new modules($registry);
	/* Carico tutti i moduli presenti nella cartella modules */
	$registry->modules->load_modules(__SITE_PATH . '/modules');
	
	/*DEBUG*/
	//$registry->modules->print_loaded_modules();
	
	/* Carica il template */
	$registry->template = new template($registry);
	
	/* Carica il controller adeguato */
	$registry->router->loader();

?>