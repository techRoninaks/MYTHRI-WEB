<?php
$hostname="localhost"; 
$username="root";  
$password="";     
$database="db_mythri";  
$conn=mysqli_connect($hostname,$username,$password,$database);
if(! $conn)
{
die('Connection Failed'.mysql_error());
}



?>