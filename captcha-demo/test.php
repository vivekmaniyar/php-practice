<?php
session_start();
$msg="";

if(isset($_POST['submit']))
{
    if($_POST['code']==$_SESSION['code'])
    {
        $msg="Correct Code Entered";
    }
    else
    {
        $msg="Wrong Code Entered";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Captcha</title>
</head>
<body>
    <form method="post" action="">
        <img src="captcha.php" /><br />
        <input type="text" name="code" /><br />
        <input type="submit" name="submit" value="Submit" />
    </form>
    <p><?php echo $msg; ?></p>
</body>
</html>