<?php
    require "init.php";
    $success = "unsuccessful";
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql_query = "select * from tbl_user where user_email='$email' AND user_pass='$password'";
    $result = mysqli_query($con, $sql_query);
    $response = mysqli_fetch_array($result);
    if($response){
        $success="successful";
    }
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
?>