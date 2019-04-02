<?php 
$error = "";
    if(isset($_POST['submitroom']))
    {
        $name = $_POST['name'];
        $plotno = $_POST['plotno'];
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $location = $_POST['locate'];
		$room = $_POST['room'];
		
		

        move_uploaded_file($image_tmp,"upload_images/$image");

        $con = mysqli_connect("localhost","root","","mistore");

        $sql_u = "SELECT * FROM building WHERE name='$name'";
        $res_u = mysqli_query($con, $sql_u);

        if (mysqli_num_rows($res_u) > 0) 
        {
            echo "Sorry... building already exists";
        }
        
        else
         {
        
             $query = "insert into building(name,plotno,nofrooms,location,buildingimage) values ('$name','$plotno','$room','$location','$image')";

             $result = mysqli_query($con, $query);

                if($result==1)
                 {       

                   echo  "Building Added succesfull";
        
                  }
                 else
                  {       

                   echo "There was an error trying to add the room";

                  }
            }

    }
?>