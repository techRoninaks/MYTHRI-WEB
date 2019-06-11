<?php
    require "init.php";
    $success = "unsuccessful";
    //$sql_query = "select * from tbl_user";
     //$sql_query="SELECT user_id,user_name,user_location,eh_rating FROM tbl_user";
    $sql_query="SELECT user_id,user_name,user_phone,user_location,eh_rating,(select COUNT(*) from tbl_evhistory WHERE user_id=rf.user_id) as participation FROM tbl_user rf";
    $result = mysqli_query($conn, $sql_query);
    $response = array();
    $count = 0;
    while($row = mysqli_fetch_array($result)){
        $success = "successful";
        $response[$count++] = array("id"=>$row['user_id'], "name"=>$row['user_name'],"phone"=>$row['user_phone'], "location"=>$row['user_location'], "rating"=>$row['eh_rating'], "participation"=>$row['participation']);
    }
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
?>