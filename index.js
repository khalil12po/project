//ajax call for the sign up form
//once the form is submite
$("#signupform").submit(function(event) {
    //prevent the default php processing
    event.preventDefault();
    //collect user inputs in avariable
    var datatopost = $(this).serializeArray();
    //see the data that we alredy got
    console.log(datatopost);
    //send data to the signup.php file
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            if (data) {
                $("#SUmessage").html(data);
            }
        },
        error: function() {
            $("#SUmessage").html(
                '<div class="alert alert-danger">there was an error with the ajax call,please try again</div>'
            );
        },
    });
});

//Ajax Call for the login form
//Once the form is submitted
$("#loginform").submit(function(event) {
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    //console.log(datatopost);
    //send them to login.php using AJAX
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            if (data == 'error') {
                $('#LImessage').html(data);

            } else {
                window.location = "mainpagelogedin.php";

            }
        },
        error: function() {
            $('#LImessage').html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }

    });

});
//Ajax Call for the login form
//Once the form is submitted
$("#forgotpasswordform").submit(function(event) {
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    //    console.log(datatopost);
    //send them to login.php using AJAX
    $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            $('#FPmessage').html(data);
        },
        error: function() {
            $('#LImessage').html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }

    });

});