php-easyMVC
==============

Release 0.1.1 (Alpha)
Warning: "This is an early development release, don't use it on production systems, as your application seafty may
not be guaranteed" 

This is an simple easy to use PHP-ONLY MVC (You don't have to learn any templating language) MVC framework

Features
==============

- Free! This framework is released under the GPL_v3 License, this means you can do wathever you want with it!
- Easy to Use and Understand !
- Easy to Install!
- Virtually compatible with any DBMS, just write a driver for your DBMS by implementing the db.class.php abstract class
- No Templating Language! Just write your HTML views and access variables with simple php instructions
- Expandable: you can write as many indipendent MVC modules as you like and use them within your web application

Requirements
==============

- Web-Server Apache2+ with php5+ installed
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
- Note that all Modules Controllers extends modulesController (version 0.1.1) and MUST implement the index($args = NULL) method to use paramenters
- To access your DB just set your DBMS credentials in the config.php, and use the $this->registry->db instance to interact with your DBMS, all the allowed operations are indicated in the models/db.class.php abstract class.
