<?php
require_once('../config/db.php');

if (isset($_POST['submit'])) {
    $todo = $_POST['todo'];

    db();
    global $link;

    $query = "INSERT INTO todos(todo) VALUE ('$todo')";
    $insert = mysqli_query($link, $query);

    if ($insert) {
        header('Location: ../index.php');
    } else {
        header('Location: ../index.php');
    }

    mysqli_close($link);
}
