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
				break;

				case "crud":
				$user = new Usercontroller;
				$user->loadview("crud");
				break;

				case "action":
				$user = new Useractioncontroller;
				$user->action($_POST['userid'],$_POST['action']);
				break;

				case "test":
				$user = new Testcontroller;
				$user->test();
				break;
			endswitch;
		else:
			http_response_code(404);
		endif;
	}


		
	
}

 ?>