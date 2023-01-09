<?php
require('db.php');
session_start();
$RRR = $_SESSION['VIN'];
if (isset($_POST['submit']))
{
    $query1 ="SELECT *from users WHERE username='$RRR'";
    $result1 = mysqli_query($con, $query1) or die(mysql_error());
    $row = mysqli_fetch_array($result1);
    $TRR = $row["password"];
    $CPASS=md5($_POST["currentPassword"]);
    //echo '<script>alert("'.$RRR.'")</script>';
    $confirmpass = $_POST['confirmPassword'];
    $FFF=$_POST['newPassword'];
    //$FFF = stripslashes($_REQUEST['newPassword']);
    //$FFF = mysqli_real_escape_string($con,$newpassword);

    //$confirmpass = stripslashes($_POST['confirmPassword']);
    //$confirmpass= mysqli_real_escape_string($con,$confirmpass);
    $FFFmd5= md5($FFF);
    $confirmpassmd5 = md5($confirmpass);
    //$password = $_POST['password'];
    
            if($CPASS == $TRR)
                 {   
                    $query = "UPDATE users set password='$FFFmd5',confirmpass='$confirmpassmd5'
                                WHERE username='$RRR'";
                                
                    $result = mysqli_query($con,$query) or die(mysql_error());

                            if($result)
                            {

                                echo "<script>
									        alert('Password changed Successfully');
										        window.location.href='login.php';</script>";
                            }
                            //echo '<script>alert("'.$FFF.'")</script>';
                 }
            else
                $message = "Current Password is not correct";
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>कलश Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	.input-div > div > h5{font-size:12px;}
	.input-div.focus > div > h5{
	top: 2px;
	font-size: 12px;
}
	body{background-color:#E6F1F7;}
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
   margin-left: 250px; 
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
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
</head>
<body>

	<div class="container">
		<div class="img">
	</div>
		<div class="login-content">
			<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
				<img src="images/ICON1.png">
				<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
				<!--<img src="images/logo.png" width="400" height="80" style="left:250px;">-->
			<h2 class="title" style="color:#CF381E;font-size:20px; font-weight:bold;width:390px; position:absolute; left:-15px;">RESET PASSWORD</h2>
				</br></br>
          		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Current Password</h5>
           		    <input type="password" name="currentPassword" class="input" id="currentPassword" required>
            	   </div>
            	</div>
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    <h5>New Password</h5>
             <input type="password" name="newPassword" class="input" id="currentPassword" id="newPassword" required>
            	   </div>
            	</div>
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confirm Password</h5>
           		    <input type="password" name="confirmPassword" class="input" id="confirmPassword" required>
            	   </div>
            	</div>
            </br>
            	<input type="submit" name="submit" class="btn" value="SUBMIT">
				
            </form>
			
        </div>
		
    </div>
	
	
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
