<?php
    session_start();
    if(!isset($_SESSION['username'])){
      die(header("location: login.php"));
  }
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
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  <link rel="stylesheet" href="assets/demo.css"/>
	      <link rel="stylesheet" href="basic.css"/>
	      <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'/>
		  <script src="gaddafi/jquery.min.js"></script>
		  
		  
  </head>
  

   
   
   <body >
      <header class="header-basic">

	     <div class="header-limiter">

		  <h1><i><a href="#">My<span>Store</span></a></i></h1>

		<nav>
			<a href="login.php">Home</a>
			<a href="building.php" >Building Details</a>
			<a href="rooms.php">Room details</a>
      <a>Welcome, <?php echo $_SESSION['username']?></a>
      <a href="index.php?logout='1'" style="color: red;">logout</a>
		</nav>
	   </div>

     </header>  
	 
	 <br/>

	<div class="header">
  	<h2>Register Building</h2>
  </div>
  
   <form method="POST" enctype="multipart/form-data" action="buildreg.php" id="form">
   	
            <div class="input-group">
             <label>Building Name:</label>
                <input type="text" name="name" maxlength="25" required>
		    </div>
		   <div class="input-group">
             <label>Plot Number:</label>
             <input type="text" name="plotno" maxlength="6" required>
           </div>
		   <div class="input-group">
             <label>No of rooms:</label>
             <input type="text" name="room" maxlength="20"required>
             </div>
           <div class="input-group">
             <label>Location:</label>
             <input type="text" name="locate" maxlength="20"required>
             </div>
             
		    <div class="form-group">
				   <p class="label">Choose Image :</p>                         
                            <input type="file" name="image" class="form-control input-lg" id="building-img" required/><br>
                                    <img src="" id="building-img-tag" width="100px" />

                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                
                                                reader.onload = function (e) {
                                                    $('#building-img-tag').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $("#building-img").change(function(){
                                            readURL(this);
                                        });
                                    </script>
									</div>
				   
		 <br/>
		   <div class="input-group">
		   <button name="submitroom">Submit</button>
		</div>
		<p>
		   <a href="rooms.php">Enter Room details</a>
		 </p>
		
	</form>
	</div>

</body>
</html>
