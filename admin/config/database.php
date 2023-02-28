<?php
    require 'constants.php';
    // connecting to database
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    echo "hello";
    
    if (mysqli_errno($connection)) {
        die(mysqli_error($connection));
    }
    
?>