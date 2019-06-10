<?php
    require 'init.php';
    header("Content-Type: application/json; charset=UTF-8");
	
	$id = $_POST["id"];
    $sql = "SELECT * FROM `tbl_emp` WHERE `id`='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if($row){
        $userData = array("inputName"=>$row[1],"inputEmail"=>$row[2],"inputPhone"=>$row[3],"inputPassword"=>$row[4],"inputRole"=>$row[5]);
        $jsonData = json_encode($userData);
        echo $jsonData;
	} else {
	    echo "0";
	}
?>