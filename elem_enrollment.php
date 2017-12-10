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
		<a class="navbar-brand" href="#">UP Office of Admissions</a>
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
						<li><a href="college.php" class="active">College</a></li>
						<li><a href="elementary.php">Elementary</a></li>
						<li><a href="technical.php">Technical</a></li>
						<li><a href="region.php">Regions</a></li>
						<li><a href="add.php">Add</a></li>



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
										
										
										<th style="text-align:center">Number of Faculty</th>
										<th style="text-align:center">Enrollment Rates</th>
										<th style="text-align:center">Graduation Rates</th>
										<th style="text-align:center">Number who go to College</th>
										<th style="text-align:center">Year</th>


									</tr>
								<tbody>

								<!--Table. Calls mysql to show the data-->
								<?php
									$_GET["school_id"];
									$school = $_GET["school_id"];

								 	
								 	echo '<div class="images" style=float:left><a href="elementary_enrollment.php?school_id='.$school.'"><img src="elementary_enrollment.php?school_id='.$school.'" alt="Line Plot" /></a></div>';

								 	echo '<div class="images" style=float:left><a href="elementary_faculty.php?school_id='.$school.'"><img src="elementary_faculty.php?school_id='.$school.'" alt="Line Plot" /></a></div>';
								 	
								 	echo '<div class="images"><a href="elementary_ratio.php?school_id='.$school.'"><img src="elementary_ratio.php?school_id='.$school.'" alt="Line Plot" /></a></div>';
								 	echo '<div style="clear"></div>';

								 	echo '<br>';
								 	echo '<br>';
								 	echo '<br>';
								 	echo '<br>';
								 	echo '<br>';
								
									$servername = "localhost";  
									$username = "root";
									$password = "";
									$dbname = "cs165mp5";

									$conn = new mysqli($servername, $username, $password, $dbname);
								
									if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
									} 
									$sql = "SELECT * FROM school natural join elementary_trend where school_id = $school;";
									$result = $conn->query($sql);



									if ($result->num_rows > 0) {	


										
										while($row = $result->fetch_assoc()) {

												echo '<tr>';
												
												
												
												echo '<td align="center">' .$row["faculty"] . '</td>';
												echo '<td align="center">' .$row["enrollment_rates"] . '</td>';
												echo '<td align="center">' .$row["graduation_rates"] . '</td>';
												echo '<td align="center">' .$row["num_go_college"] . '</td>';
												echo '<td align="center">' .$row["year"] . '</td>';

												
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
