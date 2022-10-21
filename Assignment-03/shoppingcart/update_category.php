<!-- Update category after form submission -->
<?php
include 'connection.php';
session_start();
if (isset($_POST['submit'])) {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $sql='';
    //upload image and get image name
    //check if image is selected
    if($_FILES['category_image']['name'] != '') {
        $category_image = $_FILES['category_image']['name'];
        $tmp_name = $_FILES['category_image']['tmp_name'];
        $path = "images/".$category_image;
        move_uploaded_file($tmp_name, $path);
        $sql = "UPDATE categories SET category_name = '$category_name', category_image = '$category_image' WHERE category_id = '$category_id'";
    } else {
        $sql = "UPDATE categories SET category_name = '$category_name' WHERE category_id = '$category_id'";
    }
    if ($conn->query($sql) === TRUE) {
        header('Location: admin_category.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>