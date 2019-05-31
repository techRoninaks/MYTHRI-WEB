<?php
    $hostname="localhost"; 
    $username="root";  
    $password="";     
    $database="mythri";  
    $conn=mysqli_connect($hostname,$username,$password,$database);
    $con = $conn;
    if(! $conn){
        die('Connection Failed'.mysql_error());
    }
?>