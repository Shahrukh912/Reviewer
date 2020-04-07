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

    <?php include "../master/leftColumnOfMainRow.php"; ?>    <!-- to add left column -->
    <div class="rightcolumn">
<?php 
$database = new Database_api("reviewer");
//------------------TRENDING----------------------------------------------
    $result = $database->execute("SELECT * from website_detail_statistic ORDER BY likes DESC,reviews DESC LIMIT 10");
        if($result!=NULL){
            
            echo "<div class='MainView'>";
            echo "<h2>Trending website</h2>";
            $val=1;
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
                            echo "<p style='color:red;margin-bottom:0px'>#$val</p>";
                    echo "</div></a>";
                $val++;            
            }//while ends
                echo "</div>";
        }
        else
        {
            echo "<div class='MainView'>";
                  echo "<h2>Search Result</h2>";
                  echo "<h3 style='color:red;'>No Trending website</h3>";
                  
            echo "</div>";
        }
//--------------------------recent added---------------------------------
        $result = $database->execute("SELECT * from website_detail_statistic ORDER BY dtoi DESC LIMIT 10");
        if($result!=NULL){
            
            echo "<div class='MainView'>";
            echo "<h2>Latest website</h2>";
            $val=1;
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
                            echo "<p style='color:red;margin-bottom:0px'>#$val</p>";
                    echo "</div></a>";
                $val++;            
            }//while ends
                echo "</div>";
        }
        else
        {
            echo "<div class='MainView'>";
                  echo "<h2>Search Result</h2>";
                  echo "<h3 style='color:red;'>No Latest website</h3>";
                  
            echo "</div>";
        }
//------------------Most Liked----------------------------------------------
    $result = $database->execute("SELECT * from website_detail_statistic ORDER BY likes DESC LIMIT 10");
        if($result!=NULL){
            
            echo "<div class='MainView'>";
            echo "<h2>Most Liked website</h2>";
            $val=1;
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
                            echo "<p style='color:red;margin-bottom:0px'>#$val</p>";
                    echo "</div></a>";
                $val++;            
            }//while ends
                echo "</div>";
        }
        else
        {
            echo "<div class='MainView'>";
                  echo "<h2>Search Result</h2>";
                  echo "<h3 style='color:red;'>No Most Liked website</h3>";
                  
            echo "</div>";
        }
?>
<!-------------------------------------------------------------------------------------------------------------------------->



    </div><!--Right column div end--->    
</div><!--Row div end--->

<?php include "../master/masterfooter.php"; ?> <!-- to add footer -->

</body>
</html>