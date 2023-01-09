<!DOCTYPE html>
<html>
<head>
	<title>कलश Reset Password Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	body{background-color:#E6F1F7;}
	.input-div > div > h5{font-size:12px;}
	.input-div.focus > div > h5{
	top: 2px;
	font-size: 12px;
}
.container
{
   position:absolute; 
 box-sizing: content-box;  

  width: 800px;
  height: 500px;
  padding: 10px;  
  border-style: solid;
  border-color: #0B4990;
  border-width:8px;

  text-align:center;
   margin: 50px auto;
   margin-left: 100px; 
  margin-right: 200px;
}
.btn{
		width:140px;
		position:absolute;
		left:110px;
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
	top:590px;
	left:905px;
}
.myButton:hover {
	background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
	background-color:#0061a7;
}


</style>
</head>
<body>

	<div class="container">
		<div class="img">
			
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="images/ICON1.png">
				<!--<img src="images/logo.png" width="400" height="80" style="left:250px;">-->
			<h4 class="title" style="color:#CF381E;font-size:20px; font-weight:bold;width:390px; position:absolute; left:-15px;">RESET PASSWORD</h4>
				</br></br></br></br></br></br></br></br>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Enter Username to reset password</h5>
           		   		<input type="text" name="username" class="input" required>
           		   </div>
           		</div>
           						
            	</br>
				</br></br>
            	<input type="submit" name="submit" class="btn" value="Submit">
				
            </form>
			
        </div>
		
    </div>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
<?php
$error="";
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
 //$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 //$username = mysqli_real_escape_string($con,$username);
 //Checking is user existing in the database or not
			$username= $_POST['username'];
        $query = "SELECT * FROM `users` WHERE username='$username'";
 $result = mysqli_query($con,$query) or die(mysql_error());
 
 $rows = mysqli_num_rows($result);
        if($rows==1)
		{
			$_SESSION['VIN'] = $_POST['username'];
					// Redirect user to agent module.
						header("Location: reset.php");
        }
		 else
		 {
			  echo "<div class='form'>
			<h3 style='position:absolute; top:590px; left:600px;'>User doesn't exist.</h3>
			<br/>";
			 
			
		 }
    }
?>