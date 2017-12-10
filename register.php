
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Welcome!</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
	</head>


	<body>
<div class="container center_div">
<form class="form-group row" action='' method="POST">
	<fieldset>
		<div id="legend">
		</br>
		</br>
			<legend class="">Register</legend>
		</div>

		<div class="control-group">
			<!-- Username -->
			<label class="control-label"  for="username">Username</label>
			<div class="controls">
				<input type="text" id="username" name="username" placeholder="" class="input-xlarge">
			</div>
		</div>


		<div class="control-group">
			<!-- Password-->
			<label class="control-label" for="password">Password</label>
			<div class="controls">
				<input type="password" id="password" name="password" placeholder="" class="input-xlarge">
				
			</div>
		</div>
 		<br>

		<div class="control-group">
			<!-- Button -->
			<div class="controls">
				<button class="btn btn-success">Register</button>
			</div>
		</div>
	</fieldset>
</form>

</div>
	</body>
</html>


<?php

$bool = NULL;

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$password = md5($password);
	

	$bool = true;

	mysql_connect("localhost", "root", "") or die(mysql_error()); //connect to server
	mysql_select_db("cs165mp5") or die("Cannot connect to database"); //connect to database
	$query = mysql_query("Select * from users");
	while($row = mysql_fetch_array($query)){
		$table_users = $row['username'];
		if($username == $table_users){
			$bool = false;
			Print '<script>alert("Username has been taken!");</script>';
			Print '<script>window.location.assign("register.php");</script>';
		}
	}
}


if($bool){
	mysql_query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
	Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
	Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
	header('location:login.php');
}

?>
