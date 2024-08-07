<?php
session_start();
$admin = $_SESSION['isAdmin'];
include("config.php");

// Process review submission
if (isset($_POST['submit'])) {
  $rev = $_POST['review'];
  $read = $_SESSION['bid'];
  $user = $_SESSION['username'];

  $query = "INSERT INTO review (bid, username, rev) VALUES ('$read', '$user', '$rev')";
  $query_run = mysqli_query($con, $query);
  if ($query_run) {
    echo '<script type="text/javascript"> alert("Review Submitted")</script>';
  } else {
    echo '<script type="text/javascript"> alert("Process failed")</script>';
  }
}

// Process adding to shelves
if (isset($_POST['read']) || isset($_POST['reading']) || isset($_POST['wanto'])) {
  $id = $_SESSION['id'];
  $read = $_SESSION['bid'];
  $shelfType = '';

  // Determine the selected shelf type based on the button clicked
  if (isset($_POST['read'])) {
    $shelfType = 'read';
  } elseif (isset($_POST['reading'])) {
    $shelfType = 'reading';
  } elseif (isset($_POST['wanto'])) {
    $shelfType = 'want_to_read';
  }

  // Check if the book already exists in any shelf for the user
  $query_check_shelves = "SELECT * FROM shelves WHERE user_id='$id' AND book_id='$read'";
  $result_check_shelves = mysqli_query($con, $query_check_shelves);

  if (mysqli_num_rows($result_check_shelves) > 0) {
    // Book already exists in a shelf for the user, so update the shelf type
    $query_update_shelf = "UPDATE shelves SET shelf_type='$shelfType' WHERE user_id='$id' AND book_id='$read'";
    $query_run_update_shelf = mysqli_query($con, $query_update_shelf);

    if ($query_run_update_shelf) {
      echo '<script type="text/javascript"> alert("Updated shelf for the book")</script>';
    } else {
      echo '<script type="text/javascript"> alert("Failed to update the shelf")</script>';
    }
  } else {
    // Book does not exist in any shelf, so insert it into the selected shelf
    $query_insert_shelf = "INSERT INTO shelves (user_id, book_id, shelf_type) VALUES ('$id', '$read', '$shelfType')";
    $query_run_insert_shelf = mysqli_query($con, $query_insert_shelf);

    if ($query_run_insert_shelf) {
      echo '<script type="text/javascript"> alert("Added to ' . $shelfType . ' shelf")</script>';
    } else {
      echo '<script type="text/javascript"> alert("Failed to add to the shelf")</script>';
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background-image: url('https://images.unsplash.com/photo-1602498456745-e9503b30470b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed; /* Fix the background image */
    margin: 0;
    padding: 0;
    height: 100vh;
    font-family: Arial, sans-serif;
    color: #fff; 
    }

    .container {
          display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      max-width: 600px;
      margin: 0 auto;
      margin-top: 10px;
      padding: 20px;
      background-color:transparent /* Transparent  background */
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .book-info {
      text-align: center;
      margin-bottom: 20px;
    }

    .book-info img {
      width: 200px;
      height: auto;
    }

    .book-info p {
      font-size: 20px;
      margin: 10px 0;
    }
    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }
    
    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
    span{
      font-family: cursive;
       color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
     button {
      padding: 10px 20px;
      font-size: 18px;
      border: none;
      border-radius: 4px;
      background-color: #D06DD4;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      padding: 5px 0;
    }

    .dropdown-content a {
      color: black;
      padding: 8px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropbtn {
      background-color: #D06DD4;
      color: white;
      padding: 12px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      border-radius: 4px;
    }
    .userimg{
      vertical-align: top;
    }

    .review-form {
      text-align: center;
      margin-top: 20px;
    }

    .review-form label {
      display: block;
      font-size: 16px;
      margin-bottom: 10px;
    }
      .review-item {
      display: flex;
      align-items: center;
    }

    .user-image {
      width: 40px; /* Adjust the size of the user image as needed */
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }
    
.dropbtn {
  background-color: #D06DD4;
  color: white;
  padding: 12px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 4px;
}

/* Style the dropdown container */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Style the dropdown content */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
  padding: 5px 0;
  border-radius: 4px;
}
h1 {
      font-size: 50px;
      font-family: cursive;
      text-align: center;
      margin: 0;
      color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      padding: 20px 0;
    }

/* Style the dropdown links */
.dropdown-content input[type="submit"] {
  color: black;
  background-color: #f1f1f1;
  border: none;
  padding: 8px 16px;
  text-decoration: none;
  display: block;
  width: 100%;
  text-align: left;
  border-radius: 4px;
}

/* Change the background color of dropdown links on hover */
.dropdown-content input[type="submit"]:hover {
  background-color: #ddd;
}

/* Show the dropdown content when the dropdown is hovered over */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Reset margins and padding for the form */
.dropdown-content form {
  margin: 0;
  padding: 0;
}
    .review-content {
      text-align: left;
    }

    #bname{
      font-family: cursive;
      color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        font-size: 30px;
    }
    #author{
      font-family: cursive;
      color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
         font-size: 28px;
    }
    #summary{
      font-family: cursive;
      font-size: 25px; 
    }
    .review-form input[type="text"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      margin-bottom: 10px;
    }
    #all-reviews{
      text-align: left;
    }

    .review-form input[type="submit"] {
      background-color: #D06DD4;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .review-list {
      margin-top: 20px;
      text-align: left;
    }

    .review-list .review-item {
      background-color: transparent;
      padding: 10px;
      text-align: left;
      margin-bottom: 10px;
      border-radius: 4px;
    }

    .review-list .review-item .username {
      font-weight: bold;
      margin-bottom: 5px;
      font-family: cursive;
      font-size: 25px;
    }

    .review-list .review-item .review-text {
      font-size: 18px;
       font-family: cursive;

    }
    </style>
    <script>
    function showAllReviews() {
      var reviewsDiv = document.getElementById("all-reviews");
      var showMoreButton = document.getElementById("show-more-btn");

      if (reviewsDiv.style.display === "none") {
        reviewsDiv.style.display = "inline-block";
        showMoreButton.innerText = "Hide Reviews";
      } else {
        reviewsDiv.style.display = "none";
        showMoreButton.innerText = "Show More Reviews";
      }
    }
  </script> 
</head>
<body>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="test.php">HOME</a>
    <a href="profile.php">My Profile</a>
    <a href="biblio.php">MY BOOKS</a>
    <a href="about.php">About Us</a>
    <?php
    if($admin == 'yes'){ ?>
    <a href="uploadimage.php">Upload books</a> <?php } ?>
    <a href="community.php">Community</a>
    <a href="category.php">Category</a>
    <a href="index.php" >Log out</a>
  </div>
  
   <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
  </div>
    <?php
    include("config.php");
    $d = $_GET['id'];
    $query = "SELECT * from bookimage WHERE bid=$d";
    $query_run = mysqli_query($con, $query);
    $row = mysqli_fetch_array($query_run);
    ?>
    <h1><?php echo $row["bname"]?></h1>
<div class="container">
    <div class="book-info">
     <p style="padding-left: 550px;font-size: 30px"> &#128065;<?php echo $row["views"]; ?></p>
      <img src="<?php echo $row["image"]; ?>" alt="" />
      <p id="bname"><?php echo $row["bname"]; ?></p>
      <p id="author"><?php echo $row["author"]; ?></p>
      <p id ="summary"><?php echo $row["summary"]; ?></p>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Add to Shelf</button>
      <div class="dropdown-content">
        <form method="POST">
          <input type="submit" value="Read" name="read">
          <input type="submit" value="Currently Reading" name="reading">
          <input type="submit" value="Want to Read" name="wanto">
        </form>
      </div>
    </div>

    <div class="review-form">
      <form method="POST">
        <label style="text-align: left;font-size: 25px;">Write a Review:</label>
        <input type="text" name="review" placeholder="Give your review" required>
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>

    <div class="review-list">
      <?php
      include("config.php");
      $d = $_GET['id'];
      $_SESSION['bid'] = $d;
      $query = "SELECT * from review WHERE bid='$d' LIMIT 2"; // Get only the first two reviews
      $query_run = mysqli_query($con, $query);

       if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_array($query_run)) {
          ?>
          <table class="review-item">
          <tr>
            <?php 
      include ("config.php");
      $x = $row['username'];
      $quer = "SELECT * FROM user2 where Username = '$x'";
      $quer_run = mysqli_query($con,$quer);
      while($ro = mysqli_fetch_array($quer_run) ){
        $y = $ro['Id'];
  $query1 = "SELECT * FROM profile WHERE user_id = '$y' ";
  $query_run1 = mysqli_query($con, $query1);
   $row1 = mysqli_fetch_array($query_run1);

  if ((mysqli_num_rows($query_run1) > 0)&&($row1['profile_pic']!=NULL)) {
    // If there is a profile data for the user, fetch and display the profile picture
   
    $profile_pic = $row1['profile_pic'];
    $userid = $row1['user_id'];
  } else {
    // If there is no profile data, use the default profile picture
    $profile_pic = 'profile.jpg';
  }}
  ?>
            <td><img src="<?php echo $profile_pic ?>" alt="User Image" class="user-image"></td>
            <td class="review-content">
              <p class="username"><?php echo $row['username']; ?></p>
              <p class="review-text"><?php echo $row['rev']; ?></p>
            </td>
          </tr>
        </table><br><br><br>
          <?php
        }
        // Check if there are more than 2 reviews to display the "Show More Reviews" button
        $query_count_reviews = "SELECT COUNT(*) AS total_reviews FROM review WHERE bid='$d'";
        $query_run_count_reviews = mysqli_query($con, $query_count_reviews);
        $row_count_reviews = mysqli_fetch_assoc($query_run_count_reviews);
        $total_reviews = $row_count_reviews['total_reviews'];

        if ($total_reviews > 2) {
          ?>
          <div id="all-reviews" style="display: none;">
            <?php
            $query = "SELECT * from review WHERE bid='$d' LIMIT 2,999"; // Get the rest of the reviews starting from the third one
            $query_run = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($query_run)) {
              ?>
              <table class="review-item">
          <tr>
            <?php 
      include ("config.php");
      $x = $row['username'];
      $quer = "SELECT * FROM user2 where Username = '$x'";
      $quer_run = mysqli_query($con,$quer);
      while($ro = mysqli_fetch_array($quer_run) ){
        $y = $ro['Id'];
  $query1 = "SELECT * FROM profile WHERE user_id = '$y' ";
  $query_run1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_array($query_run1);

  if ((mysqli_num_rows($query_run1) > 0)&&($row1['profile_pic']!=NULL)) {
    // If there is a profile data for the user, fetch and display the profile picture
  
    $profile_pic = $row1['profile_pic'];
    $userid = $row1['user_id'];
  } else {
    // If there is no profile data, use the default profile picture
    $profile_pic = 'profile.jpg';
  }}
  ?>
            <td><img src="<?php  echo $profile_pic ?> " alt="User Image" class="user-image"></td>
            <td class="review-content">
              <p class="username"><?php echo $row['username']; ?></p>
              <p class="review-text"><?php echo $row['rev']; ?></p>
            </td>
          </tr>
        </table><br><br><br>
              <?php
            }
            ?>
          
          <!-- Button to show all reviews -->
          
        </div>
        <button id="show-more-btn" onclick="showAllReviews()">Show More Reviews</button>
        <?php
        }
      } else {
        echo "<p>No reviews yet.</p>";
      }
      ?>
    
    </div>

    
  </div>
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }
  </script>
</body>
</html>
