<!-- User signup -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?php
    //show error message if captcha is not verified
    if(isset($_GET['error'])){
        echo '<script>alert("Captcha verification failed. Please try again.")</script>';
    }
    ?>
</head>
<body>
    <!-- bootstrap signup form -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="user_signup.php" method="post">
                    <h2 class="text-center">Sign up</h2>
                    <p class="text-center">Please fill in this form to create an account.</p>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" name="city" class="form-control" placeholder="City" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Address" required="required">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-control" placeholder="Phone no." required="required">
                    </div>
                    <div class="form-group">
                        <input type="number" name="pincode" class="form-control" placeholder="Pincode" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                    </div>
                    <!-- Show CAPTCHA -->
                    <div class="form-group">
                        <input type="text" name="captcha" class="form-control" placeholder="Enter captcha" required="required">
                        <img src="captcha.php" alt="captcha">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Sign up">
                    </div>
                    <p class="text-center">Already have an account? <a href="login.php">Log in</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>