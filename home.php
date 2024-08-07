<!DOCTYPE html>
<html>
<title>BIBLIOMANIA - HOME</title>
<link rel="stylesheet" type="text/css" href="lobby_style.css">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
 
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
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home.php">HOME</a>
  <a href="biblio.php">MY BOOKS</a>
  <a href="about.php">About Us</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
  <h2 style="font-size:50px;font-family: cursive;text-align: center;">BIBLIOMANIA</h2>

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
 <body>

    <div class="out">
      <a class="cart" href="index.php">
        <input
          type="button"
          class="nike2"
          value="Log out"
          onclick="passover()"
        />
      </a>
      <a href="../home page/homeIndex.html" class="gobacktohomeheadinglink">
        <h1 class="heading" >Some Books To Read</h1></a
      >
      <?php 
        include("config.php");
      $query = "SELECT * from book";
      $query_run = mysqli_query($con,$query);
      while($row = mysqli_fetch_array($query_run))
      {
          ?>
          <div class="flexbox_container">
          <div class="c1" id="pdt1">
             <img src="<?php echo $row["image"]; ?>" alt="" />
              
             

            <div class="company_name">
              <p>
                <b><?php echo $row['Name'] ?> </b> <br />
                <?php echo $row['Author'] ?>
              </p>
            </div>
           
            <div class="buttons">
              <input
                class="nike"
                type="button"
                value="Add To Shelf"
                onclick="pdtclick(1)"
              />
            </div>
          </div>
        </div>
    <?php  } ?>

      
  </body>

</html>