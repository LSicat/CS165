<?php

require("db/db.php");

$school_id = $_GET['school_id'];

$result = mysql_query("SELECT * FROM review natural join users WHERE school_id='$school_id' ORDER BY rev_id ASC");

while($row=mysql_fetch_array($result)){
echo "<div class='comments_content'>";
$user = $row['username'];
echo "<h4>" . $user . "</h4>";
echo "<h3>" . $row['text'] . "</h3>";
echo "</div>";
}

?>
