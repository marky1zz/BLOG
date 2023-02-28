<?php
    require 'constants.php';

    // connecting to database
    // $connection = new mysqli(DB_HOST, BD_USER, BD_PASS, DB_NAME);
    $connection = new mysqli('localhostt', 'root', '', 'blog');

    if (mysqli_errno($connection)) {
        die(mysqli_error($connection));
    }
?>