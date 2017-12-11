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
				<h2>Delete School</h2>


				<form METHOD="POST">


				<div class="form-group">
					<label for="school_id">School ID</label>
					<input type="text" class="form-control" id="school_id" name="school_id">
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

$conn = new mysqli("localhost", "root", "", "cs165mp5");

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $school_id = $conn->real_escape_string($_POST['school_id']);

  $bool = true;
}
$school = rand ( 100000,  999999);

if($bool){
	$insert = mysqli_query($conn, "DELETE FROM located_in where school_id = $school_id;");
	$insert = mysqli_query($conn, "DELETE FROM school where school_id = $school_id;");
	$insert = mysqli_query($conn, "DELETE FROM college_university where school_id = $school_id;");
	$insert = mysqli_query($conn, "DELETE FROM elementary_school where school_id = $school_id;");
	$insert = mysqli_query($conn, "DELETE FROM technical_vocational_school where school_id = $school_id;");

  Print '<script>alert("Successfully Delete School!");</script>'; // Prompts the user

  if (!$insert) echo mysql_error();
}
?>
