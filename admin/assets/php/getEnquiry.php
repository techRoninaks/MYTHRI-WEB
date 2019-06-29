<?php
    require "init.php";
    $success = "unsuccessful";
    $sql_query="SELECT s.enquiry_id,s.enquiry_name,s.enquiry_phone,s.enquiry_email,s.enquiry_message,s.enquiry_type,s.enquiry_time,s.enquiry_status,s.event_id,t.ev_type FROM tbl_enquiry s,tbl_event e,tbl_evtype t WHERE s.event_id=e.event_id AND e.ev_id=t.ev_id";
    $result = mysqli_query($conn, $sql_query);
    $response = array();
    $count = 0;
    while($row = mysqli_fetch_array($result)){
        $success = "successful";
        $response[$count++] = array("id"=>$row['enquiry_id'], "name"=>$row['enquiry_name'],"phone"=>$row['enquiry_phone'], "email"=>$row['enquiry_email'],"message"=>$row['enquiry_message'],"type"=>$row['enquiry_type'],"time"=>$row['enquiry_time'],"status"=>$row['enquiry_status'],"event"=>$row['event_id'],"evtype"=>$row['ev_type']);
    }
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
?>