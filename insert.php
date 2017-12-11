<?php

session_start();

$comments = $_REQUEST['comments'];
$school_id = $_REQUEST['school_id'];

mysql_connect("localhost", "root", "") or die(mysql_error()); //connect to server
mysql_select_db("cs165mp5") or die("Cannot connect to database"); //connect to database

$id = $_SESSION['user_id'];

$insert = mysql_query("INSERT INTO review (`user_id`,`text`, `school_id`)
									VALUES ('$id','$comments', '$school_id');");

$result = mysql_query("SELECT * FROM review natural join users WHERE school_id='$school_id' ORDER BY rev_id ASC");

if($insert === FALSE) {
    die(mysql_error()); // TODO: better error handling
}

while($row=mysql_fetch_array($result)){
echo "<div class='comments_content'>";
$user = $row['username'];
echo "<h4>" . $user . "</h4>";
echo "<h3>" . $row['text'] . "</h3>";
echo "</div>";
}

?>
