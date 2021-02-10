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
<label for="treatmentadvice">Treatment Given</label>
<input type="text" name="treatmentgive" id="treatmentgive">
<br>
<br>
<label for="treatadv">Treatment Advice</label>
<input type="text" name="treatmentadv" id="treatmentadv">
<br>
<br>
<label for="payment">Payment Made</label>
<input type="number" name="paymentmade" id="paymentmade">
<br>
<br>
<label for="modepayment">Mode OF payment</label>
<input type="text" name="paymentmode" id="paymentmode">
<br>
<br>
<label for="date">Date of Discharge</label>
<input type="date" name="dischargedate">
<br>
<br>
<input type="submit" value="submit">

</form>

<?php 

if($_POST)
{
  
$id=$_POST['patno'];
$date=$_POST['dischargedate'];
$treatadv=$_POST['treatmentadv'];
$treatmentgive=$_POST['treatmentgive'];
$payment=$_POST['paymentmade'];
$paymentmode=$_POST['paymentmode'];

 $query="INSERT INTO pat_dis SET pat_no='$id',treatmentgiven='$treatmentgive',treatmentadvice='$treatadv',
 paymentmade='$payment',modeofpayment='$paymentmode',dateofdischarge='$date'";
 $result=mysqli_query($conn,$query);
 if($result)
 {
     header('Location:viewpatient.php');
 }
}




?>