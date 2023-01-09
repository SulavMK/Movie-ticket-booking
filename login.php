<?php
session_start();
?>
<?php
//session_start();
$error="";
require('db.php');
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($con,$username);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con,$password);
 $password = $_POST['password'];
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
 $result = mysqli_query($con,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
        if($rows==1)
		{
			while($fetchRow = mysqli_fetch_array($result))
			{
				if($fetchRow['type']==1)
				{
					$_SESSION['username'] = $username;
					// Redirect user to level 1 module
						header("Location: adminhomepage.php");
				}
			else if($fetchRow['type']==0)
			{
					$_SESSION['username'] = $username;
					// Redirect user to agent module.
						header("Location: home.php");
			}
			else
			{
			  	$_SESSION['username'] = $username;
					// Redirect user to level 2 module
						header("Location: mainadmin.php");
			}
				
			}
         }
		 else
		 {
			  echo "<div class='form'>
			<h3 style='position:absolute; top:590px; left:400px;'>Username/password is incorrect.</h3>
			<br/>";
			 
			
		 }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>MTBS Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	body{background-color:#E6F1F7;}
.container
{
   position:absolute; 
 box-sizing: content-box;  

  width: 500px;
  height: 490px;
  padding: 10px;  
  border-style: solid;
  border-color: #0B4990;
  border-width:8px;

  text-align:center;
   margin: 50px auto;
   left: 200px; 
  right: 200px;
}
.btn{
		width:140px;
		position:absolute;
		left:0px;
		background-color:#0B4990;
		height:40px;

}

.btn:hover{
			background:linear-gradient(to bottom, #476e9e 5%, #007dc1 100%);
	background-color:#007dc1;	
}

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
	font-size:13px;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #154682;
	position:absolute;
	
	top:545px;
	left:1000px;
}
.myButton:hover {
	background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
	background-color:#0061a7;
}
#RR {
	box-shadow:inset 0px 1px 0px 0px #54a3f7;
	background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
	background-color:#007dc1;
	border-radius:3px;
	border:1px solid #124d77;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #154682;
	position:absolute;
	top:500px;
	left:1000px;
}
#RD {
	box-shadow:inset 0px 1px 0px 0px #54a3f7;
	background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
	background-color:#007dc1;
	border-radius:3px;
	border:1px solid #124d77;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #154682;
	position:absolute;
	top:455px;
	left:1000px;
}
#RR:hover {
	background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
	background-color:#0061a7;
}
#RD:hover {
	background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
	background-color:#0061a7;
}
.login-content{
	display: flex;
	position:absolute;
	left:200px;
	text-align: center;
	top:20px;
}
.login-content h2{font-variant: small-caps;
color:#CF381E;font-size:24px; 
width:390px; position:absolute; left:-140px;}

img{position:relative;left:-140px;}
</style>
</head>
<body>

	<div class="container">
		<div class="img">
			
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="images/logomtbs.png"  height="400">
				<!--<img src="images/logo.png" width="400" height="80" style="left:250px;">-->
			<h2 class="title">Movie Ticket Booking System</h2>
				</br></br></br></br></br></br>
           		<div class="input-div one" style="position:relative;left:-140px;">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5 style="font-size:12px;">Username</h5>
           		   		<input type="text" name="username" class="input" required>
           		   </div>
           		</div>
           		<div class="input-div pass" style="position:relative;left:-140px;">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5 style="font-size:12px;">Password</h5>
           		    	<input type="password" name="password" class="input" required>
            	   </div>
            	</div>
				
          
				</br></br>
            	<input type="submit" name="submit" class="btn" value="Login">
				
            </form>
			
        </div>
		
    </div>
	<button type ="button"class="myButton" onclick="location.href='reset_form.php'" >RESET PASSWORD?</button>
	<button type ="button"class="myButton" onclick="location.href='registration.php'" id="RR">NOT REGISTERED?</button>
    <button type ="button"class="myButton" onclick="location.href='index.php'" id="RD">HOME</button>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
