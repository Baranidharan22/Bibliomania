 <?php session_start();?>
 <?php
 $admin = $_SESSION['isAdmin'];
 include("config.php");
 
if (isset($_POST['view-button'])){

$bid = $_POST['bid'];
  $queryv = "SELECT views from bookimage where bid = '$bid' ";
  $query_runv = mysqli_query($con,$queryv);
  $row = mysqli_fetch_array($query_runv);
  $views = $row['views'];
  $views+=1;
  $queryi = "UPDATE bookimage SET views = '$views' where bid='$bid'";
  $query_runi = mysqli_query($con,$queryi);
  header("Location:view.php?id=$bid");


}
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
  <style>
    h2 {
      font-size: 50px;
      font-family: cursive;
      text-align: center;
      margin: 0;
      color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      padding: 20px 0;
    } 
    h3 {
      font-size: 50px;
      font-family: cursive;
      text-align: center;
      margin: 0;
      color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      padding: 20px 0;
    }
        .container {
          display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      max-width: 75%;
      margin: 0 auto;
      margin-top: 40px;
      padding: 20px;
      background-color:transparent /* Transparent  background */
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    body {
       background-image: url('https://images.unsplash.com/photo-1602498456745-e9503b30470b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed; /* Fix the background image */
    margin: 0;
    padding: 0;
    height: 100vh;
    font-family: Arial, sans-serif;
    color: #fff;    }
   .book-info-container {
      width: 350px; /* Increase the size of the book info container */
      background-color: transparent;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      margin: 20px; /* Add some margin between book info containers */
    }
    #buy{
      color: #CA0890;
    }
    #buy a:hover{
      background-color: #006B95;
    }
    a {
      text-decoration: none;
    }
    span{
      font-family: cursive;
       color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    .books-container {
    margin-left: 50px;
    margin-right: 50px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 20px;
    justify-items: center;
    }

    .book-info {
      text-align: center;
    }

    .book-info img {
      width: 150px;
      height: auto;
      margin-bottom: 10px;
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
    .book-info p {
      font-size: 24px;
      margin: 5px 0;
    }
    #bname{
      font-family: cursive;
      color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        font-size: 25px;
    }

    
    #author{
      font-family: cursive;
      color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .view-button {
     padding: 10px 20px;
      font-size: 18px;
      border: none;
      border-radius: 4px;
      background-color: #D06DD4;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .view-button:hover {
      background-color: #006B95;
    }
  </style>
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
    <a href="index.php" >Log out</a></div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
     
    

  <?php
 
  include("config.php");
  $y = "read";
  $ui = $_SESSION['id'];
  $query = "SELECT * from shelves where user_id = '$ui' AND shelf_type='$y'";
  $query_run = mysqli_query($con, $query);
  ?><center><h2>BIBLIOMANIA</h2>
    <h3>READ</h3>
  <div >
    <div class="books-container">
      <?php
      while ($row = mysqli_fetch_array($query_run)) {
        $x = $row["book_id"];
        $query1 = "SELECT * from bookimage where bid= '$x'";
        $quer1_run = mysqli_query($con, $query1);
        while ($row1 = mysqli_fetch_array($quer1_run)) {
          ?>
          <div class="book-info-container"> <!-- Added book-info-container class -->
            <div class="book-info">
              <img src="<?php echo $row1["image"]; ?>" alt="" />
              <p id="bname"><?php echo $row1["bname"]; ?></p><br>
              <p id="author"><?php echo $row1["author"]; ?></p><br>
              <a target="_blank" href="<?php echo $row1['link'];?>"><span>Buy Now</span></a><br><br>
              <form method="POST">
                
                  <input class="view-button" type="submit" value="View" name="view-button" />
                   <input type="hidden" value="<?php echo $row1["bid"] ?>" name ="bid" >

                </a>
              </form>
            </div>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </div></center>
   
   <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
       document.body.style.overflow = "hidden";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
       document.body.style.overflow = "auto";
    }
  </script>
</body>
</html>
