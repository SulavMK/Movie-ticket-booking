<?php
require('db.php');
include("auth.php");
$ss=$_SESSION['username'];
$query = "SELECT complain.id, customer.customername,complain.username,complain.Mnumber,complain.query,
rtolevel2.Referredto,complain.Status 
FROM `complain` INNER JOIN customer ON complain.Mnumber=customer.Mnumber INNER JOIN rtolevel2 ON complain.id=rtolevel2.PID
WHERE rtolevel2.Referredto='$ss' AND complain.Status='PENDING(Referred to Level 2)' 
ORDER BY dateofcomplain and timecomp desc" ; 

$result = mysqli_query($con,$query) or die(mysql_error());
$n=mysqli_num_rows($result);
$_SESSION['pending']=$n;
?>