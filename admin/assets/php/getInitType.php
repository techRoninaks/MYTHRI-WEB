<?php
    include("C:/xampp/htdocs/mythri/init.php");
    $success = "unsuccessful";
    $sql_query = "select * from tbl_evtype order by ev_id desc;";
    $result = mysqli_query($conn, $sql_query);
    $response = array();
    $count = 0;
    while($row = mysqli_fetch_array($result)){
        $success = "successful";
        $response[$count++] = array("id"=>$row["ev_id"], "type"=>$row["ev_type"]);
    }
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
?>