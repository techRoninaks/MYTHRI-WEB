<?php
    require "init.php";//needed for connection with database
    $page = 1;
    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }
    $totalPages = 1;
    $limit = 8;
    $offset = ($page - 1) * $limit; 
    //Get totalpages
    $sql_query_totalPage = "SELECT COUNT(*) as total_pages FROM `tbl_carectr`";
    $result = mysqli_query($conn,$sql_query_totalPage);
    $row = mysqli_fetch_array($result);
    $totalResults = $row[0];
    $totalPages = ceil($totalResults/$limit);
    //Actual query
    $sql_query =  "SELECT * FROM `tbl_carectr` LIMIT $limit OFFSET $offset";//SQL command
    $response = array();
    $data = array();
    $success = "unsuccessful";
    $count = 0;
    $result = mysqli_query($conn,$sql_query);
    while($row=mysqli_fetch_array($result)){
        $success = "successful";
        $count = $count + 1;
        $response[0] = array("response"=>$success, "total_pages"=>$totalPages);  
        $response[$count] = array("cc_id"=>$row[0],"cccat_id"=>$row[1],"cc_venue"=>$row[2],"cc_strength"=>$row[3], "cc_contact"=>$row[4], "cc_img"=>$row[5], "cc_des"=>$row[6], "event_type"=>$row[7], "cc_name"=>$row[8]);
    }
    
    echo json_encode($response);
?>