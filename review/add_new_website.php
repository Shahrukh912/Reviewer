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
        <div class="MainView">
            <form action="upload_website.php" method="Post" enctype="multipart/form-data">
                <h1>Enter Details of the Website</h1>
                <table>
                    <tr>
                        <td>Name </td><td><input type="text" name="txt_webname" required="required"></td>
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