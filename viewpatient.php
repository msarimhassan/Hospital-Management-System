<?php


  include('./connection.php');

$query="SELECT * from pat_entry";

  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);



?>
<br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css\bootstrap.min.css" />
      <link rel="stylesheet" href="header.css">
    <title>Patients Record</title>
</head>
<body>
<?php

if($_GET)
{
  
}
include('./header.php');
?>
<br>
    <h1 style="text-align:center;">All Patients</h1>
    <div style="float:right"><a href="patient.php">Add New</a></div>
<table class="table table-dark">
    <thead>
     <th scope="row">Pateint NO#</th>
      <th scope="row">Name</th>
      <th scope="row">Age</th>
      <th scope="row">Sex</th>
      <th scope="row">City</th>
       <th scope="row">Address</th>
       <th scope="row">phone no</th>
        <th scope="row">Entrance Date</th>
         <th scope="row"> Attended By Doctor</th>
         <th scope="row">Department</th>
         <th scope="row">Operations</th>

    </thead>
 <tbody>
     <?php
     if($count>0)
       {
        while($row=mysqli_fetch_array($result))
        { ?>
        <tr>
      <th scope="row"><?php echo $row['pat_id'] ?></th>
      <td class="table-active"><?php echo $row['pat_name'] ?></td>
      <td><?php echo $row['pat_age'] ?></td>
      <td class="table-active"><?php echo $row['pat_sex'] ?></td>
      <td><?php echo $row['pat_city'] ?></td>
      <td><?php echo $row['pat_address'] ?></td>
      <td class="table-active"><?php echo $row['pat_phoneno'] ?></td>
      <td><?php echo $row['pat_entrance'] ?></td>
      <td><?php echo $row['doc_id'] ?></td>
      <td><?php echo $row['departname'] ?></td>

      <td class="table-active"><a href="deletepatient.php?patno=<?php echo $row['pat_no'];?>">Delete</a> |
      
      <a href="newupdate.php?patno=<?php echo $row['pat_no'];?>">Update</a>
      </td>
      
    </tr>
    <?php }
       }?>
  </tbody>
</table>

<!-- Second Table -->
<?php 
$query="SELECT pat_entry.pat_no,pat_entry.pat_id,pat_reg.dateofvisit,
pat_reg.diagnosis,pat_reg.treatment,pat_reg.medicine,
pat_reg.statusoftreatment FROM pat_entry JOIN pat_reg ON pat_entry.pat_no=pat_reg.pat_no";
    $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
?>

<h1 style="text-align:center">Regular Patients</h1>
    <div style="float:right"><a href="regularpatients.php">Add New</a></div>
<table class="table table-dark">
    <thead>
     <th scope="row">Pateint NO#</th>
      <th scope="row">Date of Visit</th>
      <th scope="row">Diagnosis</th>
      <th scope="row">Treatment</th>
      <th scope="row">Medicine</th>
       <th scope="row">Status Of Treatment</th>
         <th scope="row">Operations</th>

    </thead>
 <tbody>
     <?php
     if($count>0)
       {
        while($row=mysqli_fetch_array($result))
        { ?>
        <tr>
      <th scope="row"><?php echo $row['pat_id'] ?></th>
      <td class="table-active"><?php echo $row['dateofvisit'] ?></td>
      <td class="table-active"><?php echo $row['diagnosis'] ?></td>
      <td><?php echo $row['treatment'] ?></td>
      <td><?php echo $row['medicine'] ?></td>
      <td class="table-active"><?php echo $row['statusoftreatment'] ?></td>
      <td class="table-active"><a href="deletetypepatient.php?patno=<?php echo $row['pat_no'];?>&type=DR">Delete</a>
      </td>
      
    </tr>
    <?php }
       }?>
  </tbody>
</table>


<!-- Third table -->

<?php 
$query="SELECT pat_entry.pat_no,pat_entry.pat_id,pat_chkup.doc_id,pat_chkup.checkupdate,
pat_chkup.Dignosis,pat_chkup.treatment,
pat_chkup.pat_status FROM pat_entry JOIN pat_chkup ON pat_entry.pat_no=pat_chkup.pat_no";
    $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
?>

<h1 style="text-align:center">Patients Have Checkup</h1>
    <div style="float:right"><a href="checkuppatient.php">Add New</a></div>
<table class="table table-dark">
    <thead>
     <th scope="row">Pateint NO#</th>
     <th scope="row">Attended By Doctor</th>
      <th scope="row">Check Up Date</th>
      <th scope="row">Diagnosis</th>
      <th scope="row">Treatment</th>
       <th scope="row">Status Of Treatment</th>
         <th scope="row">Operations</th>

    </thead>
 <tbody>
     <?php
     if($count>0)
       {
        while($row=mysqli_fetch_array($result))
        { ?>
        <tr>
      <th scope="row"><?php echo $row['pat_id'] ?></th>
      <td class="table-active"><?php echo $row['doc_id'] ?></td>
      <td class="table-active"><?php echo $row['checkupdate'] ?></td>
      <td class="table-active"><?php echo $row['Dignosis'] ?></td>
      <td><?php echo $row['treatment'] ?></td>
      <td class="table-active"><?php echo $row['pat_status'] ?></td>
      <td class="table-active"><a href="deletetypepatient2.php?patno=<?php echo $row['pat_no'];?>&type=CHK">Delete</a>
      
    </tr>
    <?php }
       }?>
  </tbody>
</table>

<!-- 4th table -->
<?php 
$query="SELECT pat_entry.pat_no,pat_entry.pat_id,pat_opr.pat_no,pat_opr.dateofadmission,pat_opr.dateofoperation,pat_opr.noofdoctor,
pat_opr.nooftheatre,pat_opr.typeofoperation,pat_opr.conditionbefore,pat_opr.conditionafter,pat_opr.treatmentadvice FROM
pat_entry JOIN pat_opr ON pat_entry.pat_no=pat_opr.pat_no";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
?>

<h1 style="text-align:center">Patients Have Operation</h1>
    <div style="float:right"><a href="operationpatient.php">Add New</a></div>
<table class="table table-dark">
    <thead>
     <th scope="row">Pateint NO#</th>
     <th scope="row">Date of Admission</th>
      <th scope="row">Date of Operation</th>
      <th scope="row">No of Doctors</th>
      <th scope="row">No of Theatre</th>
       <th scope="row">Type of Operation</th>
       <th scope="row">Condition Before</th>
       <th scope="row">Condition After</th>
       <th scope="row">Treatment Advice</th>
         <th scope="row">Operations</th>

    </thead>
 <tbody>
     <?php
     if($count>0)
       {
        while($row=mysqli_fetch_array($result))
        { ?>
        <tr>
      <th scope="row"><?php echo $row['pat_id'] ?></th>
      <td class="table-active"><?php echo $row['dateofadmission'] ?></td>
      <td class="table-active"><?php echo $row['dateofoperation'] ?></td>
      <td class="table-active"><?php echo $row['noofdoctor'] ?></td>
      <td><?php echo $row['nooftheatre'] ?></td>
      <td class="table-active"><?php echo $row['typeofoperation'] ?></td>
      <td class="table-active"><?php echo $row['conditionbefore'] ?></td>
      <td class="table-active"><?php echo $row['conditionafter'] ?></td>
      <td class="table-active"><?php echo $row['treatmentadvice'] ?></td>
      <td class="table-active"><a href="deletetypepatient3.php?patno=<?php echo $row['pat_no'];?>$type=OP">Delete</a>
    
      </td>
      
    </tr>
    <?php }
       }?>
  </tbody>
</table>

<!-- 5th table -->

<?php 
$query="SELECT pat_entry.pat_no,pat_entry.pat_id,pat_admit.pat_no,pat_admit.advancepayment,
pat_admit.modeofpayment,pat_admit.roomno,pat_admit.departname,
pat_admit.dateofadmission,pat_admit.initialcondition,pat_admit.dignosis,pat_admit.treatment,
pat_admit.noofdoctor,pat_admit.attendantname FROM pat_entry JOIN pat_admit ON pat_entry.pat_no=pat_admit.pat_no";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
?>

<h1 style="text-align:center">Patients Admit in the Hospital</h1>
    <div style="float:right"><a href="patientadmit.php">Add New</a></div>
<table class="table table-dark">
    <thead>
     <th scope="row">Pateint NO#</th>
     <th scope="row">Advance Payment</th>
      <th scope="row">Mode Of Payment</th>
      <th scope="row">Room no</th>
      <th scope="row">Department</th>
       <th scope="row">Date of Admission</th>
       <th scope="row">Initial Condition</th>
       <th scope="row">Dignosis</th>
       <th scope="row">Treatment</th>
         <th scope="row">No of Doctors</th>
         <th scope="row">Attendant Name</th>
         <th scope="row">Operation</th>

    </thead>
 <tbody>
     <?php
     if($count>0)
       {
        while($row=mysqli_fetch_array($result))
        { ?>
        <tr>
      <th scope="row"><?php echo $row['pat_id'] ?></th>
      <td class="table-active"><?php echo $row['advancepayment'] ?></td>
      <td class="table-active"><?php echo $row['modeofpayment'] ?></td>
      <td class="table-active"><?php echo $row['roomno'] ?></td>
      <td><?php echo $row['departname'] ?></td>
      <td class="table-active"><?php echo $row['dateofadmission'] ?></td>
      <td class="table-active"><?php echo $row['initialcondition'] ?></td>
      <td class="table-active"><?php echo $row['dignosis'] ?></td>
      <td class="table-active"><?php echo $row['treatment'] ?></td>
       <td class="table-active"><?php echo $row['noofdoctor'] ?></td>
        <td class="table-active"><?php echo $row['attendantname'] ?></td>
      <td class="table-active"><a href="deletetypepatient4.php?patno=<?php echo $row['pat_no'];?>&type=AD">Delete</a>
      
      </td>
      
    </tr>
    <?php }
       }?>
  </tbody>
</table>






<!-- 6th table -->
<?php 
$query="SELECT pat_entry.pat_no,pat_entry.pat_id,pat_dis.pat_no,pat_dis.treatmentgiven,pat_dis.treatmentadvice, pat_dis.paymentmade,
pat_dis.modeofpayment,pat_dis.dateofdischarge FROM pat_entry JOIN pat_dis ON pat_entry.pat_no=pat_dis.pat_no";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
?>

<h1 style="text-align:center">Patients Disharge</h1>
    <div style="float:right"><a href="dischargepatient.php">Add New</a></div>
<table class="table table-dark">
    <thead>
     <th scope="row">Pateint NO#</th>
     <th scope="row">Treatment Given</th>
      <th scope="row">Treatment Advice</th>
      <th scope="row">Payment Made</th>
      <th scope="row">Mode of Payment</th>
       <th scope="row">Date of Discharge</th>
         <th scope="row">Operations</th>

    </thead>
 <tbody>
     <?php
     if($count>0)
       {
        while($row=mysqli_fetch_array($result))
        { ?>
        <tr>
      <th scope="row"><?php echo $row['pat_id'] ?></th>
      <td class="table-active"><?php echo $row['treatmentgiven'] ?></td>
      <td class="table-active"><?php echo $row['treatmentadvice'] ?></td>
      <td class="table-active"><?php echo $row['paymentmade'] ?></td>
      <td><?php echo $row['modeofpayment'] ?></td>
      <td class="table-active"><?php echo $row['dateofdischarge'] ?></td>
      <td class="table-active"><a href="deletetypepatient5.php?patno=<?php echo $row['pat_no'];?>&type=DIS">Delete</a>
      </td>
      
    </tr>
    <?php }
       }?>
  </tbody>
</table>


</body>
</html>