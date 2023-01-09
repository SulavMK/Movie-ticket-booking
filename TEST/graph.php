<?php  
require('db.php');
include("auth.php");
 $query = "SELECT Status, count(*) as number FROM complain WHERE dateofcomplain=CURDATE() GROUP BY Status";  
 $result = mysqli_query($con,$query) or die(mysql_error());  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
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
                                pieHole: 0.9
                      
                                };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                
                         var d = new Date();
     
                            var date = d.getUTCDate();
                            var month = d.getUTCMonth() + 1; // Since getUTCMonth() returns month from 0-11 not 1-12
                            var year = d.getUTCFullYear();
     
                            var dateStr = date + "/" + month + "/" + year;
                            document.getElementById("demo").innerHTML = dateStr;
                chart.draw(data, options);  
                
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px; ">  
                <lable for demo style="font-weight:bold; align:center">Date: </lable><span id="demo" onload="fun()"></span>
              <div id="piechart" style="width: 900px; height: 400px;"></div>  
                
           </div> 
           





      </body>  
 </html>  

 