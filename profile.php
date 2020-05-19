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
    <title>Profile</title>
    <style>
    .container-fluid {
        margin-top: 100px;
    }

    #notePad,
    #allnotes,
    #done {
        display: none;
    }

    .buttondiv {
        margin-bottom: 20px;
    }

    tr {
        cursor: pointer;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#">Online Notes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Profile<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Contact us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="#">My Notes</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Login as<b> Username </b></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Log out </a>
                </li>
            </ul>
        </div>
    </nav>
    <!--container-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Generale account settings:</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <tr data-target="#updateUN" data-toggle="modal">
                            <td>User name</td>
                            <td>value</td>
                        </tr>
                        <tr data-target="#updateEM" data-toggle="modal">
                            <td> Email</td>
                            <td>value</td>
                        </tr>
                        <tr data-target="#updatePW" data-toggle="modal">
                            <td>Password</td>
                            <td>hidden</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--update user name-->
    <form method="post" id="updateUNM">

        <!-- Modal -->
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true" id="updateUN">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Username:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--signup errors from php files-->
                        <div id="SUmessage"></div>
                        <!-- other thinks-->
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input id="username" class="form-control" type="text" name="username" maxlength="30"
                                value="user name value">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input class="btn green " name="updateUN" type="submit" value="Submit">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--update EMAIL-->
    <form method="post" id="updateEMM">

        <!-- Modal -->
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true" id="updateEM">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter new Email:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--signup errors from php files-->
                        <div id="SUmessage"></div>
                        <!-- other thinks-->
                        <div class="form-group">
                            <label for="email"> email:</label>
                            <input id="email" class="form-control" type="email" name="email" maxlength="30"
                                value="email value">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input class="btn green " name="updateUN" type="submit" value="Submit">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!--update password-->
    <form method="post" id="updatePWM">

        <!-- Modal -->
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true" id="updatePW">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter Current and New password:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--signup errors from php files-->
                        <div id="SUmessage"></div>
                        <!-- other thinks-->
                        <div class="form-group">
                            <label for="password1" class="sr-only">your current password:</label>
                            <input id="password1" class="form-control" type="password" name="password1" maxlength="30"
                                placeholder="Your Current password">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="sr-only">your new password:</label>
                            <input id="password2" class="form-control" type="password" name="password2" maxlength="30"
                                placeholder="Your new password">
                        </div>
                        <div class="form-group">
                            <label for="password3" class="sr-only">your current password:</label>
                            <input id="password3" class="form-control" type="password" name="password3" maxlength="30"
                                placeholder=" repeat Your new password">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input class="btn green " name="updateUN" type="submit" value="Submit">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--footer for the man note app-->
    <div class="footer">
        <div class="container">
            <p>devoloped by khalil Copyright &copy: 2019-<?php $today = date("j-M-Y");
                                                            echo $today; ?></p>
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