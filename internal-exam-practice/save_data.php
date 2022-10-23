<?php
// Define variables and initialize with empty values
$name = $email = $phone = $address = $city = $state = $zip = $position = $resume = "";

// Processing form data when form is submitted
if(isset($_POST["submit"])){
    
    $resume_dir = "resume/";
    $resume_file = $resume_dir . basename($_FILES["resume"]["name"]);
    $resumeFileType = strtolower(pathinfo($resume_file,PATHINFO_EXTENSION));
    
    $profile_dir = "profile/";
    $profile_file = $profile_dir . basename($_FILES["profile"]["name"]);
    $profileFileType = strtolower(pathinfo($profile_file,PATHINFO_EXTENSION));

    //check resume and profile picture format only after that upload file and redirect to confirmation page
    if($resumeFileType == "pdf" && $profileFileType == "jpg" || $profileFileType == "jpeg"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $position = $_POST['position'];

        if (move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_file)) {
            echo "The file ". basename( $_FILES["resume"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your resume.";
        }

        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $profile_file)) {
            echo "The file ". basename( $_FILES["profile"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your profile picture.";
        }

        $resume = "resume/" . $_FILES["resume"]["name"];
        $profile = "profile/" . $_FILES["profile"]["name"];

        header("Location: confirmation.php?name=$name&email=$email&phone=$phone&address=$address&city=$city&state=$state&zip=$zip&position=$position&resume=$resume&profile=$profile");
    }else{
        echo "Please upload valid file format";
    }

}
?>