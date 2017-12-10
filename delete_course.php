<!DOCTYPE html>
<html lang="en">
<head>
	<title>EducNation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
		</div>
		<a href="#" class="navbar-left"><img src="pics/logo.png" width="40px" hspace="20px" vspace="5px"></a>
		<a class="navbar-brand" href="#">EducNation</a>
		<ul class="nav navbar-nav">
			<li class="active"><a href="college.php">Home</a></li>
			
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
</nav>

<!-- baba -->
	<div class="container-fluid">
		<div class="row" >
			<div class="col-sm-2">
					<ul id="sidebar" class="nav nav-stacked nav-pills" style="color: #660000">

				</ul>
			</div>
			<div class="col-sm-5">
					<!-- CONTENT -->
				<h2>Delete Course</h2>


				<form METHOD="POST">
				


				<div class="form-group">
					<label for="program_id">Program ID</label>
					<input type="text" class="form-control" id="program_id" name="program_id">
				</div>


				<input type = "submit" class="btn btn-primary" name = "submit" value = "Submit">
				</form>


							</div>
						</div>
				</div>

</body>
</html>


<?php

$bool = NULL;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
 $program_id = mysql_real_escape_string($_POST['program_id']);

  


  $bool = true;


  mysql_connect("localhost", "root", "") or die(mysql_error()); //connect to server
  mysql_select_db("cs165mp5") or die("Cannot connect to database"); //connect to database
 

}
$school = rand ( 100000,  999999);

if($bool){
	$insert = mysql_query("DELETE FROM `offers` WHERE `program_id` = $program_id;");
	$insert = mysql_query("DELETE FROM `program` WHERE `program_id` = $program_id;");
	
  Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user

  if (!$insert) echo mysql_error();
}
?>