<?php
session_start();
//echo $_SESSION['username'];
?>
<html>
<head>
<title>Phone Book</title>
<link rel="stylesheet" href="style.css">
<script>
function ConfirmDelete() {
  return confirm("Do you want to delete?");
}
</script>
</head>
<body>
<div id = "main">
  <h1> Phone Book</h1>
  
  <?php  include_once 'menu-main.php';?><br><br>
  
   <table class=" viewtabl" >
  <th>
  <tr>
  <td> <strong>S.No</strong></td>
  <td><strong>Name</strong></td>
  <td><strong>Designation</strong></td>
  <td><strong>Phone</strong></td>
  <td><strong>Address</strong></td>
  <td><strong>Action</strong></td>
  </tr>
  </th>
  <?php  
   require_once 'db.php';
   $count= 1;
   $query = "SELECT * FROM contactdetails ORDER BY contact_name";
    $result = $con->query($query);
	 while($row = $result->fetch_assoc()){?>
  
  
  <tr>
  <td> <?php echo $count;?></td>
  <td> <?php echo $row["contact_name"];?></td>
  <td><?php echo $row["designation"];?></td>
  <td><?php echo $row["phone"];?></td>
  <td><?php echo $row["address"];?></td>
  <td>
    <a href="delete.php?deleteid=<?php echo $row["contact_id"]; ?> "id="del" onclick="return ConfirmDelete()">Delete</a>
    <a href="edit.php?editid=<?php echo $row["contact_id"]; ?> "id="edt" >Edit</a>
  </td>
  </tr>
 <?php $count++;}?>
	 </table>
	   
</div>
</body>

</html>

