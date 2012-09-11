<?php

/* la classe mysql_db implementa db per il database mysql *
 * N.B. viene utilizzata l'estensione mysqli			  */

class mysql_db extends db{
	
	private $dbhost;
	private $dbuser;
	private $dbpass;
	private $dbname;
	private $dbport;
	private $dbsocket;
	
	private $connection;
	private $query;
	private $result;
	
	function __construct($host, $user, $pass, $database, $port, $socket){
		$this->dbhost = $host;
		$this->dbuser = $user;
		$this->dbpass = $pass;
		$this->dbname = $database;
		$this->dbport = $port;
		$this->dbsocket = $socket;
	}
	
	public function connect(){
	
		$host = $this->dbhost;
		$user = $this->dbuser;
		$pass = $this->dbpass;
		$database = $this->dbname;
		
		$port = $this->dbport;
		$socket = $this->dbsocket;
		
		$this->connection = new mysqli 
		(
			$host, $user, $pass, $database, $port, $socket
		);
		
		return TRUE;
		
	}
	
	public function disconnect(){
		$this->connection->close();
		return TRUE;	
	}
	
	public function prepare($query){
		$this->query = $query;
		return TRUE;	
	}
	
	public function query(){
		if(isset($this->query))	{
			$this->result = $this->connection->query($this->query);
			
			return TRUE;
		}
		
		return FALSE;
	}
	
	public function numrows(){
		if(isset ($this->result))
		  return $this->result->num_rows;
		return FALSE;
	}
	
	public function fetch($type = 'object'){
	
		if(isset ($this->result)){
			
			switch($type){
				
				case 'array':
					$row = $this->result->fetch_array();
					break;
				
				case 'object':
					// Vai oltre
					
				default:
					$row = $this->result->fetch_object();	
			}
			
			return $row;
				
		}
		
		return FALSE;
		
	}
	
}

?>