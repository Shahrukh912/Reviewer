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
		public function execute($query){
			$this->connect();
			$result = mysqli_query($this->conn,$query);
			$this->disconnect();
			return $result;
		}
/*-------------------------------USER---------------------------------------------------*/
		public function authenticate($username,$password){
			$this->connect();
			$query = "SELECT username,password from user WHERE username='$username' AND password='$password'";
			$row = mysqli_num_rows(mysqli_query($this->conn,$query));
			$this->disconnect();
			return $row;
		}
		public function check_exitance_of_username($username){
			$this->connect();
			$query = "SELECT username from user WHERE username='$username'";
			$row = mysqli_num_rows(mysqli_query($this->conn,$query));
			$this->disconnect();
			return $row;
		}
		public function get_id_using_authentication($username,$password){
			$this->connect();
			$query = "SELECT id,firstname from user WHERE username='$username' AND password='$password'";
			$result = mysqli_query($this->conn,$query) or die("Database_class error in function get_id_using_authentication : ".mysqli_error($this->conn));
			$this->disconnect();
			return $result;
		}
		public function write_user(array $user_detail){
			$this->connect();
			date_default_timezone_set('Asia/Kolkata');
			$query ="INSERT INTO `user`(`firstname`, `lastname`, `gender`, `email`, `country`, `dob`,`dtoi`, `role`,`username`,`password`) VALUES('".$user_detail['firstname']."','".$user_detail['lastname']."','".$user_detail['gender']."','".$user_detail['email']."','".$user_detail['country']."','".$user_detail['dob']."','".date('Y-m-d h:i:s', time())."','".$user_detail['role']."','".$user_detail['username']."','".$user_detail['password']."')";
			$result = mysqli_query($this->conn,$query) or die("Database_class error in function write_review : ".mysqli_error($this->conn));
			$this->disconnect();
			return $result;
		}
		public function read_user($user_id){
			$this->connect();
			$query = "SELECT firstname,lastname,gender,email,country,dob,dtoi,username from user WHERE id=$user_id";
			$result = mysqli_query($this->conn,$query) or die("Database_class error in function read_user : ".mysqli_error($this->conn));
			$this->disconnect();
			if((mysqli_num_rows($result))<=0){
				return NULL;
			}
			else{
				return $result;
			}
		}
		public function update_user(array $user_detail,$user_id){
			$this->connect();
			$query = "UPDATE user set firstname='".$user_detail['firstname']."',lastname='".$user_detail['lastname']."',gender='".$user_detail['gender']."',email='".$user_detail['email']."',country='".$user_detail['country']."',dob='".$user_detail['dob']."' WHERE id=$user_id";
			$result = mysqli_query($this->conn,$query) or die("Database_class error in function read_user : ".mysqli_error($this->conn));
			$this->disconnect();
		}
		public function update_password($user_id,$password){
			$this->connect();
			$query = "UPDATE user set password='$password' WHERE id=$user_id";
			$result = mysqli_query($this->conn,$query) or die("Database_class error in function update_password : ".mysqli_error($this->conn));
			$this->disconnect();
		}
// -----------------REVIEW---------------
		public function read_review($website_id){
			$this->connect();
			$query = "SELECT u.firstname,r.description,r.rating,r.dtoi from user u,review r WHERE r.website_id=$website_id AND r.user_id=u.id ORDER BY r.dtoi DESC LIMIT 10";
			$result = mysqli_query($this->conn,$query) or die("Database_class error in function read_review : ".mysqli_error($this->conn));
			$this->disconnect();
			if((mysqli_num_rows($result))<=0){
				return NULL;
			}
			else{
				return $result;
			}
		}

		public function write_review($website_id,$user_id,$rating,$description){
			$this->connect();
			$description = mysqli_real_escape_string($this->conn,$description);// The real_escape_string() / mysqli_real_escape_string() function escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection.
			$query ="INSERT INTO review (website_id,user_id,rating,description) VALUES ('$website_id','$user_id','$rating','".$description."')";
			$result = mysqli_query($this->conn,$query) or die("Database_class error in function write_review : ".mysqli_error($this->conn));
			$this->disconnect();
			return $result;
		}
// ---------------------WEBSITE DETAIL-------------------
		public function read_website($website){
			$this->connect();
			$query = "";
			if(is_integer($website)){
				$query = "SELECT * from website_detail_statistic WHERE id=$website";
			}
			else if(is_string($website)){
				$query = "SELECT * from website_detail_statistic WHERE name='$website'";
			}
			$result = mysqli_query($this->conn,$query) or die("Database_class error in function read_website : ".mysqli_error($this->conn));
			$this->disconnect();
			if((mysqli_num_rows($result))<=0){
				return NULL;
			}
			else{
				return $result;
			}
		}
		public function read_website_related($website){
			$disallowed = array("%","*","`","_","/");
			foreach ($disallowed as $value) {
				if(strrpos($website, $value)!==false){
					return NULL;
				}
			}
			$this->connect();
			if(strlen($website)<=2)
				$query = "SELECT * from website_detail_statistic WHERE name LIKE '".$website."%' AND name!='$website'";
			else
				$query = "SELECT * from website_detail_statistic WHERE name LIKE '%".$website."%' AND name!='$website'";
	
			$result = mysqli_query($this->conn,$query) or die("Database_class error in function read_website : ".mysqli_error($this->conn));
			$this->disconnect();
			if((mysqli_num_rows($result))<=0){
				return NULL;
			}
			else{
				return $result;
			}
		}
		public function read_website_liked($user_id){
			$this->connect();
			$query = "SELECT wds.id,wds.logourl,wds.name,wds.description,wds.dtoi,wds.reviews,wds.likes,wds.dislikes FROM likes l,website_detail_statistic wds WHERE l.website_id=wds.id AND l.user_id=$user_id LIMIT 10";
			$result = mysqli_query($this->conn,$query) or die("Database_class error in function read_website_liked : ".mysqli_error($this->conn));
			$this->disconnect();
			if((mysqli_num_rows($result))<=0){
				return NULL;
			}
			else{
				return $result;
			}
		}		
		public function read_website_disliked($user_id){
			$this->connect();
			$query = "SELECT wds.id,wds.logourl,wds.name,wds.description,wds.dtoi,wds.reviews,wds.likes,wds.dislikes FROM dislikes d,website_detail_statistic wds WHERE d.website_id=wds.id AND d.user_id=$user_id LIMIT 10";
			$result = mysqli_query($this->conn,$query) or die("Database_class error in function read_website_disliked : ".mysqli_error($this->conn));
			$this->disconnect();
			if((mysqli_num_rows($result))<=0){
				return NULL;
			}
			else{
				return $result;
			}
		}		
		public function write_website($website_name,$website_description,$logourl,$user_id){
			$this->connect();
			$website_description = mysqli_real_escape_string($this->conn,$website_description);
			$query ="INSERT INTO website(name,description,logourl,user_id) VALUES ('".$website_name."','".$website_description."','".$logourl."','".$user_id."')";
			$result = mysqli_query($this->conn,$query) or die("Database_class error in function write_website: ".mysqli_error($this->conn));
			$this->disconnect();
			return $result;
		}
		public function check_exitance_of_websitename($websitename){
			$this->connect();
			$query = "SELECT name from website WHERE name='$websitename'";
			$row = mysqli_num_rows(mysqli_query($this->conn,$query));
			$this->disconnect();
			return $row;
		}
// ----------------------LIKES AND DISLIKES-------------------------------------------
		public function read_like_dislike($website_id,$user_id){
			$this->connect();
			$query = "SELECT * from likes WHERE website_id='$website_id' AND user_id='$user_id'";
			$row_likes = mysqli_num_rows(mysqli_query($this->conn,$query));

			$query = "SELECT * from dislikes WHERE website_id='$website_id' AND user_id='$user_id'";
			$row_dislikes = mysqli_num_rows(mysqli_query($this->conn,$query));
			$this->disconnect();
			
			if($row_likes==1)
				return "like";
			else if($row_dislikes==1)
				return "dislike";
			else 
				return NULL;	
		}
		public function write_like_dislike($value,$website_id,$user_id){
			$this->connect();
			$query="";
			if($value=="like"){
				$query = "DELETE from dislikes WHERE website_id='$website_id' AND user_id='$user_id'";
				mysqli_query($this->conn,$query);
				$query = "INSERT INTO likes(website_id,user_id) VALUES ('".$website_id."','".$user_id."')";
			}
			else if($value=="dislike"){
				$query = "DELETE from likes WHERE website_id='$website_id' AND user_id='$user_id'";
				mysqli_query($this->conn,$query);
				$query = "INSERT INTO dislikes(website_id,user_id) VALUES ('".$website_id."','".$user_id."')";
			}
			else if($value=="liked"){
				$query = "DELETE from likes WHERE website_id='$website_id' AND user_id='$user_id'";
			}
			else if($value=="disliked"){
				$query = "DELETE from dislikes WHERE website_id='$website_id' AND user_id='$user_id'";
			}

			mysqli_query($this->conn,$query);

		}
	} // database_api class ending
?>