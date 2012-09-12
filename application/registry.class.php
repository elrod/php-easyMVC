<?php

class registry{

	/* This will contain all global vars */
	private $vars = array();

	/* Getter and setter for global vars */
	
	public function __set($index, $value){
		$this->vars[$index] = $value;	
	}
	
	public function __get($index){
		return $this->vars[$index];	
	}
	
}

?>
