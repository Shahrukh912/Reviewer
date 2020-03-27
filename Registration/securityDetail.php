<?php
session_start();
$username_available = 'true';
	

	if(isset($_POST['signup_submit'])){ // true if index.php has posted data on it
		$_SESSION['user_detail'] = array('firstname' => $_POST['firstname'],'lastname' => $_POST['lastname'],'gender' => $_POST['gender'],'dob' => $_POST['dob'],'email' => $_POST['email'],'country' => $_POST['country']);
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
	<script type="text/javascript">
	    function Validate() {
	        var password = document.getElementById("txtPassword").value;
	        var confirmPassword = document.getElementById("txtConfirmPassword").value;
	        if (password != confirmPassword) {
	            alert("Passwords do not match.");
	            return false;
	        }
	        // if (password.length < 8) {
	        // 	alert("Password must have minimun 8 characters");
	        // 	return false;
	        // }
	        return true;
	    }
	</script>

</head>

<body>
<div class="background-image"></div>
<div class="signuppopup" style="display: block;">
	<div class="signup">
		
		<form class="box" action="register.php" method="post">
			<h1>Select Username and Password</h1>
			 <input type="text" name="username" placeholder="Select a Username" required="required">
			 <p style="font-size:12px; color: red; display: <?php echo ($username_available==false)?'block':'none'?>;">Username Already Taken . Try adding number at the end.</p>	
			 
			 <input type="password" id="txtPassword" name="password" placeholder="Select Password" required="required">
			 <input type="password" id="txtConfirmPassword" name="confirm_password" placeholder="Confirm Password" required="required">

			 <input type="submit" id="btnSubmit" name="username_pass_submit" value="Submit" onclick="return Validate()">		
		</form>
		
	</div>
</div>

</body>
</html>