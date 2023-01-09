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
?>

<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Movie Ticket Booking</title>
		<link rel="stylesheet" type="text/css" href="css2/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css2/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="css2/datepicker.css" />
	</HEAD>

	<BODY>
		<br /><br /><br />
		<div class="container">
			<div class="row well">
				<div class="span10" style="height:400px;">
					<form action="seat.php" method="POST">
						<center>
						</br></br></br>
							<label>Select Date:</label>



							<div data-date-format="yyyy-mm-dd" data-date="document.write(date())" class="input-append date myDatepicker">
							    <input type="text" value="" name="doj" size="16" class="span2" style="height:30px;" required>
							    <span class="add-on"><i class="icon-calendar"></i></span>
								</br></br>
							</div>
							
							<div class="form-row">
									<div class="form-group" style="position:absolute;left:480;top:220;">
											<label for "ReferTo">Select Movie:</label>
										<div class="form-select" style="width:250px;">
												<select id="ReferTo" name="referredto1">
														<option value=""></option>
														<?php 
													while($fetchRow = mysqli_fetch_array($result))
														{
															?>	
																<option  required> <?php echo $fetchRow['moviename'];?> </option>
															<?php	
														}
													?>	
												</select>
											<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
										</div>
									</div>
							</div>

							<div class="form-row" style="width:500px; position:absolute;left:355;top:290">
								<div class="form-group">
										<label for "Subject">Show Time:</label>
									<div class="form-select">
											<select id="Subject" name="time1" required>
													<option value=""></option>
													<option value="08:00:00">8:00 AM</option>
													<option value="11:00:00">11:00 AM</option>
													<option value="14:00:00">2:00 PM</option>
													<option value="18:00:00">6:00 PM</option>
											</select>
										<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
									</div>
								</div>
							</div>




							<!--<input type="date" class="span2" name="doj" placeholder="YYYY-MM-DD" required/>-->
							<br><br></br></br></br></br></br></br></br>
							<button type="submit" class="btn btn-info">
								<i class="icon-ok icon-white"></i> Submit
							</button>
							<button type="reset" class="btn">
								<i class="icon-refresh icon-black"></i> Clear
							</button>
							<a href="./login.php" class="btn btn-danger"><i class="icon-remove icon-white"></i> Cancel Ticket </a>
						</center>
					</form>
				</div>
			</div>
		</div>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js2/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js2/bootstrap.js"></script>
		<script type="text/javascript" src="js2/bootstrap-datepicker.js"></script>
		<script>
			$('.myDatepicker').each(function() {
			    var minDate = new Date();
			    minDate.setHours(0);
			    minDate.setMinutes(0);
			    minDate.setSeconds(0,0);
			    
			    var $picker = $(this);
			    $picker.datepicker();
			    
			    var pickerObject = $picker.data('datepicker');
			    
			    $picker.on('changeDate', function(ev){
			        if (ev.date.valueOf() < minDate.valueOf()){
			            
			            // Handle previous date
			            alert('You can not select past date.');
			            pickerObject.setValue(minDate);
			            
			            // And this for later versions (in case)
			            ev.preventDefault();
			            return false;
			        }
			    });
			});					
		</script>
	</BODY>
</HTML>