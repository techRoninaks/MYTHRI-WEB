<?php
	require "init.php";
    $id = $_POST["id"];
    
    $sql = "SELECT * FROM `tbl_user` WHERE `user_id` = $id";
	$result = $con->query($sql);
	if($result){
        $row = $result->fetch_array();
        $data = array("userId"=>$row[0],"userName"=>$row["user_name"],"userMail"=>$row["user_email"],"userPhone"=>$row["user_phone"],"userJob"=>$row["user_occupation"],"userLoc"=>$row["user_location"],"ehRating"=>$row["eh_rating"]);
        $jsonData = json_encode($data);
        echo $jsonData;
	}
?>