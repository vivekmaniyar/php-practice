<!-- update product -->
<?php
include 'connection.php';
session_start();
if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $sql='';
    //upload image and get image name
    //check if image is selected
    if($_FILES['product_image']['name'] != '') {
        $product_image = $_FILES['product_image']['name'];
        $tmp_name = $_FILES['product_image']['tmp_name'];
        $path = "images/".$product_image;
        move_uploaded_file($tmp_name, $path);
        $sql = "UPDATE products SET product_name = '$product_name', price = '$product_price', category_id = '$category_id', product_image = '$product_image' WHERE product_id = '$product_id'";
    } else {
        $sql = "UPDATE products SET product_name = '$product_name', price = '$product_price', category_id = '$category_id' WHERE product_id = '$product_id'";
    }
    if ($conn->query($sql) === TRUE) {
        header('Location: admin_products.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>