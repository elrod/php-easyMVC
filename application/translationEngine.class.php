<?php
	
	/* NOTE: this class uses simplexml php extension, check your php.ini file to see if simplexml is enabled */

	class translationEngine{

		private $xml_langfile = "";
		private $xml = "";

		public function __construct($selected_lang){

			/* Auto-Select Language */
			if($selected_lang == "auto"){
				if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && $_SERVER['HTTP_ACCEPT_LANGUAGE'] != ""){
					$languages = explode(",",$_SERVER['HTTP_ACCEPT_LANGUAGE']);
					$preferred_langs = array();
					foreach ($languages as $lang) {
						$curr_lang = explode(";" , $lang);
						array_push($preferred_langs, $curr_lang[0]);
					}
					foreach($preferred_langs as $lang){
						if(file_exists(__SITE_PATH . "/locale/".$lang.".xml")){
							$this->xml_langfile = __SITE_PATH . "/locale/".$lang.".xml";
							break;
						}
					}
				}
				/* Language file not found for any of the accepted languages, fallback to en_US.xml */
				if($this->xml_langfile == ""){
					$this->xml_langfile = __SITE_PATH . "/locale/en-US.xml";
				}
			}
			/* Loading selected language if exists*/
			else{
				if(file_exists(__SITE_PATH . "/locale/".$selected_lang.".xml")){
					$this->xml_langfile = __SITE_PATH . "/locale/".$selected_lang.".xml";
				}
				/* If file does not exists fallback to english US */
				else{
					$this->xml_langfile = __SITE_PATH . "/locale/en-US.xml";
				}
			}
			$this->xml = simplexml_load_file($this->xml_langfile);
		}

		/* Returns translation for element with id = text_id, within the $contrller and $action tags */
		public function get_translation($controller, $action, $text_id){
			$xpath_query = "//controllers/controller[@key='".$controller."']/actions/action[@key='".$action."']/texts/text[@key='".$text_id."']";
			$simplexmlElement = $this->xml->xpath($xpath_query);
			if(isset($simplexmlElement[0]) && $simplexmlElement[0] != "" && $simplexmlElement[0] != NULL)
				return $simplexmlElement[0];
			else
				return "WARNING: NO TRANSLATION FOUND IN: <b>" . $this->xml_langfile . "</b><br/>FOR CONTROLLER: <b>'" . $controller . "'</b> ACTION: <b>'" .$action. "'</b> AND TEXT_ID: <b>'" . $text_id . "'</b>";
		}

	}

?>