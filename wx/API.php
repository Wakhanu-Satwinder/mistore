<?php 
 
 
 //database constants
 define('DB_HOST', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASS', 'password');
 define('DB_NAME', 'mistore');
 
 //connecting to database and getting the connection object
 $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
 //Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
 //creating a query
 $stmt = $conn->prepare("SELECT id, bname, plotno,nofrooms, location,bimage FROM building;");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($id, $bname, $plotno, $nofrooms, $location, $bimage);
 
 $building = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['id'] = $id; 
 $temp['bname'] = $bname; 
 $temp['plotno'] = $plotno; 
 $temp['nofrooms'] = $nofrooms; 
 $temp['location'] = $location; 
 $temp['bimage'] = $bimage; 
 array_push($building, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($building);
 $conn->close();
?>