<?php
require("auth.php");
require("db.php");
include("query3.php");
include("query100.php");
$ss=$_SESSION['username'];
//$query = "SELECT complain.id, complain.Status, dateofcomplain, customer.customername,complain.username,complain.Mnumber,
//complain.query,complain.ReferredTo, complain.Solution FROM `complain` 
//INNER JOIN customer ON complain.Mnumber=customer.Mnumber 
//WHERE complain.username='$ss' ORDER BY dateofcomplain DESC"; 
mysqli_set_charset($con,'utf8');
$query ="SELECT temp.dateofcomplain,temp.username, temp.id, temp.Scode, temp.customername,temp.Mnumber,temp.query,
		temp.Solution,temp.RFTo,full_name FROM 
(SELECT complain.dateofcomplain,complain.username, complain.id, complain.Scode, customer.customername,complain.Mnumber,complain.query,
		complain.Solution,
      CASE WHEN rtolevel2.Referredto IS NOT NULL THEN rtolevel2.Referredto
      ELSE complain.ReferredTo
      END AS RFTo 
      FROM complain INNER JOIN customer ON complain.Mnumber=customer.Mnumber  LEFT JOIN rtolevel2 ON complain.id=rtolevel2.PID
) AS temp INNER join users on temp.RFTo= users.username
WHERE temp.username='$ss' ORDER BY temp.Scode asc";


$result = mysqli_query($con,$query) or die(mysql_error());

$n=mysqli_num_rows($result);
//mysqli_close($con);
?>

<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
	function FUN()
	{
		var x=document.getElementsByClassName("badge");
		var d= "<?php echo $_SESSION['nf']?>";
		var dd ="<?php echo $n?>";
		if(d>0)
		{
			x[0].style.display="block";
		}
		else
		{
		
			x[0].style.display="none";
		}
		if(dd>0)
		{
			document.getElementById("example1").style.display ="block";
		}
		else
		{
			document.getElementById("example1").style.display ="none";
		}
		
		for(var i=1;i<dd;i++)
		 {

			var a =	document.getElementById("table").rows[i].cells;
			 var text = document.getElementById("table").rows[i].cells.namedItem("STYLETOS").innerText;
			var b = "PENDING";
			var c = text.localeCompare(b);
					if(c==0)
					{

						a[7].style.color="red";
						a[7].style.fontWeight="900";
					}

		 }

		 
                
		
	};

</script>




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
  background-color:none;
  color: white;
  text-decoration: none;
  padding: 12px 20px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}
li a:hover
{

	border: none;
  display: inline-block;
  margin: 0px 0px;
  border-radius:20%
 
}

.notification:hover {
  color: #b1b1fe;
}
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

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 10px 16px;
  text-decoration: none;
   margin: 2px 2px;
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

body{background-color:#cccccc;}

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
  <li><a  class="notification" href="logout.php" style="font-weight: bold;position: absolute;top: 210px; left: 1200;">LOGOUT</a></li>
  
  <li><a class="notification" href="" style="font-weight: bold; float:right;position: absolute;left: 900px; top: 210px;">
  WELCOME <span style="text-transform:uppercase; color:yellow;"><?php echo $_SESSION['LOG']; ?></span> </a></li>
  
  <li> <a href="homepage.php" id="navc" class ="notification" style="font-weight: bold; position: absolute;left:8px;top: 210px;">
  <span><i class="fa fa-home" id ="hm" align="left" style="position: absolute;left: 10px;font-size:15px;color:white"></i></span>
  </a></li>
  
  <li> <a href="notify.php" class ="notification" style="font-weight: bold; position:absolute;left:110px;top: 210px;">
  <span>INBOX</span>
  <span class="badge"> <?php echo $_SESSION['nf'];?> </span>
  
  </a></li>
  
  <li> <a href="history.php" class ="notification" style="font-weight: bold; position: absolute;left: 250px; top: 210px;">
  <span>COMPLAINT LOG</span>
  </a></li>
  <li> <a href="pending.php" class ="notification" style="font-weight: bold; position: absolute;left: 480px; top: 210px;">
  <span>PENDING COMPLAINTS</span>
  </a></li>
  <li> <a href="FAQ.php" class ="notification" style="font-weight: bold; position: absolute;left: 760px; top: 210px;">
  <span>FAQ</span>
  </a></li>
</ul>
</br></br>
<div id="example1" class="form" style="display:none;" >
		<table id ="table" class ="content-table">
				
			<thead>
			<tr style="font-size:16px;">
				<th  align="left">#</th>
				<th  align="left" style="width:120px;">Problem ID</th>
				<th  align="left" style="width:100px;">Query Date</th>
				<th  align="left" style="width:150px;">Complaint By</th>
				<th  align="left">Mobile</th>
				<th  align="left">Problem</th>
				<!--<th  align="left" style="width:150px;">Solution Provided ##</th>-->
				<th  align="left" style="width:150px;">Solution Provided By</th>
				<th  align="left">Status</th>
				<th  align="left">Solution</th>
			</tr>
			</thead>
			<tbody>
			<?php 
				$sr=1;
				
				while($fetchRow = mysqli_fetch_array($result)){?>	
							<tr>
								<td ><?php echo $sr;?></td>
								<td ><?php echo $fetchRow['id']?></td>
								<td ><?php echo $fetchRow['dateofcomplain']?></td>
								<td > <?php echo $fetchRow['customername']?></td>
								<td > <?php echo $fetchRow['Mnumber']?> </td>
								<td > <?php echo $fetchRow['query']?></td>
								<td ><?php echo $fetchRow['full_name']?> </td>
								<td id ="STYLETOS"><?php echo $fetchRow['Scode']?> </td> 
								<td> <?php echo $fetchRow['Solution']?></td>										
							</tr>
						<?php $sr++; }?>
						
			</tbody>							
		</table>
</div>
</br><br></br>
					<div id="inner" style="color:red;text-align:center;">	
						<?php 
								if(mysqli_num_rows($result)<1)
								{?>
									<h2>You do not have any complain History.</h3>
									
							<?php }?>
					</div>
		

</body>

</html>



	