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
		<a class="navbar-brand" href="home.php">EducNation</a>
		<ul class="nav navbar-nav">
			<li class="active"><a href="home.php">Home</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
</nav>

<!-- baba -->

	<div class="container-fluid">
		<div class="row" >
			<div class="col-sm-2">
					<ul id="sidebar" class="nav nav-stacked nav-pills" style="color: #660000">
						<li><a href="college.php" class="active">College/University</a></li>
						<li><a href="add_college.php" >Add College</a></li>
						<li><a href="update_college.php" >Update College</a></li>
						<li><a href="delete_college.php" >Delete College</a></li>
						<li><a href="add_record.php" >Add Record</a></li>
						<li><a href="update_record.php" >Update Record</a></li>
						<li><a href="delete_record.php" >Delete Record</a></li>
						<li><a href="add_course.php" >Add Course</a></li>
						<li><a href="update_course.php" >Update Course</a></li>
						<li><a href="delete_course.php" >Delete Course</a></li>
						<li><a href="elementary.php">Elementary/Secondary School</a></li>
						<li><a href="add_college.php" >Add Elementary/Secondary School</a></li>
						<li><a href="update_college.php" >Update Elementary/Secondary School</a></li>
						<li><a href="delete_college.php" >Delete Elementary/Secondary School</a></li>



				</ul>
			</div>
			<div class="col-sm-9">
						<!-- CONTENT -->
						<h3> List of Schools </h3>
						<br>
						<form class="form-inline" action="filterpersonnel.php" method="POST">

							 <br>
							<!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->

							<table class="table">
								<thead>
									<tr>
										<th style="text-align:center">ID</th>
										<th style="text-align:center">Name</th>
										<th style="text-align:center">Number of Students</th>
										<th style="text-align:center">Number of Faculty</th>
										<th style="text-align:center">Enrollment Rates</th>
										<th style="text-align:center">Graduation Rates</th>


									</tr>
								<tbody>

								<!--Table. Calls mysql to show the data-->
								<?php
									$servername = "localhost";  
									$username = "root";
									$password = "";
									$dbname = "cs165mp5";

									$conn = new mysqli($servername, $username, $password, $dbname);
								
									if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
									} 

									
									$sql = "SELECT * FROM school natural join elementary_school";
									$result = $conn->query($sql);



									if ($result->num_rows > 0) {	


										
										while($row = $result->fetch_assoc()) {

												echo '<tr>';
												echo '<td align="center">' .$row["school_id"] . '</td>';
												echo '<td align="center"><a href=elem_enrollment.php?school_id=' . $row["school_id"] . '>' .$row["name"] . '</a></td>';
												echo '<td align="center">' .$row["num_of_students"] . '</td>';
												echo '<td align="center">' .$row["num_of_faculty"] . '</td>';
												echo '<td align="center">' .$row["enrollment_rates"] . '</td>';
												echo '<td align="center">' .$row["graduation_rates"] . '</td>';
												
											
												echo '</tr>';


										}
								 	} else { echo "0 results"; }

								?>
								</tbody>
							</table>
			</div>
		</div>
</div>
</body>
</html>
