<?php
	require "init.php";
	header("Content-Type: application/json; charset=UTF-8");
	
	$dataJSON = $_POST["jsonObj"];
    $data = json_decode($dataJSON);
    
    $sql = "SELECT * FROM `tbl_roles` WHERE `name`='$data->cookieName'";
    $result1 = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result1);
    
    if($row !== NULL){
        $sql = "UPDATE `tbl_roles` SET `volunteer`=$data->inputVol, employee=$data->inputEmp, roles=$data->inputRole, enquiry=$data->inputEnqu, initiative=$data->inputInit, care_center=$data->inputCare, news=$data->inputNews WHERE `name`='$data->cookieName'";
    } else {
        $sql = "INSERT INTO `tbl_roles` (`name`,`volunteer`,`employee`,`roles`,`enquiry`,`initiative`,`care_center`,`news`) VALUES ('$data->inputRolename' ,$data->inputVol ,$data->inputEmp ,$data->inputRole ,$data->inputEnqu ,$data->inputInit ,$data->inputCare ,$data->inputNews)";
        // echo $sql;
    }
    $result = mysqli_query($conn,$sql);
    if($result){
        echo '1';
    }
?>