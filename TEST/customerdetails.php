<?php
require("auth.php");
require('db.php');
//$mobilenumber=$_POST['mobilenumber'];

$ss=$_SESSION['mobilenumber'];
$query = "SELECT * FROM `customer` WHERE Mnumber= '$ss'" ; 
$result = mysqli_query($con,$query) or die(mysql_error());
$fetchRow = mysqli_fetch_array($result);
if(isset($_POST['submit']))
{
	$ps=$_POST['usname'];
	if($result)
	{
		$_SESSION['custname']= $ps;
		header("Location: complainbox.php");
	}
	
}


?>




<html>
<head>
<meta charset="utf-8">
<title>Customer Details</title>

<style>
body{background-color:#E6F1F7;}
#example1
{
   position:relative; 
   box-sizing: content-box;  
  width: 400px;
  height: 400px;
  padding: 30px;  
  border-style: solid;
  border-color:  #0B4990;
  border-width: 7px;

  text-align:left;
   margin: 50px auto;
}
input[type='text'], input[type='email'],
input[type='password'] {
     width: 200px;
     border-radius: 2px;
     border: 1px solid #CCC;
     padding: 10px;
     color: #333;
     font-size: 14px;
     margin-top: 10px;
}
input[type='submit']{
     padding: 10px 25px 8px;
     color: #fff;
     background-color: #0067ab;
     text-shadow: rgba(0,0,0,0.24) 0 1px 0;
     font-size: 16px;
     box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0;
     border: 1px solid #0164a5;
     border-radius: 2px;
     margin-top: 10px;
     cursor:pointer;
	 position:absolute;
	 left:170px;
}
input[type='submit']:hover {
     background-color: #024978;
}
</style>

</head>
	<body>
			<div id="example1">
					<h1>Customer Details</h1>
					<form action="" method="post">		
								<label for "usname">Name:</label><input type="text" name="usname" value="<?php echo $fetchRow['customername']?>" required /><br><br>
								<label for "Mnumber">Mobile Number:</label><input type="text" name="Mnumber"  value="<?php echo $fetchRow['Mnumber']?>" required /><br><br>
								<label for "cname">Company Name:</label><input type="text" name="cname"  value="<?php echo $fetchRow['cname']?>" required /><br><br>
								</br></br>
								<input type="submit" name="submit" value="Submit" alogn="center"/>
					</form>
			</div>
	</body>
</html>
