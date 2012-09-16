<!-- This is the default home page -->

<head>
	<link rel="stylesheet" href="styles/main.css" type="text/css" />
	<title>php-easyMVC</title>
</head>
<body>
	<div id="banner">
		<img src="img/banner.png"></img>
		<!---->
	</div>
	<br/>
	<h1><?php echo $welcome; ?> This is a Sample Title...</h1>
	<br/>
	<?php echo $modules->execute('example'); ?>
</body>
