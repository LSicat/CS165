<?php
  session_start();
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);
  $password = md5($password);
  $bool = true;

  mysql_connect("localhost", "root", "") or die(mysql_error());
  mysql_select_db("cs165mp5") or die("Cannot connect to database");
  $query = mysql_query("SELECT * FROM users WHERE username = '$username'"); //query users table
  $exists = mysql_num_rows($query); //check if username exists
  $table_users = "";
  $table_password = "";
  $table_rights = "";

  if("$exists" > 0){
    while($row = mysql_fetch_assoc($query)){ //display all rows from query
      $table_users = $row['username']; //the first username row is passed on to $table_users and so on until the query is finished
      $table_password = $row['password'];
      $table_user_id = $row['user_id'];
    }
    if(($username == $table_users) && ($password == $table_password)){
      if($password == $table_password){
        $_SESSION['user'] = $username;
        $_SESSION['user_id'] = $table_user_id;
        header('location: home.php');
      }
    }
    else{
      Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
      Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
  }
  else{
    Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
    Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
  }

?>
