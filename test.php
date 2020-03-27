<?php 
$_SESSION['registration_success'] = true;
echo $_SESSION['registration_success'];
echo (isset($_SESSION['registration_success']))?'block':'none';
echo mktime();
echo "<br>";
echo time();
?>