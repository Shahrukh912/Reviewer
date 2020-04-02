<?php
 session_start();
if(!isset($_SESSION['user_name'])){ // to stop coming to this page directly
    header("location:../index.php");
}
    include "../Database/Database_api.php";
    $database = new Database_api("reviewer");
    $msg = "";

    if(isset($_POST["pass_submit"])){

        $result = $database->execute("SELECT * FROM user WHERE id=".$_SESSION['user_id']." AND password='".$_POST['old_pass']."'");
        $row = mysqli_num_rows($result);
        if($row == 1){       
            $database->update_password($_SESSION['user_id'],$_POST['password']);
            $msg = "Password Changed Successfully";
        }
        else{
            $msg = "Incorrect old Password";
        }

    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="detailreview.css">
    <link rel="stylesheet" type="text/css" href="../master/masterheader.css">
    <link rel="stylesheet" type="text/css" href="EditProfile.css">

    <script type="text/javascript">
        function Validate() {
            var password = document.getElementById("txtPassword").value;
            var confirmPassword = document.getElementById("txtConfirmPassword").value;
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            // if (password.length < 8) {
            //  alert("Password must have minimun 8 characters");
            //  return false;
            // }
            return true;
        }
    </script>
</head>
<body>

<?php include "../master/masterheader.php"; ?>

<div class="row">

    <?php include "../master/leftColumnOfMainRow.php" ?>    <!-- to add left column -->
    
    <div class="rightcolumn"> <!-- Rigth column div start here -->

<?php // to display message if any
    if($msg == "Incorrect old Password"){
        echo "<h2 style='color:red'>$msg</h2>";
    }
    else if ($msg != "") {
        echo "<h2 style='color:green'>$msg</h2>";
    }
?>

<!---------------DIV that displays the form to change password -->
        <div class="MainView">
            <form action="<?php $_PHP_SELF?>" method="Post">
                <h1>Change Password</h1>
                <table>
                    <tr>
                        <td>Old Password</td><td><input type="password" name="old_pass" required="required" placeholder="Enter your old Password"></td>
                    </tr>
                    <tr>
                        <td>New Password</td><td><input type="password" id="txtPassword" name="password" placeholder="Select new Password" required="required"></td>
                    </tr>
                    <tr>
                        <td>Confirm Password </td><td><input type="password" id="txtConfirmPassword" name="confirm_password" placeholder="Confirm Password" required="required"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" id="btnSubmit" name="pass_submit" value="Submit" onclick="return Validate()"></td>
                        <td><input type="reset" name="reset" value="Reset"></td>
                    </tr>
                </table>
            </form>
        </div>

    </div><!--Right column div end--->    
</div><!--Row div end--->


<div class="footer">
  <h2>Footer</h2>
</div>


</body>
</html>