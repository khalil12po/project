<?php
//the user is re-directingto this file after clicking the activation link
//the sign up link contain two get parameteres email and activation code
session_start();
include('conection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Activation:</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    h1 {
        color: purple;
    }

    .contactForm {
        border: 1px solid #7c73f6;
        margin-top: 50px;
        border-radius: 15px;
    }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 contactForm">
                <h1>Account Activation:</h1>
                <?php

                //if the email or activation code is missing printf an error
                if (!isset($_GET['email'])) {
                    echo '<div class="alert alert-danger"> there was an error with the email.Please click on the activation code
                       you received by email</div>';
                    exit;
                }
                if (!isset($_GET['key'])) {
                    echo '<div class="alert alert-danger"> there was an error with the key.Please click on the activation code
                       you received by email</div>';
                    exit;
                }

                //else
                //Store theme in two variables
                $email = $_GET['email'];
                $Key = $_GET['key'];
                //prepare the variables for the query
                $email = mysqli_real_escape_string($link, $email);
                $Key = mysqli_real_escape_string($link, $Key);
                //Run query:set activation field to "activated" for the provided email
                $sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$Key') LIMIT 1";
                $result = mysqli_query($link, $sql);
                //if query is successful show success message and invite user to login
                if (mysqli_affected_rows($link) == 1) {
                    echo '<div class="alert alert-success"> your acount has been activated</div>';
                    echo '<a href="index.php" type="button" class="btn-lg btn-sucess"> log in </a>';
                } else {
                    //  print error_message
                    echo '<div class="alert alert-danger"> Your 
    account could not be activated please
     try again </div>';
                }
                ?>

            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>