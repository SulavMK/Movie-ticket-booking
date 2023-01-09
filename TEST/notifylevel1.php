<?php
require("auth.php");
require("db.php");
error_reporting(0);
include("query100.php");
$ss=$_SESSION['username'];
mysqli_set_charset($con,'utf8');
//$error="";
$query = "SELECT users.full_name, complain.id,complain.Status, customer.customername,complain.username,complain.Mnumber,
complain.query,complain.ReferredTo, complain.Solution,rtolevel2.Referredto,rtolevel2.Username 
FROM `complain` INNER JOIN customer ON complain.Mnumber=customer.Mnumber INNER JOIN rtolevel2 ON complain.id=rtolevel2.PID
INNER JOIN users  
WHERE rtolevel2.Username ='$ss' AND state=21 AND users.username =rtolevel2.Referredto
ORDER BY complain.id desc"; 
$result = mysqli_query($con,$query) or die(mysql_error());
$n=mysqli_num_rows($result);
 
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/9e73f1ddd4.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
#msg
{
	position:relative;
	padding-left:570px;
	font-size:20px;
	font-weight:bold;
	color:#CF381E;
	font-variant: small-caps;
	
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 230px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content a:hover {background-color: #b1b1fe;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  
}
li a:not(.apple) {
  float: left;
}
.apple {
  float: right;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}
.error {
  color:red;
}
.badge {
  position: absolute;
  top: -2px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
  display:none;
}

li a 
{
  display: block;
  color: white;
  text-align: center;
  padding: 10px 16px;
  
  display: inline-block;
  margin: 2px 2px;
  font-size:16px;
 }


li a:hover{

	border: none;
	display: inline-block;
	margin: 0px 0px;
	border-radius:20%
 
}


.topnav
{
	list-style-type:none;
	color: white;
	display: inline-block;
  
}
.tabs:hover{color:#b1b1fe;}
.tabs {
  
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
 
}
.dropbtn {
  background-color: #0B4990;
  color: white;
  padding: 10px 26px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  position: absolute;
  margin: 2px 2px;
}
.dropbtn:hover{color:#b1b1fe;}

.dropdown {
  position: relative;
  display: inline-block;
}

#header
{
	
	padding:10px;
	height: 95px;
	width: 99%;
	position: relative;
}
#header img
{
	position: relative;
	padding-left:100px;
	padding:10px;
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
	top:-4px;
	left:30px;
	position: relative;
}
#nav 
{
	position:relative;
	width:100%;
	height:50px;
	text-decoration:box-size;
	display: block;
	background-color:#0B4990;
	height: 38px;
}

input[type="text"] {
    top:0;
  left:0;
  margin: 0;
  height: 100%;
  width: 100%;
  border: none;
}

table td {
    position: relative;
    text-align: left;
    
    padding: 0;
    margin: 0;
}
#example1{display:none;}
.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  margin-left: auto; 
  margin-right: auto;
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}
.remove{
		background-color:#0B4990;
		border-radius: 50%;
		border: 4px solid;
}
.remove:hover {
  background-color: yellow;
}
body{background-color:#E6F1F7;}

</style>
<script>
	function FUN()
	{
		var x=document.getElementsByClassName("badge");
		var d= "<?php echo $n?>";
		if(d>0)
		{
			x[0].style.display="block";
			document.getElementById("example1").style.display="block";
		}
		else
		{
		
			x[0].style.display="none";
		}

	}
</script>
</head>
<body onload="FUN()">

<div id="header">
<img src="images/logo.png" align="left"> <span id="wname"><h1>कलश<h1> </span></img>
<img id="img" src="images/icon.png" align="right"></img>
<span id="wsh">-A Cᴀʟʟ Loɢ Sʏꜱᴛᴇᴍ</span>

</div>
</br></br>
<div>
	<span id="msg"> " Someone Is Waiting For Your Answer " </span>
<div>
</br></br></br>
<div id="nav" >
  <ul class="topnav">
		<li><a class="tabs" href="adminhomepage.php" style="font-weight: bold; position: absolute;left: -20px; top: -8px;"><i class="fas fa-home" style="font-size:20px;"></i></a></li>
		<li><a class="tabs" href="TESTREF.php" style="font-weight: bold; position: absolute;left: 110px; top: -8px;">REFERRED COMPLAINS</a></li>
		<li><a class="tabs" href="notifylevel1.php" style="font-weight: bold; position: absolute;left: 630px; top: -8px;">INBOX
		<span class="badge"><?php echo $n; ?> </span>
			<?php $_SESSION['ff']=$n;?></a></li>
		<li><a  class="tabs" href="logout.php" style="font-weight: bold; position: absolute;right: 0px; top: -8px;">LOGOUT</a></li>
  		<li><a class="tabs" href="" style="text-transform:uppercase;font-weight: bold; position: absolute;right: 110px; top: -8px;">WELCOME 
		  <span style="text-transform:uppercase; color:yellow;"> <?php echo $_SESSION['LOG'];?></span> </a></li>
	</ul>
		<div class="dropdown" >
          <button class="dropbtn" style="font-weight:bold; left:370px; top: -34px; font-family:Times New Roman;">REPORTS</button>
			<div class="dropdown-content" style="left:370px; font-weight:bold;">
					  <a href="agent.php">Agent's Performance</a>
					  <a href="level1.php">All Answered Complains</a>
					   <a href="referredlevel2.php">Referred To Level 2</a>
			</div>
		</div>


 </div>




<?php
if(isset($_POST['remove']))
{
	//$solution=$_POST['problem'];
	$ig=$_POST['KeyToAnswer'];
	$sst=$_SESSION['username'];
		$ins="UPDATE `complain` SET state= 11 WHERE id='$ig'";
		$result1=mysqli_query($con,$ins);
		
		if($result1)
		{
			header("Location: notifylevel1.php");
		}
	
	
}
?>
<div id="example1" class="form">
		<table class="content-table">
		<thead>
			<tr>
				<th align="left">#</th>
				<th align="left">Complaint ID</th>
				<th align="left">Complaint By</th>
				<th align="left">Mobile</th>
				<th align="left">Problem</th>
				<th align="left">Solution Provided By</th>
				<th align="left">Solution</th>
				<th align="left">Remove From Notification</th>
				
				
			</tr>
			</thead>
			<tbody>
			<?php 
				$sr=1;
				
				while($fetchRow = mysqli_fetch_array($result)){?>	
							<tr>
								<form action="" method="post" role="form">
								<td style="heiht:200px;"><?php echo $sr;?></td>
								<td> <input type="text" name="KeyToAnswer" size= "4"value= "<?php echo $fetchRow['id'];?>"required> </td>
								<td style="heiht:200px;"> <?php echo $fetchRow['customername']?></td>
								<td style="heiht:200px;"> <?php echo $fetchRow['Mnumber']?> </td>
								<td style="width:200px; heiht:200px;text-align: justify"> <?php echo $fetchRow['query']?></td>
								<td style="width:50px; heiht:200px;"><?php echo $fetchRow['full_name']?> </td>
								<td style="width:200px; heiht:200px;text-align: justify"> <?php echo $fetchRow['Solution']?></td>
				
							<td align="center"><button type="submit" name="remove"><i class="fa fa-close" style="font-size:24px;color:red"></i></button></td>
								</form>								
							</tr>
						<?php $sr++; }?>
			</tbody>
						
										
		</table>
		</br><br></br>
					
		
</div>
<div id="inner" style="color:red;text-align:center;">	
						<?php 
								if(mysqli_num_rows($result)<1)
								{?>
									<h2 style="padding-top:200px;">You have 0 Messages.</h3>
									
							<?php }?>
					</div>
</body>
</html>

	