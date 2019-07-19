<?php 
/**
 * 
 */
class Usercontroller extends Controller
{


		// CREATE USER
		public function create()
		{	
			$crud = new CrudModel;
			$crud->create();
		}

		// UPDATE USER
		public function update()
		{
			print "user is updated";
		}

		// DELETE USER
		public function delete()
		{
			print "user is delete";
		}

		// RETRIVE USER INFO
		public function getusers()
		{
			print "users";
		}

		public function action()
		{
			
		}

}


 ?>