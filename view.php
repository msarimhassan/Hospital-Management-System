<?php


  include('./connection.php');
  

 $query="SELECT all_doctors.id,doc_reg.doc_id,doc_reg.doc_name,all_doctors.departname,doc_reg.doc_qualification,doc_reg.doc_address,
 doc_reg.doc_phoneno,doc_reg.doc_salary,doc_reg.joindate
  FROM all_doctors JOIN doc_reg ON all_doctors.doc_id=doc_reg.doc_id";

  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);


include('./header.php');
?>
<br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css\bootstrap.min.css" />
      <link rel="stylesheet" href="header.css">
    <title>Doctor Records</title>
</head>
<body>
<?php

if($_GET)
{
  
}

?>
    <h1 style="text-align:center;color:red"> 📝 Regular Doctor Records 👨‍⚕️</h1>
    <div style="float:right"><a href="regulardoctor.php">Add New</a></div>
<table class="table table-danger">
    <thead>
     <th scope="row">ID #</th>
      <th scope="row">Name</th>
      <th scope="row">Department Name</th>
      <th scope="row">Qualification</th>
      <th scope="row">Address</th>
       <th scope="row">phone no</th>
        <th scope="row">Salary</th>
         <th scope="row">Joining date</th>
         <th scope="row">Operations</th>
    </thead>
 <tbody>
     <?php
     if($count>0)
       {
        while($row=mysqli_fetch_array($result))
        { ?>
        <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td class="table-active"><?php echo $row['doc_name'] ?></td>
      <td><?php echo $row['departname'] ?></td>
      <td class="table-active"><?php echo $row['doc_qualification'] ?></td>
      <td><?php echo $row['doc_address'] ?></td>
      <td><?php echo $row['doc_phoneno'] ?></td>
      <td class="table-active"><?php echo $row['doc_salary'] ?></td>
      <td><?php echo $row['joindate'] ?></td>
      <td class="table-active"><a href="deleteregular.php?docid=<?php echo $row['doc_id'];?>">Delete</a> |
      
      <a href="updateregular.php?docid=<?php echo $row['doc_id'];?>">Update</a>
      </td>
      
    </tr>
    <?php }
       }?>
  </tbody>
</table>


<!-- second table -->
<?php 

 $query="SELECT all_doctors.id,doc_on_call.doc_id,doc_on_call.doc_name,all_doctors.departname,doc_on_call.doc_qualification,
doc_on_call.doc_address,doc_on_call.doc_phoneno,
doc_on_call.fee_per_call,
doc_on_call.doc_payment_due FROM all_doctors JOIN doc_on_call ON all_doctors.doc_id=doc_on_call.doc_id";
 $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);

?>
 <h1 style="text-align:center;color:red">📞 Doctor On Call Records 👨‍⚕️ </h1>
 <div style="float:right"><a href="doctoroncall.php">Add New</a></div>
<table class="table table-danger">
    <thead>
     <th scope="row">ID #</th>
      <th scope="row">Name</th>
      <th scope="row">Department Name</th>
      <th scope="row">Qualification</th>
      <th scope="row">Address</th>
       <th scope="row">phone no</th>
        <th scope="row">Fee Per Call</th>
         <th scope="row">Payment Due</th>
         <th scope="row">Operations</th>
    </thead>
 <tbody>
     <?php
     if($count>0)
       {
        while($row=mysqli_fetch_array($result))
        { ?>
        <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td class="table-active"><?php echo $row['doc_name'] ?></td>
      <td><?php echo $row['departname'] ?></td>
      <td class="table-active"><?php echo $row['doc_qualification'] ?></td>
      <td><?php echo $row['doc_address'] ?></td>
      <td><?php echo $row['doc_phoneno'] ?></td>
      <td class="table-active"><?php echo $row['fee_per_call'] ?></td>
      <td><?php echo $row['doc_payment_due'] ?></td>
      <td class="table-active"><a href="deleteoncall.php?docid=<?php echo $row['doc_id'];?>">Delete</a> |
         <a href="updateoncall.php?docid=<?php echo $row['doc_id'];?>">Update</a></td>
    </tr>
    <?php }
       }?>
  </tbody>
</table>



     <script src="js\jquery.js"></script>
        <script src="js\bootstrap.min.js"></script>
</body>
</html>