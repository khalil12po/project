<?php
session_start();
include('conection.php');
//logout
include('logout.php');
//remember me code
include('rememberme.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <title>Note app</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#">Online Notes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Contact us</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="modal" href="#exampleModal2">Login <span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!--Jumbotron with sign up button -->
    <div class="Jumbotron" id="myContainer">
        <h1>Online Notes App </h1>
        <p>Your Notes with you wherever you goto</p>
        <p>Easy to use,protects all your notes</p>
        <button type="button" class="btn btn-lg green btn1" data-toggle="modal" data-target="#exampleModal">Sign up-it`s
            free </button>
    </div>
    <div class="footer">
        <div class="container">
            <p>devoloped by khalil Copyright &copy: 2019-<?php $today = date("j-M-Y");
                                                            echo $today; ?></p>
        </div>
    </div>
    <!--signe up form-->
    <form method="post" id="signupform">

        <!-- Modal -->
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true" id="exampleModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sign up today and Start using our Online notes
                            App!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--signup errors from php files-->
                        <div id="SUmessage"></div>



                        <div class="form-group">
                            <label for="username" class="sr-only">Username:</label>
                            <input id="username" class="form-control" type="text" name="username" placeholder="Username"
                                maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email Adress:</label>
                            <input id="email" class="form-control" type="email" name="email" placeholder="email"
                                maxlength="30"></div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password:</label>
                            <input id="password" class="form-control" type="password" name="password"
                                placeholder="Chose a password" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="sr-only">Confirm your password</label>
                            <input id="password2" class="form-control" type="password" name="password2"
                                placeholder="Confirm your password" maxlength="30">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn green " name="signup" type="submit" value="sign up">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- login form-->
    <form method="POST" id="loginform">

        <!-- Modal -->
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true" id="exampleModal2">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--login errors from php files-->
                        <div id="LImessage"></div>


                        <div class="form-group">
                            <label for="LIemail" class="sr-only">Email Adress:</label>
                            <input id="LIemail" class="form-control" type="email" name="LIemail" placeholder="Email"
                                maxlength="40"></div>
                        <div class="form-group">
                            <label for="LIpassword" class="sr-only">Password:</label>
                            <input id="LIpassword" class="form-control" type="password" name="LIpassword"
                                placeholder="Password" maxlength="30">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="rememberme" id="rememberme">
                                Remeber me
                            </label>

                        </div>
                        <a href="#" class="text-right" style="cursor:pointer;margin-right:auto;" data-dismiss="modal"
                            data-toggle="modal" data-target="#exampleModal3">
                            Forgot password ?
                        </a>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal"
                            data-target="#exampleModal" data-toggle="modal">Register</button>
                        <input class="btn green " name="Login" id="Login" type="submit" value="Login">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                    </div>

                </div>

            </div>
        </div>
    </form>



    <!-- forget password form-->
    <form method="post" id="forgotpasswordform">

        <!-- Modal -->
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true" id="exampleModal3">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Forgot Password? Entre your email address:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--forgot password  errors from php files-->
                        <div id="FPmessage"></div>


                        <div class="form-group">
                            <label for="FPemail" class="sr-only">Email Adress:</label>
                            <input id="FPemail" class="form-control" type="email" name="FPemail" placeholder="Email"
                                maxlength="40">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal"
                            data-target="#exampleModal" data-toggle="modal">Register</button>
                        <input class="btn green " name="FPsubmit" type="submit" value="FPsubmit">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                    </div>

                </div>
            </div>
        </div>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="index.js"></script>
</body>

</html>