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
		<a class="navbar-brand" href="#">UP Office of Admissions</a>
		<ul class="nav navbar-nav">
			<li class="active"><a href="home.php">Home</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="Rates">Records</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
</nav>

<!-- baba -->
	<div class="container-fluid">
		<div class="row" >
			<div class="col-sm-2">
					<ul id="sidebar" class="nav nav-stacked nav-pills" style="color: #660000">
						<li><a href="home.php">View List of Personnel</a></li>
						<li><a href="addrecord.php" class="active">Add Record</a></li>
						<li><a href="invitation.php">Invitation</a></li>
						<li><a href="Response">Response</a></li>
						<li><a href="attendanceregional.php">Assignment (Regional)</a></li>
						<li><a href="attendancediliman.php">Assignment (Diliman)</a></li>
						<li><a href="Attendance">UPCAT Attendance</a></li>

				</ul>
			</div>
			<div class="col-sm-5">
					<!-- CONTENT -->
				<h2>Create Record</h2>


				<form METHOD="POST">
				<h3>Personal Details</h3>


				<div class="form-group">
					<label for="school_id">School ID</label>
					<input type="text" class="form-control" id="school_id" name="school_id">
				</div>

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name">
				</div>

				<div class="form-group">
					<label for="num_of_faculty">Number of Faculty</label>
					<input type="text" class="form-control" id="num_of_faculty" name="num_of_faculty">
				</div>
				<div class="form-group">
					<label for="num_of_students">Number of Students</label>
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
  
  $school_id = mysql_real_escape_string($_POST['school_id']);  
  $name = mysql_real_escape_string($_POST['name']);
  $num_of_faculty = mysql_real_escape_string($_POST['num_of_faculty']);
  $num_of_students = mysql_real_escape_string($_POST['num_of_students']);
  $enrollment_rates = mysql_real_escape_string($_POST['enrollment_rates']);
  $graduation_rates = mysql_real_escape_string($_POST['graduation_rates']);


  $bool = true;

  mysql_connect("localhost", "root", "") or die(mysql_error()); //connect to server
  mysql_select_db("cs165mp5") or die("Cannot connect to database"); //connect to database
  $query = mysql_query("Select * from school");

}


if($bool){
	$insert = mysql_query("INSERT INTO school (`school_id`,`name`,`num_of_faculty`,`num_of_students`) 
										VALUES ('$school_id','$name','$num_of_faculty','$num_of_students');");
	$insert = mysql_query("INSERT INTO school (`school_id`,`name`,`num_of_faculty`,`num_of_students`) 
	  									VALUES ('$school_id','$name','$num_of_faculty','$num_of_students');");


  Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user

  if (!$insert) echo mysql_error();
}
?>