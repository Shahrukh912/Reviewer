<?php
session_start();
include "../Database/Database_api.php";
$database = new Database_api("reviewer");
    if(isset($_POST['review_submit'])){
        $database = new Database_api("reviewer");
        $result = $database->write_review($_GET['website_id'],$_SESSION['user_id'],$_POST['rating'],$_POST['Opinion']);
      
        if($result!=true){
            echo "Error in Inserting review";
        }
        $self_url = $_SERVER["PHP_SELF"];
        header("location:$self_url?website_id=".$_GET['website_id']."");//to stop repost in database on browser refresh button
        exit(); 

    }
    else  if(isset($_POST['like_dislike'])){
        $database->write_like_dislike($_POST['like_dislike'],$_GET['website_id'],$_SESSION['user_id']);
    }
    // else if(isset( $_GET['website_id'])){ //website id is posted by clicking it on search page
    //     $_SESSION['website_id'] = ;
    // }
    // else{
    //     header("location:home.php");
    // }

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

    <?php include "../master/leftColumnOfMainRow.php" ?>    <!-- to add left column -->
    
    <div class="rightcolumn">
<!---------------DIV that displays details of the website -->
<?php 
$result = $database->read_website(intval($_GET['website_id']));
$row=mysqli_fetch_assoc($result);
      echo "<div class='MainView'>";
            echo "<div class='MainViewleftcolumn'>";
                echo "<img src='../img/website_logos/".$row['logourl']."'/>";
            echo "</div>";
            echo "<div class='MainViewrightcolumn'>";
                echo "<table><th><h1>".$row['name']."</h1></th>";
                /////////////RATING///////////////////////////////////
                echo "<tr><td><h3> Average rating </h3></td><td><h3>";
                  if($row['rating']!=NULL){
                    echo round(floatval($row['rating']),2); // to get it in 2 decimal precision
                  }
                  else
                    echo "0";
                echo "</h3></td><tr>";
                /////////////////NO OF REVIEWS//////////////////////
                echo "<tr><td><h3> No of Reviews </h3></td><td><h3>";
                if($row['reviews']!=NULL){
                    echo $row['reviews'];
                  }
                  else
                    echo "0";
                echo "</h3></td><tr>";
                /////////////////LIKES////////////////////////////////
                echo "<tr><td><h3> Likes </h3></td><td><h3>";
                if($row['likes']!=NULL){
                    echo $row['likes'];
                  }
                  else
                    echo "0";
                echo "</h3></td><tr>";
                ////////////////DISLIKES//////////////////////////////
                echo "<tr><td><h3> Dislikes </h3></td><td><h3>";
                if($row['dislikes']!=NULL){
                    echo $row['dislikes'];
                  }
                  else
                    echo "0";
                echo "</h3></td><tr>";
                echo "<tr><td colspan='2'>";

                $result = $database->read_like_dislike($_GET['website_id'],$_SESSION['user_id']);//getting like-dislike data ?>

                <!-- Like Dislike Division -->
                <div class="like_dislike">
                  <form action="<?php $_PHP_SELF?>" method='post'>
                  <input type="submit" name="like_dislike" <?php if($result=='like'){ echo "value='liked' style= 'background-color:#3498db; color:white;' disabled='disabled'";}else{echo "value='like'";} ?>>
                  <input type="submit" name="like_dislike" <?php if($result=='dislike'){ echo "value='disliked' style= 'background-color:#3498db; color:white;' disabled='disabled'";}else{echo "value='dislike'";} ?>>
                   </form>
                </div>

          <?php echo "</td><tr></table>";
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
      echo "<div class='card review_show'>";
        echo "<h2>".$row["firstname"]."</h2>";
        echo "<h5>".$row['dtoi']."</h5>";
        echo "<h6>Rating : ".$row['rating']." out of 10</h6>";
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