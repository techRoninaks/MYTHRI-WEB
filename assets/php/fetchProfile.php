<?php
	require "init.php";
    $id = $_POST["id"];
    
    $sql = "SELECT * FROM `tbl_user` WHERE `user_id` = $id";
	$result = $con->query($sql);
	if($result){
        $row = $result->fetch_array();
        $data = array("userId"=>$row[0],"userName"=>$row[1],"userMail"=>$row[2],"userPhone"=>$row[3],"userJob"=>$row[4],"userLoc"=>$row[5],"userRating"=>$row[7]);
        $jsonData = json_encode($data);
        echo $jsonData;
	}
?>