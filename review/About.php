<?php
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="detailreview.css">
    <link rel="stylesheet" type="text/css" href="../master/masterheader.css">
    <link rel="stylesheet" type="text/css" href="EditProfile.css">

</head>
<body>

<?php include "../master/masterheader.php"; ?>

<div class="row">

    <?php include "../master/leftColumnOfMainRow.php" ?>    <!-- to add left column -->
    
    <div class="rightcolumn"> <!-- Rigth column div start here -->


<!---------------DIV that displays About -->
        <div class="MainView">
            <h1>PHP Mini Project</h1><br>
            <h2>Created By:</h2>
            <p>Shahrukh Siddiqui</p>
            <p>Faiz Khan</p>
            <p>Damin Barot</p>
        </div>

    </div><!--Right column div end--->    
</div><!--Row div end--->


<div class="footer">
  <h2>Footer</h2>
</div>


</body>
</html>