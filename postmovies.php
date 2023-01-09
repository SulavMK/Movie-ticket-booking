<?php
error_reporting(); 
include("auth.php");
?> 
<?php
// If form submitted, insert values into the database.
if (isset($_POST['submit']))
{
	$msg = ""; 
	$filename = $_FILES["uploadfile"]["name"]; 
	
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = "image/".$filename; 
		
	$mname = $_POST['mname'];
	$director = $_POST['director'];
	$rd = $_POST['rd'];
	//$trn_date = date("Y-m-d H:i:s");
          
    $db = mysqli_connect("localhost", "root", "", "mtbs"); 
  
        // Get all the submitted data from the form 
        $sql = "INSERT INTO movie (filename, moviename,directorname, releasedate) 
		VALUES ('$folder', '$mname','$director','$rd')"; 
  
        // Execute query 
        $res= mysqli_query($db, $sql);
			
          
        // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
        }else{ 
            $msg = "Failed to upload image"; 
      }
	  if($res)
			{
				echo '<script type="text/javascript"> alert("Movie Posted Successfully.")</script>';
			}
		
    
}
?>




<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
ul:not(.A) {
  list-style-type: none;
  margin: 0;
  width:100%;
  padding: 0px 5px;
  overflow: hidden;
  background-color: #252525;
  height: 90px;
}

li a:not(.apple) {
  float: left;
}
.apple {
  float: right;
  display: inline-block;
  border-radius: 2px;
  font-weight:bold;
  
}
.error {
  color:red;
}
.notification {
  background-color: none;
  color: white;
  text-decoration: none;
  padding: 13px 20px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  color: #b1b1fe;
}
#hm:hover{color: #b1b1fe;}
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

li a:not(.C) {
  display: block;
  color: white;
  text-align: center;
  padding: 10px 16px;
  
  display: inline-block;
  margin: 2px 2px;
  font-size:16px;
  }
li a:hover:not(.C){
border: none;
  display: inline-block;
  margin: 0px 0px;
  border-radius:20%
 }

.active {
  background-color: #800080 ;
}
#msg
{
	position:relative;
	padding-left:285px;
	text-align:center;
	
	font-size: 1.02rem;
	font-weight:bold;
	
	font-variant: small-caps;
	font-family: 'Niconne', cursive;
	font-weight: 700;
	color: #c11a2b;
}
input[type='text'], input[type='email'],
input[type='file'] {
     width: 230px;
     border-radius: 2px;
     border: 1px solid #0061a7;
     padding: 10px;
     color: #333;
     font-size: 14px;
     margin-top: 10px;
}
input[type='submit']{
     padding: 10px 25px 8px;
     color: #fff;
     background-color: #0067ab;
     text-shadow: rgba(0,0,0,0.24) 0 1px 0;
     font-size: 16px;
     box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0;
     border: 1px solid #0164a5;
     border-radius: 2px;
     margin-top: 10px;
     cursor:pointer;
	 position:absolute;
	 top:360px;
	 left:156px;
}
input[type='submit']:hover {
     background-color: #024978;
}
body{background-color:#E6F1F7;}
.myButton {
	box-shadow:inset 0px 1px 0px 0px #54a3f7;
	background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
	background-color:#007dc1;
	border-radius:3px;
	border:1px solid #124d77;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #154682;
	position:absolute;
	top:530px;
	left:680px;
}
.myButton:hover {
	background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
	background-color:#0061a7;
}
#example1
{
   position:relative; 
 box-sizing: content-box;  
  width: 400px;
  height: 400px;
  padding: 30px;  
  border-style: solid;
  border-color:  #0B4990;
  border-width: 7px;

  text-align:center;
   margin: 60px auto;
}
body{background-color:#AAAAAA;}
</style>

</head>
<body>
		<?php
$ss=$_SESSION['username'];
//$error="";

?>
<div id="header">
		<img src="images/banner.jpg" width="100%" height="250"> </img>
		
</div>
</br>
<div >
	<span id="msg"> " Book Ticket From Home; Enjoy The Show!!! " </span>
</div>

</br>
		<div id="FNAV">
				<ul>
				  <li><a  class="notification" href="logout.php" style="font-weight: bold; position: absolute;top: 345px; left: 900px; ">LOGOUT</a></li>
				  
				  <li><a class="notification" href="" style="font-weight: bold; float:right;position: absolute;left: 650px; top: 345px;">
				  WELCOME <span style="text-transform:uppercase; color:yellow;"><?php echo $_SESSION['username'];?></span> </a></li>
				  
				  <li> <a href="adminhomepage.php" id="navc" class ="notification" style="font-weight: bold; position: absolute;left:8px;top: 326px;">
				  <span><i class="fa fa-home" id ="hm" align="left" style="position: absolute;left: 10px;font-size:50px;color:white"></i></span>
				  </a></li>
				  
				  <li> <a href="postmovies.php" class ="notification" style="font-weight: bold; position:absolute;left:200px;top: 320px;">
				  <span><img src="images/ico-movie.svg" style="position: absolute;width:50px;color:white;">
				  <p style="position: relative;left: 24px; top: 35px;">Post Movies</p></img></span>
					</a></li>
				  
				  <li> <a href="notify.php" class ="notification" style="font-weight: bold; position:absolute;left:420px;top: 320px;">
				  <span><img src="images/ico-ticket.svg" style="position: absolute;width:50px;color:white;">
				  <p style="position: relative;left: 24px; top: 35px;"> Manage Tickets</p></img></span>
					</a></li>   
				</ul>
		</div>
			<div id="example1" class="form">
					<h1>Post Movies</h1>
					<form method="POST" action="" enctype="multipart/form-data">
						<input type="file" name="uploadfile" value=""/>
								
						<div>		
						<input type="text" name="mname"  placeholder="Movie Name"required /><br><br>
						<input type="text" name="director" placeholder="Director" required /><br><br>
						<input type="text" name="rd"  placeholder="Release Date(yyyy-mm-dd)" required /><br><br>
						<input type="submit" name="submit" value="Post Movie"/>
						</div>
					</form>
					
			</div>
			
	</body>
</html>

