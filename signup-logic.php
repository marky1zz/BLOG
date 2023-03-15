<?php 

require 'config/database.php';

// get signup from data if signup button was clicked
if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];
    // echo $firstname, $lastname, $username, $email, $createpassword, $confirmpassword;
    //var_dump($avatar);

    // check if input values are valid
    if (!$firstname) {
        $_SESSION['signup'] = "Please enter your First name";
    } elseif (!$lastname) {
        $_SESSION['signup'] = "Please enter your Last name";
    } elseif (!$username) {
        $_SESSION['signup'] = "Please enter your Username";
    } elseif (!$email) {
        $_SESSION['signup'] = "Please enter your Email";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword < 8)) {
        $_SESSION['signup'] = "Password should be 8+ charecters";
    } elseif (!$avatar['name']) {
        $_SESSION['signup'] = "Please add avatar";
    } else {
        // check if passwords don't match
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Passwords do not match";
        } else {
            // hash password
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);
            
            // check if username or email already exists in database
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = "User name or email already exists";
            } else {
                // WORK ON AVATAR
                // remane avatar
                $time = time(); // make each image name unique using current timestamp
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                // make sure file is an images
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);
                if (in_array($extention, $allowed_files)) {
                    // make sure image is not to large (1mb)
                    if ($avatar['size'] < 1000000) {
                        // uplode avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['signup'] = "File is too big. Should be less then 1mb";
                    }
                } else {
                    $_SESSION['signup'] = "File should be png, jpg, ppeg";
                }
            }
    
        }
    }

    // redirect back ypo signup page if there was a problem
    if (isset($_SESSION['signup'])) {
        // pass ivalid form data back to signup page
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    } else {
        // insert new user into users table 
        $insert_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES('$firstname', '$lastname', '$username', '$email', '$hashed_password', '$avatar_name', 0)";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if (!mysqli_errno($connection)) {
            // After registration is successful
            // redirect to login page with success message
            $_SESSION['signup-success'] = "Registration successful. Please login";
            header('location: ' . ROOT_URL . 'signin.php');
            die();
        }
    }

} else {
    // if button wasn't clicked, bounce to sign up
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}
?>