<?php
include("auth.php");
require('db.php');

  
  /*if(isset($_POST['submit']))
  {
	  $mobilenumber=$_POST['mobilenumber'];
    if(empty($_POST['mobilenumber']))
	{
		$error="Please enter mobile number";
	}
	else if(strlen($_POST['mobilenumber'])<10)
	{
		$error="Enter 10 digits";
	}
	else if(!preg_match('/^[6-9]\d{9}$/', $_POST['mobilenumber']))
    {
      $error = 'Invalid Number!';
    }
	else 		//matches the mobile number.
	{
		$query = "SELECT * FROM `customer` WHERE Mnumber='$mobilenumber'";
			$result = mysqli_query($con,$query) or die(mysql_error());
			$rows = mysqli_num_rows($result);
			if($rows==1)
			{
				$_SESSION['mobilenumber'] = $mobilenumber;
				// Redirect user to index.php
				header("Location: customerdetails.php");
			}
			else{
				
				$_SESSION['mobilenumber'] = $mobilenumber;
				// Redirect user to index.php
				header("Location: newregistration.php");
				
			} 
	}
  }*/
?>


<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
ul:not(.A) {
  list-style-type: none;
  margin: 0;
  width:100%;
  padding: 0px 5px;
  overflow: hidden;
  background-color: #252525;
  height: 90px;
}

li a:not(.apple) {
  float: left;
}
.apple {
  float: right;
  display: inline-block;
  border-radius: 2px;
  font-weight:bold;
  
}
.error {
  color:red;
}
.notification {
  background-color: none;
  color: white;
  text-decoration: none;
  padding: 13px 20px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  color: #b1b1fe;
}
#hm:hover{color: #b1b1fe;}
.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
  display:none;
}

li a:not(.C) {
  display: block;
  color: white;
  text-align: center;
  padding: 10px 16px;
  
  display: inline-block;
  margin: 2px 2px;
  font-size:16px;
  }
  

li a:hover:not(.C){

border: none;
  display: inline-block;
  margin: 0px 0px;
  border-radius:20%
 
}

.active {
  background-color: #800080 ;
}
#msg
{
	position:relative;
	padding-left:500px;
	text-align:center;
	
	font-size: 1.02rem;
	font-weight:bold;
	
	font-variant: small-caps;
	font-family: 'Niconne', cursive;
	font-weight: 700;
	
	color: #c11a2b;
	
	
}


}
#example1
{
   position:relative; 
 box-sizing: content-box;  
  width: 400px;
  height: 200px;
  padding: 30px;  
  border-style: solid;
  border-color:  #0B4990;
  border-width: 7px;

  text-align:center;
   margin: 100px auto;
}
.form{
	
    padding-top: 400px;
     width: 600px;
     margin: 0 auto;
}
input[type='text'], input[type='email'],
input[type='password'] {
     width: 200px;
     border-radius: 2px;
     border: 1px solid #F96801;
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


#wname
{

	margin:0;
	color:#FF00CC;
	font-size:60px;
}
#wname h1 
{	margin:0;
	color:black;
	font-size:60px;
	padding-left:670px;
}
#img
{
	position: relative;
	padding-right:10px;
	display: inline;
	width:95px;
	height:95px;
	top:-85px;
}
#wsh
{
	font-size:20px;
	font-weight:bold;
	color:black;
	top:-40px;
	left:30px;
	position: relative;
}
body{background-color:#AAAAAA;}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}
.sticky + .content {
  padding-top: 60px;
}
#FNAV {
		overflow: hidden;
  
}
h3{font-family: 'Open Sans',sans-serif!important;color:#0000ff; font-size:24px;}


.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  margin-left: 500px; 
  margin-right: auto;
}

.content-table thead tr {
  background-color: #000000;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 0px 0px;
}

.content-table tbody tr {
  border-bottom: 1px solid #27c1c4;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}
.content-table tbody tr:nth-of-type(odd) {
  background-color: #27c1c4;
}
.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

#zoom{transition: transform .2s;}
#zoom:hover {
  -ms-transform: scale(1.2); /* IE 9 */
  -webkit-transform: scale(1.2); /* Safari 3-8 */
  transform: scale(0.7); 
}




</style>


</head>
<body onload="FUN()">
<?php
$ss=$_SESSION['username'];
//$error="";

?>
<div id="header">
		<img src="images/banner.jpg" width="100%" height="250"> </img>
		
</div>
</br>
<div >
	<span id="msg"> " Book Ticket From Home; Enjoy The Show!!! " </span>
</div>

</br>
		<div id="FNAV">
				<ul>
				  <li><a  class="notification" href="logout.php" style="font-weight: bold; position: absolute;top: 345px; left: 1190px; ">Logout</a></li>
				  <li><a  class="notification" href="history.php" style="font-weight: bold; position: absolute;top: 345px; left: 700px; ">History</a></li>
				  <li><a class="notification" href="" style="font-weight: bold; float:right;position: absolute;left: 920px; top: 345px;">
				  Welcome <span><?php echo $_SESSION['username'];?></span> </a></li>
				  
				  <li> <a href="home.php" id="navc" class ="notification" style="font-weight: bold; position: absolute;left:8px;top: 326px;">
				  <span><i class="fa fa-home" id ="hm" align="left" style="position: absolute;left: 10px;font-size:50px;"></i></span>
				  </a></li>
				  
				  <li> <a href="movies.php" class ="notification" style="font-weight: bold; position:absolute;left:190px;top: 320px;">
				  <span><img src="images/ico-movie.svg" style="position: absolute;width:50px;color:white;">
				  <p style="position: relative;left: 24px; top: 35px;">Movies</p></img></span>
					</a></li>
				  
				  <li> <a href="select.php" class ="notification" style="font-weight: bold; position:absolute;left:422px;top: 320px;">
				  <span><img src="images/ico-ticket.svg" style="position: absolute;width:50px;color:white;">
				  <p style="position: relative;left: 24px; top: 35px;"> Book Ticket</p></img></span>
					</a></li>   
				</ul>
		</div>
		</br></br>
<?php
$db = mysqli_connect("localhost", "root", "", "mtbs");
$result = mysqli_query($db, "SELECT * FROM movie");
$n=mysqli_num_rows($result);
?>
		<div>
			<div id="NS">
				<h3></h3>
				    <table class="content-table">
						<thead>
							<tr style="font-size:16px;">
							<th align="left"></th>
							<th align="left" ></th>
						</tr>
						</thead>
						<tbody>
						<?php 
							$sr=1;
							
							while($fetchRow = mysqli_fetch_array($result)){?>	
								<tr>
									<td></td>
									<td><img src="<?php echo $fetchRow['Filename']?>" id="zoom" height="95%" width="100%"/></td>
																					
								</tr>
								<?php $sr++; }?>
									
						</tbody>							
					</table>
		
				
				
				
				
				
				
				
				
			</div>
			</br></br>
			<div id="UM" style="position:relative;">
				<h3></h3>
					
				
			</div>
		<div>
</body>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("FNAV");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</html>

