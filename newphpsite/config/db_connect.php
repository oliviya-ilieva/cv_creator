<?php
    
    // Database credentials.
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_table = "cv_creator";

    // is it live or in development.
    $development = true;

    // is it in debug mode.
    $debug = true;

    if ($debug == true) {
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        ini_set('display_startup_errors', 1);
        include_once 'error_handling.php';

        error_show();
    }

    // connect to database - development.
    if ($development == true) {
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_table);
    }
    else {
        // connect to database - (main).
        $conn = mysqli_connect('localhost', 'oliviya', 'test1234', 'cv_creator');
    }

    // check the connection
    if(!$conn){
        if ($debug == true) {
            echo 'Connection error: ' . mysqli_connect_error();
        }
        else {
            error_catch('Connection error: ' . mysqli_connect_error());
        }
    }

    // // test our new functions.
    // // dump('test error string');
    // error_catch('test error string1');
    // error_catch('test error string2');
    // error_catch('test error string3');
    // error_show();

?>
