<?php
session_start();
$admin = $_SESSION['isAdmin'];
?>
<?php
include("config.php");
$id = $_SESSION['id'];
if (isset($_POST['delete'])) {
    $query = "UPDATE profile SET profile_pic = NULL WHERE user_id  = '$id' ";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        echo '<script type="text/javascript">alert("Profile Updated");</script>';
    } else {
        echo '<script type="text/javascript">alert("Profile Not Updated");</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
        .nam{
          font-family: cursive;
            text-align: center;
            font-size: 50px;
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
        .mail{
          font-family: cursive;
            text-align: center;
            margin: 0;
            font-size: 40px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            padding: 20px 0;
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

        h3 {
            font-size: 35px;
            font-family: cursive;
            text-align: center;
            margin: 0;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            padding: 20px 0;
        }

        .full {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 70px;
            height: 90px;
        }

        .profile-photo {
            display: block;
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

        /* Apply the CSS for buttons */
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .button-container form {
            margin: 10px;
        }

        .button-container input[type="submit"] {
            background-color: #D06DD4;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .button-container input[type="submit"]:hover {
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
    <a href="index.php">Log out</a>
  </div>
  <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
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
<h2>BIBLIOMANIA</h2>
<h3>My profile</h3>
<div class="profile">
    <?php
    $id = $_SESSION['id'];
    $name = $_SESSION['username'];
    $mail = $_SESSION['valid'];
    include("config.php");
    $query = "SELECT * FROM profile WHERE user_id = '$id'";
    $query_run = mysqli_query($con, $query);
    $row = mysqli_fetch_array($query_run);

    if ((mysqli_num_rows($query_run) > 0) && ($row['profile_pic'] != NULL)) {
        // If there is a profile data for the user, fetch and display the profile picture
        $profile_pic = $row['profile_pic'];
    } else {
        // If there is no profile data, use the default profile picture
        $profile_pic = 'profile.jpg';
    }
    ?>

    <div class="profile">
        <img src="<?php echo $profile_pic; ?>" alt="--------------------------------------------------------------------------------The uploaded image ----is unsupported-----------------------------------------------------------------------------------"class="profile-photo">
    </div>
    
</div>
<div class="full">
    <p class="nam"><?php echo $name; ?></p>
    <br>
</div>
<div class="full">
    <p class="mail"><?php echo $mail; ?></p>
    <br>
</div>

<div class="button-container">
    <a href="edit.php"><input type="submit" value="Edit"></a>
    <form method="POST"> <input type="submit" name="delete" value="Remove profile"></form>
    <a href="psswd.php"><input type="submit" value="Change password"></a>

</div>
</body>
</html>
