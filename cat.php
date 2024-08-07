<?php
session_start();
$admin = $_SESSION['isAdmin'];
include("config.php");
$cid = $_GET['cid'];
if (isset($_POST['query'])) {
  $id = $_GET['cid'];
  $filtervalues = $_POST['query'];
  $query = "SELECT * FROM bookimage WHERE category='$id' AND CONCAT(bname, author) LIKE '%$filtervalues%'";
  $query_run = mysqli_query($con, $query);
} else {
  $query = "SELECT * FROM bookimage WHERE category='$cid'";
  $query_run = mysqli_query($con, $query);
}
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
  	#bname{
  		font-family: cursive;
  		color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        font-size: 25px;
  	}
  	#buy{
    	color: #CA0890;
    }
    #buy a:hover{
    	background-color: #006B95;
    }
  	
  	#author{
  		font-family: cursive;
  		color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  	}
  		#x{
  		font-size: 30px;}
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

   .book-container {
    margin-left: 50px;
    margin-right: 50px;
    border-radius: 25px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 20px;
    justify-items: center;
    }

    .book-info {
  border: 1px solid #ccc;
  border-radius: 25px;
  padding: 10px;
  margin: 10px;
  border-color: transparent;
  padding-right: 10px;
  padding-left: 10px;
  width: 100%;
    max-width: 300px; /* Adjust the width as needed */
    height: auto;
  text-align: center;
  background:blur(10spx);


  
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
      background-color: #D06DD4;
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
    .cart {
    position: fixed;
    right: 20px;
    top: 20px;
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
 
    a {
      text-decoration: none;
    }

    .nike {
      padding: 10px 20px;
      font-size: 18px;
      border: none;
      border-radius: 10px;
      background-color: #D06DD4;
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
   <div class="cart">
    <form method="POST" action="">
      <input type="text" name="query" value="<?php if(isset($_POST['query'])){echo $_POST['query'];}?>" placeholder="Search..." required />
      <a href="javascript:history.go(-1)"><span id="x">&times;</span></a><input type="submit" value="Search"/>
    </form>
  </div>
  <div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
    <h2>BIBLIOMANIA</h2>

<?php
  
$totalRows = mysqli_num_rows($query_run);
$remainingBooks = $totalRows % 3;
$gridColumns = ($remainingBooks > 0) ? ($remainingBooks + 3) : 3;
?> 
    <div class="book-container" style="grid-template-columns: repeat(<?php echo $gridColumns; ?>,1fr)">
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
          <center><p id="bname"><?php echo $row["bname"];?></p></center>
        </td>
      </tr>
      <tr>
        <td>
          <center><p id="author"><?php echo $row["author"];?></p></center>
        </td>
      </tr>
      <tr>
        <td>
          <center><a target="_blank" href='<?php echo $row["link"];?>'><p id="buy">Buy Now</p></a></center>
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
</body>
</html>