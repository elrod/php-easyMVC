<?php
	
	/* A module is a separate MVC component that can be used in any view one or more *
     * times in any part of the application											 */
	 
	 class modules{
	 	
	 	private $registry;
	 	private $loaded_mods = array();
	 	
	 	public function __construct($registry){
	 		$this->registry = $registry;		
	 	}
	 	
	 	/* Load all modules in $path */
	 	
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
	 	
	 	/* Execute chosen module */
	 	public function execute($name, $args = NULL){
	 		if(isset($this->loaded_mods[$name])){
			    include_once $this->loaded_mods[$name];
			    $controller_name = $name."Controller";
			    $controller = new $controller_name($this->registry);
			    $controller->index($args);
	 		}
	 		else
			    throw new Exception("Module " . $name . " not found");
	 	}
	 		
	 }
	
?>
