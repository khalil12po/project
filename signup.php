<?php
//start a session
session_start();
//connect to the database 
include('conection.php');
//check user input 
//define error message
$missingUsername = '<P>Please entre a user name</P>';
$missingEmail = '<P>Please entre an Email</P>';
$invalidEmail = '<P>Please entre a valid Email</P>';
$missingPassword = '<P>Please entre a password</P>';
$invalidPassword = '<P>Please entre a valid Password at least 6characters long and include one capital letter and one number</P>';
$diffPassword = '<P>Please repeate the Password</P>';
$missingPassword2 = '<P>Please confirm your password </P>';
//get username email and  password 
//get use name 
if (empty($_POST["username"])) {
    $errors .= $missingUsername;
} else {
    $Username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}
//get email
if (empty($_POST["email"])) {
    $errors .= $missingEmail;
} else {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= $invalidEmail;
    }
}
//get the passwords
if (empty($_POST["password"])) {
    $errors .= $missingPassword;
} else if (!(strlen($_POST["password"]) > 6 and preg_match('/[A-Z]/', $_POST["password"]) and preg_match('/[0-9]/', $_POST["password"]))) {
    $errors .= $invalidPassword;
} else {
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    if (empty($_POST["password2"])) {
        $errors .= $missingPassword2;
    } else {
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if ($password !== $password2) {
            $errors .= $diffPassword;
        }
    }
}
//if they are any error we are going to print
if ($errors) {
    $resultmessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultmessage;
    exit;
}
//no errors
//preparing variables for the queries
$Username = mysqli_real_escape_string($link, $Username);
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);
//the md5 is easy to find a collesion
//$password = md5($password);
$password = hash('sha256', $password);
//128 bits long->32 characters
//256bites ->64 characters
//we cant store the password as it is

//if user name existe in the data base print error 
$sql = "SELECT * FROM users WHERE user_name = '$Username'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger"> ERROR running the query1</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}
$results = mysqli_num_rows($result);
if ($results) {
    echo '<div class="alert alert-danger">that user name is alredy registered</div>';
    exit;
}
//if the email exist in the users table print an error 
$sql = "SELECT * FROM users WHERE  email = '$email' ";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger"> ERROR running the query2</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';

    exit;
}
$results = mysqli_num_rows($result);
if ($results) {
    echo '<div class="alert alert-danger">that email  is alredy registered</div>';
    exit;
}
//Create a unique activation code    
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
//byte unit of data =8bits


//insert user details and activation cod in the user table
$sql = "INSERT INTO `users`( `user_name`, `email`, `password`, `activation`) VALUES ('$Username','$email','$password','$activationkey') ";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger"> there was an error inserting data in the data base  </div>';
    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';

    exit;
}
//send an email to the user with a link to activate.php with theire email and activation code
$message = "please click on this link to ctivate your account:\n\n";
$message .= "http://localhost/testphp/noteapp/activate.php?email=" . urlencode($email) . "&key=$activationkey";
if (mail($email, 'confirm your Registration', $message,)) {
    echo '<div class="alert alert-success"> thank you for your registration ,
    the confirmation email has been sent to the email 
     and please click on the activation link to activate you acount.</div>';
}