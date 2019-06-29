<?php
    include("init.php");
    header("Content-Type: application/json; charset=UTF-8");
	
	$id = $_POST["uid"];
	

    $sql = "DELETE FROM `tbl_enquiry` WHERE `enquiry_id`=$id";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        echo "0";
    }
?>