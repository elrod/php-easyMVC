<?php
	
	/* Questo è il controller principale per l'index del sito */
	
	class indexController extends baseController{
		
		/* Implemento il metodo index, obbligatorio per le classi che estendono baseController */
		public function index(){
		
			/* Setto una variabile del template, la utilizzerò poi nella vista */
			$this->registry->template->welcome = 'Il mio Framework MVC!';
			
			/* Con questo comando assegno i moduli a una variabile accessibile alla vista *
			 * dando così la possibilità di eseguirli alla vista stessa					  */
			$this->registry->template->modules = $this->registry->modules;
			
			/* richiedo la visualizzazione della vista */
			$this->registry->template->show('index');
			
		}
	}
	
?>