<?php
    include("init.php");
    $success = "unsuccessful";
    $inType = $_POST["inType"];
    $response = array();
    $count = 0;
    
    $sql_query = "SELECT * FROM  tbl_evtype WHERE ev_type='".$inType."';";
        $result = mysqli_query($conn, $sql_query);
        while($row=mysqli_fetch_array($result))
        {
            $evid=$row['ev_id'];
            $evtype=$row['ev_type'];
        
    
    $sql_query1 = "SELECT * FROM tbl_event WHERE ev_id='$evid' ORDER BY event_date DESC;";

    $result1 = mysqli_query($conn, $sql_query1);
             while($row1 = mysqli_fetch_array($result1)){
                $requirement=$row1["event_requirement"];

                    $requireMet=explode('!~',$requirement);
                 //print_r($requireMet);
                     $i = 0;
                foreach($requireMet as $value){
                ${'require'.$i} = $value;
                 $i++;
                //echo $i."<p>";
                    }
                $success = "successful";
                $response[$count++] = array("id"=>$row1["event_id"],"type"=>$evtype,"name"=>$row1["event_name"],"venue"=>$row1["event_venue"],"date"=>$row1["event_date"],"metRequire"=>$require0,"totRequire"=>$require1,"contact"=>$row1["event_contact"]);
    }
    }
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
?>