<?php
session_start();
	
	if (isset($_POST['username_submit'])) { // true if it is self postback
		$_SESSION['username_selected'] = "true";
		header("location:password.php");
	}
	else if(isset($_POST['signup_submit'])){ // true if index.php has posted data on it
		// $firstname = $_POST['firstname'];
		// $lastname = $_POST['lastname'];
		// $gender = $_POST['gender'];
		// $dob = $_POST['dob'];
		// $email = $_POST['email'];
		// $country = $_POST['country'];
		$user = array('firstname' => $_POST['firstname'],'lastname' => $_POST['lastname'],'gender' => $_POST['gender'],'dob' => $_POST['dob'],'email' => $_POST['email'],'country' => $_POST['country']);
		print_r($user);
	}
	else{ // to stop coming to this page using direct url.
		header("location:../index.php"); 
		exit();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../index.css">

<!-------------------------------------------------------------------------------------------------->


</head>

<body>
<div class="background-image"></div>
<div class="signuppopup" style="display: block;">
	<div class="signup">
		
		<form class="box" action="<?php $_PHP_SELF?>" method="post">
			<h1>Select Username</h1>
			 <input type="text" name="username" placeholder="Select a Username" required="required">
			
			 <input type="submit" name="username_submit" value="Next">
		</form>
		
	</div>
</div>

</body>
</html>