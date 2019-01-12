<?PHP

//connect to the database
require 'conn.php';
session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
	}
//get values from index.php
$name= $_POST['name'];
$email= $_POST['email'];
$title= $_POST['title'];
$phone_number= $_POST['phone_number'];
$ptj= $_POST['ptj'];



//logic to insert into database
$result= "INSERT INTO contact (name ,email, title,phone_number, ptj) 
	VALUES ('$name','$email','$title','$phone_number','$ptj')";
	mysqli_query($conn, $result);
	echo "new contact created";
	
?>
    <br/>
    <a href='contacts_home.html'>back to contacts</a>
