<?php
	require "init.php";
    
    $sql = "SELECT e.*,t.* FROM tbl_event e,tbl_evtype t WHERE e.ev_id=t.ev_id ORDER BY `event_date` desc";
	$result = $con->query($sql);
	$n = 0;
	
	if ($result->num_rows > 0) {
	
	    while($row = $result->fetch_array()) {
	        $data[$n] = array("eveId"=>$row["event_id"],"eveType"=>$row["ev_type"],"eveName"=>$row["event_name"],"eveDate"=>$row["event_date"],"eveDes"=>$row["event_des"],"eveImg"=>$row["event_img"]);
	        $n += 1;
	    }
	    $jsonData = json_encode($data);
	    echo $jsonData;
	}
?>