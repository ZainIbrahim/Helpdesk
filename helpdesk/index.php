<?PHP

//connect to the database
require 'conn.php';
session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
  }
  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">Helpdesk System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tickets_home.php">Tickets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contacts_home.php">Contacts</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="FAQ_home.php">FAQ</a>
          </li>   
           <li class="nav-item">
            <a class="nav-link" href="reports_home.php">Reports</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="settings_home.php">Settings</a>
          </li>
          <li class="nav-item "style=' position:fixed;right:50px;top:8px;'>
            <a class="nav-link " href="logout.php">logout</a>

          </li>
          <li class="nav-item">
  				<span class="text-center" style=' color:white;position:fixed;right:200px;top:15px;'> <?php echo "Welcome " . $_SESSION["login"] . "<br>"; ?></span>
</li>

        </ul>
      </div>
    </nav>

    <main role="main" class="container">
   
  
        <section>
        <div class="container">
                        <h1 class="showup">Dashboard</h1>
                        </div>
</section>
        <section>

<?php
require 'conn.php';

$sql = "SELECT * FROM ticket  ";
$result = $conn->query($sql);
$sql2 = "SELECT * FROM ticket where status='resolved'";
$result2 = $conn->query($sql2);
$sql3 = "SELECT * FROM ticket where status='unresolved' ";
$result3 = $conn->query($sql3);
$sql4 = "SELECT * FROM ticket where date_and_time =.date().";
$sql4 = "SELECT * FROM ticket WHERE date_and_time > DATE_SUB(NOW(), INTERVAL 1 DAY) ";     
$result4 = $conn->query($sql4);

    // output data of each row
    
  



$array= mysqli_num_rows($result);
$array2= mysqli_num_rows($result2);
$array3= mysqli_num_rows($result3);
$array4= mysqli_num_rows($result4);



   echo'         <div class="container" >';
   echo'             <div class="row">';
   echo'        <div class="col-md-2 " style="margin-top:10px;background-color:	#D3C1E8">';
   echo'      <a href="tickets_home.php">  <h5><strong>All</strong></h5></a>';
   echo'                    <h4><strong>'.$array.'</strong></h4>';
   
   echo'          </div>';
   echo'        <div class="col-md-2 " style="margin-top:10px;background-color:	#D3C1E8">';
   echo'        <a href="tickets_new.php"><h5><strong>Today</strong></h5></a>';
   echo'                    <h4><strong>'.$array4.'</strong></h4>';
   echo'    </div>';
   echo'    <div class="col-md-2 "   style="margin-top:10px;background-color:	#D3C1E8">';
   echo'        <a href="tickets_unresolved.php"><h5><strong>Unresolved</strong></h5></a>';
   echo'                    <h4><strong>'.$array3.'</strong></h4>';

   echo'    </div>       ';
  
   echo'    <div class="col-md-2 "style="margin-top:10px;background-color:	#D3C1E8" >';
   echo'        <a href="tickets_resolved.php"><h5><strong>Resolved</strong></h5></a>';
   echo'                    <h4><strong>'.$array2.'</strong></h4>';
   
   echo'          </div>     ';

   echo'    </div>';
   echo'    </div>';
  ?>
        </section>


    </main><!-- /.container -->
    
    <footer class="footer">
      <div class="container">
        <span class="text-muted">Copyright © helpdeskiDEC.com</span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> 
  </body>
</html>


