<?php
    require "init.php";
    $success = "unsuccessful";
    $srchKey = $_POST["searchKey"];
    $sql_query = "select enquiry_id,enquiry_name,enquiry_phone,enquiry_email,enquiry_message,enquiry_type,enquiry_time,enquiry_status from tbl_enquiry rf where enquiry_name LIKE '%$srchKey%' OR enquiry_email LIKE '%$srchKey%'";
    $result = mysqli_query($conn, $sql_query);
    $response = array();
    $count = 0;
    while($row = mysqli_fetch_array($result)){
        $success = "successful";
        // $response[$count++] = array("id"=>$row["id"], "name"=>$row["name"],"phone"=>$row["phone"],"email"=>$row["email"],"message"=>$row["message"],"type"=>$row["type"],"skills"=>$row["skils"],"doj"=>$row["doj"],"premium"=>$row["premium"]);
    $response[$count++] = array("id"=>$row['enquiry_id'], "name"=>$row['enquiry_name'],"phone"=>$row['enquiry_phone'], "email"=>$row['enquiry_email'],"message"=>$row['enquiry_message'],"type"=>$row['enquiry_type'],"time"=>$row['enquiry_time'],"status"=>$row['enquiry_status']);
    }
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
?>