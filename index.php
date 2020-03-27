<?php
session_start();
	include "Database/Database_api.php";
	$_is_auth_error = 0;

/*-----------------ON SUBMIT BUTTON OF LOGIN CLICK------------------*/
	if(isset($_POST["loginsubmit"])!=NULL){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$database = new Database_api("reviewer");
		$row = $database->authenticate($username,$password);

		if($row==1){
			header("location:review/detailreview.php");
		}
		else
		{
			$_is_auth_error = 1;
		}
	}
/*----------------------------------------------------------*/
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">

<!-------------------------------------------------------------------------------------------------->
	<script type="text/javascript">
		function popupshow(type,flag){
			if(type.localeCompare("login")==0){
				var x = document.getElementsByClassName("loginpopup");
				x[0].style.display=(flag==1)?"block":"none";
			}
			if(type.localeCompare("signup")==0){
				var x = document.getElementsByClassName("signuppopup");
				x[0].style.display=(flag==1)?"block":"none";
			}
		}

	</script>
</head>

<body>
<div class="background-image"></div>
<div class="body-content">
	<p id="maintitle">Reviewer</p>
	<p id="subtitle">We Give Review to other websites</p>
	<button class="mainbut" onclick='popupshow("login",1)'>Login</button>
	<button class="mainbut" onclick='popupshow("signup",1)'>Signup</button>
</div>

<h2 id="AuthError" style="display: <?php echo ($_is_auth_error==1)?'block':'none'?>;">INCORRECT USERNAME OR PASSWORD.</h2>

<?php
	if(isset($_SESSION['registration_success'])){
		echo "<h2 id='registration_success_message' style='color:green;'>REGISTRATION SUCCESSFULL</h2>";
		unset($_SESSION['registration_success']);
	}
?>

<div class="loginpopup">
	<div class="login">
		<img src="img/cross.png" onclick="popupshow('login',0)"/>
		
		<form class="box" action="<?php $_PHP_SELF?>" method="post">
			<h1>Login</h1>
			 <input type="text" name="username" placeholder="Username">
			 <input type="password" name="password" placeholder="Password">
			 <input type="submit" name="loginsubmit" value="Login">
		</form>
		
	</div>
</div>

<div class="signuppopup">
	<div class="signup">
		<img src="img/cross.png" onclick="popupshow('signup',0)"/>
		
		<form class="box" action="Registration/securityDetail.php" method="post">
			<h1>Fill Your Detail</h1>
			 <input type="text" name="firstname" placeholder="Enter your firstname" required="required">
			 <input type="text" name="lastname" placeholder="Enter your lastname" required="required">
			 <select id="gender" name="gender">
				  <option value="Male" selected="selected">Male</option>
				  <option value="Female">Female</option>
				  <option value="other">Other</option>
			 </select> 
			 <input type="date" name="dob" required>
			 <input type="email" name="email" placeholder="Enter your email">
			 <select id="country" name="country">
				  <option value="India">India</option>
				  <option value="Pakistan">Pakistan</option>
				  <option value="China">China</option>
				  <option value="Sri Lanka">Sri Lanka</option>
				  <option value="Myanmar">Myanmar</option>
				  <option value="Japan">Japan</option>
			 </select>
			 <input type="submit" name="signup_submit" value="Next">
		</form>
		
	</div>
</div>

</body>
</html>