<?PHP

//connect to the database
require 'conn.php';
session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
  }
  ?>
<?php
require 'conn.php';
$result='UPDATE ticket SET status="resolved" WHERE id='.$_GET["id"];
	mysqli_query($conn, $result);
    //header ("Location:tickets_detail.php");
    header("Refresh:0; url=tickets_detail.php");
    
    //'. htmlspecialchars($_SERVER["PHP_SELF"]).'
?>