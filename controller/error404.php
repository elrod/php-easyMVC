<?php

	class error404Controller extends baseController{
		
		public function index(){
			$this->registry->template->error = "Errore 404 - Page not found";
			$this->registry->template->show('error404');
		}
	}

?>
