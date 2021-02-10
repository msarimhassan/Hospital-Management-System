<?php 
 $id=$_GET['patno'];
include('./connection.php');

$query="DELETE from pat_entry WHERE pat_no='$id'";
$result=mysqli_query($conn,$query);
header('Location:viewpatient.php');
?>