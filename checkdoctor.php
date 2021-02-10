<?php 
   include('./connection.php');
   if($_POST['doctype']=='DR')
   {
       $name=$_POST['docname'];
       $type=$_POST['doctype'];
       $qualification=$_POST['docqualification'];
       $address=$_POST['docaddress'];
       $phone=$_POST['docphone'];
       $salary=$_POST['docsalary'];
       $date =$_POST['joindate'];
       $department=$_POST['department'];
         
       $query="Insert INTO all_doctors SET departname='$department' ";
       $result=mysqli_query($conn,$query);

          $query ="SELECT MAX(doc_id) from all_doctors";
        $id= mysqli_query($conn,$query);
        $row = mysqli_fetch_array($id);

       $id=$row['MAX(doc_id)'];

       $query="Update all_doctors SET id=concat('DR',doc_id) WHERE doc_id='$id'";
       $result=mysqli_query($conn,$query);

        $query ="SELECT MAX(doc_id) from all_doctors";
        $id= mysqli_query($conn,$query);
        $row = mysqli_fetch_array($id);

       $id=$row['MAX(doc_id)'];
        $query="INSERT INTO doc_reg SET doc_id='$id', doc_name='$name',doc_qualification='$qualification',
           doc_address='$address', doc_phoneno='$phone',doc_salary='$salary',joindate='$date'";
           $result=mysqli_query($conn,$query);
          header('Location:view.php?message="Record Added"');
      
   }
   else if($_POST['doctype']=='DC')
   {
        $name=$_POST['docname'];
       $type=$_POST['doctype'];
       $qualification=$_POST['docqualification'];
        $address=$_POST['docaddress'];
         $phone=$_POST['docphone'];
         $fee=$_POST['feecall'];
         $pdue=$_POST['paymentdue'];
         $department=$_POST['department'];

          $query="Insert INTO all_doctors SET departname='$department' ";
       $result=mysqli_query($conn,$query);

          $query ="SELECT MAX(doc_id) from all_doctors";
        $id= mysqli_query($conn,$query);
        $row = mysqli_fetch_array($id);

       $id=$row['MAX(doc_id)'];

        $query="Update all_doctors SET id=concat('DC',doc_id) WHERE doc_id='$id'";
       $result=mysqli_query($conn,$query);

          $query ="SELECT MAX(doc_id) from all_doctors";
        $id= mysqli_query($conn,$query);
        $row = mysqli_fetch_array($id);
         $id=$row['MAX(doc_id)'];
        $query="INSERT INTO doc_on_call SET doc_id='$id', doc_name='$name',doc_qualification='$qualification',fee_per_call='$fee',
        doc_phoneno='$phone',doc_payment_due='$pdue',
           doc_address='$address'";
           $result=mysqli_query($conn,$query);
           header('Location:view.php?message="Record Added"');
   }

?>