<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'mistore');

// REGISTER USER
if (isset($_POST['reg_user'])){
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['cpassword']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
    echo 'The two passwords do not match.<br />';
    

  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM admnin WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      echo 'Username already exists.<br />';
     
    }

    if ($user['email'] === $email) {
      echo 'Email exists.<br />';
      
    }
  }

  // Finally, register user if there are no errors in the form
{
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO `admnin` (`id`, `username`, `email`, `password`) VALUES (NULL, '$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    //echo json_encode("error");
    //array_push($errors, "Username is required");
    $_SESSION['message']="Login Failed. User not Found!";
  }
  if (empty($password)) {
    $_SESSION['message']="Please enter password!";
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM admnin WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      $_SESSION['message']="Login Failed. User not Found!";
      //array_push($errors, "Wrong username/password combination");
    }
  }
}

?>