<?php
require('db.php');
include("auth.php");
$ss=$_SESSION['username'];
$query = "SELECT complain.id, customer.customername,complain.username,complain.Mnumber,complain.query,complain.ReferredTo 
FROM `complain` INNER JOIN customer ON complain.Mnumber=customer.Mnumber WHERE ReferredTo='$ss' AND Status='PENDING(Referred to Level 1)' 
ORDER BY dateofcomplain and timecomp desc" ; 
$result = mysqli_query($con,$query) or die(mysql_error());
$n=mysqli_num_rows($result);
$_SESSION['pending']=$n;






?>