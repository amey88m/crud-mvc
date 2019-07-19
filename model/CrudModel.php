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

			# escapes string
			$input_name 		= mysqli_real_escape_string($db->connection(), $_POST['name']);
			$email 				= mysqli_real_escape_string($db->connection(), $_POST['email']);
			$password 			= mysqli_real_escape_string($db->connection(), $_POST['pass']);
			$city 				= mysqli_real_escape_string($db->connection(), $_POST['city']);
			
			# remove html tags & white spaces from start and end
			$name = htmlentities($input_name);
			$name = strip_tags($name);
			
			# use regex
			$reg_name = "/^[a-z]*$/";
			$reg_email = "/^$/";

			$name = preg_match($reg_name, $name);
			$name =filter_var($name, FILTER_VALIDATE_BOOLEAN);
			filter_var($name, FILTER_SANITIZE_STRING);
			
			# hash password
			#$password = password_hash( $password, PASSWORD_BCRYPT, ['cost'=>10, 'salt'=>'EUOW8eiR.XLDLD.492X.LFJFOWPRZ/']);
			
			

			# check for user exit's in database;
			$result 	= $db->numRows("SELECT id FROM users WHERE email='$email' AND password='$password' LIMIT 1");
			$rowscount 	= mysqli_num_rows($result);
			

			if($name != 1):
				?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					User is not valide!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			else:
				# check for user is already exits
				if($rowscount > 0):
					?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						User is already exits.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
				else:
					# create new user
					$q = mysqli_query($this->connection(), "INSERT INTO users(name,email,password,city) VALUES('$input_name', '$email', '$password', '$city')");
echo <<< HERE
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<h5>user is created successfully.</h5>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
</div>	
HERE;
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
			
			$userid = mysqli_real_escape_string($db->connection(), $_POST['userid']);
			$pass  	= mysqli_real_escape_string($db->connection(), $_POST['pass']);
			$city 	= mysqli_real_escape_string($db->connection(), $_POST['city']);
			if(empty($pass) || empty($city)):
				exit;
			endif;
			$result = $db->numRows("UPDATE users SET password='$pass',city='$city' where id='$userid' ");
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