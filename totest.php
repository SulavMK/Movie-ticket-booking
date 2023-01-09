<?php
require("auth.php");
require("db.php");
require("dbcontroller.php");
require 'mailer/PHPMailerAutoload.php';
require 'mailer/class.smtp.php';
require 'mailer/class.phpmailer.php';
$error="";
	if(isset($_POST['submit']) && !empty($_POST['solution']))
	{
		//mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

		mysqli_set_charset($con,'utf8');
		$Subject=$_POST['Subject'];
		$Mnumber=$_SESSION['mobilenumber'];
		$Uname = $_SESSION['username'];
		$description=$_POST['description'];
		$solution=$_POST['solution'];
		$referredto=$_POST['referredto'];
		$status="";
		if($solution!="Referred to Level 1")
		{
			$status="SOLVED";
			$scode = "SOLVED";
			$referredto=$Uname;
			$state=1;
		}
		else
		{
			$state=0;
			$scode ="PENDING";
			$status="PENDING(Referred to Level 1)";
			$d ="SELECT username FROM users WHERE full_name ='$referredto' ";
			$A = mysqli_query($con,$d) or die(mysql_error());
			$B = mysqli_fetch_array($A);
			$referredto = $B['username'];
		}
		//mysqli_set_charset($con,'utf-8');
		
		
		$query110 = "INSERT into `complain` (Subject,Mnumber,username,query,Solution,Status,ReferredTo,state,Scode, dateofcomplain,timecomp)
					VALUES ('$Subject','$Mnumber','$Uname','$description','$solution','$status','$referredto','$state','$scode',CURDATE(),CURTIME())";
		mysqli_query($con, "SET NAMES 'utf-8'");
		mysqli_set_charset($con,'utf-8');
		$record110 = mysqli_query($con,$query110) or die(mysql_error());
		
		if($record110)
		{
							
							
							$u=$_SESSION['username'];
							$t=$referredto;
							$data="SELECT email FROM users WHERE username='$u'";
							$record1 = mysqli_query($con,$data) or die(mysql_error());
							$fetch0=mysqli_fetch_array($record1);
							$FROM=$fetch0['email'];

							$referredto1=$_POST['referredto'];
							$data1="SELECT email FROM users WHERE full_name='$referredto1'";
							$record2 = mysqli_query($con,$data1) or die(mysql_error());
							$fetch1=mysqli_fetch_array($record2);
							$TO=$fetch1['email'];

							$nn=$_SESSION['custname'];
							$mobile=$_SESSION['mobilenumber'];
							$problem=$description;
							
							if($solution!="Referred to Level 1")
							{
								echo "<script>
									alert('Complain Registered Successfully');
										window.location.href='homepage.php';</script>";
						
							}

					else
					{
				
						//code for email
								$mail = new PHPMailer;

								$mail->isSMTP();                            // Set mailer to use SMTP
								$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
								$mail->SMTPAuth = true;                     // Enable SMTP authentication
								$mail->Username = 'kesu.dhami@gmail.com';          // SMTP username
								$mail->Password = 'KvBrDi@21'; // SMTP password
								$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
								$mail->Port = 587;                          // TCP port to connect to

								$mail->setFrom($FROM, $u);
								$mail->addReplyTo($FROM, $u);
								$mail->addAddress($TO);   // Add a recipient
								$mail->isHTML(true);  // Set email format to HTML

								$mail->Subject = 'This is an auto generated testing mail from KALASH(Complain Log System)';

								$mailContent = ' <h4>Customer Name:    </h2> ';
								$mailContent .= $nn;
								$mailContent .= '<h4>Mobile Number:    </h2>';
								$mailContent .= $mobile;
								$mailContent .= '<h4 style="color:red;">Problem Details:</h2>'.$problem;
						


								$mail->Body = $mailContent;
								


								if(!$mail->send()) {
									echo 'Message could not be sent.';
									echo 'Mailer Error: ' . $mail->ErrorInfo;
								} else 
								{
									echo "<script>
									alert('Mail has been sent Successfully');
										window.location.href='homepage.php';
								</script>";
								}
						
			
					}				
		}
		else
		{
			
			$error="Complain Registration Failed";
			
		}
		
		
}
	$query = "SELECT DISTINCT full_name  FROM `users` WHERE type=1" ; 
	$result = mysqli_query($con,$query) or die(mysql_error());
?>


<html>
<head>

<script>
function Test(x)
{
	if(x==0)
	{
		document.getElementById('YES').style.display='block';
		document.getElementById('YES').style.paddingLeft='0';
		document.getElementById('no').value="Referred to Level 1";		
	}
	else if(x==1)
	{
		document.getElementById('YES').style.display='none';
		document.getElementById('no').value="";
	}
	
	return;
}
</script>
<style>
.container100{
					border-collapse: collapse;
					margin: 15px 0;
					font-size: 1.4em;
					min-width: 300px;
					border-radius: 5px 5px 0 0;
					overflow: hidden;
					box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
					margin-left:0px; 
					position:absolute;
					left:930px;
					top:80px;

		}



.container100 th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}

.container100 td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
			text-align: left;
}



.container100 td, .container100 th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container100 tr:nth-child(odd) {
	  background-color: white;
}

/* Background-color of the even rows */
.container100 tr:nth-child(even) {
	  background-color: white;
}

.container100 th {
	  background-color: #1F2739;
}

.container100 td:first-child { color: black; }

.container100 tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container100 td:hover {
  background-color: #FFF842;
 
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container100 td:nth-child(4),
.container100 th:nth-child(4) { display: none; }
}





	#YES{
		display:none;
		
	}
	.blue { color: #185875; }
.yellow { color: #FFF842; }

</style>
</head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css1/style.css">


<body>
<div id="exe1" class="main" style="text-align:left;">
		<div class="container" style="background-color:#E6F1F7;">
			<div class="signup-content">
				<div class="signup-form">
					<form action="" method="post" class="register-form" id="register-form">
						<h2>Customer Complain Registration</h2>
							<div class="form-row">
									<div class="form-group" style="width:250px;">
										<label for "Custnam">Customer Name:</label>
										<input type ="text" name="Custname" value="<?php echo $_SESSION['custname'];?>" required />
									</div>
									<div class="form-group" style="width:250px;" >				
										<label for "Mnumber">Mobile Number:</label>
										<input type="text" name="Mnumber" value="<?php echo $_SESSION['mobilenumber'];?>" required />
									</div>
							</div>
							<div class="form-row" style="width:500px;">
								<div class="form-group">
										<label for "Subject">Select Type:</label>
									<div class="form-select">
											<select id="Subject" name="Subject" required>
													<option value=""></option>
													<option value="Problem">Problem</option>
													<option value="Feedback">Feedback</option>
													<option value="Information">Information</option>
													<option value="Others">Others</option>
											</select>
										<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
									</div>
								</div>
							</div>
							<div class="form-group">
									<label for "description">Enter Query Details Here:</label>
									<textarea name="description" cols="36" id="search-box" style="height:90px;width:250px;" required ></textarea>
							</div>
							<div class="form-radio" id="MESSI">
										<label for="colorRadio" class="radio-label">Refer? :</label>
										<div class="form-radio-item">
												<input type="radio" name="colorRadio" id="Yes" onclick="Test(0)">
												<label for="Yes">Yes</label>
												<span class="check"></span>
										 </div>
										 <div class="form-radio-item">
												<input type="radio" name="colorRadio" id="No" onclick="Test(1)">
												<label for="No">No</label>
												<span class="check"></span>
										 </div>
							</div>
							<div id ="YES">
								<div class="form-row">
									<div class="form-group">
											<label for "ReferTo">Refer To:</label>
										<div class="form-select" style="width:250px;">
												<select id="ReferTo" name="referredto">
														<option value=""></option>
														<?php 
													while($fetchRow = mysqli_fetch_array($result))
														{
															?>	
																<option  required> <?php echo $fetchRow['full_name'];?></option>
															<?php	
														}
													?>	
												</select>
											<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
									<label for "no">Solution:</label>
									<textarea  name="solution" id="no" cols="36" style="height:90px;width:250px;" value="" required ></textarea>
							</div>
							
							<div class="form-submit">
									<!--<input type="submit" value="Reset All" class="submit" name="reset" id="reset" />-->
									<input type="submit" value="Submit" class="submit" name="submit" id="submit"/>
							</div>
					 </form>
				</div>
				<div class="signup-img"  style="background-color:#1F2739;">
					   <h1 style="font-size:3em; font-weight: 100;line-height:1em; text-align: left;color: #4DC3FA; font-size:25px; 
					   position:absolute; top:28px; left:900px;">
					   <span class="blue"></span>COMMON<span class="blue"></span> <span class="yellow">PROBLEMS</span></h1>
					   <div id="suggesstion-box"></div>
				</div>
					
			</div>
		</div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js1/main.js"></script>
</body>
</html>
<script>
$(document).ready(function(){
	$("#Subject").change(function(){
		$.ajax({
		type: "POST",
		url: "readQuery.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
function selectCountry(val1, val2) {
$("#search-box").val(val1);

$("#MESSI").hide();
$("#no").val(val2);
}

</script>
