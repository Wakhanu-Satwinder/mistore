<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mistore";
$student = $_GET['studentid'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM booking INNER JOIN roomss ON booking.roomid = roomss.id 
WHERE booking.studentid = '$student' AND booking.status = 'booked'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
    $booking=array();
                while($row=$result->fetch_array())
                {
					$building = $row['buildingid'];
					$query = "SELECT * FROM building  WHERE id = '$building'";
					$result1 = $conn->query($query);
					$row1=$result1->fetch_array();
					
                    array_push($booking, array("buildingname"=>$row1['name'],
                    "roomnumber"=>$row['roomno'],"price"=>$row['price'],
                    "datebooked"=>$row['bookingdate'], "image" =>$row['img'], 
					"buildingid" => $row['buildingid'],"roomid"=>$row['roomid']));
                }
                print(json_encode(array_reverse($booking)));
} else {
    print(json_encode(array("PHP EXCEPTION : CAN'T RETRIEVE FROM MYSQL. ")));
}
$conn->close();
?>