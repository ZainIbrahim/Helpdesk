<?PHP

//connect to the database
require 'conn.php';
session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
  }
  ?>
<?PHP
// Inialize session
session_start();
//connect to the database
require 'conn.php';
//get values from index.php
$username= $_POST['username'];
$password= $_POST['password'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' and password='$password'");
$row=mysqli_fetch_assoc($result);
	if ($row['username']==$username && $row['password']== $password ){	
       		// Set username session variable
      		 $_SESSION['login'] = $_POST['username'];
		
			header ("Location:index.php");

			//echo"log in success!!! welcome  " .$row['username'];
		} else {
	//echo "Error";
	header ("Location:error_login.php");

}
?>

<!DOCTYPE HTML>
<html>
    <body>
        <p>Back To Login Page</p>
        <a href="login.php"><input type="submit" value="login" name="Back" /></a>
     
    </body>
</html>