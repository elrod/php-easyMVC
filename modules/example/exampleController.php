<?php

class exampleController extends moduleController{
  
  public function index($args = NULL){

  	if(isset($args) && $args != NULL){
  		print "You called the sample module with args: '".$args."'<br/>";
  	}
  	else{
    	print "You called the sample module with no args<br/>";
    }
  
  } 

}
?>
