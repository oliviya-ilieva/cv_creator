<?php
    
    // Database credentials.
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_table = "cv_creator";

    $development = true;
    $debug = true;

    if ($debug == true) {
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        ini_set('display_startup_errors', 1);
    }

    // connect to database - development.
    if ($development == true) {
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_table);
    }
    else {
        // connect to database (main).
        $conn = mysqli_connect('', 'oliviya', 'test1234', 'cv_creator');
    }

    // check the connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();

    }

?>