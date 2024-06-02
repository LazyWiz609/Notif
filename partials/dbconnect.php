<?php $servername = "localhost";
    $username = "root";
    $password = "1234";

    $dbname = "todo";
    // Connecting to Database.
    $conn = new mysqli($servername, $username, $password, $dbname); 
    // if ($conn->connect_error) {
    //     die("Connection to the server failed:". $conn->connect_error);
    // }
    // echo "Connection established successfully.";
