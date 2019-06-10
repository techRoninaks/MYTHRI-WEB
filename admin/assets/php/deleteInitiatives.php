<?php
    include("C:/xampp/htdocs/mythri/init.php");
    header("Content-Type: application/json; charset=UTF-8");
	
	$id = $_POST["id"];
	

    $sql = "DELETE FROM `tbl_event` WHERE `event_id`=$id";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        echo "0";
    }
?>