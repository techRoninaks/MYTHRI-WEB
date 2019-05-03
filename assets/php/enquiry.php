<?php
    require "init.php";
    $success = "unsuccessful";
    $userName = $_POST["userName"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $notes = $_POST["notes"];
    $enqType = $_POST["enqType"];
    $evId = $_POST["evId"];
    
    $sql_query = "insert into tbl_enquiry (`enquiry_name`,`enqsts_id`,`enquiry_email`,`enquiry_phone`,`enquiry_message`,`enquiry_type`,`event_id`) values ('$userName',1,'$email','$phone','$notes','$enqType',$evId)";
    $result = mysqli_query($con, $sql_query);
    // echo $sql_query;
    if($result){
        $success = "successful";
    }
    $result = array("success"=>$success);
    echo json_encode(array("data"=>$result));
?>