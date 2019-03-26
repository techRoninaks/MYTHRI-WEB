<?php 
    $dbname = "u694003942_myth";
    $username = "u694003942_myth";
    $password = "mythriP@ssw0rd";
    $servername = "localhost";
    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($con->connect_error) {
       die("Connection failed: " . $con->connect_error);
    }
?>
