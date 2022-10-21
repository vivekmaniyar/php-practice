<!-- cart items bootstrap page -->
<!-- show items from the cart -->
<?php include 'header.php'; ?>
<?php
include 'connection.php';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users_cart WHERE user_id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $product_id = $row['product_id'];
            $sql1 = "SELECT * FROM products WHERE product_id = $product_id";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
                // output data of each row
                while($row1 = $result1->fetch_assoc()) {
                    echo "<div class='col-md-4'>
                    <div class='card mb-4 shadow-sm'>
                    <img class='card-img-top' src='images/".$row1['product_image']."' alt='Card image cap' style='height: 225px;'>
                    <div class='card-body'>
                    <p class='card-text'>".$row1['product_name']."</p>
                    <p class='card-text'>".$row1['price']."</p>
                    </div>
                    </div>
                    </div>";
                }
            } else {
                echo "0 results";
            }
        }
    } else {
        echo "0 results";
    }
    $conn->close();
} else {
    header('Location: user_login.php');
}
?>
<?php include 'footer.php'; ?>