<!-- Shopping website header -->
<!-- If user is logged in show his name,cart and logout button otherwise show login and signup button -->
<?php
include 'connection.php';
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $name = $row['name'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Shopping website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php
                if (isset($_SESSION['user_id'])) {
                    if($_SESSION['role'] == 'admin') {
                        echo '<li class="nav-item">
                            <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
                        </li>';
                    } else {
                        echo '<li class="nav-item">
                            <a class="nav-link" href="cart.php">Cart</a>
                        </li>';
                    }
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Logout</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' href='#'>$name</a>
                    </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='login.php'>Login</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' href='signup.php'>Signup</a>
                    </li>";
                }
                ?>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
