php-easyMVC
==============

Release 0.2.0
Warning: "This is an early development release, don't use it on production systems, as your application seafty may
not be guaranteed" 

This is an simple easy to use PHP-ONLY MVC (You don't have to learn any templating language) MVC framework

Features
==============

- Free! This framework is released under the GPL_v3 License, this means you can do wathever you want with it!
- Easy to Use and Understand !
- Easy to Install!
- Virtually compatible with any DBMS, just write a driver for your DBMS by implementing the db.class.php abstract class
- Easy to use localization system, just put your translation xml files in the locale folder.
- No Templating Language! Just write your HTML views and access variables with simple php instructions
- Expandable: you can write as many indipendent MVC modules as you like and use them within your web application

Requirements
==============

- Web-Server Apache2+ with php5+ installed
- Optional: simpleXML php5 extension enabled (Required to use the Localization System)
- Optional: (DBMS, any would work as long you implement the db.class.php abstract class), by default "mysqli" is supported

Installation
==============

- Just clone this project to your webserver root directory and connect to it with a web-browser as it follows:
  "http://domainname/php-easyMVC"
- If you are on a local server, you'll just need to point your browser to http://localhost/php-easyMVC

Usage
==============

Documentation is under development right now, and will soon be available for now this are the things you have to know to get started:

- The main entry point to your application is the index page: index.php
- All other pages are reached automatically by the router that parses the URL in this way:
  http://index.php?rt=controllerName/actionName
- All the controller are located in the controller/ subfolder and are named with this convention: "nameController.php"
- All the models are located in the models/ subfolder and are autoloaded by the application
- All the views are located in the views/ subfolder
- All the modules are autoloaded and stays in the modules/ subfolder
- You have access to a registry in wich you can store all your global vars: "$this->registry"
- You can store variables to display in yours views by saving them in: "$this->registry->template->varname"
- To display your views just use this instruction: "$this->registry->template->show("viewName");"
- To let your views access your modules just use this instruction BEFORE displaying your view: 
  "$this->registry->template->modules = $this->registry->modules;"
- Remember all Controllers extends baseController and MUST implement at least an index() method, wich is the default action selected by the router.
- Note that all Modules Controllers extends modulesController (version 0.1.1+) and MUST implement the index($args = NULL) method to use paramenters
- To access your DB just set your DBMS credentials in the config.php, and use the $this->registry->db instance to interact with your DBMS, all the allowed operations are indicated in the models/db.class.php abstract class.
- Translation System (version 0.2.0): set the $language in the config.php to 'auto' (default) to automatically select the first available preferred language based on your visitor's browser preferred languages, you can also force a language, by setting the $language variable to the language you want, for instance, put it-IT to load the it-IT.xml language file. Than create your language file in the locale folder, and fill it using the en-US.xml file as reference. To get the translation just call in your controller the get_translation method and store it in a template variable in this way: "$this->registry->template->varname = $this->registry->translationEngine->get_translation('controllername','actionname','text_id');" and print $varname in your view.
- Translation System can be disabled by setting the $language var in the config file to 'disabled'