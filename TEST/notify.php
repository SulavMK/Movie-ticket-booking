<?php
error_reporting(0);
require("auth.php");
require("db.php");
include("query3.php");
include("query100.php");
$ss=$_SESSION['username'];
mysqli_set_charset($con,'utf8');
//$error="";
//$query = "SELECT complain.id,complain.Status, customer.customername,complain.username,complain.Mnumber,complain.query,complain.ReferredTo, complain.Solution FROM `complain` 
//INNER JOIN customer ON complain.Mnumber=customer.Mnumber
//WHERE username='$ss' AND (state=11 OR state=21) ORDER BY dateofcomplain AND timecomp desc"; 
$query ="SELECT temp.username, temp.id, temp.Status, temp.customername,
temp.Mnumber,temp.query,temp.Scode,temp.Solution,users.full_name,temp.state
FROM 
(	  SELECT complain.username, complain.id, complain.Status, customer.customername,complain.Mnumber,complain.query,complain.Scode,complain.Solution,complain.state,
      CASE WHEN rtolevel2.Referredto IS NOT NULL THEN rtolevel2.Referredto
      ELSE complain.ReferredTo
      END AS RFTo 
      FROM complain INNER JOIN customer ON complain.Mnumber=customer.Mnumber  LEFT JOIN rtolevel2 ON complain.id=rtolevel2.PID
) AS temp INNER join users on temp.RFTo= users.username
WHERE temp.username='1063' AND (temp.state=11 OR temp.state=21) ORDER BY temp.id desc";


$result = mysqli_query($con,$query) or die(mysql_error());


$n=mysqli_num_rows($result);
?>

<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0px 5px;
  overflow: hidden;
  background-color: #0B4990; 
  width: 100%;
  height: 35px;
}
li a:hover{

border: none;
  display: inline-block;
  margin: 0px 0px;
  border-radius:20%
 
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
  background-color: none;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
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
  top: -7px;
  right: -4px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
  display:none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 10px 16px;
  text-decoration: none;
  display: inline-block;
  margin: 2px 2px;
  font-size:16px;


}
#example1{display:none;}

li a:hover:not(.active) {
  
}

.active {
  background-color: #800080 ;
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
#msg
{
	position:relative;
	padding-left:600px;
	text-align:center;
	font-size:18px;
	font-weight:bold;	
	color:#CF381E;
	font-variant: small-caps;
}
input[type="text"] {
    top:0;
  left:0;
  margin: 0;
  height: 100%;
  width: 100%;
  border: none;
}
body{background-color:#E6F1F7;}

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  margin-left: 100px; 
  margin-right: 100px;
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




</style>
<script>
	function FUN()
	{
		var x=document.getElementsByClassName("badge");
		var d= "<?php echo $n?>"
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
<span id="wsh">-Cᴀʟʟ Loɢ Sʏꜱᴛᴇᴍ</span>

</div>
</br></br>
<div>
	<span id="msg"> " Listen Carefully; Answer Politely !!! " </span>
</div>
</br></br>
<ul>
  <li><a  class="notification" href="logout.php" style="font-weight: bold;position: absolute;top: 208px; left: 1200;">LOGOUT</a></li>
  
  <li><a class="notification" href="" style="font-weight: bold; float:right;position: absolute;left: 930px; top: 208px;">
  WELCOME <span style="text-transform:uppercase; color:yellow;"><?php echo $_SESSION['LOG'];?></span> </a></li>
  
  <li> <a href="homepage.php" id="navc" class ="notification" style="font-weight: bold; position: absolute;left:8px;top: 208px;">
  <span><i class="fa fa-home" id ="hm" align="left" style="position: absolute;left: 10px;font-size:15px;color:white"></i></span>
  </a></li>
  
  <li> <a href="notify.php" class ="notification" style="font-weight: bold; position:absolute;left:110px;top: 208px;">
  <span>INBOX</span>
  <span class="badge"> <?php echo $_SESSION['nf'];?> </span>
  
  </a></li>
  
  <li> <a href="history.php" class ="notification" style="font-weight: bold; position: absolute;left: 270px; top: 208px;">
  <span>COMPLAINT LOG</span>
  </a></li>
  <li> <a href="pending.php" class ="notification" style="font-weight: bold; position: absolute;left: 500px; top: 208px;">
  <span>PENDING COMPLAINTS</span>
  </a></li>
  <li> <a href="FAQ.php" class ="notification" style="font-weight: bold; position: absolute;left: 780px; top: 208px;">
  <span>FAQ</span>
  </a></li>
</ul>
<?php
if(isset($_POST['remove']))
{
	//$solution=$_POST['problem'];
	$ig=$_POST['KeyToAnswer'];
		$ins="UPDATE `complain` SET state= 1 WHERE id='$ig' AND username='$ss'";
		$result1=mysqli_query($con,$ins);
		
		if($result1)
		{
			header("Location: notify.php");
		}
	
}
?>
<div id="example1" class="form">
		<table class ="content-table" >
		</br></br>
			<thead>
			<tr style="font-size:16px;">
				<th align="left">#</th>
				<th align="left">Problem ID</th>
				<th align="left">Complaint By</th>
				<th align="left">Mobile</th>
				<th align="left">Problem</th>
				<th align="left">Solved By</th>
				<th align="left">Solution</th>
				<th align="left">Remove</th>
			</thead>
				
			</tr>
			<tbody>
			<?php 
				$sr=1;
				
				while($fetchRow = mysqli_fetch_array($result)){?>	
							<tr>
								<form action="" method="post" role="form">
								<td ><?php echo $sr;?></td>
								<td style="width:130px;"><input type="text" size="4" name="KeyToAnswer" value= "<?php echo $fetchRow['id'];?>" 
								required> </td>
								<td style="width:130px;"> <?php echo $fetchRow['customername']?></td>
								<td > <?php echo $fetchRow['Mnumber']?> </td>
								<td style="width:180px;"> <?php echo $fetchRow['query']?></td>
								<td style="width:180px;"><?php echo $fetchRow['full_name']?> </td>
								<td style="width:280px;"> <?php echo $fetchRow['Solution']?></td>
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

	