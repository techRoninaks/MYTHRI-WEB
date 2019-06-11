<?php
	require "init.php";
	header("Content-Type: application/json; charset=UTF-8");
	
	$dataJSON = $_POST["jsonObj"];
    $data = json_decode($dataJSON);
    $sql = "SELECT * FROM `tbl_user` WHERE `user_id`='$data->cookieName'";
    // echo $sql;
    $result1 = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result1);
    
    // echo "-1-".$sql;
    // var_dump($row
    
    if($row !== NULL){
        $sql = "UPDATE `tbl_user` SET `user_id`='$data->inpId',`user_name`='$data->inpName',`user_email`='$data->inpEmail',`user_phone`='$data->inpContact',`user_occupation`='$data->inpOccupation',`user_location`='$data->inpLocation',`user_pass`='$data->inpPassword',`eh_rating`='$data->inpRate' WHERE `user_id`='$data->cookieName'";
    //echo "-2-".$sql;
        //echo $sql;
    } else {
        $sql = "INSERT INTO `tbl_user` (`user_id`,`user_name`,`user_email`,`user_phone`,`user_occupation`,`user_location`,`user_pass`,`eh_rating`) VALUES ('$data->inpId','$data->inpName','$data->inpEmail','$data->inpContact','$data->inpOccupation','$data->inpLocation','$data->inpPassword','$data->inpRate')";
    // echo "-3-".$sql;
        // $sql;
    }
    $result = mysqli_query($conn,$sql);
    // var_dump($result);
    if($result){
        echo '1';
    }
?>