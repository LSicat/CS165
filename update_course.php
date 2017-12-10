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
				<h2>Add Course</h2>


				<form METHOD="POST">
				

				<div class="form-group">
					<label for="program_id">Program ID</label>
					<input type="text" class="form-control" id="program_id" name="program_id">
				</div>
				<div class="form-group">
					<label for="school_id">School ID</label>
					<input type="text" class="form-control" id="school_id" name="school_id">
				</div>
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="num_faculty_ba_bs">Faculty (BA/BS)</label>
					<input type="text" class="form-control" id="num_faculty_ba_bs" name="num_faculty_ba_bs">
				</div>
				<div class="form-group">
					<label for="num_faculty_ma_ms">Faculty (MA/MS)</label>
					<input type="text" class="form-control" id="num_faculty_ma_ms" name="num_faculty_ma_ms">
				</div>
				<div class="form-group">
					<label for="num_faculty_phd">Faculty (PHD)</label>
					<input type="text" class="form-control" id="num_faculty_phd" name="num_faculty_phd">
				</div>
				<div class="form-group">
					<label for="num_students_ba_bs">Students (BA/BS)</label>
					<input type="text" class="form-control" id="num_students_ba_bs" name="num_students_ba_bs">
				</div>
				<div class="form-group">
					<label for="num_students_ms_ma">Students (MA/MS)</label>
					<input type="text" class="form-control" id="num_students_ms_ma" name="num_students_ms_ma">
				</div>
				<div class="form-group">
					<label for="num_students_phd">Students (PHD)</label>
					<input type="text" class="form-control" id="num_students_phd" name="num_students_phd">
				</div>
				<div class="form-group">
					<label for="cost_per_student">Cost Per Student</label>
					<input type="text" class="form-control" id="cost_per_student" name="cost_per_student">
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
  $school_id = mysql_real_escape_string($_POST['school_id']);
  $name = mysql_real_escape_string($_POST['name']);
  $num_faculty_ba_bs = mysql_real_escape_string($_POST['num_faculty_ba_bs']);
  $num_faculty_ma_ms = mysql_real_escape_string($_POST['num_faculty_ma_ms']);
  $num_faculty_phd = mysql_real_escape_string($_POST['num_faculty_phd']);
  $num_students_ba_bs = mysql_real_escape_string($_POST['num_students_ba_bs']);
  $num_students_ms_ma = mysql_real_escape_string($_POST['num_students_ms_ma']);
  $num_students_phd = mysql_real_escape_string($_POST['num_students_phd']);
  $cost_per_student = mysql_real_escape_string($_POST['cost_per_student']);
  


  $bool = true;


  mysql_connect("localhost", "root", "") or die(mysql_error()); //connect to server
  mysql_select_db("cs165mp5") or die("Cannot connect to database"); //connect to database
 

}


if($bool){

	$insert = mysql_query("UPDATE `program` SET `school_id`=$school_id,`num_faculty_ba_bs`=$num_faculty_ba_bs,`num_faculty_ma_ms`=$num_faculty_ma_ms,`num_faculty_phd`=$num_faculty_phd,`num_students_ba_bs`=$num_students_ba_bs,`num_students_ms_ma`=$num_students_ms_ma,`num_students_phd`=$num_students_phd,`cost_per_student`=$cost_per_student WHERE $school_id;");
	$insert = mysql_query("UPDATE `offers` SET `school_id`=$school_id WHERE program_id = $program_id ");
  Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user

  if (!$insert) echo mysql_error();
}
?>