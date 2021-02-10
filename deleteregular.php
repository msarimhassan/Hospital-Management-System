<?php
include('./connection.php');

$id=$_GET['docid'];

$query="Delete from all_doctors WHERE doc_id='$id'";
$result=mysqli_query($conn,$query);
$query="Delete from doc_reg WHERE doc_id='$id'";
$result=mysqli_query($conn,$query);
$query="DELETE FROM all_doctors WHERE doc_id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:view.php');
}
?>