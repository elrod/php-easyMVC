<?php

class registry{

	/* Questo array conterrà tutte le variabili globali */
	private $vars = array();

	/* Getter e setter per le variabili globali */
	
	public function __set($index, $value){
		$this->vars[$index] = $value;	
	}
	
	public function __get($index){
		return $this->vars[$index];	
	}
	
}

?>