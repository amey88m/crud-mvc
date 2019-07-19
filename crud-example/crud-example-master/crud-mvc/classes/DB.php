<?php 

/**
 * 
 */
class DB
{
public $host 	 = "localhost";
public $username = "root";
public $pass 	 = "1234567890";
public $db 		 = "crud";
public $connection;


		public function __construct()
		{
			$this->connection = mysqli_connect($this->host,$this->username,$this->pass, $this->db);
			
		}


		public function connection()
		{
			if(!$this->connection):
				return mysqli_error();
				exit;
			else:
				return $this->connection;
				exit;
			endif;
		}


		public function numRows($query)
		{
			$result = mysqli_query($this->connection, $query);
			return $result;
		}


		public function sql($query)
		{
			$result = mysqli_query($this->connection, $query);
			$rowsresult = Array();
			while($rows = mysqli_fetch_assoc($result)):
				$rowsresult[] = $rows;
			endwhile;

			if(!empty($rowsresult)):
				return $rowsresult;
			endif;
		}


	
}
 ?>