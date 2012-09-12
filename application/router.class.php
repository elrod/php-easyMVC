<?php

class router{
	
	/* The registry */
	private $registry;
	
	/* path to the controllers' folder */
	private $path;
	
	private $args = array();
	
	public $file;
	public $controller;
	public $action;
	
	public function __construct($registry){
		$this->registry = $registry;	
	}
	
	/* Set the controller path */
	public function set_path($path){
		
		/* Verify that path is a directory */
		if(is_dir($path) == false){
			throw new Exception ('Invalid Controller Path: ' .$path);	
		}
		
		$this->path = $path;
	}
	
	/* Load correct controller */
	public function loader(){
	
		$this->getController();	// Look for correct controller
		
		if(is_readable($this->file) == false){
			$this->file = $this->path . '/error404.php';	// File Not Found
			$this->controller = 'error404';				// Load default File Not Found Controller
		}
		
		include $this->file;		// Load the controller
		
		/* Load a new instance of the controller class */
		$class = $this->controller . 'Controller';		// Note the capital C
		$controller = new $class($this->registry);		// Crete an instance of the correct controller
		
		// Load if the selected action is callable, otherwise, load the index action by default
		if(is_callable(array($controller, $this->action)) == false){
			$action = 'index';	// di default chiamo index come action	
		}
		else{
			$action = $this->action;	
		}
		/* Call the correct action handler */
		$controller->$action();
	}
	
	/* This is a private method used to parse the URL and load all needed vars */
	private function getController(){
		// check if is set $_GET['rt']
		$route = (empty($_GET['rt']) ? '' : $_GET['rt']);
		
		if(empty($route)){
			
			$route = 'index';
				
		}
		else{
			
			$parts = explode('/', $route);	// Explode the url in part separated by the '/' char
			$this->controller = $parts[0];  // The first part is the controller name
			if(isset($parts[1])){
				$this->action = $parts[1];	// The second part is the action name	
			}
		}
		
		/* If at this point nothing is set, it means i have to load the index */
		if(empty($this->controller)){
			$this->controller = 'index';	
		}
		
		if(empty($this->action)){
			$this->action = 'index';	
		}
		
		/* Setting up controller path */
		$this->file = $this->path . '/' . $this->controller . 'Controller.php';
	}
}

?>
