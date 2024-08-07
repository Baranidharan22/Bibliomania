<?php 
session_start();
$admin = $_SESSION['isAdmin'];
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

    label {
      font-size: 18px;
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
      text-align: center;
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
    <h2>EDIT PROFILE</h2>
</div>
  
      <div class="transparent-container">
      <?php 
        		include ("config.php");
        		$id = $_SESSION['id'];
        		$query = "SELECT * FROM profile  WHERE user_id = '$id' ";
        		$query_run = mysqli_query($con,$query);
        		if(mysqli_num_rows($query_run)>0){
        			$row = mysqli_fetch_array($query_run);
        	?>
        	    <center>
      <form action="" method="post" enctype="multipart/form-data">
        <center><label id="ques">Choose an image:</label><br>
        <input type="file" name="image" id="image" /><br></center>
        	 <label id="ques">Make the account Public</label>
         <?php $current_option = $row['private'];
         $other_option = ($current_option == "Yes") ? "No" : "Yes"; ?>
        <select name="private">
            <option value="<?php echo $current_option ?>" selected><?php echo $current_option ?></option>
			<option value="<?php echo $other_option ?>" > <?php echo $other_option ?></option>
        </select>
<br><br>
        <input type="submit" value="Edit" name="upload">
    </form>
            
      <?php 
        } 
        else {
        	?>
        	    <center>
        	    	<div id="main">
      <form action="" method="post" enctype="multipart/form-data">
        <label>Choose an image:</label><br><br><br>
        <input type="file" name="image" id="image" /><br>
        	 <label>Make the account private</label>
        	<select name="private">
        <option value = "Yes">Yes</option>
        <option value = "No">No</option>
    </select>
<br><br>
        <input type="submit" name="upload">
    </form>
</div>
   <?php } ?>

        
        
</center>
</div>
</body>
</html>
<?php
include ("config.php");
if (isset($_POST['upload'])) {
    $id = $_SESSION['id'];
    $private = $_POST['private'];

    if ($_FILES["image"]["error"] === UPLOAD_ERR_NO_FILE) {
        // If no file is selected, update only the private column in the profile table
         $query_check = "SELECT * FROM profile WHERE user_id = '$id'";
        $query_check_run = mysqli_query($con, $query_check);
        if (mysqli_num_rows($query_check_run) > 0) {

        $query_update_private = "UPDATE  profile SET private = '$private' WHERE user_id ='$id' ";
        $query_run = mysqli_query($con, $query_update_private);
    } 
    else{
    	  $query_update_private = "INSERT INTO  profile (`user_id`,`private`) VALUES ('$id',  '$private')   ";
        $query_run = mysqli_query($con, $query_update_private);

    }
    if ($query_run) {
        echo '<script type="text/javascript">alert("Profile Updated");</script>';
    } else {
        echo '<script type="text/javascript">alert("Profile Not Updated");</script>';
    }

}

    else {
        // If a file is selected, update the profile picture and private status
        $targetDir = "image/";
        $filename = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $filename;
           

        // Check if the user already has a profile record
        $query_check = "SELECT * FROM profile WHERE user_id = '$id'";
        $query_check_run = mysqli_query($con, $query_check);

        if (mysqli_num_rows($query_check_run) > 0) {
            // If the record exists, update the profile picture and private status
           
            $query_update = "UPDATE profile SET  profile_pic = '$targetFilePath' ,private = '$private' WHERE user_id = '$id'";
            $query_run = mysqli_query($con, $query_update);
            

            }
         else {
            // If no record exists, insert a new record
            $query_insert = "INSERT INTO profile (`user_id`, `profile_pic`, `private`) VALUES ('$id', '$targetFilePath', '$private')";
            $query_run = mysqli_query($con, $query_insert);
        }
    

    if ($query_run) {
        echo '<script type="text/javascript">alert("Profile Updated");</script>';
    } else {
        echo '<script type="text/javascript">alert("Profile Not Updated");</script>';
    }
}
}
?>
