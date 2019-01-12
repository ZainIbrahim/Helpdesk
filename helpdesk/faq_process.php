<?PHP

//connect to the database
require 'conn.php';

session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
  }
  


//get values from index.php
$title= $_POST['faq_title'];
$body= $_POST['faq_body'];
$name_of_person_in_charge= $_POST['name_of_person_in_charge'];
$phone_number= $_POST['phone_number'];



//logic to insert into database
$result= "INSERT INTO faq  (faq_title, faq_body, name_of_person_in_charge, phone_number)
VALUES ('$title','$body','$name_of_person_in_charge','$phone_number')";
	mysqli_query($conn, $result);
	echo "new faq created";
	
?>
    <br/>
    <a href='faq_home.html'>back to FAQ</a>
