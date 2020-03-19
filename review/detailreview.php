<?php
    include "../testdb.php";
    if(isset($_POST['review_submit'])){
        $text = $_POST['Opinion'];
        $database = new Database_api("reviewer");
        $result = $database->write_review(1,$text,"Shahrukh",4);
        if($result!=true){
            echo "Error in Inserting review";
        }
        $self_url = $_SERVER["PHP_SELF"];
        header("location:$self_url");//to stop repost in database on browser refresh button
        exit(); 
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

      <div class="MainView">
            <div class="MainViewleftcolumn">
                <img src="../img/test.jpg"/>
            </div>
            <div class="MainViewrightcolumn">
                <h1>Website</h1>
                <h3>Average rating : 5.5</h3>
                <h3>Number of review : 5m</h3>
                <h3>Likes : 7b</h3>
                <h3>Dislikes : 1000</h3>
            </div>
      </div>
<!-- ---------REVIEW BOX----------- -->
<?php  
$database = new Database_api("reviewer");
$result = $database->fetch_review(1);
if($result !=NULL){
    while ($row=mysqli_fetch_assoc($result)) {
        # code...
      echo "<div class='card'>";
        echo "<h2>".$row["name"]."</h2>";
        echo "<h5>Title description, Sep 2, 2017</h5>";
        echo "<p>".$row["desciption"]."</p>";
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
      <div class="card">
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <textarea name="Opinion" cols="100" rows="5" placeholder="Write Your Opinion"></textarea><br>
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