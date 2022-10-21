<!-- User registration with password hashing -->
<?php
include 'connection.php';
session_start();
if (isset($_POST['submit'])) {
    //Verify CAPTCHA response
    $captcha = $_POST['captcha'];
    if($captcha == $_SESSION['captcha']){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, phone, address, city, pincode, password, role)
        VALUES ('$name', '$email', '$phone', '$address', '$city', '$pincode', '$password', 'user')";
        if ($conn->query($sql) === TRUE) {
            header('Location: login.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } else {
        //Redirect to the registration page with error message
        header('Location: signup.php?error=1');
    }
}
?>