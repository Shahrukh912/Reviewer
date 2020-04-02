<?php
session_start();
if(!isset($_SESSION['user_name']) || !isset($_GET['v'])){ // to stop coming to this page directly
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
$database = new Database_api("reviewer");
//------------------Liked Disliked---------------------------------------------
echo "<div class='MainView'>";
    if($_GET['v']=="disliked"){
        $result = $database->read_website_disliked($_SESSION['user_id']);
        echo "<h2>Disliked website By You</h2>";
    }
    else {
        $result = $database->read_website_liked($_SESSION['user_id']);
        echo "<h2>Liked website By You</h2>";
    }        


        if($result!=NULL){ //Result of above query contains actual data
            
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
                
        }
        else
        {
            echo "<h3 style='color:red;'>No website ";
                if($_GET['v']=="disliked"){
                    echo "Disliked";
                }
                else{
                    echo "Liked";
                }  
            echo "</h3>";                
        }
        
echo "</div>"; //mainview div ends here
?>
<!-------------------------------------------------------------------------------------------------------------------------->



    </div><!--Right column div end--->    
</div><!--Row div end--->

<div class="footer">
  <h2>Footer</h2>
</div>


</body>
</html>