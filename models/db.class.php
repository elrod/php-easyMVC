<?php

/* This class contains all the prototypes of the functions that MUST be implemented by *
 * the specific DBMS drivers														   */

abstract class db{
	
	abstract protected function connect();
	abstract protected function disconnect();
	abstract protected function prepare($query);
	abstract protected function query();
	abstract protected function fetch($type = 'object');
		
}

?>
