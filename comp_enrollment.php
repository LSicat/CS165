<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
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


										<th style="text-align:center">Number of Faculty</th>
										<th style="text-align:center">Enrollment Rates</th>
										<th style="text-align:center">Graduation Rates</th>
										<th style="text-align:center">Year</th>


									</tr>
								<tbody>

								<!--Table. Calls mysql to show the data-->
								<?php
									$_GET["school_id"];
									$school = $_GET["school_id"];


								 	echo '<div class="images" style=float:left><a href="college_enrollment.php?school_id='.$school.'"><img src="college_enrollment.php?school_id='.$school.'" alt="Line Plot" /></a></div>';

								 	echo '<div class="images" style=float:left><a href="college_faculty.php?school_id='.$school.'"><img src="college_faculty.php?school_id='.$school.'" alt="Line Plot" /></a></div>';

								 	echo '<div class="images"><a href="college_ratio.php?school_id='.$school.'"><img src="college_ratio.php?school_id='.$school.'" alt="Line Plot" /></a></div>';
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
									$sql = "SELECT * FROM school natural join college_trend where school_id = $school;";
									$result = $conn->query($sql);



									if ($result->num_rows > 0) {



										while($row = $result->fetch_assoc()) {

												echo '<tr>';



												echo '<td align="center">' .$row["faculty"] . '</td>';
												echo '<td align="center">' .$row["enrollment_rates"] . '</td>';
												echo '<td align="center">' .$row["graduation_rates"] . '</td>';
												echo '<td align="center">' .$row["year"] . '</td>';


												echo '</tr>';


										}
								 	} else { echo "0 results"; }



								?>

      </div>
								</tbody>
								<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
								<script>

									function commentSubmit(){
										if(form1.name.value == '' && form1.comments.value == ''){ //exit if one of the field is blank
											alert('Enter your message !');
											return;
										}
										var comments = form1.comments.value;
										var xmlhttp = new XMLHttpRequest(); //http request instance

										xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
											if(xmlhttp.readyState==4&&xmlhttp.status==200){
												document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
											}
										}
										var school = "<?php echo $school; ?>";
										xmlhttp.open('GET', 'insert.php?comments='+comments+'&school_id='+school, true); //open and send http request
										xmlhttp.send();
									}

										$(document).ready(function(e) {
											$.ajaxSetup({cache:false});
											var school = "<?php echo $school; ?>";
											setInterval(function() {$('#comment_logs').load('logs.php?school_id='+school);}, 2000);
										});

								</script>

							</table>
							<a href="indexcom.php"><h2> Post Comment </h2></a>
							<div id="comment_logs">
								Loading comments...
							<div>
			</div>
		</div>
</div>
</body>
</html>
