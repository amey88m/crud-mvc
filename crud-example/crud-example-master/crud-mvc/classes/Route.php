<?php 

/**
 * 
 */
class Route{
	

	public static function set_route($url)
	{
		if($_GET['url'] == $url):
			switch($_GET['url']):
				
				case "index.php":
				$user = new Usercontroller;
				$user->loadview("crud-form");
				break;

				case "create":
				$cont = new Controller;
				$cont->loadModel("create");
				// $user = new Usercontroller;
				// $user->create();
				break;

				case "crud":
				$user = new Usercontroller;
				$user->loadview("crud");
				break;

				case "action":
				$user = new Useractioncontroller;
				$user->action($_POST['userid'],$_POST['action']);
				break;


			endswitch;			
		endif;
	}


		
	
}

 ?>