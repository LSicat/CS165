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
						<li><a href="home.php" class="active">Schools</a></li>
						<li><a href="addrecord.php">Regions</a></li>


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
										<th style="text-align:center">Region</th>
										<th style="text-align:center">Number of Enrollees</th>
										<th style="text-align:center">Number of Non Enrollees</th>
										<th style="text-align:center">Cost Per Student</th>




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
									$sql = "SELECT * FROM region";
									$result = $conn->query($sql);



									if ($result->num_rows > 0) {	


										
										while($row = $result->fetch_assoc()) {

												echo '<tr>';
												echo '<td align="center"><a href=region_overview.php?id='. $row["region_num"] . '>' .$row["name"] . '</a></td>';
												echo '<td align="center">' .$row["num_enrollees"] . '</td>';
												echo '<td align="center">' .$row["num_non_enrollees"] . '</td>';
												echo '<td align="center">' .$row["cost_student"] . '</td>';
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
