<?php 

if(empty($_POST['crudFormBtn'])):
	http_response_code(400);
	exit;
endif;


if(isset($_POST['crudFormBtn'])):

	/**
	 * load controller@method
	 */
	$usr = new Usercontroller;
	$usr->create();


	// $crud = new CrudModel;
	// $crud->create();

endif;

 ?>