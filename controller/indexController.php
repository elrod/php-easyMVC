<?php
	
	/* This is the main controller for the site index */
	
	class indexController extends baseController{
		
		/* Implement index controller */
		public function index(){
		
			/* Set all template vars, this will be used in the view */
			$this->registry->template->welcome = 'Welcome to the php-easyMVC Framework!';
			
			/* This instruction allows the view to execute modules */
			$this->registry->template->modules = $this->registry->modules;
			
			/* Show the view */
			$this->registry->template->show('index');
			
		}
	}
	
?>
