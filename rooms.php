<?php
  //session_start();
  include ('server.php');
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
		  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css"/>
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
  	<h2>Register Rooms</h2>
  </div>
  
  <div class="container">
   <form  method="POST" enctype="multipart/form-data" action="roomreg.php">
   			<div  class="form-group" >
   				<label>Building:</label>
				<select  name="building_id" id="building_id"  class="form-control" selected="selected" required>
				</select> 
				
   			</div>
			
            <div class="input-group">
            <br />
             <label>Room Number: </label> 
                <input type="text" name="number" id="number" maxlength="2" class="form-control" required>
            </div>
		   <br />
		   <div class="input-group">
             <label>Space available:</label>
             <input type="text" name="spaces" id="spaces" maxlength="2" class="form-control" required>
             
          </div>
          <br />
		  <div class="input-group">
             <label>Price per space:</label>
             <input type="text" name="price" id="price" maxlength="6" class="form-control" required>
             
           </div>
           <br />
           <div class="form-group">
				   <p class="label">Choose Image :</p>                            
                            <input type="file" name="image" class="form-control input-lg" id="room-img" required/><br>
                                    <img src="" id="room-img-tag" width="100px" />

                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                
                                                reader.onload = function (e) {
                                                    $('#room-img-tag').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $("#room-img").change(function(){
                                            readURL(this);
                                        });
                                    </script><br/>
									</div>
		 <br />
		   <div class="input-group">
		   <button name="submitroom">Submit</button>
		</div>
		
	</form>
	</div>
	</div>
	
	  
</body>

<script type="text/javascript">
$(function(){
    $.ajax({
        type: "get",
        url: "building_dropdown.php",
        contentType: "application/json;charset=utf-8",
        dataType: "json",
        data: {},
        success: function (result) {
            $("#building_id").attr('disabled', false);
            $.each(result, function (i) {
                $('#building_id').append($('<option></option>')
                    .attr("value", result[i].id)
                    .text(result[i].name));
            });
        },
        failure: function () {
            alert("Error");
        }                 
    });
});

// $(document).on('submit', '#room_form', function(event){

		 // event.preventDefault();
        // var building = $('#building_id').val();
        // var number = $('#number').val();
        // var spaces = $('#spaces').val();
        // var price = $('#price').val();
        // var extension = $('#Upload').val().split('.').pop().toLowerCase();
        // if(extension !== '')
        // {
            // if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) === -1)
            // {
                // alert("Invalid Image File");
                // $('#Upload').val('');
                // return false;
            // }
        // }
        // if(building !== '' && number !== '' && spaces !== '' && price !== '')
        // {
            // $.ajax({
                // url:"roomreg.php",
                // method:'POST',
                // data:new FormData(this),
                // contentType:false,
                // processData:false,
                // success:function(data)
                // {
                    // alert(data);
                    // $('#room_form')[0].reset();
                // }
            // });
        // }
        // else
        // {
            // alert("All Fields are Required");
        // }
// });


</script>
</html>