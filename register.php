<?php
include('db.php');
session_start();
error_reporting(1);
require("dbcontroller.php");
require 'mailer/PHPMailerAutoload.php';
require 'mailer/class.smtp.php';
require 'mailer/class.phpmailer.php';

// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST['save']) || $_POST['save'] != 'contact') {
    header('Location: bookticket.php'); exit;
}

	
// get the posted data
$doj = strip_tags( utf8_decode( $_POST['m_date'] ) );
$name = strip_tags( utf8_decode( $_POST['user_name'] ) );
//$address = strip_tags( utf8_decode( $_POST['address'] ) );
$mobile = strip_tags( utf8_decode( $_POST['mobile'] ) );
//$userid = strip_tags( utf8_decode( $_POST['userid'] ) );
//$email = strip_tags( utf8_decode( $_POST['email'] ) );
$mname = strip_tags( utf8_decode( $_POST['referredto'] ) );
$time = strip_tags( utf8_decode( $_POST['time'] ) );
//$bdate = date("Y-m-d");
//$btime =  time("");
//echo "<script>alert('$doj')</script>";
$querykt="SELECT movieid FROM movie WHERE moviename='$mname'";
					$resultkt = mysqli_query($con,$querykt) or die(mysql_error());
					$B = mysqli_fetch_array($resultkt);
					$mid=$B['movieid'];
				
$uname = $_SESSION['username'];
                    $queryt="SELECT id FROM users WHERE username='$uname'";
					$resultt = mysqli_query($con,$queryt) or die(mysql_error());
					$B = mysqli_fetch_array($resultt);
					$uid=$B['id'];
					

	
// check that name was entered
//if (empty($name))
  //  $error = 'You must enter your name.';

// check that address was entered
//if (empty($address))
    //$error = 'You must enter your address.';

// check that mobile number was entered
//if (empty($mobile))
  //  $error = 'You must enter your mobile number.';

// check that user id was entered
//if (empty($userid))
    //$error = 'You must enter your user id.';

// check that an email address was entered
//elseif (empty($email)) 
    //$error = 'You must enter your email address.';
// check for a valid email address
//elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email))
    //$error = 'You must enter a valid email address.';
	
// check that a message was entered
//if (empty($password))
    //$error = 'You must enter password.';



//Check whether the student is already registered.
//$select = mysqli_query($con, "select * from register where userid = '" . $userid . "'");

//$query = mysql_real_escape_string($select);

//$num_rows = mysqli_num_rows($select);

//if ( $num_rows )
	//$error = 'You are already registered.';
	
	
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
	
    header('Location: bookticket.php?e='.urlencode($error)); exit;

}



// Success
//$query = "INSERT INTO register (userid, name, email, password, address, contact, message) VALUES ('" . $userid . "','" . $name . "','" . $email . "','" . $password . "','" . $address . "','" . $mobile . "','" . $message . "')";

//$insert = mysql_real_escape_string($query);

//$results = mysqli_query($con, $query);

//if (!$results)
//{
	//die ("Could not insert to the register: <br />". mysql_error());
//}

$seatNumber = NULL;

for($i=1; $i<41; $i++)
{
	$chparam = "ch" . strval($i);
	$calcPNR = $doj . "-" . strval($i);
	
	if( !empty($_POST[$chparam]) )
	{
		$query = "INSERT INTO seat(Uid, number, SID, date, time, movieid, bookdate, btime ) VALUES ('". $uid ."', '" . intval($i) . "', '". $calcPNR ."', '". $doj ."', '". $time ."', '". $mid ."',curdate(),curtime())";
//		$results = mysql_real_escape_string($query);
		$results = mysqli_query($con, $query);
		if (!$results)
		{
			die ("Could not update seat: <br />". mysql_error());
		}
		$seatNumber = $seatNumber .", ". "$i";
		
	}
}

    if($seatNumber != NULL)    
        {
           // echo "<script>
			//alert('Ticket Booked Successfully');
										//window.location.href='home.php';</script>";

										$u=$_SESSION['username'];
										//$t=$referredto;
										$data= "SELECT email FROM users WHERE username='shikha'";
										$record1 = mysqli_query($con,$data) or die(mysql_error());
										$fetch0=mysqli_fetch_array($record1);
										$FROM=$fetch0['email'];
			
										//$referredto1=$_POST['referredto'];
										$data1=	"SELECT email FROM users WHERE username='$u'";
										$record2 = mysqli_query($con,$data1) or die(mysql_error());
										$fetch1=mysqli_fetch_array($record2);
										$TO=$fetch1['email'];
										$f =mt_rand().'-'.$doj;
										
										
										
										
										
										$mail = new PHPMailer;

										$mail->isSMTP();                            // Set mailer to use SMTP
										$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
										$mail->SMTPAuth = true;                     // Enable SMTP authentication
										$mail->Username = 'panda.204611@gmail.com';          // SMTP username
										$mail->Password = 'KvBrDi@21'; 			// SMTP password
										$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
										$mail->Port = 587;                          // TCP port to connect to
		
										$mail->setFrom($FROM, $u);
										$mail->addReplyTo($FROM, $u);
										$mail->addAddress($TO);   // Add a recipient
										$mail->isHTML(true);  // Set email format to HTML
		
										$mail->Subject = 'Ticket Has Been Booked Successfully';
		
										$mailContent = ' <h4>Customer Name:    </h2> ';
										$mailContent .= $name;
										$mailContent .= '<h4>Mobile Number:    </h2>';
										$mailContent .= $mobile;
										$mailContent .= '<h4 style="color:red;">Ticket Details:</h2>'.$seatNumber;
										$mailContent .= '<h4 style="color:red;">Your Reference Number Is:</h2>'.$f;
								
		
		
										$mail->Body = $mailContent;
										if(!$mail->send()) {
											echo 'Message could not be sent.';
											echo 'Mailer Error: ' . $mail->ErrorInfo;
										} else 
										{
											echo "<script>
											alert('Mail has been sent Successfully');
												window.location.href='home.php';
										</script>";
										}







        }
//if(!empty($message))
//{
	//$message = "A  user '". $name ."' has booked seat number: '". $seatNumber ."'." . "His message is as below." . $message;	
//}
//else
//{
	/////$message = "A new user '". $name ."' has booked seat number: '". $seatNumber;	
//}

		
// write the email content
//$email_content = "Name: $name\n";
//$email_content .= "Email Address: $email\n";
//$email_content .= "Message:\n\n$message";

//$messageUser = "Your ticket is booked. The seat number is: " . $seatNumber;
	
// send the email to admin
//Please replace below email to email of your website admin, so that admin will receive email on every seat book.
//mail ("admin-email@gmail.com", "New ticket booked", $email_content);

//send email to user
//mail ($email, "Ticket booked", $messageUser);

//mysqli_close($con);	
// send the user back to the form

//header('Location: bookticket.php?s='.urlencode('Your seat is booked.')); exit;

?>
