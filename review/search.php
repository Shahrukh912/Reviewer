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
    <link rel="stylesheet" type="text/css" href="Search.css">
</head>
<body>

<?php include "../master/masterheader.php"; ?>

<div class="row">

    <?php include "../master/leftColumnOfMainRow.php" ?>    <!-- to add left column -->

    
    <div class="rightcolumn">
<!---------------This div is only displayed when search is done -->
<?php 
if (isset($_GET['search'])) {
        $database = new Database_api("reviewer");
        $result = $database->read_website($_GET['search']);
        if($result!=NULL){
            $row=mysqli_fetch_assoc($result);
            
                  echo "<div class='MainView'>";
                  echo "<h2>Search Result</h2>";
                        echo "<a href='detailreview.php?website_id=".$row['id']."&website_name=".$row['name']."'>";
            	            echo "<div class='mini_website_detail'>";
            					echo "<img src='../img/website_logos/".$row['logourl']."' id='mini_logo' height='50' width='50'>";
            					echo "<h2>".$row['name']."</h2>";
            					echo "<img src='../img/like.png'>";
                                if($row['likes']!=NULL){
                                    echo $row['likes']; 
                                }
                                else
                                    echo "0";
            					echo " <img src='../img/dislike.jpg'>";
                                if($row['dislikes']!=NULL){
                                    echo $row['dislikes']; 
                                }
                                else
                                    echo "0";
            				echo "</div></a>";            
                  echo "</div>";
        }
        else
        {
            echo "<div class='MainView'>";
                  echo "<h2>Search Result</h2>";
                  echo "<h3 style='color:red;'>No Exact Result found for '".$_GET['search']."'</h3>";
                  
            echo "</div>";
        }
 //  related Search -------------------------------------------------------------      
        $result = $database->read_website_related($_GET['search']);
        if($result!=NULL){
            echo "<div class='MainView'>";
            echo "<h2>Related Search</h2>";
            
            while($row=mysqli_fetch_assoc($result)){
            
                echo "<a href='detailreview.php?website_id=".$row['id']."&website_name=".$row['name']."'>";
                    echo "<div class='mini_website_detail'>";
                        echo "<img src='../img/website_logos/".$row['logourl']."' id='mini_logo' height='50' width='50'>";
                        echo "<h2>".$row['name']."</h2>";
                        echo "<img src='../img/like.png'>";
                                if($row['likes']!=NULL){
                                    echo $row['likes']; 
                                }
                                else
                                    echo "0";
                                echo " <img src='../img/dislike.jpg'>";
                                if($row['dislikes']!=NULL){
                                    echo $row['dislikes']; 
                                }
                                else
                                    echo "0";
                    echo "</div></a>"; 
            }           
            echo "</div>";
        }
}//if (isset($_GET['search']) --  ends here
?>
<!-------------------------------------------------------------------------------------------------------------------------->



    </div><!--Right column div end--->    
</div><!--Row div end--->

<?php include "../master/masterfooter.php"; ?> <!-- to add footer -->

</body>
</html>