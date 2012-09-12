<?php

/* This defines the base structor of a controller */

abstract class baseController{
	
	protected $registry;
	
	function __construct($registry){
		$this->registry = $registry;	
	}
	
	/* all controllers MUST implement the index method */
	abstract function index();
		
} 

?>
