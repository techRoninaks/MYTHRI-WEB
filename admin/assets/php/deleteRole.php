<?php
    require 'init.php';
    header("Content-Type: application/json; charset=UTF-8");
	
	$id = $_POST["id"];
    $sql = "DELETE FROM `tbl_roles` WHERE `id`='$id'";
    // echo $sql;
    $result = mysqli_query($conn,$sql);
    if(!$result){
        echo "0";
    }
?>