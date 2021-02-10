<?php 
   include('./connection.php');

       $docid=$_POST['docid'];
       $name=$_POST['docname'];
       $type=$_POST['doctype'];
       $qualification=$_POST['docqualification'];
       $address=$_POST['docaddress'];
       $phone=$_POST['docphone'];
        $fee=$_POST['feecall'];
         $pdue=$_POST['paymentdue'];
       $department=$_POST['department'];
         
       $query="UPDATE all_doctors SET departname='$department' WHERE doc_id='$docid' ";
       $result=mysqli_query($conn,$query);

        $query="UPDATE doc_on_call SET doc_name='$name',doc_qualification='$qualification',
           doc_address='$address', doc_phoneno='$phone',doc_payment_due='$pdue',fee_per_call='$fee' WHERE doc_id='$docid'";
           $result=mysqli_query($conn,$query);
          header('Location:view.php?message="Record Updated"');
      
   ?>