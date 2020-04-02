<?php
session_start();
if(!isset($_POST['username_pass_submit'])){ // to stop coming to this page using direct url.
	header("location:../index.php"); 
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
   <title></title>
   <link rel="stylesheet" type="text/css" href="../review/general_color_pelete_bg_centered_div.css">
</head>
<body>
<div class="centered_aligned_div">

<?php
include "../Database/Database_api.php";

	$database = new Database_api("reviewer");
	$row = $database->check_exitance_of_username($_POST['username']);

	if($row!=0)
		$username_available = false;
	else{
		$_SESSION['user_detail']['role'] = "user";
		$_SESSION['user_detail']['username'] = $_POST['username'];
		$_SESSION['user_detail']['password'] = $_POST['password'];
		
		$result = $database->write_user($_SESSION['user_detail']);
		
		if($result!=true){
	        echo "<h1 style='color:red;'>Error in Registration user.</h1>";
	        echo "<a href='../index.php'>Try Again</a>";
	        exit();
	    }
	    else{
	    	$result = $database->get_id_using_authentication($_SESSION['user_detail']['username'],$_SESSION['user_detail']['password']);
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user_id'] = $row['id']; // storing user id in session 
			$_SESSION['user_name'] = $row['firstname']; // storing user name in session
	    	unset($_SESSION['user_detail']);
	    	header("location:../review/Profile.php?msg=You have been Successfully registered");
	    }
	}
?>

</div>
</body>
</html>