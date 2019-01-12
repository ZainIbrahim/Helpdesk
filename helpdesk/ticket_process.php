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
$name= $_POST['name'];
$email= $_POST['email'];
$title= $_POST['title'];
$phone_number= $_POST['phone_number'];
$issue_title= $_POST['issue_title'];
$issue_desc= $_POST['issue_desc'];



//logic to insert into database
$result= "INSERT INTO ticket (name ,email, title,phone_number, issue_title, issue_desc) 
	VALUES ('$name','$email','$title','$phone_number','$issue_title','$issue_desc')";
	mysqli_query($conn, $result);
	echo "new ticket created";

//$check = "SELECT * FROM contact";
//$run = $conn->query($check);

//$fetchh= $check->fetch_assoc();
//if ( $_POST['email']  == $fetchh.['email']){
//	$add_to_contacts="INSERT INTO contact (name ,email, title,phone_number) 
//	VALUES ('$name','$email','$title','$phone_number')";
//	mysqli_query($conn, $result);
	
//}


$hh = mysqli_query($conn, "SELECT * FROM contact WHERE email='$email' ");
$row=mysqli_fetch_assoc($hh);
	if ($row['email']!=$email && $row['phone_number']!=$phone_number){
		$add_to_contacts="INSERT INTO contact (name ,email, title,phone_number) 
		VALUES ('$name','$email','$title','$phone_number')";
		mysqli_query($conn, $add_to_contacts);
	}
	 
	echo'<div onload="myfunction()">'.header ("Location:tickets_home.php");'<div>';



?>

    <br/>
    <!--<a href='tickets_home.php'>back to tickts</a>-->


