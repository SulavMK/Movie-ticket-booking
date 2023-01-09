<?php
require('db.php');
include("query1.php");
 $query = "SELECT Status, count(*) as number FROM complain WHERE dateofcomplain=CURDATE() GROUP BY Status";  
 $result = mysqli_query($con,$query) or die(mysql_error());   
 
 $query1 = "SELECT * FROM complain WHERE dateofcomplain=CURDATE() ";
 $result1 = mysqli_query($con,$query1) or die(mysql_error());
 $row_cnt=0;
if ($result1) {

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result1);

    //printf("Result set has %d rows.\n", $row_cnt);

    /* close result set */
    mysqli_free_result($result1);
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
                          ['Status','Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Status"]."', ".$row["number"]."],";  
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
                          
                            document.getElementById("demo").innerHTML = dateStr;
                            document.getElementById("demo1").innerHTML = numb;
                
                chart.draw(data, options);  
                
           }  
           </script>  
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
	height:38px;
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
	padding-left:280px;
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
  background-color: #3e8e41;
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
  min-width: 200px;
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
<body >

<div id="header">
<img src="images/logo.png" align="left"> <span id="wname"><h1>कलश<h1> </span></img>
<img id="img" src="images/icon2.png" align="right"></img>
<span id="wsh">-A Cᴀʟʟ Loɢ Sʏꜱᴛᴇᴍ</span>

</div>
</br></br></br>
<div>
	<span id="msg"> " कोहि तपाई को जवाफ को प्रतिक्षा मा छ, Referred Complains को छिटो Solution दिनुहोस् है " </span>
</div>
</br></br></br>
<div id="nav" >
	<ul class="topnav">
		<li><a class="tabs" href="adminhomepage.php" style="font-weight: bold; position: absolute;left: 0px; top: 0px;"><i class="fas fa-home" style="font-size:25px;"></i></a></li>
		<li><a class="tabs" href="referredcomplain.php" style="font-weight: bold; position: absolute;left: 110px; top: 0px;">REFERRED COMPLAINS</a></li>
		
		<li><a  class="tabs" href="logout.php" style="font-weight: bold; position: absolute;right: 0px; top: 0px;">LOGOUT</a></li>
  		<li><a class="tabs" href="" style="font-weight: bold; position: absolute;right: 110px; top: 0px;">नमस्कार <?php echo $_SESSION['username']; ?> </a></li> 
    
    </ul>
    <div class="dropdown" >
          <button class="dropbtn" style="font-weight:bold; left:370px; top: -31px; font-family:Times New Roman;">REPORTS</button>
         <div class="dropdown-content" style="left:370px; font-weight:bold;">
              <a href="#">All Pending Complains</a>
              <a href="#">Agent's Performance</a>
              <a href="#">All Referred Complains</a>
        </div>
    </div>


</div>



<div class ="graphics">
<br /> 
           <div >  
                <lable for demo style="font-weight:bold">Date: </lable><span id="demo" onload="fun()"></span>
                <span style="left:1050px;height:200px;position:absolute;margin:0 auto;font-weight:bold">
                    <label for input>Referred to You:</label><input type="text" 
    style="width:40px;height=300px; font-size:20px;position:absolute;" value="<?php echo $_SESSION['pending'];?>" /> </span>
             </br></br>
             <lable for demo style="font-weight:bold">Today's Complain Status: </lable><span id="demo1" onload="fun()"></span>
              <div id="piechart" style="width: 800px; height: 400px;"></div>  
                
           </div> 
           

</div>


</body>
</html>