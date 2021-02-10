 <?php
 include('connection.php');

 $id=$_GET['patno'];
 if ($_GET['type']='DIS')
 {
     echo $_GET['type'];
      $query="DELETE from pat_dis WHERE pat_no='$id'";
     $result=mysqli_query($conn,$query);
     header('Location:viewpatient.php');
 }
 ?>