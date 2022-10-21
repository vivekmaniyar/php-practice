<!-- User login matching with hashed password -->
<?php
include 'connection.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['city'] = $row['city'];
                $_SESSION['pincode'] = $row['pincode'];
                $_SESSION['role'] = $row['role'];
                if($row['role'] == 'admin') {
                    header('Location: admin_dashboard.php');
                } else {
                    header('Location: index.php');
                }
            } else {
                echo "Invalid password";
            }
        }
    } else {
        echo "Invalid email";
    }
    $conn->close();
}
?>