<?php
require("db/db.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];
mysql_query("DELETE FROM review WHERE rev_id='$id'");
header("location: index.php");
}
?>
