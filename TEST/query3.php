<?php
require('db.php');
//include("auth.php");
$ss=$_SESSION['username'];

$query = "SELECT complain.id,complain.Status, customer.customername,complain.username,complain.Mnumber,complain.query,complain.ReferredTo, complain.Solution FROM `complain` 
INNER JOIN customer ON complain.Mnumber=customer.Mnumber
WHERE username='$ss' AND (state=11 OR state=21) ORDER BY dateofcomplain AND timecomp desc"; 
$result = mysqli_query($con,$query) or die(mysql_error());
$n=mysqli_num_rows($result);
$_SESSION['nf']=$n;
?>