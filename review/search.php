<?php
    include "../testdb.php";

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
            <div class="fakeimg" style="height:100px;">Image</div>
            <p>Some text about me in English</p>
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
$result = $database->fetch_website(3);
$row=mysqli_fetch_assoc($result);
      echo "<div class='MainView'>";
            for ($i=0; $i < 10; $i++) { 
            	# code...
            echo "<form action='detailreview.php'>";
            echo "<button type='submit'>";
	            echo "<div class='mini_website_detail'>";
					echo "<img src='../img/1_youtube.png' id='mini_logo' height='50' width='50'>";
					echo "<h2>Youtube</h2>";
					echo "<img src='../img/like.png'>3000";
					echo "<img src='../img/dislike.jpg'>3000";
				echo "</div>";
			echo "</button></form>";
            }
      
      echo "</div>";
?>

    </div><!--Right column div end--->    
</div><!--Row div end--->

<div class="footer">
  <h2>Footer</h2>
</div>


</body>
</html>