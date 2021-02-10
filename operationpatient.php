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
<label for="dateoperation">Date Of Operation</label>
<input type="date" name="operationdate" id="operationdate">
<br>
<br>
<label for="noofdoc">No of Doctor</label>
<input type="number" name="noofdoc" id="noofdoc">
<br>
<br>
<label for="theatre">No of theatre</label>
<input type="number" name="theatre" id="theatre">
<br>
<br>
<label for="typeoperation">Type of Operation</label>
<input type="text" name="operationtype" id="operationtype">
<br>
<br>
<label for="condbefore">Condition Before</label>
<input type="text" name="condbefore" id="condbefore">
<br>
<br>
<label for="condafter">Condition After</label>
<input type="text" name="condafter" id="condafter">
<br>
<br>
<label for="treatadv">Treatment Advice</label>
<input type="text" name="treatadv" id="treatadv">
<br>
<br>
<input type="submit" value="submit">

</form>

<?php 

if($_POST)
{
  
$id=$_POST['patno'];
$operationdate=$_POST['operationdate'];
$treatadv=$_POST['treatadv'];
$noofdoc=$_POST['noofdoc'];
$theatre=$_POST['theatre'];
$operationtype=$_POST['operationtype'];
$condbefore=$_POST['condbefore'];
$condafter=$_POST['condafter'];
 
$query="SELECT pat_entrance from pat_entry WHERE pat_no='$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$admissiondate=$row['pat_entrance'];

$query="INSERT INTO pat_opr SET pat_no='$id',dateofadmission='$admissiondate',dateofoperation='$operationdate',
noofdoctor='$noofdoc',nooftheatre='$theatre',
typeofoperation='$operationtype',conditionbefore='$condbefore',conditionafter='$condafter',treatmentadvice='$treatadv'";
 $result=mysqli_query($conn,$query);
 if($result)
 {
     header('Location:viewpatient.php');
 }
}




?>