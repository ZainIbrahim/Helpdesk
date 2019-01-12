<?PHP

//connect to the database
require 'conn.php';
session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
  }
  ?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content=""><meta name="author" content=""><link rel="icon" href="favicon.ico"><title>FAQ</title>
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
              <a class="nav-link" href="index.php">Home 
                <span class="sr-only">(current)</span>
              </a>
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
                  <form class="form-group" action='faq_process.php' method='POST' id='frm_contact'>
                    <label>FAQ title:</label>
                    <input type='text' placeholder="title" class='form-control' name='faq_title'>
                      <label>FAQ body:</label>
                      <textarea raws='3'placeholder="FAQ body" class='form-control' name='faq_body'></textarea>
                      <label>Name of Person in charge:</label>
                      <input type='text' placeholder="name" class='form-control' name='name_of_person_in_charge'>
                        <label>Phone Number of person in charge:</label>
                        <input type='text' placeholder="phone number" class='form-control' name='phone_number'>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveData()">Save </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- --------------------------------------------------------------------------------- -->
                <form>
                  <div class='form-row'>
                    <div class='form-group col-md-3'>
                      <input type='text' class='form-control' placeholder="Search FAQ" >
                      </div>
                      <div class='form-group col-md-1'>
                        <input type='submit' value='submit' class='form-control' >
                        </div>
                      </div>
                    </form>
                  </section>



                  <section>
                    <h2>List of FAQs</h2>
                    <table class="table ">
                      <thead class='thead-dark'>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">FAQ title</th>
                          <th scope="col">Edit</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
require 'conn.php';


$sql = "SELECT * FROM ticket ORDER BY issue_title ASC ";
$result = $conn->query($sql);
    // output data of each row
    $counter = 1;

    while($row = $result->fetch_assoc()) {

  echo'    <tr>';
  echo'    <th scope="row">'.$counter.'</th>';
  echo'    <td>';
  echo"      <a href='faq_detail.php?id=".$row['id']."'>". $row["issue_title"]."</a>";
  echo'    </td>';




  echo"     <!--<td><button class='btn btn-primary'>Edit</button></td>-->";
  echo'     <!-------------------------------------------------------------------------------->';
  echo'   <!-- Button trigger modal -->';


  echo'    <td>';
  echo'      <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" > Edit</button>';
  echo'   </td>';
echo'    <!-- Modal -->';
echo'     <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
echo'      <div class="modal-dialog" role="document">';
echo'       <div class="modal-content">';
echo'      <div class="modal-header">';
echo'          <h5 class="modal-title" id="exampleModalLabel">Edit this FAQ</h5>';
echo'         <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
echo'           <span aria-hidden="true">&times;</span>';
echo'          </button>';
echo'        </div>';
echo'         <div class="modal-body">';
echo'            <form class="form-group">';
echo'            <label>FAQ Title:</label>';
  echo"             <textarea rows='1'placeholder='FAQ body' class='form-control'>". $row["issue_title"]."</textarea>";


echo'            <label>FAQ body:</label>';
echo'            <textarea rows="10"placeholder="FAQ body" class="form-control">'. $row["issue_desc"].' </textarea>';
echo'           <label>Name of person in charge:</label>';
echo'         <textarea rows="1"placeholder="FAQ body" class="form-control">'. $row["name"].'</textarea>';
echo'        <label>Phone of person in charge:</label>';
echo'         <textarea rows="1"placeholder="FAQ body" class="form-control">0188929024</textarea>';
echo'        </form>';
echo'       </div>';
echo'      <div class="modal-footer">';
echo'        <button type="button" class="btn btn-secondary" >Delete FAQ</button>';
echo'        <button type="button" class="btn btn-primary">Reset </button>';
echo'          <button type="button" class="btn btn-primary">Save Changes </button>';
echo'        </div>';
echo'        </div>';
echo'     </div>';
echo'    </div>';

echo'  </div>';
echo'    <!-------------------------------------------------------------------------------->';

echo' </tr>';
$counter++;
}





?>                       

                      </tbody>
                    </table>
                  </section>
                </main>
                <!-- /.container -->
                <footer class="footer">
                  <div class="container">
                    <span class="text-muted">Copyright © helpdeskiDEC.com</span>
                  </div>
                </footer>

                <script type='text/javascript'>
                  function saveData(){
                    document.getElementById('frm_contact').submit();
                  }
                </script>
                <!-- Bootstrap core JavaScript
      ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
              </body>
            </html>
  
  
  