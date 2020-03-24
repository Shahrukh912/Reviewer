<?php  
$errors= array();
$errors[]="Extension not allowed, please choose a JPEG or PNG file.";
$errors[]='File size must not be larger than 2 MB';
 while($a = each($errors))
		           echo "<h1 style='color:red;'>".$a[1]."</h1>";
?>