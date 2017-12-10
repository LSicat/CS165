<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
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
			<div class="col-sm-9">
						<!-- CONTENT -->
						<?php 

						
						$school = $_GET["school_id"];
					
						$servername = "localhost";  
						$username = "root";
						$password = "";
						$dbname = "cs165mp5";

						$conn = new mysqli($servername, $username, $password, $dbname);
					
						if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
						} 
						$sql = "SELECT * FROM school where school_id = $school;";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {	


							
							while($row = $result->fetch_assoc()) {

									echo '<h3>';
									
									
									echo '<td align="center">' .$row["name"] . '</h3>';



							}
					 	} else { echo "0 results"; }
						?>
						 
						<br>
						<form class="form-inline" action="filterpersonnel.php" method="POST">

							 <br>
							<!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->

							<table class="table">
								<thead>
									<tr>
										
										<th style="text-align:center">ID</th>
										<th style="text-align:center">Program</th>
										<th style="text-align:center">Number of Faculty (BA/BS)</th>
										<th style="text-align:center">Number of Faculty (MA/MS)</th>
										<th style="text-align:center">Number of Faculty (PHD)</th>
										<th style="text-align:center">Number of Students (BA/BS)</th>
										<th style="text-align:center">Number of Students (MA/MS)</th>
										<th style="text-align:center">Number of Students (PHD)</th>


									</tr>
								<tbody>

								<!--Table. Calls mysql to show the data-->
								<?php
									$_GET["school_id"];
									$school = $_GET["school_id"];


								
									$servername = "localhost";  
									$username = "root";
									$password = "";
									$dbname = "cs165mp5";

									$conn = new mysqli($servername, $username, $password, $dbname);
								
									if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
									} 
									$sql = "SELECT *, program.name as namae FROM offers natural join program, school where offers.school_id = school.school_id and school.school_id = $school;";
									$result = $conn->query($sql);



									if ($result->num_rows > 0) {	


										
										while($row = $result->fetch_assoc()) {

												echo '<tr>';
												
												echo '<td align="center">' .$row["program_id"] . '</td>';
												echo '<td align="center">' .$row["namae"] . '</td>';
												echo '<td align="center">' .$row["num_faculty_ba_bs"] . '</td>';
												echo '<td align="center">' .$row["num_faculty_ma_ms"] . '</td>';
												echo '<td align="center">' .$row["num_faculty_phd"] . '</td>';
												echo '<td align="center">' .$row["num_students_ba_bs"] . '</td>';
												echo '<td align="center">' .$row["num_students_ms_ma"] . '</td>';
												echo '<td align="center">' .$row["num_students_phd"] . '</td>';
												

												
												echo '</tr>';


										}
								 	} else { echo "0 results"; }



								?>
        
      </div>
								</tbody>
							</table>
			</div>
		</div>
</div>
</body>
</html>
