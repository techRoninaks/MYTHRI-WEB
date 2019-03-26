<?php
	require "init.php";
    
    $sql = "SELECT * FROM `tbl_event` ORDER BY `event_date` desc";
	$result = $con->query($sql);
	$n = 0;
	
	if ($result->num_rows > 0) {
	
	    while($row = $result->fetch_array()) {
	        $data[$n] = array("eveName"=>$row["event_name"],"eveDate"=>$row["event_date"],"eveDes"=>$row["event_des"],"eveImg"=>$row["event_img"]);
	        $n += 1;
	    }
	    $jsonData = json_encode($data);
	    echo $jsonData;
	}
?>