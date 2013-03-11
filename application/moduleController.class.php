<?php

/* This defines the base structure of a controller */

abstract class moduleController{

	protected $registry;

	function __construct($registry){
		$this->registry = $registry;	
	}

	/* all controllers MUST implement the index method */
	abstract function index($args = NULL);

} 

?>