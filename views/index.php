<!-- Questa è la vista dell'home page, embeddando un po' di php si riesce ad accedere alle variabili --
  -- settate dal controller della vista                                                              -->

<h1><?php echo $welcome; ?></h1>

<?php echo $modules->execute('example'); ?>