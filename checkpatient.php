<?php

include('./connection.php');
$name=$_POST['ptname'];
$age=$_POST['ptage'];
$sex=$_POST['sex'];
$address=$_POST['ptaddress'];
$city =$_POST['ptcity'];
$phone=$_POST['ptphone'];
$date=$_POST['entrancedate'];
$id=$_POST['docid'];

$query="INSERT INTO pat_entry SET pat_name='$name',pat_age='$age'
,pat_sex='$sex',pat_address='$address',pat_city='$city',
pat_phoneno='$phone',pat_entrance='$date',doc_id='$id',
departname=(SELECT departname FROM all_doctors WHERE doc_id='$id')";
$result=mysqli_query($conn,$query);
 $query="Update pat_entry SET pat_id=concat('PT',pat_no)";
 $result=mysqli_query($conn,$query);
 if($result)
 {
header('Location:patient.php');
 }




?>