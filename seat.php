<!DOCTYPE HTML>

<?php
	include('db.php');
	session_start();
	$gg = $_POST['doj'];
	//$ff = $_POST['time'];
	//$hh = $_POST['referredto'];
	$time = strip_tags( utf8_decode( $_POST['time1'] ) );
    $mname = strip_tags( utf8_decode( $_POST['referredto1'] ) );
    $querykt="SELECT movieid FROM movie WHERE moviename='$mname'";
					$resultkt = mysqli_query($con,$querykt) or die(mysql_error());
					$B = mysqli_fetch_array($resultkt);
					$mid=$B['movieid'];
	
?>

<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Movie Ticket Booking</title>
		<link rel="stylesheet" type="text/css" href="css2/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css2/bootstrap-responsive.css">
	</HEAD>

	<BODY>
		<br /><br /><br />
		<div class="container">
			<div class="row well">
				<div class="span10">
					<form action="bookticket.php" method="POST" onsubmit="return validateCheckBox();">
						<ul class="thumbnails">
						<?php
							
							$date = strip_tags( utf8_decode($gg));

							$query = "select * from seat where date = '" . $date . "' AND movieid='$mid' AND time ='$time'";
							$result = mysqli_query($con,$query);
							if ( mysqli_num_rows($result) == 0 )
							{
								for($i=1; $i<41; $i++)
								{
									echo "<li class='span1'>";
										echo "<a href='#' class='thumbnail' title='Available'>";
											echo "<img src='img/available.png' alt='Available Seat'/>";
											echo "<label class='checkbox'>";
												echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
											echo "</label>";
										echo "</a>";
									echo "</li>";								
								}
							}
							else
							{
								$seats = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0
                            ,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
								while($row = mysqli_fetch_array($result))
								{
									$pnr = explode("-", $row['SID']);
									$pnr[3] = intval($pnr[3]) - 1;
									$seats[$pnr[3]] = 1;
								}
								for($i=1; $i<41; $i++)
								{
									$j = $i - 1;
									if($seats[$j] == 1)
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Booked'>";
												echo "<img src='img/occupied.png' alt='Booked Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."' disabled/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
									else
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Available'>";
												echo "<img src='img/available.png' alt='Available Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
								}									
								
							}
						?>
						</ul>
						<center>
							<label>Show Date:</label>
							<?php
								echo "<input type='text' class='span2' name='doj' value='". $date ."' readonly/>";
							?>
							<label>Movie:</label>
							<?php
								echo "<input type='text' class='span2' name='referredto2' value='". $mname ."' readonly/>";
							?>
							<label>Time:</label>
							<?php
								echo "<input type='text' class='span2' name='time2' value='". $time ."' readonly/>";
							?>
							<br><br>
							<button type="submit" class="btn btn-info">
								<i class="icon-ok icon-white"></i> Submit
							</button>
							<button type="reset" class="btn">
								<i class="icon-refresh icon-black"></i> Clear
							</button>
							<a href="./home.php" class="btn btn-danger"><i class="icon-arrow-left icon-white"></i> Back </a>
						</center>
					</form>
				</div>
			</div>
		</div>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js2/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js2/bootstrap.js"></script>
		<script type="text/javascript">
			function validateCheckBox()
			{
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						if (c[i].checked) 
						{
							return true;
						}
					}
				}
				alert('Please select at least 1 ticket.');
				return false;
			}
		</script>
	</BODY>
</HTML>