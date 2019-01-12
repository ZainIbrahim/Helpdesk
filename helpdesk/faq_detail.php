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

    <title>FAQ</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
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
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="tickets_home.php">Tickets</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="contacts_home.php">Contacts</a>
          </li>
            <li class="nav-item active">
            <a class="nav-link" href="FAQ_home.php">FAQ</a>
          </li>   
           <li class="nav-item">
            <a class="nav-link" href="reports_home.php">Reports</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="settings_home.php">Settings</a>
          </li>
          <li class="nav-item "style=' position:fixed;right:50px;top:5px;'>
            <a class="nav-link " href="logout.php">logout</a>

          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">
   
  
<section>
    
    <!-- Button trigger modal -->
<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left:950px;margin-top: 80px;">
  Add FAQ
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add FAQ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group">
            <label>FAQ title:</label><input type='text' placeholder="title" class='form-control'>
            <label>FAQ body:</label><textarea raws='3'placeholder="FAQ body" class='form-control'></textarea>
            <label>Name of Person in charge:</label><input type='text' placeholder="name" class='form-control'>
            <label>Phone Number of person in charge:</label><input type='text' placeholder="phone number" class='form-control'>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save </button>
      </div>
    </div>
  </div>
</div>
    
    

<!-- --------------------------------------------------------------------------------- -->    

</section>
<?php
require 'conn.php';

//$sql = "SELECT * FROM reply where reply_id =".$_GET['id'];
$sql = "SELECT * FROM reply INNER JOIN ticket ON reply.reply_id=ticket.id where reply_id=".$_GET['id'];

$result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {


echo"    <div>";
     echo" <h3>".$row['issue_title']."</h3>";
     echo"  <p> ".$row['reply_body']." </p>";
     echo"          <p><em><strong>Date and Time:</strong></em> ".$row['date_and_time']."</p>";
     echo"     </div>";
  
    }
?>


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


