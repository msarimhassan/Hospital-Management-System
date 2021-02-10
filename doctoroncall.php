<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor form(oncall)</title>

</head>
<body>
<?php  include('./header.php'); ?>
<br>
<h2 style="color:rgb(170, 13, 13)";>Doctor On Call 📞</h2>
    <form action="checkdoctor.php" method="POST">
    <label for="docname">Doctor Name:</label>
    <input type="text" name="docname" id="docname" placeholder="Enter doctor's name ">
    <br>
    <br>
    <label for="doctor type">Doctor Type:</label>
    <select name="doctype" id="doctype">
    <option value="DC">Doctor on Call</option>
    </select>
    <br>
    <br>
    <label for="qualification">Doctor's Qualification:</label>
    <input type="text" name="docqualification" id="docqualification" placeholder="Enter doctor's qualification">
    <br>
    <br>
    <label for="docaddress">Doctor's Address:</label>
    <input type="text" name="docaddress" id="docaddress" placeholder="Enter doctor's address">
    <br>
    <br>
    <label for="docphone">Doctor's Phone no:</label>
    <input  name="docphone" id="docphone" placeholder="Enter doctor's phone-no">
 
 
    <br>
    <br>
    <label for="feepercall">Fee Per Call:</label>
    <input type="number" name="feecall" id="feecall" placeholder="Fee per call">
    <br>
    <br>
    <label for="paymentdue">Payment Due:</label>
    <input type="number" name="paymentdue" id="paymentdue" placeholder="Payment Due">
    <br>
    <br>
  

    <label for="department">SELECT THE DEPARTMENT:</label>
     <select name="department" id="department">
     <option value="emergency">emergency</option>
     <option value="cardiology">cardiology</option>
     <option value="anesthetic">anesthetic</option>
     <option value="dental">dental</option>
     <option value="optometry">optometry</option>
     <option value="gynecology">gynecology</option>
     </select>
     <br>
     <input type="submit">
    </form>
</body>
</html>