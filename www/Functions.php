<?php

require_once 'DBOperations.php';

class Functions{

private $db;

public function __construct() {

      $this -> db = new DBOperations();

}

public function registerStudent($name, $email,$regno,$phoneno, $password) {

   $db = $this -> db;

   if (!empty($name) && !empty($email) && !empty($regno) && !empty($phoneno) && !empty($password)) {

      if ($db -> checkStudentExist($email)) {

         $response["result"] = "failure";
         $response["message"] = "User Already Registered !";
         return json_encode($response);

      } else {

         $result = $db -> insertData($name, $email,$regno,$phoneno, $password);

         if ($result) {

              $response["result"] = "success";
            $response["message"] = "User Registered Successfully !";
            return json_encode($response);

         } else {

            $response["result"] = "failure";
            $response["message"] = "Registration Failure";
            return json_encode($response);

         }
      }
   } else {

      return $this -> getMsgParamNotEmpty();

   }
}
//starts here bookrom
public function bookRoom($buildingid,$roomid,$studentid) {

   $db = $this -> db;

   if (!empty($buildingid) && !empty($roomid) && !empty($studentid) ) {

 
         $result = $db -> insertBookingDetails($buildingid,$roomid,$studentid);

         if ($result) {

           $response["result"] = "success";
            $response["message"] = "Space Booked Successfully !";
            return json_encode($response);

         } else {

            $response["result"] = "failure";
            $response["message"] = "Booking failed.Try Again Later";
            return json_encode($response);

         }
      
   } else {

      return $this -> getMsgParamNotEmpty();

   }
}
//ends here book romm
//starts here reverserom
public function reverseRoom($buildingid,$roomid,$studentid) {

   $db = $this -> db;

   if (!empty($buildingid) && !empty($roomid) && !empty($studentid) ) {

 
         $result = $db -> reverseBookingDetails($buildingid,$roomid,$studentid);

         if ($result) {

           $response["result"] = "success";
            $response["message"] = "Booking reversed Successfully !";
            return json_encode($response);

         } else {

            $response["result"] = "failure";
            $response["message"] = "Booking reverse failed.Try Again Later";
            return json_encode($response);

         }
      
   } else {

      return $this -> getMsgParamNotEmpty();

   }
}

public function loginStudent($email, $password) {

  $db = $this -> db;

  if (!empty($email) && !empty($password)) {

    if ($db -> checkStudentExist($email)) {

       $result =  $db -> checkLogin($email, $password);

       if(!$result) {

        $response["result"] = "failure";
        $response["message"] = "Invaild Login Credentials";
        return json_encode($response);

       } else {

        $response["result"] = "success";
        $response["message"] = "Login Sucessful";
        $response["student"] = $result;
        return json_encode($response);

       }
    } else {

      $response["result"] = "failure";
      $response["message"] = "Invaild Login Credentials";
      return json_encode($response);

    }
  } else {

      return $this -> getMsgParamNotEmpty();
    }
}

public function changePassword($email, $old_password, $new_password) {

  $db = $this -> db;

  if (!empty($email) && !empty($old_password) && !empty($new_password)) {

    if(!$db -> checkLogin($email, $old_password)){

      $response["result"] = "failure";
      $response["message"] = 'Invalid Old Password';
      return json_encode($response);

    } else {

    $result = $db -> changePassword($email, $new_password);

      if($result) {

        $response["result"] = "success";
        $response["message"] = "Password Changed Successfully";
        return json_encode($response);

      } else {

        $response["result"] = "failure";
        $response["message"] = 'Error Updating Password';
        return json_encode($response);

      }
    }
  } else {

      return $this -> getMsgParamNotEmpty();
  }
}

public function isEmailValid($email){

  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

public function getMsgParamNotEmpty(){

  $response["result"] = "failure";
  $response["message"] = "Parameters should not be empty !";
  return json_encode($response);

}

public function getMsgInvalidParam(){

  $response["result"] = "failure";
  $response["message"] = "Invalid Parameters";
  return json_encode($response);

}

public function getMsgInvalidEmail(){

  $response["result"] = "failure";
  $response["message"] = "Invalid Email";
  return json_encode($response);

}
}