<?php
    //------insert.php------
     $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "reg1";

    // Create connection
    $conn =mysqli_connect($servername, $username, $password,$dbname);

    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 


          // $name=$_POST['name'];
          // echo "$name";
            $cat='check';
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $occupation=$_POST['occupation'];
            $location=$_POST['location'];
            $pass=$_POST['password'];
            $conpass=$_POST['confirmpassword'];
            $message=$_POST['message'];

            $sql= mysqli_query($conn,"INSERT INTO register(name,email,phone,occupation,location,password,confirmpassword,message,cat_type) VALUES('$name','$email','$phone',' $occupation','$location','$pass','$conpass','$message','$cat')");
        
 ?>