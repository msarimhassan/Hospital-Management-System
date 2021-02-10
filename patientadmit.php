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

<br>
<br>
<label for="advpayment">Advance Payment</label>
<input type="number" name="advpayment" id="advpayment">
<br>
<br>
<label for="paymentmode">Mode of Payment</label>
<input type="text" name="paymentmode" id="paymentmode">
<br>
<br>
<label for="roomno">Select Room Type</label>
<select name="roomno" id="roomno">
<?php 
$query="SELECT roomno,roomtype from room_details where roomstatus='non-occupi'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count>0)
{
    while($row=mysqli_fetch_array($result))
    {

?>
<option value="<?php echo $row['roomno']?>"><?php echo $row['roomtype']?></option>
<?php }
}
?>

</select>
<br>
<br>
 <label for="department">SELECT THE DEPARTMENT:</label>
     <select name="department" id="department">
     <option value="emergency">emergency</option>
     <option value="cardiology">cardiology</option>
     <option value="anesthetic">anesthetic</option>
     <option value="dental">dental</option>
     <option value="emergency">emergency</option>
     <option value="optometry">optometry</option>
     <option value="gynecology">gynecology</option>
     </select>
     <br>
     <br>
     <label for="admissiondate">Date of Admission</label>
     <input type="date" name="admissiondate" id="admissiondate">
     <br>
     <br>
     <label for="condition">Initial Condition</label>
     <input type="text" name="condition" id="condition">
     <br>
     <br>
     <label for="diagnosis">Diagnosis</label>
     <input type="text" name="dignosis" id="dignosis">
     <br>
     <br>
     <label for="treatment">Treatment</label>
     <input type="text" name="treatment" id="treatment">
     <br>
     <br>
     <label for="doc">No of Doctor</label>
     <input type="number" id="noofdoc" name="noofdoc">
     <br>
     <br>
     <label for="name">Attendant Name</label>
     <input type="text" name="name" id="name">
     <br>
     <br>
     <input type="Submit">
     </form>

     <?php 
     
     if($_POST)
     {
         $patno=$_POST['patno'];
         $advpayment=$_POST['advpayment'];
         $paymentmode=$_POST['paymentmode'];
         $roomno=$_POST['roomno'];
         $department=$_POST['department'];
         $admissiondate=$_POST['admissiondate'];
         $condition=$_POST['condition'];
         $dignosis=$_POST['dignosis'];
         $treatment=$_POST['treatment'];
         $noofdoc=$_POST['noofdoc'];
         $name=$_POST['name'];
         $query="INSERT INTO pat_admit SET pat_no='$patno',advancepayment='$advpayment',modeofpayment='$paymentmode'
         ,roomno='$roomno',departname='$department',dateofadmission='$admissiondate',initialcondition='$condition',
         dignosis='$dignosis',treatment='$treatment',noofdoctor='$noofdoc',attendantname='$name'";
         $result=mysqli_query($conn,$query);
         $query="UPDATE room_details SET roomstatus='occupy' WHERE roomno='$roomno'";
         $result=mysqli_query($conn,$query);

     }
     
     
     
     
     
     
     ?>