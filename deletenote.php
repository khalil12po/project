<?php
session_start();
include('conection.php');
//get the id of the note throught ajax 
$note_id = $_POST['id'];
// run a query to delete the note
$sql = "DELETE FROM notes WHERE id = $note_id";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo 'error';
}