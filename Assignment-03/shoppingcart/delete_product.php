<!-- delete product -->
<?php
include 'connection.php';
session_start();
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    //Delete product image
    $sql = "SELECT product_image FROM products WHERE product_id = '$product_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $product_image = $row['product_image'];
            $path = "images/".$product_image;
            unlink($path);
        }
    } else {
        echo "0 results";
    }
    $sql = "DELETE FROM products WHERE product_id = '$product_id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: admin_products.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>