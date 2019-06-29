<?php
	require "init.php";
    $id = $_POST["id"];
    
    $sql = "select e.*, et.ev_type from tbl_event e JOIN tbl_evtype et on e.ev_id = et.ev_id WHERE event_id IN (SELECT h.event_id from tbl_evhistory h,tbl_user u WHERE u.user_id = '$id') OR event_id IN (SELECT event_id FROM tbl_enquiry WHERE enquiry_email = (SELECT user_email FROM tbl_user WHERE user_id = '$id')) ORDER BY e.event_date desc";
	$result = $con->query($sql);
	$n = 0;
	
	
	if ($result->num_rows > 0) {
	    $count = $result->num_rows;
	    while($row = $result->fetch_array()) {
	        $data[$n] = array("eveName"=>$row["event_name"],"eveDate"=>$row["event_date"],"evId"=>$row["ev_id"],"count"=>$count,"eventId"=>$row["event_id"],"catType"=>$row["ev_type"]);
	        $n += 1;
	    }
	    
	    $jsonData = json_encode($data);
	    echo $jsonData;
	}
?>