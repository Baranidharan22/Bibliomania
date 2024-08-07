<?php 
session_start();
?>
<?php
include ("config.php");
if (isset($_POST['submit'])) {
  $rev = $_POST['review'];
   $read =$_SESSION['bid'];
   $user = $_SESSION['username'];
  $query = " insert into review (bid,username,rev)values('$read','$user','$rev')";
  $query_run = mysqli_query($con,$query);
   if($query_run)
  {
    echo '<script type="text/javascript"> alert("Review Submitted")</script>';
  } 
  else{

    echo '<script type="text/javascript"> alert("Process failed")</script>';

  }

}
 ?>
<?php
include ("config.php");
if(isset($_POST['read']))
{
  $id = $_SESSION['id']; 
  $read =$_SESSION['bid'];
  echo 'hello' ;
  $query="insert into shelves(id,read_id)values('$id','$read')";
  $query_run = mysqli_query($con,$query);
  if($query_run)
  {
    echo '<script type="text/javascript"> alert("Added to Read shelf")</script>';
  } 
  else{

    echo '<script type="text/javascript"> alert("Process failed")</script>';

  }
}
?>
<?php
include ("config.php");
if(isset($_POST['reading']))
{
  $id = $_SESSION['id']; 
  $read =$_SESSION['bid'];
  
  $query="insert into shelves(id,reading_id)values('$id','$read')";
  $query_run = mysqli_query($con,$query);
  if($query_run)
  {
    echo '<script type="text/javascript"> alert("Added to Currently Reading shelf")</script>';
  } 
  else{

    echo '<script type="text/javascript"> alert("Process failed")</script>';

  }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>
<body style="background-color:white;">
<?php
  

	


				include ("config.php");
        $d = $_GET['id'];
			$query = "SELECT * from bookimage WHERE bname = '$d'";
      $query_run = mysqli_query($con,$query);
      $row = mysqli_fetch_array($query_run);
      	?>
      			<div style="display: flex;  justify-content: center;">
      	<table>
      	<tr ><td>
        <img src="<?php echo $row["image"]; ?>" alt="" /> </td></tr><br>
        <tr ><td><center><p><?php echo $row["bname"]; echo $_SESSION["id"];?></p></center></td></tr ><br>
				<tr ><td><center><p><?php echo $row["author"];?> </p></center></td></tr ><br>
        <tr ><td><center><p><?php echo $row["summary"];?> </p></center></td></tr ><br>
				<tr ><td><center><div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <div class="dropdown-content">
    <form method="POST"><input type="submit" value="read" name="read"><br>
      <input type="submit" value="reading" name="reading"><br>
      <input type="submit" value="wanto" name="wanto"><br>


    </form>
   
  </div>
</div></center></td></tr>          </div><br><br><br>
 <form method="POST">
      <label>Review:</label>
      <input type="text"  name="review" placeholder="Gve your review" width="500px" height="">
      <input type="submit"  name="rev">
    </form>
  
              



			
		
</table></center>
<?php  
include ("config.php");
 $read =$_SESSION['bid'];
 $query = "SELECT * from review WHERE bid='$read'";
 $query_run = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($query_run))
{
  echo $row['username'];?><br>
  <?php echo $row['rev'];?><br><?php
}

?>
</body>
</html>


      	
     

		
