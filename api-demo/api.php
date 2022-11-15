<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM student_data";

$result = $conn->query($sql);

$response = array();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        array_push($response, $row);
    }
}else{
    echo "0 results";
}

echo json_encode($response);

?>