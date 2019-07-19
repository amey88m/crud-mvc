<?php 

/**
 * 
 */
class CrudModel extends DB
{
	
	
		/**
		 *	create new user
		 */
		
		public function create()
		{

			$db = new DB;
			$db->connection();

			// escapes string
			$input_name 		= mysqli_real_escape_string($db->connection(), $_POST['name']);
			$email 				= mysqli_real_escape_string($db->connection(), $_POST['email']);
			$password 			= mysqli_real_escape_string($db->connection(), $_POST['pass']);
			$city 				= mysqli_real_escape_string($db->connection(), $_POST['city']);

			// remove white html tags & white spaces from start and end of input's
			$name = htmlentities($input_name);
			$name = strip_tags($name);
			
			// use regex
			$reg_name = "/^[a-z]*$/";
			$reg_email = "/^$/";

			$name = preg_match($reg_name, $name);
			$name =filter_var($name, FILTER_VALIDATE_BOOLEAN);

			// hash password
			$password 	= password_hash($password, PASSWORD_BCRYPT, ['cost'=>10, 'salt'=>'EUOW8eiR.XLDLD.492X.LFJFOWPRZ/']);
			

			// check for user exit's in database;
			$result 	= $db->numRows("SELECT id FROM users WHERE email='$email' AND password='$password' LIMIT 1");
			$rowscount 	= mysqli_num_rows($result);
			

			if($name != 1):
				print "username is not valide";
			else:
				// check for user is already exits
				if($rowscount > 0):
					print "user is exits";
				else:
					// create new user
					$q = mysqli_query($this->connection(), "INSERT INTO users(name,email,password,city) VALUES('$input_name', '$email', '$password', '$city')");
					print "user is created successfully";
				endif;
					
			endif;

			return mysqli_close($db->connection());
		}


		/**
		 * delete user
		 */
		public function delete($id)
		{
			$db = new DB;
			$db->connection();

			$result = $db->numRows("DELETE FROM users WHERE id=$id");
echo <<< HERE
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <h5>user $id is deleted permenently.</h5>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>	
HERE;
mysqli_close($db->connection());

		}


		/**
		 * update user
		 */
		public function update($id)
		{
			$db = new DB;
			$db->connection();
			
			$userid = $_POST['userid'];
			$id  	= $_POST['id'];

			$result = $db->numRows("UPDATE users SET password='$id' WHERE id='$userid' ");
echo <<< HERE
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <h5>user '$userid' is updated successfully.</h5>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>	
HERE;
			return $result;
mysqli_close($db->connection());	
		}

	
}


 ?>