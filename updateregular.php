<?php 
include('./connection.php');

$id=$_GET['docid'];

$query="SELECT * from doc_reg WHERE doc_id='$id'";
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
    <form action="rupdateprocess.php" method="POST">
    <input type="hidden" id="docid" name="docid" value="<?php echo $row['doc_id'];?>">
    <label for="docname">Doctor Name:</label>
    <input type="text" name="docname" id="docname" placeholder="Enter doctor's name " value="<?php echo $row['doc_name']?> ">
    <br>
    <br>
    <label for="doctor type">Doctor Type</label>
    <select name="doctype" id="doctype">
    <option value="DR">Regular Doctor</option>
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
    <label for="docsalary">Doctor's Salary</label>
    <input type="number" name="docsalary" id="docsalary" placeholder="Enter Doctor's Salary" value="<?php echo $row['doc_salary']?>">
    <br>
    <br>
    <label for="joindate" >Joining Date</label>
    <input type="date" name="joindate" id="joindate" value="<?php echo $row['joindate']?>">
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