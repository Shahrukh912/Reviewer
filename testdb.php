<?php
	
class Database_api{
		private $db_hostname; 
		private $db_database; 
		private $db_username; 
		private $db_password;
		private $conn;
			
		public function __construct($database){
			$this->db_database = $database;
			$this->db_hostname = 'localhost';  
			$this->db_username = 'root'; 
			$this->db_password = '';
		}
/*---------------------------------------------------------------------------------*/		
		private function connect(){
			$this->conn = mysqli_connect($this->db_hostname, $this->db_username, $this->db_password, $this->db_database);
			if (mysqli_connect_errno()) {
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
 				exit;
 			}
		}
		private function disconnect(){
			mysqli_close($this->conn);
		}
		public function dbselect(){
			mysqli_select_db($this->conn,$this->db_database) or die("Unable to select database: ".mysqli_error($this->conn));
		}
/*----------------------------------------------------------------------------------*/
		public function authenticate($username,$password){
			$this->connect();
			$query = "SELECT username,password from user WHERE username='$username' AND password='$password'";
			$row = mysqli_num_rows(mysqli_query($this->conn,$query));
			$this->disconnect();
			return $row;
		}
// -----------------REVIEW---------------
		public function fetch_review($website_id){
			$this->connect();
			$query = "SELECT * from review WHERE id=$website_id LIMIT 10";
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			if((mysqli_num_rows($result))<=0){
				return NULL;
			}
			else{
				return $result;
			}
		}

		public function write_review($website_id,$review,$name,$user_id){
			$this->connect();
			$query ="INSERT INTO review (id,desciption,name,uid) VALUES ($website_id,'$review','$name',$user_id)";
			$result = mysqli_query($this->conn,$query) or die("fffff: ".mysqli_error($this->conn));
			$this->disconnect();
			return $result;
		}
// ------------------WEBSITE DETAIL-------------------
		public function fetch_website($website_id){
			$this->connect();
			$query = "SELECT * from website WHERE id=$website_id ";
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			if((mysqli_num_rows($result))<=0){
				return NULL;
			}
			else{
				return $result;
			}
		}

	}
?>