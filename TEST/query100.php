<?php
require('db.php');
//include("auth.php");
$ss=$_SESSION['username'];
$query = "SELECT full_name FROM users WHERE username ='$ss'"; 
$result = mysqli_query($con,$query) or die(mysql_error());
$n=mysqli_fetch_array($result);
$nn = $n['full_name'];
$_SESSION['LOG']=$nn;
?>