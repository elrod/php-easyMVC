<!-- This is the default home page -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="styles/main.css" type="text/css" />
	<title>php-easyMVC</title>
</head>
<body>
	<img src="img/logo.png" alt="Framework Logo" />
	<br/>
	<h1><?php echo $welcome; ?></h1>
	<br/>
	<p class="box">
	<!-- Call a module with no args -->
	<?php echo $modules->execute('example'); ?>
	</p>
	<p class="box">
	<!-- Call a module with args -->
	<?php echo $modules->execute('example', "some text"); ?>
	</p>
	<p>
		If you need help using this framework, try Reading the 
		<a href="README.md">README.md</a>
		file located in the framework root Folder.<br/>	Remember that this framework is released under the GPL_V3
 License, so you are free to edit any file and implement any extra functionality.
	</p>
	<ul>
		<li>Edit the config.php file to fit your needs</li>
		<li>The only DBMS driver available at this development stage is for mysql using the mysqli extension</li>
		<li>You can write your own DBMS driver by implementing the db.class.php abstract interface in the models directory</li>
	</ul>
	<div id="footer">
		<p class="left">
			Framework: <a href="https://github.com/elrod/php-easyMVC">php-easyMVC</a> - License: <a href="GPL_V3">GPL V3</a>
		</p>
		<p class="right">
    	<a href="http://validator.w3.org/check?uri=referer">
		<img
      	src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
  		</p>
		<p class="right">
    	<a href="http://jigsaw.w3.org/css-validator/check/referer">
        	<img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="CSS Valido!" />
    	</a>
	</p>
	</div>
</body>
</html>
