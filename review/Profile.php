<?php
 session_start();
if(!isset($_SESSION['user_name'])){ // to stop coming to this page directly
    header("location:../index.php");
}

    include "../Database/Database_api.php";
    $database = new Database_api("reviewer");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="detailreview.css">
    <link rel="stylesheet" type="text/css" href="Search.css">
    <script src="../index.js"></script>
    <style type="text/css">
        .profile td{
            padding: 5px 35px 5px 2px;
        }
        .profile h5{
            position: absolute;
            right: 20px;
            top:0;
        }
        #editprofilebut{
            display: inline-block;
            text-decoration:none;
            border-radius: 5px;
            background-color:#3498db;
            color: white;
            padding:10px 50px;
            margin-top:10px;
        }
    </style>
</head>
<body>

<?php include "../master/masterheader.php"; ?>

<div class="row">
    
    <?php include "../master/leftColumnOfMainRow.php" ?>    <!-- to add left column -->
    
    <div class="rightcolumn">
<?php    
    //display if message has been set----------------------
    if(isset($_GET['msg'])){
        echo "<h1 style='color:green'>".$_GET['msg']."</h1>";
    }

        $result = $database->read_user($_SESSION['user_id']);
        if($result!=NULL){
            echo "<div class='MainView profile'>";
                echo "<h1>Profile</h1>";
                
                $row=mysqli_fetch_assoc($result);
                
                echo "<table>";
                    echo "<tr><td><b>Name</b></td><td>".$row['firstname']." ".$row['lastname']."</td></tr>";
                    echo "<tr><td><b>Gender</b></td><td>".$row['gender']."</td></tr>";
                    echo "<tr><td><b>Email</b></td><td>".$row['email']."</td></tr>";
                    echo "<tr><td><b>Country</b></td><td>".$row['country']."</td></tr>";
                    echo "<tr><td><b>BirthDay</b></td><td>".date("d-M-Y",strtotime($row['dob']))."</td></tr>";
                    echo "<tr><td><b>Username</b></td><td>".$row['username']."</td></tr>";

                echo "</table>";
                echo "<h5>Registered on : ".date("d-M-Y h:i:s a",strtotime($row['dtoi']))."</h5>";
                echo "<a id='editprofilebut' href='EditProfile.php'>Edit Profile</a>";
            echo "</div>";
          
        }
//------------User Statistical detail-------------------
            echo "<div class='MainView profile'>";
                echo "<h1>Details</h1>";
                
                
                echo "<table>";
                    echo "<tr><td><b>No of Reviews </b></td><td>";
            $row=mysqli_fetch_assoc($database->execute("SELECT count(user_id)'noofreview' from review where user_id=".$_SESSION['user_id'].""));
                        if($row['noofreview']!=NULL){
                            echo $row['noofreview'];
                        }
                        else
                            echo "0";
                    echo "</td></tr>";
                    
                    echo "<tr><td><b>No of website reviewed </b></td><td>";
            $row=mysqli_fetch_assoc($database->execute("SELECT count(r.website_id)'noofreviedwebsite' FROM (SELECT website_id from review where user_id=".$_SESSION['user_id']." GROUP BY website_id) r"));
                        if($row['noofreviedwebsite']!=NULL){
                            echo $row['noofreviedwebsite'];
                        }
                        else
                            echo "0";
                    echo "</td></tr>";
                    
                    echo "<tr><td><b>No of liked website </b></td><td>";
            $row=mysqli_fetch_assoc($database->execute("SELECT count(user_id)'likes' from likes where user_id=".$_SESSION['user_id'].""));
                        if($row['likes']!=NULL){
                            echo $row['likes'];
                        }
                        else
                            echo "0";
                    echo "</td></tr>";
                    
                    echo "<tr><td><b>No of dislike website</b></td><td>";
            $row=mysqli_fetch_assoc($database->execute("SELECT count(user_id)'dislikes' from dislikes where user_id=".$_SESSION['user_id'].""));
                        if($row['dislikes']!=NULL){
                            echo $row['dislikes'];
                        }
                        else
                            echo "0";
                    echo "</td></tr>";

                    echo "<tr><td><b>No of website created</b></td><td>";
            $row=mysqli_fetch_assoc($database->execute("SELECT count(id)'noofwebsitecreated' from website where user_id=".$_SESSION['user_id'].""));
                        if($row['noofwebsitecreated']!=NULL){
                            echo $row['noofwebsitecreated'];
                        }
                        else
                            echo "0";
                    echo "</td></tr>";
                echo "</table>";
            echo "</div>";
?>
<!-------------------------------------------------------------------------------------------------------------------------->

    </div><!--Right column div end--->    
</div><!--Row div end--->

<?php include "../master/masterfooter.php"; ?> <!-- to add footer -->

</body>
</html>