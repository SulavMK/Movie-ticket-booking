<?php
include("auth.php");
require('db.php');
$db = mysqli_connect("localhost", "root", "", "mtbs");
$result = mysqli_query($db, "SELECT DISTINCT moviename FROM movie");
$n=mysqli_num_rows($result);

$S=$_SESSION['username'];
//echo "<script>
									//alert('$S');
	//</script>";

$db = mysqli_connect("localhost", "root", "", "mtbs");
$result1 = mysqli_query($db, "SELECT fullname,mobile FROM users WHERE username='$S'");
$data = mysqli_fetch_array($result1);
$cname = $data['fullname'];
$mob = $data['mobile'];
$time1 = strip_tags( utf8_decode( $_POST['time2'] ) );
$mname1 = strip_tags( utf8_decode( $_POST['referredto2'] ) );
?>

<html>
<head>

<script>
function Test(x)
{
	if(x==0)
	{
		document.getElementById('YES').style.display='block';
		document.getElementById('YES').style.paddingLeft='0';
		document.getElementById('no').value="Referred to Level 1";		
	}
	else if(x==1)
	{
		document.getElementById('YES').style.display='none';
		document.getElementById('no').value="";
	}
	
	return;
}
</script>
<style>
<style>
.container100{
					border-collapse: collapse;
					margin: 15px 0;
					font-size: 1.4em;
					min-width: 300px;
					border-radius: 5px 5px 0 0;
					overflow: hidden;
					box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
					margin-left:0px; 
					position:absolute;
					left:930px;
					top:80px;

		}



.container100 th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}

.container100 td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
			text-align: left;
}



.container100 td, .container100 th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container100 tr:nth-child(odd) {
	  background-color: white;
}

/* Background-color of the even rows */
.container100 tr:nth-child(even) {
	  background-color: white;
}

.container100 th {
	  background-color: #1F2739;
}

.container100 td:first-child { color: black; }

.container100 tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container100 td:hover {
  background-color: #FFF842;
 
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container100 td:nth-child(4),
.container100 th:nth-child(4) { display: none; }
}




</style>
</head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
	<!--<link rel="stylesheet" type="text/css" href="css2/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css2/bootstrap-responsive.css">-->
    <!-- Main css -->
    <link rel="stylesheet" href="css1/style.css">


<body>
<div id="exe1" class="main" style="text-align:left;">
		<div class="container" style="background-color:#E6F1F7;">
			<div class="signup-content" style="width:100%;">
				<div class="signup-form" >
			<form action="register.php" method="post" class="register-form" id="register-form">
						<h2>MOVIE BOOKING FORM</h2>

				<div class='form-group'style="width:250px;">
					<label for='input1'>Seat Numbers:</label>
						<!--<div class='controls'>-->
							<?php 
								for($i=1; $i<41; $i++)
							{
								$chparam = "ch" . strval($i);
								if(isset($_POST[$chparam]))
								{
									echo "<input type='text'  name=ch".$i." value=".$i." readonly/><br>";
								}
							}
							?>
	                	<!--</div>-->
	            </div>
				<?php
						if(isset($_POST['doj']))
						{
							echo "<div class='control-group' style='width:250px;'>";
							echo "<label class='control-label' for='input1'>Show Date</label>";
								echo "<div class='controls'>";
									echo "<input type='text' name='m_date' id='input1' class='span3' value=". $_POST['doj'] ." readonly />";
								echo "</div>";
							echo "</div>";
						}
					?>

							<div class="form-row" style="position:absolute;left:400;top:112">
									<div class="form-group" style="width:250px;">
										<label for "Custnam">Customer Name:</label>
										<input type ="text" name="user_name" value="<?php echo $cname;?>" required readonly/>
									</div>
									<div class="form-group" style="width:250px;" >				
										<label for "Mnumber">Mobile Number:</label>
										<input type="text" name="mobile" value="<?php echo $mob;?>" required  readonly/>
									</div>
							</div>
							<div class="form-row" style="width:500px; position:absolute;left:400;top:200">
								<div class="form-group">
										<label for "Subject">Show Time:</label>
										<input type="text" name="time" value="<?php echo $time1;?>" required  readonly/>
								</div>
							</div>
							<div class="form-row" style="width:500px; position:absolute;left:400;top:300">
								<div class="form-group">
										<label for "ReferTo">Movie:</label>
										<input type="text" name="referredto" value="<?php echo $mname1;?>" required  readonly/>
								</div>
							</div>
													
							<div class="form-submit">
									<!--<input type="submit" value="Reset All" class="submit" name="reset" id="reset" />-->
									<input type="hidden" name="save" value="contact">
									<input type="submit" value="Submit" class="submit" name="submit" id="submit" style="position:absolute; left:400px; top:550px;"/>
							</div>
					 </form>
				</div>
				
				<!--<div class="signup-img"  style="background-color:#1F2739;">
					   <h1 style="font-size:3em; font-weight: 100;line-height:1em; text-align: left;color: #4DC3FA; font-size:25px; 
					   position:absolute; top:30px; left:900px;">
					   <span class="blue"></span>SELECT<span class="blue"></span> <span class="yellow">SEAT</span></h1>
					   <div id="suggesstion-box"></div>
				</div>-->
				
				
				
				
								
			</div>
		</div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js1/main.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js2/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js2/bootstrap.js"></script>
</body>
</html>
<script>
$(document).ready(function(){
	$("#Subject").change(function(){
		$.ajax({
		type: "POST",
		url: "readQuery.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
function selectCountry(val1, val2) {
$("#search-box").val(val1);

$("#MESSI").hide();
$("#no").val(val2);
//var x = 0;
//var array = Array();
//array[x] = val2;
//x++;
//document.getElementById("no").value = "";
 //var e = "";
		//for (var y=0; y<array.length; y++)
			
		///{
			//e += array[y];
		//}
		//document.getElementById("Result").innerHTML = e;
}

</script>
