<?php
    include "../Database/Database_api.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="detailreview.css">
    <link rel="stylesheet" type="text/css" href="../master/masterheader.css">
    <link rel="stylesheet" type="text/css" href="search.css">
</head>
<body>

<?php include "../master/masterheader.php"; ?>

<div class="row">
    <div class="leftcolumn">
        <div class="card">
            <a href=""><h2>About Me</h2></a>
            <a class="a_button" href="add_new_website.php">Add New Website</a>
        </div>
        <div class="card">
            <h3>Popular Post</h3>
            <div class="fakeimg">Image</div><br>
            <div class="fakeimg">Image</div><br>
            <div class="fakeimg">Image</div>
        </div>
        <div class="card">
            <h3>Follow Me</h3>
            <p>Some text..</p>
        </div>
    </div>
    
    <div class="rightcolumn">
<!---------------DIV that displays details of the website -->
<?php 
$database = new Database_api("reviewer");
$result = $database->read_website($_GET['search']);
if($result!=NULL){
    $row=mysqli_fetch_assoc($result);
        

          echo "<div class='MainView'>";
          echo "<h2>Search Result</h2>";
                echo "<form action='detailreview.php' method='POST'>";
                echo "<button type='submit' name='website_id' value='".$row['id']."'>";
    	            echo "<div class='mini_website_detail'>";
    					echo "<img src='../img/".$row['imgurl']."' id='mini_logo' height='50' width='50'>";
    					echo "<h2>".$row['name']."</h2>";
    					echo "<img src='../img/like.png'>".$row['likes'];
    					echo " <img src='../img/dislike.jpg'>".$row['dislikes'];
    				echo "</div>";
    			echo "</button></form>";
          
          echo "</div>";
}
else
{
    echo "<div class='MainView'>";
          echo "<h2>Search Result</h2>";
          echo "<h3 style='color:red;'>No Result found for '".$_GET['search']."'</h3>";
          
          echo "</div>";
}
?>

    </div><!--Right column div end--->    
</div><!--Row div end--->

<div class="footer">
  <h2>Footer</h2>
</div>


</body>
</html>