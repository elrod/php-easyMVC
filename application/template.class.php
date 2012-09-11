<?php

class template{

	private $registry;	// Il registro
	
	private $vars = array();
	
	function __construct($registry){
		$this->registry = $registry;	
	}
	
	public function __set($index, $value){
		$this->vars[$index] = $value; 	
	}
	
	/* Questa funzione carica e mostra la vista corretta */
	
	public function show($name){
		$path = __SITE_PATH . '/views/' . $name . '.php';
		
		/* se il file non esiste lancia un eccezione  */
		if(file_exists($path) == false){
			throw new Exception ('Template not found in: ' . $path);
		}
		
		/* carica tutte le variabili da passare alla vista */
		foreach($this->vars as $key => $value){
			$$key = $value;	
		}
		
		/* ora mostro la vista semplicemente includendola */
		include ($path);
	}
}

?>