<?php
	
	/* Un modulo è un componente formato da modello-controller-vista dedicati che è accessibile   *
	 * e utilizzabile da qualsiasi vista, questi possono essere ad esempio, menu barre di ricerca *
	 * ecc... che devono essere utilizzati in più parti dell'applicazione						  */
	 
	 class modules{
	 	
	 	private $registry;
	 	private $loaded_mods = array();
	 	
	 	public function __construct($registry){
	 		$this->registry = $registry;		
	 	}
	 	
	 	/* Carico i moduli presenti nella cartella $path */
	 	
	 	public function load_modules($path){
	 		if(is_dir($path)){
	 			$handle = opendir($path);
	 			while(($dirname = readdir($handle)) !== false){
	 				if($dirname != "." && $dirname != ".."){
	 					if(is_readable(($controller = $path . '/' . $dirname . "/" . $dirname . "Controller.php"))){
	 						$this->loaded_mods[$dirname] = $controller;
	 					}	
	 				}	
	 			}
	 		}
	 		else
	 			throw new Exception("Invalid modules path");
	 	}
	 	
	 	/* Eseguo il modulo richiesto */
	 	public function execute($name){
	 		if(isset($this->loaded_mods[$name])){
			    include $this->loaded_mods[$name];
			    $controller_name = $name."Controller";
			    $controller = new $controller_name($this->registry);
			    $controller->index();
	 		}
	 		else
			    throw new Exception("Module " . $name . " not found");
	 	}
	 		
	 }
	
?>