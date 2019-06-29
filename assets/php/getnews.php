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
    $sql_query_totalPage = "SELECT COUNT(*) as total_pages FROM `tbl_news`";
    $result = mysqli_query($conn,$sql_query_totalPage);
    $row = mysqli_fetch_array($result);
    $totalResults = $row[0];
    $totalPages = ceil($totalResults/$limit);
    //Actual query
    $response = array();
    $data = array();
    $success = "unsuccessful";
    $count = 0;
    $sql_query =  "SELECT * FROM `tbl_news` ORDER BY news_date DESC LIMIT $limit OFFSET $offset";//SQL command
    $count = 0;
    $result = mysqli_query($conn,$sql_query);
    while($row=mysqli_fetch_array($result)){
        $success = "successful";
        $count = $count + 1;
        $response[0] = array("response"=>$success, "total_pages"=>$totalPages);  
        $response[$count] = array("news_id"=>$row[0],"news_title"=>$row[1],"news_entrydate"=>$row[2],"news_date"=>$row[3], "news_des"=>$row[4], "news_img"=>$row[5]);
    }
    echo json_encode($response);
?> 