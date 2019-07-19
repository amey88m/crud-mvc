<?php 

if(empty($_POST['crudFormBtn'])):
	http_response_code(400);
	exit;
endif;

# checker
if(isset($_POST['crudFormBtn'])):
	$usr = new Usercontroller;
	$usr->create();
else:
	exit;
endif;

 ?>