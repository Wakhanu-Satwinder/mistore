<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mistore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM building";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $building=array();
                while($row=$result->fetch_array())
                {
                    array_push($building, array("id"=>$row['id'],"name"=>$row['name'],
                    "plotno"=>$row['plotno'],"nofrooms"=>$row['nofrooms'],
                    "location"=>$row['location'],"buildingimage"=>$row['buildingimage']));
					
                }
                print(json_encode(array_reverse($building)));
} else {
    print(json_encode(array("PHP EXCEPTION : CAN'T RETRIEVE FROM MYSQL. ")));
}
$conn->close();
?>