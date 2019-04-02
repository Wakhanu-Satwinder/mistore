<?php

include('server.php')
?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
         <title>MyStore</title>
    
        <link rel="stylesheet" href="style.css" type="text/css"/>
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
  	<h2>Login</h2>
  </div>
	 
   <form  method="POST" enctype="application/x-www-form-urlencoded" action="login.php" class="form-horizontal">
	 <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="name" value="" placeholder="username">                                        
                                    </div>
						
						<!-- <div class="input-group">
             <label>Username: </label> 
                <input type="text" name="name" required>
             </div> -->
						 <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    
		  
																		<div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button id="btn-login"  name="login_user"   class="btn btn-success">Login  </button>
                                     

                                    </div>
                                </div>
																<div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="register.php">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
		  
		
	</form>
	<span class="input-group">
	<?php
		if (isset($_SESSION['message'])){
			echo $_SESSION['message'];
		}
		unset($_SESSION['message']);
	?>
</span>
</body>
</html>