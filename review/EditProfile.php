<?php
 session_start();
if(!isset($_SESSION['user_name'])){ // to stop coming to this page directly
    header("location:../index.php");
}
    include "../Database/Database_api.php";
    $database = new Database_api("reviewer");

    if(isset($_POST["update_submit"])!=NULL){
        $user_detail = array("firstname"=>$_POST['firstname'],"lastname"=>$_POST['lastname'],"gender"=>$_POST['gender'],"email"=>$_POST['email'],"country"=>$_POST['country'],"dob"=>$_POST['dob']);
        $_SESSION['user_name'] = $_POST['firstname'];
        
        $database->update_user($user_detail,$_SESSION['user_id']);
        header("location:Profile.php?msg=Profile Successfully Edited");

    }
    elseif (isset($_POST["update_cancel_submit"])!=NULL) {
        # code...
        header("location:Profile.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="detailreview.css">
    <link rel="stylesheet" type="text/css" href="../master/masterheader.css">
    <link rel="stylesheet" type="text/css" href="Search.css">
    <link rel="stylesheet" type="text/css" href="EditProfile.css">
</head>
<body>

<?php include "../master/masterheader.php"; ?>

<div class="row">
    
    <?php include "../master/leftColumnOfMainRow.php" ?>    <!-- to add left column -->
    
    <div class="rightcolumn">
<?php    
        $result = $database->read_user($_SESSION['user_id']);
        if($result!=NULL){
            echo "<div class='MainView profile'>";
                echo "<h1>Edit Profile</h1>";
                
                $row=mysqli_fetch_assoc($result);
                
                echo "<form action=".$_SERVER['PHP_SELF']." method='POST'><table>";
                    
                    echo "<tr><td><b>First Name</b></td><td><input type='text' name='firstname' value=".$row['firstname']." placeholder='Enter Your first name' required='required'></td></tr>";
                    
                    echo "<tr><td><b>Last Name</b></td><td><input type='text' name='lastname' value=".$row['lastname']." placeholder='Enter Your last name' required='required'></td></tr>";
                    
                    echo "<tr><td><b>Gender</b></td><td>"; ?>
                        <select id="gender" name="gender">
                              <option value="Male" <?php if($row['gender']=='Male'){echo "selected='selected'";}?> >Male</option>
                              <option value="Female" <?php if($row['gender']=='Female'){echo "selected='selected'";}?> >Female</option>
                              <option value="other">Other</option>
                        </select>
             <?php  echo "</td></tr>";
                    
                    echo "<tr><td><b>Email</b></td><td><input type='email' name='email' placeholder='Enter your email' value='".$row['email']."' required='required'></td></tr>";
                    
                    echo "<tr><td><b>Country</b></td><td>"; ?>
                        <select id="country" name="country">
                        <?php $countries=array("India","Pakistan","China","Nepal","Japan","Russia","Sri Lanka");
                        foreach ($countries as $country) {
                            echo "<option value='$country' "; 
                                if($country==$row['country']){echo "selected='selected'";}
                            echo ">$country</option>";
                        }
                        echo "</select></td></tr>";


                    echo "<tr><td><b>BirthDay</b></td><td><input type='date' name='dob' value='".date("Y-m-d",strtotime($row['dob']))."' required></td></tr>";
                    
                    echo "<tr><td><input type='submit' name='update_submit' value='Update Profile'></td>";
                    echo "<td><input type='submit' name='update_cancel_submit' value='Cancel'></td></tr>";
               
                echo "</table></form>";
                echo "<h5>Registered on : ".date("d-M-Y h:i:s a",strtotime($row['dtoi']))."</h5>";
            echo "</div>";// main view div ends here
          
        }

?>
<!-------------------------------------------------------------------------------------------------------------------------->

    </div><!--Right column div end--->    
</div><!--Row div end--->

<div class="footer">
  <h2>Footer</h2>
</div>


</body>
</html>