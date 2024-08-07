<!DOCTYPE html>
<html>
<head>
  <title>Upload image</title>
  <style>
    body {
      background-image: url('https://images.unsplash.com/photo-1602498456745-e9503b30470b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60');
      background-repeat: no-repeat;
      background-size: cover;
      background-size: 100% 100%;
      margin-bottom: none;
      height: 1100px;
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

    label {
      font-size: 18px;
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
      text-align: center;
      color: #ffff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 15px;
       border-radius: 10px;

    }
    input[type="text"]{
height: 30px;}
    input[type="file"] {
      width: 100%;
      background-color: #D06DD4;
      width: 100%;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
       border-radius: 10px;
      margin-bottom: 15px;
      border-radius: 10px;
    }


    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
       border-radius: 10px;
    }
    select{
       width: 100%;
      
      width: 100%;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
       border-radius: 10px;
      margin-bottom: 15px;
      border-radius: 10px;
    }
    option{
      color: #000000 ;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
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
    <a href="uploadimage.php">Upload books</a>
    <a href="community.php">Community</a>
    <a href="category.php">Category</a>
    <a href="index.php">Log out</a>

  </div>

  <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
    <h2>BIBLIOMANIA</h2>

    <center>
      <form action="" method="post" enctype="multipart/form-data">
        <label>Choose an image:</label><br>
        <input type="file" name="image" id="image" required/><br>
        <label>Name:</label><br>
        <input type="text" name="name" id="name" required /><br>
        <label>Author:</label><br>
        <input type="text" name="author" id="author" required /><br>
        <label>Summary:</label><br>
        <textarea id="summary" name="summary" rows="10" cols="50" ></textarea><br>
        <label>Category</label>
          <select name="category">
        <option value = "romcom">ROMCOM</option>
        <option value = "romance">ROMANCE</option>
         <option value = "thriller">THRILLER</option>
        <option value = "buisness">BUISNESS</option>
        <option value = "fiction">FICTION</option>
        <option value = "nonfiction">NON-FICTION</option>
                <option value = "scifi">Sci-Fi</option>




    </select><br>
        <label>Link:</label><br>
        <input type="text" name="link" id="link"><br>
        <input type="submit" name="upload" id="x" value="Upload Data" required /><br>
        <p id="error-message"></p>
      </form>
    </center>
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

</body>
</html>
<?php
include ("config.php");

if (isset($_POST['upload'])) {
    $targetDir = "image/";
    $filename = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $filename;
    $name = $_POST['name'];
    $author = $_POST['author'];
    $summary = $_POST['summary'];
    $link = $_POST['link'];
    $category = $_POST['category'];

    // Check if the name already exists in the table
    $check_query = "SELECT * FROM bookimage WHERE bname = '$name'AND author='$author'";
    $check_result = mysqli_query($con, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo '<script type="text/javascript">alert("Book with the same name already exists");</script>';
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $query = "INSERT INTO bookimage (`image`, `bname`, `author`, `summary`, `link`,`category`) VALUES ('$targetFilePath', '$name', '$author', '$summary', '$link','$category')";
            $query_run = mysqli_query($con, $query);
            if ($query_run) {
                echo '<script type="text/javascript">alert("Image Profile Upload");</script>';
            } else {
                echo '<script type="text/javascript">alert("Image Profile Not Upload");</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Error uploading image");</script>';
        }
    }
}
?>
