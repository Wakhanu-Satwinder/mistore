<?php
  include('server.php')
?>

<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
         <title>MyStore</title>
        <link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="bootstrap.css" type="text/css" />
		 <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  <link rel="stylesheet" href="assets/demo.css"/>
	      <link rel="stylesheet" href="basic.css"/>
	      <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'/>
  </head>
  

   
   
   <body >
      <header class="header-basic">

	     <div class="header-limiter">

		  <h1><i><a href="#">My<span>Store</span></a></i></h1>

		<nav>
			<a href="#" class="selected">Home</a>
			<a href="building.php" >Building Details</a>
			<a href="rooms.php">Room details</a>
			<a href="#">About</a>
			<a href="#">Contact</a>
		</nav>
	   </div>

     </header>  
	 
	 <br/>
	 <div class="header">
  	<h2>Register</h2>
  </div>
  
   <form  method="POST" enctype="application/x-www-form-urlencoded" action="register.php">
   
            <div class="input-group">
             <label>Username:</label>
                <input type="text" name="username"  maxlength="25"required value="<?php echo $username; ?>">
           </div>
		   <div class="input-group">
             <label>Email: </label>
             <input type="text" name="email" maxlength="100" required  value="<?php echo $email; ?>">
           </div>
		   <div class="input-group">
             <label>Password:</label>
             <input type="password" name="password" maxlength="10" required>
            </div>
           <div class="input-group">
			  <label>Confirm password: </label>
			  <input type="password" name="cpassword" placeholder="Re-enter password" required="">
			  
           </div>
           <div class="input-group">
		   <button type="submit" class="btn" name="reg_user">Register</button>
		   </div>
		 <p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
	</form>
	
	</div>


</body>
</html>