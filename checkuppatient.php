<?php 
  include('./connection.php');
  $query="SELECT pat_no,pat_id from pat_entry";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
?>

<form  method="POST">
<br>
<br>
<label for="pateintno">Select the Patient</label>
<Select name="patno">
<?php
if ($count>0)
{

while($row=mysqli_fetch_array($result))
{
?>
<option value="<?php echo $row['pat_no']?>"><?php echo $row['pat_id']?></option>
<?php 
}
}
?>

</Select>
<br><br>
<label for="datevist">Checkup</label>
<input type="date" name="vdate" id="vdate">
<br>
<br>
<label for="diagnosis">Diagnosis</label>
<input type="text" name="diagnosis" id="diagnosis">
<br>
<br>
<label for="treatment">Treatment</label>
<input type="text" name="treatment" id="treatment">
<br>
<br>
<label for="status">Treatment Status</label>
<input type="text" name="status" id="status">
<br>
<br>
<input type="submit" value="submit">

</form>

<?php 

if($_POST)
{
  
$id=$_POST['patno'];
$date=$_POST['vdate'];
$diagnosis=$_POST['diagnosis'];
$treatment=$_POST['treatment'];
$status=$_POST['status'];
$query="SELECT doc_id from pat_entry WHERE pat_no='$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$doc_id=$row['doc_id'];
 $query="INSERT INTO pat_chkup SET pat_no='$id',doc_id=$doc_id,
 checkupdate='$date',Dignosis='$diagnosis',treatment='$treatment',pat_status='$status'";
 $result=mysqli_query($conn,$query);
 if($result)
 {
     header('Location:viewpatient.php');
 }
}




?>