<?PHP

//connect to the database
require 'conn.php';
session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
  }
  ?>
<?PHP

//connect to the database
require 'conn.php';

//get values from index.php
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email= $_POST['email'];
$password= $_POST['password'];
$phone_number= $_POST['phone_number'];



//logic to insert into database
$result= "INSERT INTO user (fname, lname, email, password,  phone_number)
	VALUES ('$fname','$lname','$email','$password','$phone_number')";
	$error=mysqli_query($conn, $result);
    echo "new user created";


    ?>
    <br/>
    <a href='settings_users.html'>back to settings</a>
