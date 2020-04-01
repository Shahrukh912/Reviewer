    <!-- The Left side column showing user name, add new website etc -->
    <div class="leftcolumn">
        <div class="card">
            <a href="Profile.php"><h2><?php echo $_SESSION['user_name']?></h2></a>
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