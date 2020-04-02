    <!-- The Left side column showing user name, add new website etc -->
    <div class="leftcolumn">
        <div class="card">
            <a href="Profile.php"><h2><?php echo $_SESSION['user_name']?></h2></a>
            <a class="a_button" href="add_new_website.php">Add New Website</a>
            <a class="a_button" href="changePassword.php">Change Password</a>
        </div>
        <div class="card">
            <h3>Added By You</h3>
            <a class="a_button" href="Home.php">Home</a>
            <a class="a_button" href="LikedDislikedWebsite.php?v=liked">Liked websites</a>
            <a class="a_button" href="LikedDislikedWebsite.php?v=disliked">disliked websites</a>
        </div>
    </div>