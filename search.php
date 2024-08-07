<?php 
session_start();
?>
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Author</th>
		</tr>
	</thead>
	<tbody>
		<?php
include ("config.php");
if(isset($_POST['query'])) {
  $filtervalues = $_POST['query'];
  $query = "SELECT * from bookimage where concat(bid,bname,author)  like '%$filtervalues%' ";
  $query_run = mysqli_query($con,$query);

  if(mysqli_num_rows($query_run)>0)
  {
  	foreach ($query_run as  $item) {
  		?>
  		<tr>
  	<td  ><form method="GET"><a href="searchview.php?id=<?php echo $item['bname'] ?>"><?php echo $item['bname'];?></a></td>
  	<td  ><form method="GET"><a href="searchview.php?id=<?php echo $item['bname'] ?>"><?php echo $item['author'];?></a></td>
  </tr>


 <?php	}
  } 
  else{
  	?>
  	<tr>
  	<td  colspan="2">No Record Found</td>
  </tr>
 <?php }} ?>
</table>
     
