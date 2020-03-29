<?php
if(isset($_POST['logout'])){
	session_destroy();
	header("location:../index.php");
}

?>
<div class="HeaderMain">
	<div class="webname">
		<p>Reviewer</p>
	</div>
	<div class="search">
		<form action="../review/Search.php">
			<input type="search" name="search" placeholder="Search for Website" required="required">
			<input type="submit" name="search_submit" value="Search" >
		</form>
	</div>
	<div class="navbuttons">
		<form action="<?php $_PHP_SELF?>" method="post">
		    <button type="submit" formmethod="post">Profile</button>
			<button >About us</button>
			<button type="submit" formmethod="post" name="logout" value="logout">Logout</button>
		</form>
	</div>
</div>
