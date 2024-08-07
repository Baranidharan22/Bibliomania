<?php 
session_start();
$admin = $_SESSION['isAdmin'];
include ("config.php");
?>
<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BIBLIOMANIA - MY BOOKS</title>
  <style>
    body {
      font-family: "Lato", sans-serif;
      background-image: url('https://images.unsplash.com/photo-1602498456745-e9503b30470b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60');
      background-repeat: no-repeat;
      background-size: cover;
      background-size: 100% 100%;
      margin-bottom: none;
      height:1000px;
    }
    span{
      font-family: cursive;
       color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
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
    
    .btn {
      width: 400px;
      height: 65px;
      padding-right: 50px
      font-family:cursive;
      font-size: 15px;
    }
    .nike2 {
    height: 36px;
    width: 130px;
    background-color: rgb(255, 141, 20);
    border-radius: 30px;
    border-width: 0px;
    color: black;
    cursor: pointer;
    font-weight: bold;
    text-align: center;
    transition: background-color 0.4s;
  }
  .nike2:hover {
    background-color: rgb(212, 117, 15);
  }
    .shelves {
      margin-bottom: 10px;    
      shape-margin: round;
      background-color: #E6E6FA ;
      width: 510px;
      height: 120px;
      margin: auto;
      border-radius: 25px;
    }
    
    img {
      border-radius: 25px;
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
    
    .shelves:hover {
      opacity: 0.5;
    }
     .cart {
    position: fixed;
    right: 20px;
    top: 20px;
  }
    .type {
      padding-top: 50px;
      padding-left: 600px
    }
    
    p {
      font-size: 30px;
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
    <a href="index.php" >Log out</a>
  </div>
  
  <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

  <h1 style="text-align: center;font-family: cursive;">My Shelves</h1>
<br><br><br>
  <form method="POST">
    <table style="margin:auto;">
      <tr>
        <td>
          <div class="shelves">
            <a href="read.php" style="text-decoration: none;color:black">
              <table style="width:100%; height:100%;">
                <tr>
                  <td style="vertical-align: middle;">
                    <img src="https://img.freepik.com/free-photo/grunge-paint-background_1409-1337.jpg" width="120px" height="120px">
                  </td>
                  <td style="vertical-align: middle; text-align: left;">
                    <p><span>Already Read</span></p>
                  </td>
                   <td style="vertical-align: middle; text-align: left;">
                    <?php 
                    $id = $_SESSION['id'];
    $query3 = "SELECT * FROM shelves WHERE user_id='$id' AND shelf_type ='read' ";
    $query_run3 = mysqli_query($con,$query3);
    $num = mysqli_num_rows($query_run3);
    ?>
     <p><span><?php echo $num ?></span></p>

                  </td>
                </tr>
              </table>
            </a>
          </div>
          <br><br>
        </td>
      </tr>
      <tr>
        <td>
          <div class="shelves">
            <a href="reading.php" style="text-decoration: none;color: black">
              <table style="width:100%; height:100%;">
                <tr>
                  <td style="vertical-align: middle;">
                    <img src="https://img.freepik.com/free-photo/grunge-paint-background_1409-1337.jpg" width="120px" height="120px">
                  </td>
                  <td style="vertical-align: middle; text-align: left;">
                    <p><span>Currently Reading</span></p>
                  </td>
                   <td style="vertical-align: middle; text-align: left;">
                    <?php 
                    $id = $_SESSION['id'];
    $query3 = "SELECT * FROM shelves WHERE user_id='$id' AND shelf_type ='reading' ";
    $query_run3 = mysqli_query($con,$query3);
    $num = mysqli_num_rows($query_run3);
    ?>
     <p><span><?php echo $num ?></span></p>

                  </td>
                </tr>
              </table>
            </a>
          </div>
          <br><br>
        </td>
      </tr>
      <tr>
        <td>
          <div class="shelves">
            <a href="wanto.php" style="text-decoration: none;color:black">
              <table style="width:100%; height:100%;">
                <tr>
                  <td style="vertical-align: middle;">
                    <img src="https://img.freepik.com/free-photo/grunge-paint-background_1409-1337.jpg" width="120px" height="120px">
                  </td>
                  <td style="vertical-align: middle; text-align: left;">
                    <p><span>Want to Read</span></p>
                  </td>
                  <td style="vertical-align: middle; text-align: left;">
                    <?php 
                    $id = $_SESSION['id'];
    $query3 = "SELECT * FROM shelves WHERE user_id='$id' AND shelf_type ='want_to_read' ";
    $query_run3 = mysqli_query($con,$query3);
    $num = mysqli_num_rows($query_run3);
    ?>
     <p><span><?php echo $num ?></span></p>

                  </td>
                </tr>
              </table>
            </a>
          </div>
        </td>
      </tr>
    </table>
  </form>

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
