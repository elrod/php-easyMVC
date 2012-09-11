<?php

	class error404Controller extends baseController{
		
		public function index(){
			$this->registry->template->error = "Errore 404 - Pagina non trovata";
			$this->registry->template->show('error404');
		}
	}

?>