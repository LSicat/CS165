<html>
<head>
    <title>Login </title>
    <link rel="stylesheet" href="styles.css">
    <script src="js/bootstrap.min.js"></script>
  </head>
<body>
        <?php
      session_start();
      error_reporting(0);
      if($_SESSION['user']){
        header('location: dashboard.php');
      }
      ?>
  </br>
  
  <a href="register.php">Click here to Register.</a>
  <div class="imgcontainer">
    <img src="201614.svg" height="100" width="100" align ="center">
  </div>
  <div class="logotext" align = "center">
        <h3> Education for the Nation</h3>
    </div>
    <div align="center">
    <form action="checklogin.php" method="POST">
  <div class="login_container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
  
  </div>
  </div>
</form>

</body>
</html>
