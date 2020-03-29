<?php
session_start();
if(!isset($_POST['webdetail_submit'])){ // to stop coming to this page using direct url.
	header("location:../index.php"); 
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
   <title></title>
   <link rel="stylesheet" type="text/css" href="general_color_pelete_bg_centered_div.css">
</head>
<body>
<div class="centered_aligned_div">

<?php

include "../Database/Database_api.php";

$database = new Database_api("reviewer");
$row = $database->check_exitance_of_websitename($_POST['txt_webname']);

	if($row==0){

		if(isset($_FILES['file_weblogo'])){
		    $errors= array();
		    $file_name = $_FILES['file_weblogo']['name'];
		    $file_size =$_FILES['file_weblogo']['size'];
		    $file_tmp =$_FILES['file_weblogo']['tmp_name'];
		    $file_type=$_FILES['file_weblogo']['type'];

		    $file_ext=strtolower(end(explode('.',$_FILES['file_weblogo']['name'])));
		    
		    $extensions= array("jpeg","jpg","png");
		    
		    if(in_array($file_ext,$extensions)=== false){
		       $errors[]="Extension not allowed, please choose a JPEG or PNG file.";
		    }
		      
		    if($file_size > 2097152){
		       $errors[]='File size must not be larger than 2 MB';
		    }

		    if(empty($errors)==true){
		        
		        move_uploaded_file($file_tmp,"../img/website_logos/".$file_name);
		        $result =  $database->write_website($_POST['txt_webname'],$_POST['website_description'],$file_name,$_SESSION['user_id']); // writing data into database.
		        
		        if($result!=true){
		            echo "<h1 style='color:red;'>Error in Inserting Website.</h1>";
		            echo "<a class='a_button' href='add_new_website.php'>Add trying Again</a>";
		        }
		        else
		        {
		        	echo "<h1 style='color:green;'>Website has been successfully registered.</h1>";
		        	 echo "<a class='a_button' href='search.php'>Home</a>";
		        }
    		}
    		else{
		        while($a = each($errors))
		           echo "<h1 style='color:red;'>".$a[1]."</h1>";
		           echo "<a class='a_button' href='add_new_website.php'>Add trying Again</a>";
		           exit();
    		}
		      
		}
	}
	else{
		echo "<h1 style='color:red;'>Website already exists</h1>";
		echo "<a class='a_button' href='add_new_website.php'>Add trying Again</a>";
	}



?>

</div>
</body>
</html>