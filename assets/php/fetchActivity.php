<?php
	require "init.php";
    $id = $_POST["id"];
    
    $sql = "SELECT t.*,e.ev_id,e.event_date,e.event_name FROM tbl_evhistory t, tbl_event e WHERE t.user_id = '$id' AND e.event_id=t.event_id ORDER BY e.event_date desc";
	$result = $con->query($sql);
	$n = 0;
	
	if ($result->num_rows > 0) {
	    $count = $result->num_rows;
	    while($row = $result->fetch_array()) {
	        $data[$n] = array("eveName"=>$row["event_name"],"eveDate"=>$row["event_date"],"evId"=>$row["ev_id"],"ehRating"=>$row["eh_rating"],"count"=>$count);
	        $n += 1;
	    }
	    
	    $jsonData = json_encode($data);
	    echo $jsonData;
	}
?>