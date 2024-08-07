<?php
session_start();
include("config.php");

// Check if search query is submitted
if (isset($_POST['query'])) {
  $filtervalues = $_POST['query'];
  $query = "SELECT * FROM bookimage WHERE CONCAT(bname, author) LIKE '%$filtervalues%'";
  $query_run = mysqli_query($con, $query);
} else {
  $query = "SELECT * FROM bookimage";
  $query_run = mysqli_query($con, $query);
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
    background-attachment: fixed; /* Fix the background image */
    margin: 0;
    padding: 0;
    height: 100vh;
    font-family: Arial, sans-serif;
    color: #fff;    }
    .book-info {
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
  margin: 10px;
  width: 100%;
    max-width: 300px; /* Adjust the width as needed */
    height: auto;
  text-align: center;
  background:blur(10px);


  
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

    h2 {
      font-size: 50px;
      font-family: cursive;
      text-align: center;
      margin-top: 30px;
    }

    form {
      margin-top: 30px;
      text-align: center;
    }

    input[type="text"] {
      padding: 10px;
      font-size: 18px;
      border: none;
      border-radius: 4px;
    }

    input[type="submit"] {
      padding: 10px 20px;
      font-size: 18px;
      border: 5px;
      border-color: pink;
      border-radius: 10px;
      background-color: transparent;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background: blur ;
    }

    table {
      width: 300px;
      border-collapse: collapse;
      margin-top: 50px;
    }

    img {
      width: 100%;
      height: auto;
    }

    p {
      font-size: 20px;
      margin-top: 10px;
      text-align: center;
    }

    .book-container {
     display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-gap: 20px;
    justify-items: center;
    }

    a {
      text-decoration: none;
    }

    .nike {
      padding: 10px 20px;
      font-size: 18px;
      border: none;
      border-radius: 4px;
      background-color: #008CBA;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .nike:hover {
      background-color: #006B95;
    }
  </style>
</head>
<body>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="test.php">HOME</a>
    <a href="biblio.php">MY BOOKS</a>
    <a href="about.php">About Us</a>
    <a href="uploadimage.php">Upload books</a>
  </div>

  <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
    <h2>BIBLIOMANIA</h2>
    <form method="POST" action="">
      <input type="text" name="query" value="<?php if(isset($_POST['query'])){echo $_POST['query'];}?>" placeholder="Search..." required />
      <input type="submit" value="Search" />
    </form>

    <div class="book-container">
  <?php
  while($row = mysqli_fetch_array($query_run)) {
  ?>
    <table class="book-info">
      <tr>
        <td>
          <img src="<?php echo $row["image"]; ?>" widht='50px' height='30px' alt="" />
        </td>
      </tr>
      <tr>
        <td>
          <center><p><?php echo $row["bname"];?></p></center>
        </td>
      </tr>
      <tr>
        <td>
          <center><p><?php echo $row["author"];?></p></center>
        </td>
      </tr>
      <tr>
        <td>
          <center><p><a href='<?php echo $row["link"];?>'>Buy Now</a></p></center>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <form method="POST">
              <a href="view.php?id=<?php echo $row["bid"] ?>">
                <input class="nike" type="button" value="View" name="view-button" />
              </a>
            </form>
          </center>
        </td>
      </tr>
    </table>
  <?php } ?>
</div>


    <table>
      
    
      <tbody>
        <?php
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
            <tr>
              <td><a href="searchview.php?id=<?php echo $row['bid'] ?>"><?php echo $row['bname']; ?></a></td>
              <td><a href="searchview.php?id=<?php echo $row['bid'] ?>"><?php echo $row['author']; ?></a></td>
            </tr>
            <?php
          }
        } else {
          ?>
          <tr>
            <td colspan="2">No Record Found</td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
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
