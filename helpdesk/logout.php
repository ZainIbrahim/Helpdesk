<?php
  // Inialize session
  session_start();
// Delete certain session
  unset($_SESSION['login']);
  // Delete all session variables
  // session_destroy();
 // Jump to login page
// header('Location: index.php');
header ("Location:logedout.php");

  ?>

  <p>You have logged out successfully </p>
  <p>Back to Main Page</p>
  <div class="container">

<button type="button" class="btn btn-primary" onClick="location.href='mainPage.php'">Main Page</button>
		
</div>