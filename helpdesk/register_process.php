<?PHP
//connect to the database
require 'conn.php';
//get values from index.php
$name = $_POST ['name'];
$username= $_POST['username'];
$password= $_POST['password'];
//validating database
if (ctype_alnum( $username)){
	$sql="select * from users where username='$username'";
	$result=mysqli_query($conn,$sql);
	$array= mysqli_num_rows($result);
	
	if ($array == 0){
		$result= "INSERT INTO users (name,username  , password) 
						VALUES ('$name','$username','$password')";
						mysqli_query($conn, $result);
                        header ("Location:new_user_created.php");
                        //echo "new user created";

						
	}else{
        //echo "that username already exists";
        header ("Location:already_exists.php");

	}
}else {
	echo "invalidname";
}
?>
				<div class="container">
					<a href="login.php"><p>Click here to log in .</p> </a> 
				</div>