<?php
session_start();
$admin = $_SESSION['isAdmin'];
?>
<html>
<head>
  <style>
    body {
      background-image: url('https://images.unsplash.com/photo-1602498456745-e9503b30470b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60');
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      /* Fix the background image */
      margin: 0;
      padding: 0;
      height: 100vh;
      font-family: Arial, sans-serif;
      color: #fff;
    }
    a{
    	      text-decoration: none;
    	      color:white;

    }
     h2 {
      font-size: 50px;
      font-family: cursive;
      text-align: center;
      margin: 0;
      color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      padding: 20px 0;
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
    .email {
      padding: 10px 20px;
      font-size: 25px;
      border: none;
      border-radius: 10px;
      background-color: #D06DD4;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;

    }

    .email:hover {
      background-color: #006B95;
    }
    .summa{
    	justify-content: center;
    	align-content: center;
    	align-items: center;
      align-content: center;
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
      justify-content: center;
      align-items: center;
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
    .user-name{
      font-size: 30px;
    }
    .book-container {
      margin-left: 50px;
      margin-right: 50px;
      border-radius: 25px;
      width: 60%;

      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center; /* Center items horizontally */
     
    }

    .user-container {
       display: flex;
      flex-direction: row; /* Align user info in a single column */
      align-items: center; /* Center items horizontally */
      margin-bottom: 20px;
      height:150px;
      padding-top: 15px;
      padding-left: 30px;
      background-color: transparent;
    }

    .user-info {
  margin-top: 10px;
      display: flex;
      flex-direction: column; /* Align user info in a single column */
      align-items: center; /* Center items horizontally */
      margin-left: 15px;
      padding-left: 30px;
      padding-right: 30px;
    }
  .user-info span {
        margin: 5px 0; /* Add some space between elements inside user-info */
      display: block;/* Add some space between elements inside user-info */
    }

    .user-namem {
        font-size: 20px;
      font-weight: bold;
      text-align: center;
      background-color: #D06DD4;
    }
    .user-namem {
        font-size: 20px;
      font-weight: bold;
      text-align: center;
      
    }

    .profile-photo {
      display: block;
      width: 120px;
      height: 120px;
      border-radius: 50%;
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
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span></div>
	<h2>BIBS COMMUNITY</h2>
  <?php
$id = $_SESSION['id'];
include("config.php");
$query = "SELECT * FROM user2 WHERE NOT Id = '$id' ";
$query_run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($query_run)) {
  $name = $row['Id'];
  $query1 = "SELECT * FROM profile WHERE user_id = '$name' ";
  $query_run1 = mysqli_query($con, $query1);
  $row1 = mysqli_fetch_array($query_run1);
  $userid = $row1['user_id'];
  if ((mysqli_num_rows($query_run1) > 0 )&& ($row1['profile_pic']!=NULL)) {
    // If there is a profile data for the user, fetch and display the profile picture
    
    $profile_pic = $row1['profile_pic'];
    
  } else {
    // If there is no profile data, use the default profile picture
    $profile_pic = 'profile.jpg';
  }
  ?><center><div class="summa">
 <div class="book-container" style="grid-template-columns: repeat(<?php echo $gridColumns; ?>,1fr)">
  <div class="user-container">
    <img src="<?php echo $profile_pic ; ?>" alt="--------------------------The------ uploaded image ---------is -----------unsupported-----------------------------------------------------------------------------------" class="profile-photo">
    <div class="user-info">
      <span class="user-name"><?php echo $row['Username']; ?></span>
    </div>
    <?php 
    if(mysqli_num_rows($query_run1)>0){
    	if($row1['private']=='Yes'){
    		$query2 = "SELECT * FROM user2 where Id ='$userid' ";
    		$query_run2 = mysqli_query($con,$query2);
    		$row2 = mysqli_fetch_array($query_run2);
    		?>
    		<div class="user-info">
      <button class="email"><a href="mailto:<?php echo $row2['Email'] ?>">Mail Me</a></button>
    </div>
    <?php 
    $query3 = "SELECT * FROM shelves WHERE user_id='$name' AND shelf_type ='read' ";
    $query_run3 = mysqli_query($con,$query3);
    $num = mysqli_num_rows($query_run3);
    $book = "Book Read : ";
    $sum = $book.$num;

    
    	 }}
    ?>
    

  </div><br>
</div> </center></div>

  <?php
}
?>
</body>
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
</html>
