<?php 

/**
 * 
 */
class Controller
{
	
	// 	load view
	public static function loadview($view)
	{
		require "view/".$view.".php";
	}


	// load model
	public static function loadModel($model)
	{
		require "model/".$model.".php";
	}
	
}

 ?>