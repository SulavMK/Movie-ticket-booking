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
			$referredto=$_SESSION['username'];
			$state=1;
		}
		else
		{
			$state=0;
			$scode ="PENDING";
			$status="PENDING(Referred to Level 1)";
		}
		//mysqli_set_charset($con,'utf-8');
		$d ="SELECT username FROM users WHERE full_name ='$referredto' ";
		$A = mysqli_query($con,$d) or die(mysql_error());
		$B = mysqli_fetch_array($A);
		$C = $B['username'];
		
		$query110 = "INSERT into `complain` (Subject,Mnumber,username,query,Solution,Status,ReferredTo,state,Scode, dateofcomplain,timecomp)
					VALUES ('$Subject','$Mnumber','$Uname','$description','$solution','$status','$C','$state','$scode',CURDATE(),CURTIME())";
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
										window.location.href='homepage.php';
												</script>";
						
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
<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
<link rel="stylesheet" href="css/style100.scss">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
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
		var p = document.getElementById('no').innerHTML;	
		if(p !== "")
		{
			document.getElementById('no').value="";

		}
	}
	
	return;
}
</script>
<style>

/*input[type=text] {
	
  width: 40%;
  padding: 12px 2px;
  margin: 0 0;
  box-sizing: border-box;
  border: 2px solid red;
  border-radius: 4px;
}*/
/*body {font-family: "Times New Roman";
font-size: 14px;}
* {box-sizing: border-box;}
.form label{
	align:center;
	font-size:18px;
	}
.form select{
	box-sizing: border-box;
  border: 2px solid red;
  border-radius: 4px;
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
}*/
	#YES{
		display:none;
		
	}
#ffy{left:355px;list-style:none;margin-top:-22px;padding:0;width:190px;position: absolute;}
#ffy tr{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#ffy tr:hover{background:yellow;cursor: pointer;}
#ffy
{
	border-style:solid;
	border-width:2px;
	border-color:pink;
}
.column {
  float: left;
  
  padding: 10px;
   height:600px;/* Should be removed. Only for demonstration */
}
	
</style>
</head>
<meta http-equiv="Content-Type" content ="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>
Complain Box
</title>

<body>
<div class="column" style ="box-sizing: border-box;border:thick solid #0B4990;width: 55%;">
	<div id="exe1" class="wrapper" style="text-align:left;">
			<div class="inner">
				<form action="" method="post">
					<h3>Customer Complain Registration</h3>
							<div class="form-group">
									<div class="form-wrapper">
										<label for "Custnam">Customer Name:</label>
										<input type ="text" class="form-control" name="Custname" value="<?php echo $_SESSION['custname'];?>" required />
									</div>
									<div class="form-wrapper" style="position:absolute; left:290px; width:200px;">				
										<label for "Mnumber">Mobile Number:</label>
										<input type="text" class="form-control" name="Mnumber" value="<?php echo $_SESSION['mobilenumber'];?>" required />
									</div>
							</div>
							<div>
							<label for "Subject">Select Type:</label><select id="Subject" name="Subject" style="height:30px" required>
									<option value="Problem">समस्या </option>
									<option value="Feedback">सुझाव </option>
									<option value="Information">जानकारी </option>
									<option value="Others">अन्य</option>
							</select>
							</div>
						
							<div class="form-group">
								<label for "description">Enter Query Details Here:</label>
								<textarea name="description" id="search-box" style="height:100px;" required ></textarea>
							</div>
						
						
						<div id="suggesstion-box"></div>
	
						<div id ="TOREFER">
							<h3>Refer गर्ने ?</h3>
								<div>
									<label><input type="radio" name="colorRadio" value="YES" onclick="Test(0)"> yes</label>
									<label style="padding-left:200px;"><input type="radio" name="colorRadio" value="NO" onclick="Test(1)"> no</label>
								</div>
	
								<div id="YES">
									<select  name="referredto" style="height:30px" >
											<?php 
												while($fetchRow = mysqli_fetch_array($result))
													{
														?>	
															<option  required> <?php echo $fetchRow['full_name'];?></option>
														<?php	
													}
												?>				
									</select></br></br>
								</div>

						</div>
							</br></br>
						<label for "no">Solution Box</label>
						<input type="text" name="solution" id="no"  style="resize:vertical;" required/>
						</br></br>
	
						<input type="submit" name="submit"  value="Submit" />
					</form>
			</div>
	</div>
</div>
<div class="column" style ="box-sizing: border-box;border:thick solid #0B4990;width: 45%;"> </div>
</body>

</html>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
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
$("#suggesstion-box").hide();
$("#no").val(val2);
}

</script>