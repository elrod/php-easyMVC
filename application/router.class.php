<?php

class router{
	
	/* Il registro */
	private $registry;
	
	/* Il percorso dei controller */
	private $path;
	
	private $args = array();
	
	public $file;
	public $controller;
	public $action;
	
	public function __construct($registry){
		$this->registry = $registry;	
	}
	
	/* Setto il percorso dei controller */
	public function set_path($path){
		
		/* Controllo che il percorso sia una directory */
		if(is_dir($path) == false){
			throw new Exception ('Invalid Controller Path: ' .$path);	
		}
		
		$this->path = $path;
	}
	
	/* carico il controller corretto */
	public function loader(){
	
		$this->getController();	// Recupera il controller corretto
		
		if(is_readable($this->file) == false){
			$this->file = $this->path . '/error404.php';	// File non trovato
			$this->controller = 'error404';				// Carico il controller per file non trovato
		}
		
		include $this->file;		// Carico il controller
		
		/* Creo una nuova istanza della classe controller */
		$class = $this->controller . 'Controller';		// Notare la C maiuscola
		$controller = new $class($this->registry);		// Creo un'istanza della classe controller adatta
		
		// Ora guardo se è possibile gestire la action richiesta, cioè se esiste un metodo nel controller che la gestisce
		if(is_callable(array($controller, $this->action)) == false){
			$action = 'index';	// di default chiamo index come action	
		}
		else{
			$action = $this->action;	
		}
		/* Chiamo il metodo di gestione dell'azione */
		$controller->$action();
	}
	
	/* Questo è un metodo privato che esegue il parsing dell'url settando le variabili */
	private function getController(){
		// controllo campo 'rt' in $_GET
		$route = (empty($_GET['rt']) ? '' : $_GET['rt']);
		
		if(empty($route)){
			
			$route = 'index';
				
		}
		else{
			
			$parts = explode('/', $route);	// Suddivido in parti separate da / il contenuto di $route
			$this->controller = $parts[0];  // La prima parte è il nome del controller
			if(isset($parts[1])){
				$this->action = $parts[1];	// Se settata la seconda parte è l'action da eseguire	
			}
		}
		
		/* Se a questo punto non è stato settato nulla, significa che devo mostrare l'index */
		if(empty($this->controller)){
			$this->controller = 'index';	
		}
		
		if(empty($this->action)){
			$this->action = 'index';	
		}
		
		/* Setto il Path del controller */
		$this->file = $this->path . '/' . $this->controller . 'Controller.php';
	}
}

?>