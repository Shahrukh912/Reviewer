<?php
    session_start();
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

    <?php include "../master/leftColumnOfMainRow.php" ?>    <!-- to add left column -->
    
    <div class="rightcolumn">
<!---------------DIV that displays details of the website -->
        <div class="MainView">
            <form action="upload_website.php" method="Post" enctype="multipart/form-data">
                <h1>Enter Details of the Website</h1>
                <table>
                    <tr>
                        <td>Name </td><td><input type="text" name="txt_webname" required="required"></td>
                    </tr>
                    <tr>
                        <td>Description </td><td><textarea name="website_description" required="required"></textarea></td>
                    </tr>
                    <tr>
                        <td>Select Logo </td><td><input type="file" name="file_weblogo" required="required"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="webdetail_submit" value="Submit"> </td>
                        <td><input type="reset" name="reset" value="Reset"></td>
                    </tr>
                </table>
            </form>
        </div>

    </div><!--Right column div end--->    
</div><!--Row div end--->

<div class="footer">
  <h2>Footer</h2>
</div>


</body>
</html>