<?php
//include auth.php file on all secure pages
require("auth.php");
require('db.php');
if(isset($_POST['submit']))
{
	//insert into database
	
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email);
	
	$subject=$_POST['custname'];
	$mnum=$_POST['mobilenumber'];
	$uname=$_POST['cname'];
	$email = $_POST['email'];
	
	$slquery = "SELECT * FROM users WHERE email = '$email'";
			$selectresult = mysqli_query($con,$slquery);
		if(mysqli_num_rows($selectresult)>0)
		{	echo "<div class='form'>
			<h3>Email already exist.</h3>
			<br/>"; 
		}

		$query = "INSERT into `customer` (customername, Mnumber, cname, email)
				VALUES ('$subject','$mnum','$uname', '$email')";
				$result = mysqli_query($con,$query);
		if($result)
				{		$_SESSION['custname']=$subject;
						header("Location: complainbox.php");
				}
				else
				{
					header("Location: homepage.php");
					echo '<script type="text/javascript"> alert("Registration Failed.")</script>'; 
					
				}
}
  
?>


<!DOCTYPE html>
<html>
<head>
<style>
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
.error 
{
  color:red;
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
	
}
body{background-color:#E6F1F7;}
</style>

</head>
<body>
<div id="example1" class="form" style="position:relative;box-sizing: content-box;width: 400px;
  height: 500px;
  padding: 30px;  
  border-style: solid;
  border-color: #0B4990;
  border-width: 8px;
  text-align:left;
   margin: 50px auto;">
		<h1>Customer Registration</h1>
			<form action="" method="post">
				<label for "Mnumber">Mobile Number:</label><input type="text" name="mobilenumber" placeholder="" 
				value="<?php echo $_SESSION['mobilenumber']; ?> " required /><br><br><br>
				<label for "usname">Name:</label><input align="left" style="padding: 10px;"type="text" name="custname" placeholder="Enter Customer name" required />
				<br><br><br> 
				<label for "cname">Company Name:</label><input type="text" name="cname" placeholder="Enter company name" required />
				</br></br></br> 			
				<label for "cname">Email:</label>
				
				<input type="email" name="email" placeholder="Enter an e-mail(Optional)" 
								value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" />
				
				</br></br></br> 
				<input name="submit" type="submit" value="submit" style=" text-align:center;"/>

			</form>
</div>


</body>
</html>

