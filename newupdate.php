<?php 
include('header.php');
include('connection.php');
$patno=$_GET['patno'];
$query="SELECT * from pat_entry Where pat_no='$patno'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
?>
<form method="POST">
<input type="hidden" name="patno" value="<?php echo $row['pat_no'];?>">
<label for="ptname">Patient Name:</label>
    <input type="text" name="ptname" id="ptname" value="<?php echo $row['pat_name'];?>">
    <br>
    <br>
    <label for="ptage">Patient Age:</label>
    <input type="text" name="ptage" id="ptage" value="<?php echo $row['pat_age'];?>">
    <br>
    <br>
    <label for="ptsex">Patient Sex:</label>
    <br>
    <input type="radio" value="Male" name="sex" id="sex">Male
    <br>
    <input type="radio" value="Female" name="sex" id="sex">Female
    <br>
    <br>
    <label for="ptaddress">Patient Address:</label>
    <input type="text" name="ptaddress" id="ptaddress" value="<?php echo $row['pat_address'];?>">
    <br>
    <br>
    <label for="ptcity">Patient City:</label>
    <input type="text" name="ptcity" id="ptcity" value="<?php echo $row['pat_city'];?>">
    <br>
    <br>
    <label for="ptphone">Patient Phone No:</label>
    <input type="text" name="ptphone" id="ptphone" value="<?php echo $row['pat_phoneno'];?>">
    <br>
    <br>
    <Label>Patient Entrance Data:</Label>
    <input type="date" name="entrancedate" id="entrancedate" value="<?php echo $row['pat_entrance'];?>">
    <br>
    <br>
    <label for="doc">Select the Doctor</label>
    <select name="docid" id="docid">
    <?php 
    $query="SELECT * FROM all_doctors";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count>0)
    {
    
    while($row=mysqli_fetch_array($result))
    {
    ?>
    <option value="<?php echo $row['doc_id']?>"><?php echo $row['id'] ?></option>
    <?php }
    } ?>

    </select>
<br>
<br>
<input type="Submit">
</form>
  

  <?php 
  
  if($_POST)
  {
      $patno=$_POST['patno'];
    $name=$_POST['ptname'];
    $age=$_POST['ptage'];
    $sex=$_POST['sex'];
    $address=$_POST['ptaddress'];
    $city =$_POST['ptcity'];
    $phone=$_POST['ptphone'];
    $date=$_POST['entrancedate'];
    $id=$_POST['docid'];

    $query="UPDATE pat_entry SET pat_name='$name',pat_age='$age'
    ,pat_sex='$sex',pat_address='$address',pat_city='$city',
    pat_phoneno='$phone',pat_entrance='$date',doc_id='$id',
    departname=(SELECT departname FROM all_doctors WHERE doc_id='$id')";
    $result=mysqli_query($conn,$query);
  }
  
  
  
  
  ?>