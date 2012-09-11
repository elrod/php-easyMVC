<?php

/* Per prima cosa includo tutte le classi servono */


/* Questo è il controller principale, tutti i controller creati dall'utente estenderanno questo */
include __SITE_PATH . '/application/' . 'baseController.class.php';

/* Il registro è un contenitore di variabili globali, accessibili dall'intero sito */
include __SITE_PATH . '/application/' . 'registry.class.php';

/* Il Router è il componente che si occupa di gestire gli URL richiamando il controller adeguato */
include __SITE_PATH . '/application/' . 'router.class.php';

/* La classe template si occupa di richiamare la vista adatta da mostrare all'utente */
include __SITE_PATH . '/application/' . 'template.class.php';

/* La classe modules gestisce i moduli del sito, le componenti accessibili da tutte le viste */
include __SITE_PATH . '/application/' . 'modules.class.php';

/* Carico automaticamente i modelli presenti nella cartella model *
 * N.B. Tutte le classi sono nominate secondo la convenzione:     *
 * nomefile.class.php                                             */
 
function __autoload($class_name){
	$filename = strtolower($class_name . '.class.php');
	$file = __SITE_PATH . '/models/' . $filename;
	
	/* se il file non esiste ritorna false */
	if(file_exists($file) == false) return false;
	
	include($file);
}

/* Crea un nuovo registro per salvare le variabili globali */
$registry = new registry;

?>