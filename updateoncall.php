<?php 
include('./connection.php');

$id=$_GET['docid'];

$query="SELECT * from doc_on_call WHERE doc_id='$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update|Regular Doctor</title>
</head>
<body>
    <form action="cupdateprocess.php" method="POST">

    <input type="hidden" id="docid" name="docid" value="<?php echo $row['doc_id'];?>">
    <label for="docname">Doctor Name:</label>
    <input type="text" name="docname" id="docname" placeholder="Enter doctor's name " value="<?php echo $row['doc_name']?> ">
    <br>
    <br>
    <label for="doctor type">Doctor Type</label>
    <select name="doctype" id="doctype">
    <option value="DC">Doctor on call</option>
    </select>
    <br>
    <br>
    <label for="qualification">Doctor's Qualification:</label>
    <input type="text" name="docqualification" id="docqualification" placeholder="Enter doctor's qualification" value="<?php echo $row['doc_qualification']?>">
    <br>
    <br>
    <label for="docaddress">Doctor's Address</label>
    <input type="text" name="docaddress" id="docaddress" placeholder="Enter doctor's address" value="<?php echo $row['doc_address']?>">
    <br>
    <br>
    <label for="docphone">Doctor's Phone no</label>
    <input name="docphone" id="docphone" placeholder="Enter doctor's phone-no" value="<?php echo $row['doc_phoneno']?>">
    <br>
    <br>
    <label for="feepercall">Fee Per Call:</label>
    <input type="number" name="feecall" id="feecall" placeholder="Fee per call" value="<?php echo $row['fee_per_call']?>">
    <br>
    <br>
    <label for="paymentdue">Payment Due:</label>
    <input type="number" name="paymentdue" id="paymentdue" placeholder="Payment Due" value="<?php echo $row['doc_payment_due']?>">
    <br>
    <br>

    <label for="department">SELECT THE DEPARTMENT</label>
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
     <input type="submit">
     </form>
</body>
</html>