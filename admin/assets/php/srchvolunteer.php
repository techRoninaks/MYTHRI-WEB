<?php
    require "init.php";
    $success = "unsuccessful";
    $srchKey = $_POST["searchKey"];
    $sql_query = "select user_id,user_name,user_phone,user_location,eh_rating,(select COUNT(*) from tbl_evhistory WHERE user_id=rf.user_id) as participation from tbl_user rf where user_name LIKE '%$srchKey%'";
    $result = mysqli_query($conn, $sql_query);
    $response = array();
    $count = 0;
    while($row = mysqli_fetch_array($result)){
        $success = "successful";
        // $response[$count++] = array("id"=>$row["id"], "name"=>$row["name"],"role"=>$row["role"],"union"=>$row["union"],"location"=>$row["location"],"phone"=>$row["phone"],"skills"=>$row["skils"],"doj"=>$row["doj"],"premium"=>$row["premium"]);
    $response[$count++] = array("id"=>$row['user_id'], "name"=>$row['user_name'],"phone"=>$row['user_phone'], "location"=>$row['user_location'], "rating"=>$row['eh_rating'], "participation"=>$row['participation']);
    }
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
?>