$(function() {
            //define variales
            var activenote = 0;
            var editmode = false;
            //load notes on page load:ajax call to loadnotes.php
            $.ajax({
                url: "loadnotes.php",
                success: function(data) {
                    $("#notes").html(data);
                    clickonanote();
                    clickondelete();
                },
                error: function() {
                    $("#alert12").text("there was an error with the ajax call!");
                    $("#alert").fadein();
                },
            });
            //add a new note:ajax call to createnote.php

            $("#addnote").click(function() {
                $.ajax({
                    url: "createnotes.php",
                    success: function(e) {
                        if (e == "error") {
                            $("#alert12").text(
                                "there was an error inserting the new note in the database!"
                            );
                            $("#alert").fadein();
                        } else {
                            //update activenote to the id of the new note
                            activenote = data;
                            $("textarea").val("");
                            //show hide element
                            showHide(
                                ["#notePad", "#allnotes"], ["#addnote", "#edit", "#notes", "#done"]
                            );

                            $("textarea").focus();
                        }
                    },
                    error: function() {
                        $("#alert12").text("there was an error with the ajax call2!");
                        $("#alert").fadein();
                    },
                });
            });
            //type note:ajax call to updatenote.php
            $("textarea").keyup(function(e) {
                //ajax  call to update the task of id activnote
                $.ajax({
                    url: "updatenotes.php",
                    type: "POST",
                    //we need to send current note content with its id
                    //to the php file
                    data: { note: $(this).Val(), id: activenote },
                    success: function(data) {
                        if (data == "error") {
                            $("#alert12").text(
                                "there was an error updating the note in the database!"
                            );
                            $("#alert").fadein();
                        }
                    },
                    error: function() {
                        $("#alert12").text("there was an error with the ajax call3!");
                        $("#alert").fadein();
                    },
                });
            });
            //click on all note button:
            $("#allnotes").click(function() {
                $.ajax({
                    url: "loadnotes.php",
                    success: function(data) {
                        $("#notes").html(data);
                        showHide(["#addnote", "#edit", "#notes"], ["#allnotes", "#notePad"]);
                        clickonanote();
                        clickondelete();
                    },
                    error: function() {
                        $("#alert12").text("there was an error with the ajax call!");
                        $("#alert").fadein();
                    },
                });
            });
            //click on done button after editing:load notes again
            $("done").click(function() {
                //switch to none  edit mode
                editmode = false;
                //remove the class that made the notes shrink in size
                $(".noteheader").removeClass("col-xs-7 col-sm-9 ")
                    //show and hide elemets
                showHide(["#edit"], [this, ".delete"])
            });
            //click on edit:go to edit mode(shpw delete buttons,...)
            $("#edit").click(function() {
                //switch to edit mode
                editmode = true;
                //reduce the with of the notes
                $(".noteheader").addClass("col-xs-7 col-sm-9");
                showHide([".delete", "#done"], [this]);
            });

            //function
            //click on a  note
            function clickonanote() {
                $(".noteheader").click(function() {
                    if (!editmode) {
                        //update active note variable to id of a note
                        activenote = $(this).attr("id");
                        //fill text area
                        $("textarea").val($(this).find(".text").text());
                        showHide(
                            ["#notePad", "#allnotes"], ["#addnote", "#edit", "#notes", "#done"]
                        );

                        $("textarea").focus();
                    }
                });
            }
            //click  on delete
            function clickondelete() {
                $(".delete").click(function() {
                    var deletebutton = $(this);
                    //send ajax call to deletenote.php
                    $.ajax({
                        url: "deletenote.php",
                        type: "POST",
                        //we need to send the id of the note to bedeleted
                        data: { id: deletebutton.next().attr("id") },
                        success: function(data) {
                            if (data == "error") {
                                $("#alert12").text(
                                    "there was an error deleting  the note from  the database!"
                                );
                                $("#alert").fadein();
                            } else {
                                //remove containing dive
                                deletebutton.parent().remove()
                            }
                        },
                        error: function() {
                            $("#alert12").text("there was an error with the ajax call3!");
                            $("#alert").fadein();
                        },
                    });
                });

            });
    }
    //show  and hide function
function showHide(array1, array2) {
    for (i = 0; i < array1.length; i++) {
        $(array1[i]).show();
    }
    for (i = 0; i < array2.length; i++) {
        $(array2[i]).hide();
    }
}
});