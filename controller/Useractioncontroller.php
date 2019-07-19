<?php 
/**
 * 
 */
class Useractioncontroller extends Controller
{


		public function action($id,$action)
		{

			if($action == "delete"):
				$crud = new CrudModel;
				$crud->delete($id);
			elseif($action == "update"):
				$crud = new CrudModel;
				$crud->update($id);
			endif;

		}	
		
}

 ?>