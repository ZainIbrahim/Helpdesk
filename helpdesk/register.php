<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet">

</head>
<body> 
 
<div class="container">
<div class="col-md-6" style='margin-top:100px; margin-left:300px'>

 
  				<h3 class="text-center">  Sign up   </h3>
  		
		<form action="register_process.php" method ="post">
		<div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter full name" name="name" required>
    </div>
    <div class="form-group">
      <label for="username">username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
    </div>
	
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
    </div>
    
		 
  
  <div>  <input type="submit" value="Sign up" class='btn btn-primary 'style='margin-left:200px' /></div>
    
  </form>
<br/>

<a href='login.php' class='' style='font-weight: bold; margin-top:50px'>Have an account, click here to login</a>

</body>
</html>