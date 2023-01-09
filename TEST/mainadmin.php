<?php
require('db.php');
//include("query1.php");
include("query2.php");
include("query100.php");
 $query = "SELECT Scode, count(*) as number FROM complain WHERE dateofcomplain=CURDATE() GROUP BY Scode";  
 $result = mysqli_query($con,$query) or die(mysql_error());   
 
 $querycc = "SELECT Scode, count(*) as number1 FROM complain GROUP BY Scode";  
 $resultcc = mysqli_query($con,$querycc) or die(mysql_error());



 $query1 = "SELECT * FROM complain WHERE dateofcomplain=CURDATE() ";
 $result1 = mysqli_query($con,$query1) or die(mysql_error());
 $row_cnt=0;
 $row_cntc=0;
if ($result1) {

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result1);

    //printf("Result set has %d rows.\n", $row_cnt);

    /* close result set */
  mysqli_free_result($result1);
}

$totalc = "SELECT * FROM complain";
$resultc = mysqli_query($con,$totalc) or die(mysql_error());
if ($resultc) {

    /* determine number of rows result set */
    $row_cntc = mysqli_num_rows($resultc);

    //printf("Result set has %d rows.\n", $row_cnt);

    /* close result set */
  mysqli_free_result($resultc);
}
 mysqli_close($con);
 
 
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/9e73f1ddd4.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
      <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Scode','Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Scode"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                                title: 'Percentage of Solved and Pending Complains' ,
                                is3D:true,  
                                pieHole: 0.4
                      
                                };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                
                         var d = new Date();
     
                            var date = d.getUTCDate();
                            var month = d.getUTCMonth() + 1; 
                            var year = d.getUTCFullYear();
                            var numb="<?php echo $row_cnt;?>";

                            var dateStr = date + "/" + month + "/" + year;
                            var total = "<?php echo $row_cntc;?>";



                            document.getElementById("demo").innerHTML = dateStr;
                            document.getElementById("demo1").innerHTML = numb;
                            document.getElementById("demo2").innerHTML =total;
                
                chart.draw(data, options);  
                var data1 = google.visualization.arrayToDataTable([  
                          ['Scode','Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($resultcc))  
                          {  
                               echo "['".$row["Scode"]."', ".$row["number1"]."],";  
                          }  
                          ?>  
                     ]);  
                var options1 = {  
                                title: 'History of Solved and Pending Complains' ,
                                is3D:true,  
                                pieHole: 0.4
                      
                                };  
                var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
                 chart1.draw(data1, options1); 

               
           }  
           </script>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
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
	padding-left:480px;
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

.dropdown:hover .dropbtn {
  
}
.column {
  float: left;
  width: 50%;
  padding: 10px;
   height:450px;/* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.graphics:after {
  content: "";
  display: table;
  clear: both;
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
</br></br></br>
<div>
	<span id="msg"> " Continuous Monitoring, Leads To Better Customer Service " </span></div>
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
		<span style="text-transform:uppercase; color:yellow;"><?php echo $_SESSION['LOG']; ?></span> </a></li> 
    </ul>
    <div class="dropdown" >
          <button class="dropbtn" style="font-weight:bold; left:370px; top: -34px; font-family:Times New Roman;">REPORTS</button>
         <div class="dropdown-content" style="left:370px; font-weight:bold;">
              <a href="agentreport.php" style="text-align: left; height:40px;">Agent's Performance</a>
              <a href="mmanager.php" style="text-align: left; height:40px;">Level 1 Manager's Performance</a>
              <a href="level2.php" style="text-align: left; height:40px;">All Answered Complains</a>
              <a href="CTR.php" style="text-align: left; height:40px;">Complain Type Summary Report</a>
              <a href="BCC.php" style="text-align: left; height:40px;">Browse Complain By Category</a>
              
        </div>
    </div>


</div>
</br></br>
<div >
<span style="left:1150px;height:300px;position:absolute;margin:0 auto; font-size:20px; font-weight:bold">
                    <label for input>Referred to You:</label><input type="text" 
    style="width:40px;height=300px; color:red; font-size:20px;position:absolute;" value="<?php echo $_SESSION['pending'];?>" restrict/> 
 </span>
</br></br></br></br>
<div class ="graphics" style="background-color:;">
           <div class="column" style ="box-sizing: border-box;border:thick solid #0B4990;">  
                <h2 align="center">Today's Complain Status</h1>
                </br>
                <lable for demo style="font-weight:bold">Date: </lable><span id="demo" ></span>
                
                     </br></br>
                 <lable for demo style="font-weight:bold">Total Complains: </lable><span id="demo1" ></span>
                    <div id="piechart" style="width: 600px;"></div>
                
           </div> 
           
           <div class="column" style ="box-sizing: border-box;border:thick solid #0B4990;">
                <h2 align="center">Complain Box History</h1>
                <lable for demo style="font-weight:bold">Total Complains: </lable><span id="demo2" ></span>
                </br></br></br></br>
                <div id="piechart1" style="width: 600px;"></div>


           </div>

</div>
</div>
</body>
</html>

