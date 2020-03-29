<?php
session_start();
    include "../Database/Database_api.php";
    if(isset($_POST['review_submit'])){
        $database = new Database_api("reviewer");
        $result = $database->write_review($_SESSION['website_id'],$_SESSION['user_id'],$_POST['rating'],$_POST['Opinion']);
      
        if($result!=true){
            echo "Error in Inserting review";
        }
        $self_url = $_SERVER["PHP_SELF"];
        header("location:$self_url?website_id=".$_SESSION['website_id']."");//to stop repost in database on browser refresh button
        exit(); 

    }
    else if(isset( $_GET['website_id'])){ //website id is posted by clicking it on search page
        $_SESSION['website_id'] = $_GET['website_id'];
    }
    else{
        header("location:home.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="detailreview.css">
    <link rel="stylesheet" type="text/css" href="../master/masterheader.css">
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
$result = $database->read_website(intval($_GET['website_id']));
$row=mysqli_fetch_assoc($result);
      echo "<div class='MainView'>";
            echo "<div class='MainViewleftcolumn'>";
                echo "<img src='../img/website_logos/".$row['logourl']."'/>";
            echo "</div>";
            echo "<div class='MainViewrightcolumn'>";
                echo "<table><th><h1>".$row['name']."</h1></th>";
                echo "<tr><td><h3> Average rating </h3></td><td><h3>".$row['rating']."</h3></td><tr>";
                echo "<tr><td><h3> No of Reviews </h3></td><td><h3>".$row['reviews']."</h3></td><tr>";
                echo "<tr><td><h3> Likes </h3></td><td><h3>".$row['likes']."</h3></td><tr>";
                echo "<tr><td><h3> Dislikes </h3></td><td><h3>".$row['dislikes']."</h3></td><tr></table>";
            echo "</div>";
            echo "<div class='MainViewfooter'><h3>Description</h3><p>".$row['description']."</p></div>";
      echo "</div>";
?>
<!-- ---------REVIEW BOX----------- -->
<?php  
$result = $database->read_review(intval($_GET['website_id']));
if($result !=NULL){
    while ($row=mysqli_fetch_assoc($result)) {
        # code...
      echo "<div class='card'>";
        echo "<h2>".$row["firstname"]."</h2>";
        echo "<h5>".$row['dtoi']."</h5>";
        echo "<p>".nl2br(htmlentities($row["description"]))."</p>";
      echo "</div>";
    }
}
else{
    echo "<div class='card'>";
        echo "<h2>No Review Yet</h2>";
      echo "</div>";
}
?>
<!-- ---------------------------------------------------------------- -->
      <div class="card ">
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <textarea name="Opinion" cols="100" rows="5" placeholder="Write Your Opinion" required="required"></textarea><br>
                Rating : <select name="rating">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5" selected="selected">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
             </select> Out of 10<br>
                <input type="submit" name="review_submit" value="Submit">
            </form>
      </div>
    </div><!--Right column div end--->    
</div><!--Row div end--->

<div class="footer">
  <h2>Footer</h2>
</div>


</body>
</html>