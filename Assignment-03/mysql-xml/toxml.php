<!-- Read data from students table and store it into xml file -->
<?php
// Connect to MySQL
$con = mysqli_connect("localhost","root","root","studentdb");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
// Retrieve data from database
$sql="SELECT * FROM student_data";
$result = $con->query($sql);
// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("students");
$parnode = $dom->appendChild($node);
// Iterate through the rows, adding XML nodes for each
while ($row = $result->fetch_assoc()){
    // ADD TO XML DOCUMENT NODE
    $node = $dom->createElement("student");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("id",$row['student_id']);
    $newnode->setAttribute("name",$row['student_name']);
    $newnode->setAttribute("college",$row['college_name']);
    $newnode->setAttribute("course",$row['course']);
    $newnode->setAttribute("Graduation_year",$row['graduation_year']);
}
// Save XML file
$dom->save("student_data.xml");
echo "XML file has been generated successfully!";
// Close connections
$con->close();
?>