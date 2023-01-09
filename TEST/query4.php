<?php
require("db.php");

$ss=$_SESSION['username'];
//$error="";
$query = "SELECT complain.id,complain.Status, customer.customername,complain.username,complain.Mnumber,
complain.query,complain.ReferredTo, complain.Solution,rtolevel2.Referredto,rtolevel2.Username 
FROM `complain` INNER JOIN customer ON complain.Mnumber=customer.Mnumber INNER JOIN rtolevel2 ON complain.id=rtolevel2.PID
WHERE rtolevel2.Username ='$ss' AND state=21 ORDER BY dateofcomplain AND timecomp desc"; 
$result = mysqli_query($con,$query) or die(mysql_error());
$n=mysqli_num_rows($result);
$_SESSION['l2f']=$n;
 
?>