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

				</ul>
			</div>
			<div class="col-sm-5">
					<!-- CONTENT -->
				<h2>Add School</h2>


				<form METHOD="POST">

    				<div class="form-group">
    					<label for="name">School Name</label>
    					<input type="text" class="form-control" id="name" name="name">
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

$conn = new mysqli("localhost", "root", "", "cs165mp5");

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $name = $conn->real_escape_string($_POST['name']);
  $location = $conn->real_escape_string($_POST['location']);

  $bool = true;

  if ($location <= 0 or $location > 17) {$bool = false;}

  $query = mysqli_query($conn, "Select * from school");

}
$school = rand ( 100000,  999999);

if($bool){
	$insert = mysqli_query($conn, "INSERT INTO school (`school_id`,`name`,`num_of_faculty`,`num_of_students`)
										VALUES ('$school','$name','0','0');");

	$insert = mysqli_query($conn, "INSERT INTO elementary_school
	  									VALUES ('$school','0','0','0');");
	$insert = mysqli_query($conn, "INSERT INTO located_in (`located_id`,`school_id`,`region_num`)
	  									VALUES ('$school','$school','$location');");

    Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user

  if (!$insert) echo mysqli_error();
}
?>
