<?php
session_start();
	if(!isset($_SESSION['username_selected'])){ // to stop coming to this page using direct url.
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


	</script>
</head>

<body>
<div class="background-image"></div>
<div class="signuppopup" style="display: block;">
	<div class="signup">
		
		<form class="box" action="<?php $_PHP_SELF?>" method="post">
			<h1>Select Password</h1>
			 <input type="password" name="password" placeholder="Select Password" required="required">
			 <input type="password" name="confirm_password" placeholder="Confirm Password" required="required">
			
			 <input type="submit" name="username_submit" value="Next">
		</form>
		
	</div>
</div>

</body>
</html>