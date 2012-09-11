<?php

/* La classe db contiene i prototipi delle funzioni che devono essere implementate dai driver dei vari database */

abstract class db{
	
	abstract protected function connect();
	abstract protected function disconnect();
	abstract protected function prepare($query);
	abstract protected function query();
	abstract protected function fetch($type = 'object');
		
}

?>