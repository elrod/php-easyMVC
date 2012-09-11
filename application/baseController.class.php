<?php

/* Questa è una classe astratta che definisce la struttura di un controller */

abstract class baseController{
	
	protected $registry;
	
	function __construct($registry){
		$this->registry = $registry;	
	}
	
	/* tutti i controller devono implementare il metodo index */
	abstract function index();
		
} 

?>