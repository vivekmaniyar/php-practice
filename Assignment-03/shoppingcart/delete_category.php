<!-- Delete category -->
<?php
include 'connection.php';
session_start();
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
    //Delete category image
    $sql = "SELECT category_image FROM categories WHERE category_id = '$category_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $category_image = $row['category_image'];
            $path = "images/".$category_image;
            unlink($path);
        }
    } else {
        echo "0 results";
    }
    $sql = "DELETE FROM categories WHERE category_id = '$category_id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: admin_category.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>