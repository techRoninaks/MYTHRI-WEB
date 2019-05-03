<?php
    
    require 'init.php';
    
    header("Content-Type: application/json; charset=UTF-8");
	$dataJSON = $_POST["jsonObj"];
    $data = json_decode($dataJSON);
    
    $sql = "UPDATE `tbl_user` SET `userName`='$data->newName',`useroccupation`='$data->newJob',`user_location`='$data->newLoc',`user_phone`='$data->newPhone' WHERE `user_id` = '$data->userId'";
    $result = mysqli_query($con,$sql);
    if($result){
        echo '1';
    }
?>