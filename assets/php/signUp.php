<?php
    require "init.php";
    $success = "unsuccessful";
    $userName = $_POST["userName"];
    $phone = $_POST["phone"];
    $occupation = $_POST["occupation"];
    $location = $_POST["location"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $sql_query = "select * from tbl_user where user_email='$email' AND user_pass='$password'";
    $result = mysqli_query($con, $sql_query);
    $response = mysqli_fetch_array($result);
    if($response){
        $success="exists";
    } else {
        $sql_query ="insert into tbl_user (`user_name`,`user_email`,`user_phone`,`user_occupation`,`user_location`,`user_pass`) values ('$userName','$email','$phone','$occupation','$location','$password')";
        $result = mysqli_query($con, $sql_query);
        $sql_query = "select * from tbl_user where user_email='$email' AND user_pass='$password'";
        $result = mysqli_query($con, $sql_query);
        $response = mysqli_fetch_array($result);
        $success = "successful";
    }
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
?>
