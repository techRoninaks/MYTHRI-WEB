<?php
    require 'init.php';
    header("Content-Type: application/json; charset=UTF-8");
	
	$id = $_POST["id"];
    $sql = "SELECT * FROM tbl_user WHERE user_id='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if($row){
        $userData = array("inpId"=>$row['user_id'],"inpName"=>$row['user_name'],"inpEmail"=>$row['user_email'],"inpContact"=>$row['user_phone'],"inpOccupation"=>$row['user_occupation'],"inpLocation"=>$row['user_location'],"inpPassword"=>$row['user_pass'],"inpRate"=>$row['eh_rating']);
        $jsonData = json_encode($userData);
        echo $jsonData;
	} else {
	    echo "0";
	}
?>