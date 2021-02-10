<?php
include('./connection.php');

$id=$_GET['docid'];


$query="Delete from doc_on_call WHERE doc_id='$id'";
$result=mysqli_query($conn,$query);
$query="DELETE FROM all_doctors WHERE doc_id='$id'";
$result=mysqli_query($conn,$query);

if($result)
{
    header('Location:view.php');
}
?>