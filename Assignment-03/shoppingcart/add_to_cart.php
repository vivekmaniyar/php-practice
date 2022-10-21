<!-- Add product to the cart -->
<!-- If user is not logged in then redirect to login page -->
<?php
include 'connection.php';
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_GET['id'];
    $sql = "INSERT INTO users_cart (user_id, product_id, quantity)
    VALUES ('$user_id', '$product_id','1')";
    if ($conn->query($sql) === TRUE) {
        header('Location: cart.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} else {
    header('Location: login.php');
}
?>