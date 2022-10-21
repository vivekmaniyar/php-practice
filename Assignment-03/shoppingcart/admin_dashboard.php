<!-- Admin Dashboard to manage category and products -->
<?php include 'header.php'; ?>
<?php
include 'connection.php';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($row['role'] == 'admin') {
                // Admin dashboard
                echo "<div class='container'>
                <div class='row'>
                <div class='col-md-3'>
                <div class='list-group'>
                <a href='admin_dashboard.php' class='list-group-item active'>Dashboard</a>
                <a href='admin_category.php' class='list-group-item'>Category</a>
                <a href='admin_products.php' class='list-group-item'>Products</a>
                </div>
                </div>
                <div class='col-md-9'>
                <div class='card'>
                <div class='card-body'>
                <h3>Admin Dashboard</h3>
                <p>Welcome to admin dashboard</p>
                </div>
                </div>
                </div>
                </div>
                </div>";
            } else {
                header('Location: index.php');
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