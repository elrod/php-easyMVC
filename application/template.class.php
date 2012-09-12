<?php

class template{

	private $registry;	// The registry
	
	private $vars = array();
	
	function __construct($registry){
		$this->registry = $registry;	
	}
	
	public function __set($index, $value){
		$this->vars[$index] = $value; 	
	}
	
	/* This function load and display the correct view */
	
	public function show($name){
		$path = __SITE_PATH . '/views/' . $name . '.php';
		
		/* if file does not exists throw an exception  */
		if(file_exists($path) == false){
			throw new Exception ('Template not found in: ' . $path);
		}
		
		/* load all vars to pass to the view */
		foreach($this->vars as $key => $value){
			$$key = $value;	
		}
		
		/* show the view */
		include ($path);
	}
}

?>
