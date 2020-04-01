<?php
session_start();
if(!isset($_SESSION['user_name'])){ // to stop coming to this page directly
    header("location:../index.php");
}

    include "../Database/Database_api.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="detailreview.css">
    <link rel="stylesheet" type="text/css" href="../master/masterheader.css">
    <link rel="stylesheet" type="text/css" href="Search.css">
</head>
<body>

<?php include "../master/masterheader.php"; ?>

<div class="row">

    <?php include "../master/leftColumnOfMainRow.php"; ?>    <!-- to add left column -->
    <div class="rightcolumn">
<?php 
 //  letest post-------------------------------------------------------------      
        // $result = $database->read_website_related($_GET['search']);
        // if($result!=NULL){
        //     echo "<div class='MainView'>";
        //     echo "<h2>Related Search</h2>";
            
        //     while($row=mysqli_fetch_assoc($result)){
            
        //         echo "<a href='detailreview.php?website_id=".$row['id']."&website_name=".$row['name']."'>";
        //             echo "<div class='mini_website_detail'>";
        //                 echo "<img src='../img/".$row['imgurl']."' id='mini_logo' height='50' width='50'>";
        //                 echo "<h2>".$row['name']."</h2>";
        //                 echo "<img src='../img/like.png'>".$row['likes'];
        //                 echo " <img src='../img/dislike.jpg'>".$row['dislikes'];
        //         echo "</div></a>"; 
        //     }           
        //     echo "</div>";
        // }
?>
<!-------------------------------------------------------------------------------------------------------------------------->



    </div><!--Right column div end--->    
</div><!--Row div end--->

<div class="footer">
  <h2>Footer</h2>
</div>


</body>
</html>