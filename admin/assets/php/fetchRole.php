<?php
    require 'init.php';
    header("Content-Type: application/json; charset=UTF-8");
	
	$id = $_POST["id"];
    $sql = "SELECT * FROM `tbl_roles` WHERE `id`='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if($row){
        $userData = array("inputRolename"=>$row[1],"inputVol"=>$row[2],"inputEmp"=>$row[3],"inputRole"=>$row[4],"inputEnqu"=>$row[5],"inputInit"=>$row[6],"inputCare"=>$row[7],"inputNews"=>$row[8]);
        $jsonData = json_encode($userData);
        echo $jsonData;
	} else {
	    echo "0";
	}
?>