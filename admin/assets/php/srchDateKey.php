<?php
    include("C:/xampp/htdocs/mythri/init.php");
    $success = "unsuccessful";
    $sDate = $_POST["sDate"];
    $eDate = $_POST["eDate"];
    $evName = $_POST["evname"];
    $inType = $_POST["initType"];
    $response = array();
    $count = 0;
    
    $sql_query = "select * from tbl_evtype where ev_type='".$inType."';";
        $result = mysqli_query($conn, $sql_query);
        while($row=mysqli_fetch_array($conn,$sql_query))
        {
            $evid=$row['ev_id'];
            $evtype=$row['ev_type'];
        
    
    $sql_query1 = "select * from tbl_event where (event_date>='$sDate' AND event_date<='$eDate') AND (event_name LIKE '$evName%') AND (ev_id='$evid') order by event_date desc;";

    $result1 = mysqli_query($conn, $sql_query1);
             while($row1 = mysqli_fetch_array($result1)){
                $success = "successful";
                $response[$count++] = array("id"=>$row1["event_id"],"type"=>$row["ev_type"],"name"=>$row1["event_name"],"venue"=>$row1["event_venue"],"date"=>$row1["event_date"],"requirement"=>$row1["event_requirement"],"contact"=>$row1["event_contact"]);
    }
    }
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
?>