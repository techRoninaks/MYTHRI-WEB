<?php
	require "init.php";
    $id = $_POST["userId"];
    
    $sql = "SELECT user_name, user_email, user_phone FROM `tbl_user` WHERE `user_id` = $id";
    $result = $con->query($sql);
	if($result){
        $row = $result->fetch_array();
        if($row){
            $success="successful";
        }
        $result = array("success"=>$success, "result"=>$row);
        echo json_encode(array("data"=>$result));
	}
?>