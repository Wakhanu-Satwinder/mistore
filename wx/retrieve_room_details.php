<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mistore";
$building = $_GET['buildingid'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM roomss WHERE building_id = '$building'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rooms=array();
                while($row=$result->fetch_array())
                {
                    array_push($rooms, array("id"=>$row['id'],"building_id"=>$row['building_id'],
                    "roomno"=>$row['roomno'],"spaces"=>$row['spaces'],
                    "price"=>$row['price'],"img"=>$row['img']));
					
                }
                print(json_encode(array_reverse($rooms)));
} else {
    print(json_encode(array("PHP EXCEPTION : CAN'T RETRIEVE FROM MYSQL. ")));
}
$conn->close();
?>