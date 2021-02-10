 <?php
 include('connection.php');

 $id=$_GET['patno'];
 if ($_GET['type']='CHK')
 {
     echo $_GET['type'];
      $query="DELETE from pat_chkup WHERE pat_no='$id'";
     $result=mysqli_query($conn,$query);
     header('Location:viewpatient.php');
 }
 ?>