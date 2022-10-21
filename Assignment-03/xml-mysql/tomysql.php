<!-- Read data from XML file and save it to MYSQL Database -->
<?php
// Connect to MySQL
$con = mysqli_connect("localhost","root","root","studentdb");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
// Read the file
$xml = simplexml_load_file("student_data.xml");
// Loop through the students
foreach($xml->children() as $student) {
    // Get the attributes
    $name = $student['name'];
    $college = $student['college'];
    $course = $student['course'];
    $graduation_year = $student['Graduation_year'];

    // Save the data to the database
    mysqli_query($con,"INSERT INTO student_data (student_name, college_name, course, graduation_year) VALUES ('$name', '$college', '$course', '$graduation_year')");
}
echo "Data imported to database";
// Close the connection
$con->close();
?>
