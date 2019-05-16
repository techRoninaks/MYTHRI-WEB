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
    //Mail Enquiry Code
    $to = "srinath.subscribe@gmail.com";
    $headers = "From:" . $email;
    $message = $userName . " " . "wrote the following:" . "\n\n" . $notes;
    $subject2 = "Copy of your form submission";
    $message2 = "Greetings ". $userName . "!\nThank you for your response, we'll get back to you as soon as possible.\nHere is a copy of your message...\n\n" . $notes . "\n\nRegards,\nAdministrator,\nMyThrissur.com";
    $headers2 = "From:" . $to;
    $stat = mail($to,$enqType,$message,$headers);
    mail($email,$subject2,$message2,$headers2);
    
    if($result && $stat){
        $success = "successful";
    }
    $result = array("success"=>$success);
    echo json_encode(array("data"=>$result));
?>