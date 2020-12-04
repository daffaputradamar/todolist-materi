<?php
require_once('../config/db.php');

db();
global $link;

$id = $_GET['id'];
$query = "DELETE FROM todos WHERE id = $id";
$delete = mysqli_query($link, $query);

if ($delete) {
    header('Location: ../index.php');
} else {
    header('Location: ../index.php');
}

mysqli_close($link);
