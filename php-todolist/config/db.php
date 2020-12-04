<?php
function db()
{

    global $link;
    $link = mysqli_connect("localhost", "root", "", "php_todolist") or die("tidak bisa menyambung ke database");
    return $link;
}

// if (db()) {
//     echo "Database berhasil disambungkan";
// }
