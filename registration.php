<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 10px 5px;
  overflow: hidden;
  background-color: #0B4990;
}

li a:not(.apple) {
  float: left;
}
.apple {
  float: right;
}
.error {
  color:red;
}
.notification {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  background: red;
}
.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 10px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #4CAF50;
}

.active {
  background-color: #800080 ;
}
#msg
{
	position:relative;
	padding-left:280px;
	text-align:center;
	font-size:20px;
	font-weight:bold;
	
	color:white;
	
}
#example1
{
   position:relative; 
 box-sizing: content-box;  
  width: 400px;
  height: 530px;
  padding:12px;  
  border-style: solid;
  border-color: #0B4990;
  border-width:8px;
  text-align:center;
   margin: 10px auto;
}

input[type='text'], input[type='email'],
input[type='password'] {
     width: 230px;
     border-radius: 2px;
     border: 1px solid #0061a7;
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
}
input[type='submit']:hover {
     background-color: #024978;
}
body{background-color:#E6F1F7;}
.myButton {
	box-shadow:inset 0px 1px 0px 0px #54a3f7;
	background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
	background-color:#007dc1;
	border-radius:3px;
	border:1px solid #124d77;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:16px;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #154682;
	position:absolute;
	top:590px;
	left:730px;
}
.myButton:hover {
	background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
	background-color:#0061a7;
}
</style>

</head>
	<body>
			<div id="example1" class="form">
					<h1>User Registration</h1>
					<form action="" method="post">
								<input type="text" name="username"  placeholder="Username" 
								value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" required /><br><br>
								<input type="email" name="email" placeholder="Email" 
								value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" required /><br><br>
								<input type="text" name="mobile"  placeholder="Mobile Number" required /><br><br>
								<input type="text" name="custname"  placeholder="Full Name" required /><br><br>
								<input type="password" name="password"  placeholder="Password" required /><br><br>
								<input type="password" name="confirmpass"  placeholder="Confirm Password" required /><br><br>
								<input type="submit" name="submit" value="Register"/>
					</form>
					
			</div>
			<a href="login.php" style="color:blue;position:absolute;left:790px; top:600px">Login Here.</a>
	</body>
</html>
<?php
error_reporting();
require('db.php');
// If form submitted, insert values into the database.
if (isset($_POST['submit']))
{
        // removes backslashes
	$username = stripslashes($_POST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_POST['password']);
	$confirmpass = stripslashes($_POST['confirmpass']);
	$password = mysqli_real_escape_string($con,$password);
	$confirmpass= mysqli_real_escape_string($con,$confirmpass);
	$username = $_POST['username'];
	$UN = preg_replace('/\s+/', '', $username);
	
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$custname = $_POST['custname'];
	$password = $_POST['password'];
	$confirmpass = $_POST['confirmpass'];
	$trn_date = date("Y-m-d H:i:s");
	
		$slquery = "SELECT * FROM users WHERE email = '$email'";
			$selectresult = mysqli_query($con,$slquery);
			
		$slquery1 = "SELECT * FROM users WHERE username = '$UN'";
			$selectresult1 = mysqli_query($con,$slquery1);
			
	if(empty($_POST['mobile']))
			{
				echo "<div class='form'>
				<h3>Enter a mobile number.</h3>
				<br/>"; 
			}
			else if(strlen($_POST['mobile'])<10)
			{
				echo "<div class='form'>
				<h3>Enter 10 digits.</h3>
				<br/>";
			}
			else if(!preg_match('/^[6-9]\d{9}$/', $_POST['mobile']))
			{
			  echo "<div class='form'>
				<h3>Invalid Mobile Number.</h3>
				<br/>";
			}
			
			else if(mysqli_num_rows($selectresult)>0)
			{	echo "<div class='form'>
				<h3>Email already exist.</h3>
				<br/>"; 
			}
			
			else if(mysqli_num_rows($selectresult1)>0)
			{	echo "<div class='form'>
				<h3>Username already exist.</h3>
				<br/>"; 
			}
	else
	{
		if($password == $confirmpass)
		{
			
				$query100 = "INSERT INTO users (username, password, email, regdate,confirmpass, mobile, fullname)
				VALUES ('$UN', '".md5($password)."', '$email', '$trn_date','".md5($confirmpass)."', '$mobile','$custname')";
				$result = mysqli_query($con,$query100);
				if($result)
				{
						echo "<div class='form'>
						<h4>You are registered successfully.</h4> </div>";
				}
				else
				{
					
					echo '<script type="text/javascript"> alert("Registration Failed.")</script>'; 
					
				}
				
			
		}		
    
			else
			{
				echo '<script type="text/javascript"> alert("Passwords do not match.")</script>';
				//header("Location: registration.php");
				  
			}
    }
}

?>

<script>
function bigImg(x) {
  x.style.color = "blue";
  
}
function normalI(x) {
  x.style.color = "black";
  
}

</script>