<?php
	require "init.php";
	header("Content-Type: application/json; charset=UTF-8");
	
	$dataJSON = $_POST["jsonObj"];
    $data = json_decode($dataJSON);
    $sql = "SELECT * FROM `tbl_emp` WHERE `email`='$data->cookieName'";
    $result1 = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result1);
    

    if($row !== NULL){
        $sql = "UPDATE `tbl_emp` SET `name`='$data->inputName',`email`='$data->inputEmail',`phone`='$data->inputPhone',`password`='$data->inputPassword',`role`='$data->inputRole' WHERE `email`='$data->cookieName'";
    } else {
        $sql = "INSERT INTO `tbl_emp` (`name`,`email`,`phone`,`password`,`role`) VALUES ('$data->inputName','$data->inputEmail','$data->inputPhone','$data->inputPassword','$data->inputRole')";
    }
    $result = mysqli_query($conn,$sql);
    if($result){
        echo '1';
    }
?>