<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add a Record</title>
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
				<h2>Add College</h2>


				<form METHOD="POST">
				

				<div class="form-group">
					<label for="college_trend_id">Record ID</label>
					<input type="text" class="form-control" id="college_trend_id" name="college_trend_id">
				</div>

				<div class="form-group">
					<label for="school_id">School ID</label>
					<input type="text" class="form-control" id="school_id" name="school_id">
				</div>
				<div class="form-group">
					<label for="num_of_faculty">Num of Faculty</label>
					<input type="text" class="form-control" id="num_of_faculty" name="num_of_faculty">
				</div>
				<div class="form-group">
					<label for="enrollment_rates">Enrollment Rates</label>
					<input type="text" class="form-control" id="enrollment_rates" name="enrollment_rates">
				</div>
				<div class="form-group">
					<label for="graduation_rates">Graduation Rates</label>
					<input type="text" class="form-control" id="graduation_rates" name="graduation_rates">
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
  

$college_trend_id = mysql_real_escape_string($_POST['college_trend_id']); 
$school_id = mysql_real_escape_string($_POST['school_id']);
$faculty = mysql_real_escape_string($_POST['faculty']);
$enrollment_rates = mysql_real_escape_string($_POST['enrollment_rates']);
$graduation_rates = mysql_real_escape_string($_POST['graduation_rates']);
$year = mysql_real_escape_string($_POST['year']);
  
  


  $bool = true;

  if ($location <= 0) {$bool = false;}

  mysql_connect("localhost", "root", "") or die(mysql_error()); //connect to server
  mysql_select_db("cs165mp5") or die("Cannot connect to database"); //connect to database
  $query = mysql_query("Select * from school");

}
$school = rand ( 100000,  999999);

if($bool){
	
	$insert = mysql_query("INSERT INTO college_trend (`college_trend_id`, `school_id`,`faculty`,`enrollment_rates`,`graduation_rates`,`year`) 
										VALUES ('$college_trend_id','$school_id','$faculty','$enrollment_rates','$graduation_rates','$year');");


  if (!$insert) echo mysql_error();
}
?>