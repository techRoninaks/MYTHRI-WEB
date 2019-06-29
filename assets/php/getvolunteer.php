<?php
    require "../../init.php";//needed for connection with database
    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header('location:../index.php');
        exit;
    }
    $page = 1;
    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }
    $totalPages = 1;
    $limit = 8;
    $offset = ($page - 1) * $limit; 
    //Get totalpages
    $sql_query_totalPage = "SELECT COUNT(*) as total_pages FROM `tbl_event` WHERE `ev_id` = 3";
    $result = mysqli_query($conn,$sql_query_totalPage);
    $row = mysqli_fetch_array($result);
    $totalResults = $row[0];
    $totalPages = ceil($totalResults/$limit);
    //Actual query
    $response = array();
    $data = array();
    $success = "unsuccessful";
    $count = 0;
    $sql_query =  "SELECT * FROM `tbl_event` WHERE `ev_id` = 3 LIMIT $limit OFFSET $offset";//SQL command
    $count = 0;
    $result = mysqli_query($conn,$sql_query);
    while($row=mysqli_fetch_array($result)){
        $success = "successful";
        $count = $count + 1;
        $response[0] = array("response"=>$success, "total_pages"=>$totalPages);  
        $response[$count] = array("event_id"=>$row[0],"ev_id"=>$row[1],"cccat_id"=>$row[2],"event_name"=>$row[3], "event_venue"=>$row[4], "event_date"=>$row[5], "contact"=>$row[6], "event_img"=>$row[7], "event_des"=>$row[8], "event_requirement"=>$row[9]);
    }
    echo json_encode($response);
?>