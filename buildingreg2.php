<?php
session_start();
include('includes/db_con.php');


if (isset($_POST["building_id"]) && isset($_POST["number"]) && isset($_POST["spaces"]) && isset($_POST["price"]) && isset($_POST["Upload"])) {

  $building_id= htmlspecialchars($_POST['building_id']);
  $rooms = htmlspecialchars($_POST['number']);
  $spaces = htmlspecialchars($_POST['spaces']);
  $price = htmlspecialchars($_POST['price']);
  $image = htmlspecialchars($_POST['Upload']);
  /*$image = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  
  
   move_uploaded_file($image_tmp,"uploaded_images/$image");*/

  $statement = $connection->prepare(
    "INSERT INTO rooms (building_id, roomno, spaces, price, img) VALUES (:building_id, :rooms, :spaces, :price, :image)"
    );
  $result = $statement->execute(
      array(
            ':building_id' => $building_id,
            ':rooms' => $rooms,
            ':spaces' => $spaces,
            ':price' => $price,
            'image' => $image,
        )
    );
    // if (!empty($result)) {
    //   echo "Success";
    // }

}

// session_start();


// $errors = array(); 

// // connect to the dbase
// $db = mysqli_connect('localhost', 'root', '', 'mistore');

// // REGISTER USER
//   $building_id= mysqli_real_escape_string($db, $_POST['building_id']);
//   $rooms = mysqli_real_escape_string($db, $_POST['number']);
//   $spaces = mysqli_real_escape_string($db, $_POST['spaces']);
//   $price = mysqli_real_escape_string($db, $_POST['price']);
//   $image = mysqli_real_escape_string($db, $_POST['Upload']);
 
//   // form validation: ensure that the form is correctly filled ...
//   // by adding (array_push()) corresponding error unto $errors array
//   if (empty($building_id)) { array_push($errors, "Buiding id is required"); }
//   if (empty($rooms)) { array_push($errors, "No of rooms is required"); }
//   if (empty($spaces)) { array_push($errors, "Spaces available is required"); }
//   if (empty($price)) { array_push($errors, "Price of the room is required"); }
//   if (empty($image)) { array_push($errors, "Room image is required"); }
  

//   // first check the database to make sure 
//   // a user does not already exist with the same username and/or email
//   $user_check_query = "SELECT * FROM rooms WHERE roomno='$rooms' LIMIT 1";
//   $result = mysqli_query($db, $user_check_query);
//   $room = mysqli_fetch_assoc($result);
  
//   if ($room) { // if user exists
//     if ($room['roomno'] === $rooms) {
//       array_push($errors, "Room already exists");
//     }
//    }
//   // Finally, register user if there are no errors in the form
//   if (count($errors) == 0) {

//     $query = "INSERT INTO rooms (building_id, roomno, spaces, price, img) VALUES ('$building_id', '$rooms', '$spaces', '$price', '$image')";

    // mysqli_query($db, $query);
    $_SESSION['room'] = $rooms;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
//   }

?>