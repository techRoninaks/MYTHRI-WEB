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
      printf("%s",$conn->error);
        die("Connection failed: " . $conn->connect_error);
    }           
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $occupation=$_POST['occupation'];
            $location=$_POST['location'];
            $password=$_POST['password'];
            $message=$_POST['message'];                       
            $qryCatType=$_POST['qryCatType'];
            $status=1;
           
          $sql=mysqli_query($conn,"INSERT INTO tbl_enquiry(enquiry_name,enquiry_email,enquiry_phone,enquiry_message,enquiry_status,enq_id,enquiry_typename) VALUES ('$name','$email','$phone','$message','$status',(select enq_id from tbl_enqtype where enqtype_name LIKE '$qryCatType'),'$qryCatType')");
    if($qryCatType == "volunteer")
    {

        $sql1=mysqli_query($conn,"INSERT INTO tbl_user(name,email,phone,occupation,location,password) VALUES ('$name','$email','$phone','$occupation','$location','$password')");
    }
          
               

            
?>
             