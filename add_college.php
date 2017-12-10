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
					<label for="name">School Name</label>
					<input type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="num_of_faculty">Num of Faculty</label>
					<input type="text" class="form-control" id="num_of_faculty" name="num_of_faculty">
				</div>
				<div class="form-group">
					<label for="num_of_students">Num of Students</label>
					<input type="text" class="form-control" id="num_of_students" name="num_of_students">
				</div>
				<div class="form-group">
					<label for="enrollment_rates">Enrollment Rates</label>
					<input type="text" class="form-control" id="enrollment_rates" name="enrollment_rates">
				</div>
				<div class="form-group">
					<label for="graduation_rates">Graduation Rates</label>
					<input type="text" class="form-control" id="graduation_rates" name="graduation_rates">
				</div>
				<div class="form-group">
					<label for="location">Location</label>
					<input type="text" class="form-control" id="location" name="location">
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
  
 
  $name = mysql_real_escape_string($_POST['name']);
  $location = mysql_real_escape_string($_POST['location']);
  $num_of_faculty = mysql_real_escape_string($_POST['num_of_faculty']);
  $num_of_students = mysql_real_escape_string($_POST['num_of_students']);
  $enrollment_rates = mysql_real_escape_string($_POST['enrollment_rates']);
  $graduation_rates = mysql_real_escape_string($_POST['graduation_rates']);
  


  $bool = true;

  if ($location <= 0) {$bool = false;}

  mysql_connect("localhost", "root", "") or die(mysql_error()); //connect to server
  mysql_select_db("cs165mp5") or die("Cannot connect to database"); //connect to database
  $query = mysql_query("Select * from school");

}
$school = rand ( 100000,  999999);

if($bool){
	$insert = mysql_query("INSERT INTO school (`school_id`,`name`,`num_of_faculty`,`num_of_students`) 
										VALUES ('$school','$name','$num_of_faculty','$num_of_students');");
	$insert = mysql_query("INSERT INTO college_university (`school_id`,`enrollment_rates`,`graduation_rates`) 
	  									VALUES ('$school','$enrollment_rates','$graduation_rates');");
	$insert = mysql_query("INSERT INTO located_in (`located_id`,`school_id`,`region_num`)
	  									VALUES ('$school','$school','$location');");
  Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user

  if (!$insert) echo mysql_error();
}
?>