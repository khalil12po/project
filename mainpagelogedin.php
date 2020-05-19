<?php
session_start();
//if (!isset($_SESSION['user-id'])) {
//  header("location: index.php");
//}


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
    <title>My notes</title>
    <style>
    .noteheader {
        border: 1px solid grey;
        border-radius: 10px;
        margin-bottom: 10px;
        cursor: pointer;
        padding: 0 10px;
        background: linear-gradient(#ffff, #EDEAE7);
    }

    .text {
        font-size: 20px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .timetext {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .container-fluid {
        margin-top: 120px;
    }

    .delete,
    #notePad,
    #allnotes,
    #done {
        display: none;
    }

    .buttondiv {
        margin-bottom: 20px;
    }

    textarea {
        width: 100%;
        max-width: 100%;
        font-size: 16px;
        line-height: 1.5em;
        border-left-width: 20px;
        border-color: #ca3dd9;
        background-color: #fbefff;
        padding: 10px;
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
                    <a class="nav-link" href="#">Log in as<b><?php echo $_SESSION['user_name']; ?></b></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="index.php?lougout=1">Log out </a>
                </li>
            </ul>
        </div>
    </nav>
    <!--container-->
    <div class="container-fluid">
        <!--alert message -->
        <div id="alert" class="alert alert-danger collapse">
            <a class="close" data-dismiss="alert">&times;</a>
            <p id="alert12"></p>

        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <!--buttons-->
                <div class="buttondiv">
                    <button id="addnote" type="button" class="btn btn-info btn-lg">Add Note</button>
                    <button id="edit" type="button" class="btn btn-info btn-lg  float-right "> Edit
                    </button>
                    <button id="done" type="button" class="btn green btn-lg  float-right">Done</button>
                    <button id="allnotes" type="button" class="btn btn-info btn-lg">All Notes</button>
                </div>
                <div id="notePad">
                    <textarea rows="10"></textarea>
                </div>
                <div id="notes" class="notes12">
                    <!-- ajax call to a php file-->
                </div>
            </div>
        </div>
    </div>
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
    <script src="mynotes.js"></script>
</body>

</html>