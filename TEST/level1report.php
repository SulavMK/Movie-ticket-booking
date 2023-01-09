<?php
require("auth.php");
require('db.php');
//include("query1.php");
 /*$query = "SELECT Status, count(*) as number FROM complain WHERE dateofcomplain=CURDATE() GROUP BY Status";  
 $result = mysqli_query($con,$query) or die(mysql_error());   
 
 $query1 = "SELECT * FROM complain WHERE dateofcomplain=CURDATE() ";
 $result1 = mysqli_query($con,$query1) or die(mysql_error());
 $row_cnt=0;
if ($result1) {

    /* determine number of rows result set */
    //$row_cnt = mysqli_num_rows($result1);

    //printf("Result set has %d rows.\n", $row_cnt);

    /* close result set */
    //mysqli_free_result($result1);
//}*/

 //mysqli_close($con);
 
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/9e73f1ddd4.js" crossorigin="anonymous"></script>

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
	height:50px;
	text-decoration:box-size;
	display: block;
	background-color:#A020F0;
}
a:link, a:visited {
  
  color: white;
  height:50px;
  text-align: center;
  text-decoration:box-size;
  
  
}

a:hover{
  background-color: blue;
}
#msg
{
	position:relative;
	padding-left:440px;
	font-size:24px;
	font-weight:bold;
	color:black;
	
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
  background-color: #A020F0;
  color: white;
  padding: 15px 26px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  position: absolute;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 300px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content a:hover {background-color: #3e8e41;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: blue;
}


</style>

</head>

<body>
<div id="header">
<img src="images/logo.png" align="left"> <span id="wname"><h1>कलश<h1> </span></img>
<img id="img" src="images/icon2.png" align="right"></img>
<span id="wsh">-A Cᴀʟʟ Loɢ Sʏꜱᴛᴇᴍ</span>

</div>
</br></br></br
<div>
	<span id="msg"> " Continuos Monitoring, Leads to Better Customer Service " </span>
<div>
</br></br></br>
<div id="nav" >
	<ul class="topnav">
		<li><a class="tabs" href="mainadmin.php" style="font-weight: bold; position: absolute;left: 0px; top: 0px;"><i class="fas fa-home" style="font-size:25px;"></i></a></li>
		<li><a class="tabs" href="referredl2.php" style="font-weight: bold; position: absolute;left: 110px; top: 0px;">REFERRED COMPLAINS</a></li>
		
		<li><a  class="tabs" href="logout.php" style="font-weight: bold; position: absolute;right: 0px; top: 0px;">LOGOUT</a></li>
  		<li><a class="tabs" href="" style="font-weight: bold; position: absolute;right: 110px; top: 0px;">नमस्कार <?php echo $_SESSION['username']; ?> </a></li> 
    
    </ul>
    <div class="dropdown" >
          <button class="dropbtn" style="font-weight:bold; left:370px; top: -31px; font-family:Times New Roman;">REPORTS</button>
         <div class="dropdown-content" style="left:370px; font-weight:bold;">
              <a href="agentreport.php">Agent's Performance</a>
              <a href="level2.php">All Answered Complains</a>
        </div>
    </div>


</div>

<?php
$ss=$_SESSION['username'];
//$query = "SELECT DISTINCT complain.username, COUNT(*) AS Total, FROM `complain` INNER JOIN users 
//ON complain.username=users.username WHERE users.type=0 GROUP BY username ASC"; 
$query="SELECT complain.username, COUNT(*) AS TOTAL, 
count(case when Status = 'SOLVED' then 1 else null end) AS SOLVED, 
count(case when Status = 'PENDING' then 1 else null end) AS REFERRED FROM `complain` 
INNER JOIN users ON complain.username=users.username
WHERE users.type=1
GROUP BY username";
$result = mysqli_query($con,$query) or die(mysql_error());
$n=mysqli_num_rows($result);
?>
</br>
<div id="example1" class="form"  style="width:80%;padding-left: 150px;padding-top: 50px;">
		<table align="center" border="2px" style="width:60%; line-height:40px;"  >
		</br></br>
			<tr>
				<th colspan= "5" style="background-color:white;font-weight:bold; 
				font-size:30px; text-align:center;" >Performance Index</th>
			</tr>
			<tr style="background-color:#4CAF50;font-size:18px;">
				<th align="left">SN</th>
				<th align="left" style="width:300px;">Agent Name</th>
				<th align="left" style="width:180px;">Total Complains </th>
				<th align="left" style="width:100px;">Solved </th>
				<th align="left" style="width:100px;">Referred </th>
				
				
			</tr>
			<?php 
				$sr=1;
				
				while($fetchRow = mysqli_fetch_array($result)){?>	
							<tr>
								<td style="heiht:200px;"><?php echo $sr;?></td>
								<td style="heiht:200px;"> <?php echo $fetchRow['username']?></td>
								<td style="heiht:200px;"> <?php echo $fetchRow['TOTAL']?></td>
								<td style="heiht:200px;"> <?php echo $fetchRow['SOLVED']?></td>
								<td style="heiht:200px;"> <?php echo $fetchRow['REFERRED']?></td>										
							</tr>
						<?php $sr++; }
			?>
						
										
		</table>
		
		
		
		
		
		
</div>





</body>
</html>