<?php 
session_start();
include("config.php");
$admin = $_SESSION['isAdmin'];
$user = $_SESSION['username'];
$check = "0";
if(isset($_POST['submit'])){
  $pass = $_POST['password'];

$query = "SELECT Password from user2 where Username = '$user'";
$query_run = mysqli_query($con,$query);
$row = mysqli_fetch_array($query_run);
if($pass == $row['Password'])
{
  $check+=1;
}
else{
  echo "<div class='message'><p>Wrong password</p></div><br>";
}
}
?>
<!--change password -->
<?php
if(isset($_POST['submit1'])){
  $npass = $_POST['npassword'];
  $query1 = "UPDATE user2 set Password = '$npass' where Username ='$user'";
  $query_run1 = mysqli_query($con,$query1);
  if($query_run1){
    
     echo "<div class='message'><p>Password changed</p></div><br>";
  }
  else{
    
    echo "<div class='message'><p>Error occured password doesn't change</p></div><br>";

  }

}
?>
<html>
<head>
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
	<style>
    body {
      background-image: url('https://images.unsplash.com/photo-1602498456745-e9503b30470b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60');
      background-repeat: no-repeat;
      background-size: cover;
      background-size: 100% 100%;
      margin-bottom: none;
      height: 1000px;
      font-family: Arial, sans-serif;
      color: #333;
    }
    #x{background-color: #D06DD4}
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
      font-size: 20px;
      color: #ccc;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: #fff;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 30px;
      margin-left: 50px;
      color: #ccc;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
    }

    #main span {
      font-size: 30px;
      cursor: pointer;
      color: #fff;
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
     input[type="password"],
    textarea {
      width: 60%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 15px;
       border-radius: 10px;

     }

    form {
    margin-top: 50px;
            width: 80%;
            max-width: 500px;
            padding: 20px;
            background-color: transparent; /* Transparent white background */
             /* Apply blur effect */
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center-align child elements */
            margin: 0 auto; /* Center the form horizontally on the page */
    }
    #ques{
      color: white;
      font-size: 25px;
    }
    .message{
    text-align: center;
    background: #f9eded;
    padding: 15px 0px;
    border:1px solid #699053;
    border-radius: 5px;
    margin-bottom: 10px;
    color: red;
}

    label {
      font-size: 30px;
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
      text-align: center;
      padding-right: 100px;
      font-family: cursive;
      
      margin: 0;
      color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    .transparent-container {
            background-color: transparent;
            padding: 20px;
            vertical-align: center;
            position: absolute;
            top: 30%;
            left: 40%;
             /* Add some padding to the container */
            border-radius: 10px; /* Add rounded corners for a nicer look */
            max-width: 800px; /* Set the maximum width for the container */
            margin: 0 auto; 
             box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);/* Center the container horizontally on the page */
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

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 15px;
    }

    input[type="file"] {
      width: 100%;
      margin-bottom: 15px;
    }

    input[type="submit"] {
      background-color: #D06DD4;
      color: #fff;
      padding-top: 10px;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #006B95;
    }

    #error-message {
      color: #f00;
      font-size: 16px;
      margin-top: 10px;
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
    <h2>Change Password</h2>
</div>
    <?php
           if($check == '0'){
            ?>
<form method="post" action="" enctype="multipart/form-data">

<div class="field input">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password"
           autocomplete="off" required>
           <input type="submit" name="submit" value="ok">

         </div>
       </form><?php } ?>
           <?php
           if($check >= '1'){
            ?>
            <form method="post" action="" enctype="multipart/form-data" onsubmit="return validatePassword();">

<div class="field input">
          <label for="npassword">New Password:</label>
          <input type="password" id="npassword" name="npassword"
           autocomplete="off" required>
           <input type="submit" name="submit1" value="Change">



           <?php }
           ?>
        </div>
      </form>
       <script>
        function validatePassword() {
            const password = document.getElementById("npassword").value;

         
            const uppercaseRegex = /[A-Z]/;
            const numberRegex = /\d/;
            const specialCharRegex = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/;

   
            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }

            if (!uppercaseRegex.test(password)) {
                alert("Password must contain at least one uppercase letter.");
                return false;
            }

            if (!numberRegex.test(password)) {
                alert("Password must contain at least one number.");
                return false;
            }

            if (!specialCharRegex.test(password)) {
                alert("Password must contain at least one special character.");
                return false;
            }

         
            return true;
        }
    </script>
  
      
