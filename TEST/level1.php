<?php
require("auth.php");
require('db.php');
include("query4.php");
 $ss=$_SESSION['username'];
 include("query100.php");
 mysqli_set_charset($con,'utf8');
$error="";
//$query = "SELECT complain.id, customer.customername,complain.username,complain.query, complain.Solution,complain.ReferredTo 
//FROM `complain` INNER JOIN customer ON complain.Mnumber=customer.Mnumber WHERE ReferredTo='$ss' AND Status='SOLVED' AND state=11
//ORDER BY dateofcomplain and timecomp desc" ; 

$query = "select TEMP.username, TEMP.id, TEMP.Status, TEMP.customername,TEMP.Mnumber,TEMP.query,TEMP.Scode,TEMP.Solution,full_name 
FROM (SELECT complain.username, complain.id, complain.Status, customer.customername,complain.Mnumber,complain.query,complain.Scode,complain.Solution
      FROM complain INNER JOIN customer ON complain.Mnumber=customer.Mnumber  LEFT JOIN rtolevel2 ON complain.id=rtolevel2.PID
      WHERE complain.ReferredTo ='$ss' AND complain.Scode='SOLVED' AND (rtolevel2.Referredto) IS NULL
	 ) AS TEMP INNER JOIN users ON TEMP.username = users.username ORDER BY TEMP.id desc";


$result = mysqli_query($con,$query) or die(mysql_error());
$n=mysqli_num_rows($result);
 
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/9e73f1ddd4.js" crossorigin="anonymous"></script>

<style>

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
	height:50px;
	text-decoration:box-size;
	display: block;
	background-color:#0B4990;
	height: 38px;
}
a:link, a:visited {
  
  color: white;
  height:20px;
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
	padding-left:570px;
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
.tabs:hover{color:#b1b1fe;}
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
  background-color: blue;
}
#ref {display:none;}
#not{display:none;}
.badge {
  position: absolute;
  top: -2px;
  right: -8px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
  display:none;
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



</style>
<script>
function FUN()
{

		var d = "<?php echo $n; ?>";
		
		//window.alert(d);
			if(d>0)
			{
				document.getElementById("ref").style.display ="block";
				document.getElementById("not").style.display ="none";
			}
			var x=document.getElementsByClassName("badge");
		var dd= "<?php echo $_SESSION['l2f']; ?>";
		if(dd>0)
		{
			x[0].style.display="block";
		}
	
};



</script>


</head>

<body onload ="FUN()">
<div id="header">
<img src="images/logo.png" align="left"> <span id="wname"><h1>?????????<h1> </span></img>
<img id="img" src="images/icon.png" align="right"></img>
<span id="wsh">-A C??????? Lo?? S??????????????</span>

</div>
</br></br>
<div>
	<span id="msg"> " Someone Is Waiting For Your Answer " </span>
<div>
</br></br></br>
<div id="nav" >
	<ul class="topnav">
		<li><a class="tabs" href="adminhomepage.php" style="font-weight: bold; position: absolute;left: -20px; top: -8px;">
		<i class="fas fa-home" style="font-size:20px;"></i></a></li>
		<li><a class="tabs" href="TESTREF.php" style="font-weight: bold; position: absolute;left: 110px; top: -8px;">
		REFERRED COMPLAINS</a></li>
		<li><a class="tabs" href="notifylevel1.php" style="font-weight: bold; position: absolute;left: 630px; top: -8px;">INBOX
		<span class="badge"> <?php echo $_SESSION['l2f'];?> </span>
		</a></li>
		<li><a  class="tabs" href="logout.php" style="font-weight: bold; position: absolute;right: 0px; top: -8px;">LOGOUT</a></li>
  		<li><a class="tabs" href="" style="text-transform:uppercase;font-weight: bold; position: absolute;right: 110px; top: -8px;">WELCOME 
		 <span style="text-transform:uppercase; color:yellow; "> <?php echo $_SESSION['LOG'];?></span></a></li> 
    
    </ul>
    <div class="dropdown" >
          <button class="dropbtn" style="background-color:#0B4990;font-weight:bold; left:370px; top: -34px; font-family:Times New Roman;">REPORTS</button>
         <div class="dropdown-content" style="left:370px; font-weight:bold;">
              <a href="agent.php" style="text-align: left; height:20px;">Agent's Performance</a>
              <a href="level1.php" style="text-align: left; height:20px;">All Answered Complains</a>
			  <a href="referredlevel2.php" style="text-align: left; height:20px;">Referred To Level 2</a>
        </div>
    </div>


</div>
<div id="ref" class="form"  style="width:100%;padding-top: 50px;">
<table class="content-table" >
			<thead>
				<tr style="font-size:16px;">
				<th align="left">#</th>
				<th align="left">Problem ID</th>
				<th align="left" >Referred By</th>
				<th align="left" >Complaint By</th>
				<th align="left" >Problem</th>
				<th align="left" >Solution</th>
				<th align="left" style="display:none;">Provider</th>
		</tr>
		</thead>
			<tbody>
				<?php 
				$sr=1;
				
				while($fetchRow = mysqli_fetch_array($result)){?>	
							<tr>
								<form action=""  role= "form">
								<td ><?php echo $sr;?></td>
								<td ><?php echo $fetchRow['id'];?></td>
								<td ><?php echo $fetchRow['full_name'];?></td>
								<td > <?php echo $fetchRow['customername']?></td>
								<td > <?php echo $fetchRow['query']?></td>
								<td > <?php echo $fetchRow['Solution']?></td>
								<td style="width:200px; heiht:100px;text-align: left;display:none;"> 
								<?php echo $fetchRow['ReferredTo']?></td>
								</form>
							</tr>
						<?php $sr++; }?>
			</tbody>
										
		</table>
</div>

</br></br></br>
<div id ="not">
 
 <h2 align="center"> You Don't Have Any Answered Complains!!!</h2>

</div>


</body>
</html>