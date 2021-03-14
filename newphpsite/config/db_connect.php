<?php 
// connect to database
$conn = mysqli_connect('localhost', 'oliviya', 'test1234', 'cv_creator');

// check the connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();

}

?>