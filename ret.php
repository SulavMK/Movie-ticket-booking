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
	padding-left:500px;
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

.tabs 
{
  
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
 
 }
 .tabs:hover{color:#b1b1fe;}
 .dropbtn:hover{color:#b1b1fe;}

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
.dropbtn:hover {
  color: #b1b1fe;
}
.dropdown {
  position: relative;
  display: inline-block;
  
}
.dropdown-content {
  display: none;
  position: absolute;
  left: 0;
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

</head>

<body onload ="FUN()">

<?php
$db = mysqli_connect("localhost", "root", "", "mtbs");
$result = mysqli_query($db, "SELECT * FROM image");
$n=mysqli_num_rows($result);
?>
</br>
<div id="example1" class="form"  style="width:100%;padding-top: 50px;">
		<table class="content-table">
			<thead>
				<tr style="font-size:16px;">
				<th align="left">#</th>
				<th align="left" >File Name</th>
			</tr>
			</thead>
			<tbody>
			<?php 
				$sr=1;
				
				while($fetchRow = mysqli_fetch_array($result)){?>	
					<tr>
						<td><?php echo $sr;?></td>
						<td><img src="<?php echo $fetchRow['Filename']?>"  height="100" width="100"/></td>
																		
					</tr>
					<?php $sr++; }?>
						
			</tbody>							
		</table>
		
		
		
		
		
		
</div>





</body>
</html>
<script >
	function FUN()
	{
		
		
		var x=document.getElementsByClassName("badge");
		var dd= "<?php echo $_SESSION['l2f']; ?>";
		if(dd>0)
		{
			x[0].style.display="block";
		}
	}
</script>