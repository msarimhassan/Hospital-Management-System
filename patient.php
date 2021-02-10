<?php 
include('./connection.php');
$query="Select * from all_doctors";
$result=mysqli_query($conn,$query);
 $count=mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Record</title>
</head>
<body>
<?php include('./header.php')?>
<h1>Patient Record🧑 </h1>
    <form action="checkpatient.php" method="POST">
    <label for="ptname">Patient Name:</label>
    <input type="text" name="ptname" id="ptname">
    <br>
    <br>
    <label for="ptage">Patient Age:</label>
    <input type="text" name="ptage" id="ptage">
    <br>
    <br>
    <label for="ptsex">Patient Sex:</label>
    <br>
    <input type="radio" value="Male" name="sex" id="sex">Male
    <br>
    <input type="radio" value="Female" name="sex" id="sex">Female
    <br>
    <br>
    <label for="ptaddress">Patient Address:</label>
    <input type="text" name="ptaddress" id="ptaddress">
    <br>
    <br>
    <label for="ptcity">Patient City:</label>
    <input type="text" name="ptcity" id="ptcity">
    <br>
    <br>
    <label for="ptphone">Patient Phone No:</label>
    <input type="text" name="ptphone" id="ptphone">
    <br>
    <br>
    <Label>Patient Entrance Data:</Label>
    <input type="date" name="entrancedate" id="entrancedate">
    <br>
    <br>
    <label for="doc">Select the doctor</label>
    <select name="docid">
    <?php if($count>0)
    {
    while($row=mysqli_fetch_array($result))
    {
 ?>
 <option value="<?php echo $row['doc_id']?>"><?php echo $row['id']?> </option>
 <?php }
    }
    ?>
    </select>
    <br>
    <br>
    <input type="submit" value="Submit">

    
    
    </form>
</body>
</html>