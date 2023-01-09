<?php
require('db.php');
//include("query1.php");
include("query2.php");
include 'query100.php';


$query = "SELECT complain.Subject, COUNT(*) AS TOTAL, 
count(case when complain.Scode= 'SOLVED' then 1 else null end) AS SOLVED,
count(case when complain.Scode = 'PENDING' then 1 else null end) AS PENDING
FROM complain 
GROUP BY complain.Subject"; 
$result = mysqli_query($con,$query) or die(mysql_error());
$n=mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/9e73f1ddd4.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
      <script type="text/javascript">  
           
           </script>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}
body{
/*background-color:#CC8899;*/
/*width:100%;*/

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
	top:-40px;
	left:30px;
	position: relative;
}
#nav 
{
	position:relative;
	width:100%;
	text-decoration:box-size;
	display: block;
	background-color:#0B4990;
	height: 38px;
}
a:link, a:visited {
  
  color: white;
  height:50px;
  text-align: center;
  text-decoration:box-size;
  
  
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
#msg
{
	position:relative;
	padding-left:470px;
	font-size:20px;
	font-weight:bold;
	color:#CF381E;
	font-variant: small-caps;
}
.topnav
{
	list-style-type:none;
	color: white;
	display: inline-block;
  
}

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
.tabs:hover{color:#b1b1fe;}
.dropbtn:hover{color:#b1b1fe;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 265px;
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

body{background-color:#E6F1F7;}



</style>

</head>

<body >

<div id="header">
<img src="images/logo.png" align="left"> <span id="wname"><h1>कलश<h1> </span></img>
<img id="img" src="images/icon.png" align="right"></img>
<span id="wsh">-Cᴀʟʟ Loɢ Sʏꜱᴛᴇᴍ</span>

</div>
</br></br></br
<div>
	<span id="msg"> " Continuous Monitoring, Leads To Better Customer Service " </span>
<div>
</br></br></br>
<div id="nav" >
	<ul class="topnav">
		<li><a class="tabs" href="mainadmin.php" style="font-weight: bold; position: absolute;left: -20px; top: -8px;">
		<i class="fas fa-home" style="font-size:20px;"></i></a></li>
		<li><a class="tabs" href="referredl2.php" style="font-weight: bold; position: absolute;left: 110px; top: -8px;">
		REFERRED COMPLAINS</a></li>
		<li><a  class="tabs" href="logout.php" style="font-weight: bold; position: absolute;right: 0px; top: -8px;">LOGOUT</a></li>
  		<li><a class="tabs" href="" style="font-weight: bold; position: absolute;right: 110px; top: -8px;">WELCOME 
		<span style="text-transform:uppercase; color:yellow;"><?php echo $_SESSION['LOG'];?></span> </a></li> 
    </ul>
    <div class="dropdown" >
          <button class="dropbtn" style="font-weight:bold; left:370px; top: -34px; font-family:Times New Roman;">REPORTS</button>
         <div class="dropdown-content" style="left:370px; font-weight:bold;">
              <a href="agentreport.php" style="text-align: left; height:40px;">Agent's Performance</a>
              <a href="mmanager.php" style="text-align: left; height:40px;">Level 1 Manager's Performance</a>
              <a href="level2.php" style="text-align: left; height:40px;">All Answered Complains</a>
              <a href="CTR.php" style="text-align: left; height:40px;">Complain Type Report</a>
              <a href="BCC.php" style="text-align: left; height:40px;">Browse Complain By Category</a>
              
        </div>
    </div>


</div>
</br></br>
<div id="example1" class="form"  style="width:100%;">
		<table class="content-table">
			<thead>
			<tr style="font-size:16px;">
					<th align="left">#</th>
					<th align="left" >Type</th>
					<th align="left" >Total Complains </th>
					<th align="left" >Solved </th>
					<th align="left" >Pending </th>
			</tr>
			</thead>
			<tbody>
					<?php 
						$sr=1;
				
					while($fetchRow = mysqli_fetch_array($result)){?>	
							<tr>
								<td><?php echo $sr;?></td>
								<td> <?php echo $fetchRow['Subject']?></td>
								<td> <?php echo $fetchRow['TOTAL']?></td>
								<td> <?php echo $fetchRow['SOLVED']?></td>
								<td> <?php echo $fetchRow['PENDING']?></td>
																	
							</tr>
						<?php $sr++; }?>
			</tbody>
						
										
		</table>
		
		
		
		
		
		
</div>



</body>
</html>

