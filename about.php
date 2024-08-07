<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>BIBLIOMANIA - About Us</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
  font-family: "Lato", sans-serif;
 margin: 0;
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
.profile-photo {
            display: block;
            width: 150px;
            height: 150px;
            border-radius: 50%;
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
  background-color: #E6E6FA;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;

  background-image: url('https://images.unsplash.com/photo-1602498456745-e9503b30470b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60');
  background-repeat: no-repeat;
  background-size: cover;
  background-size: 100% 100%;
  margin-bottom: none;
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
    .cart {
    position: fixed;
    right: 20px;
    top: 20px;
  }
    header {
      background-color: #E6E6FA ;
      color: black;
      padding: 20px;
      text-align: center;
    }
        span{
      font-family: cursive;
       color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    h1 {
      margin: 0;
    }
    
    .profile {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 70px;
    }
    
    .profile-info {
      margin-left: 20px;
    }
    
    .profile-photo {
      display: block;
      width: 150px;
      height: 150px;
      border-radius: 50%;
    }
    
    h2 {
      margin: 10px 0;
    }
    
    p {
      margin-bottom: 10px;
    }
    
    footer {
      background-color: #E6E6FA ;
      color: black;
      padding: 25px;
      text-align: center;
      position: absolute;
      bottom: 0px;
      width: 97%;

    }
  </style>
</head>
<body>

<div id="main">

  <span style="font-size:30px;cursor:pointer;background-color: #E6E6FA" onclick="openNav()">&#9776; Menu</span>
</div>
  <header>
    
    <h1>About Us</h1>
  </header>
   <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="test.php">HOME</a>
    <a href="profile.php">My Profile</a>
    <a href="biblio.php">MY BOOKS</a>
    <a href="about.php">About Us</a>
    <?php
    $admin = $_SESSION['isAdmin'];
    if($admin == 'yes'){ ?>
    <a href="uploadimage.php">Upload books</a> <?php } ?>
    <a href="community.php">Community</a>
    <a href="category.php">Category</a>
    <a href="index.php" >Log out</a>
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
  
  <div class="profile">
    <img src="barani.jpeg" class="profile-photo">
    <div class="profile-info">
      <h2>Baranidharan</h2>
      <p>Co-Founder</p>
    </div>
  </div>
  
  <div class="profile">
    <img src="jjim.jpeg" alt="Profile Photo" class="profile-photo">
    <div class="profile-info">
      <h2>Jim Alen Paul</h2>
      <p>Co-Founder</p>
    </div>
  </div>
  
  <footer>
    <p>&copy; 2023 Your Company. All rights reserved.</p>
  </footer>
</body>
</html>
