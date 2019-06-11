<?php
    include("init.php");
    $success = "unsuccessful";
    $sDate = $_POST["sDate"];
    $eDate = $_POST["eDate"];
    $evName = $_POST["eventName"];
    $inType = $_POST["inType"];
    $response = array();
    $count = 0;
    
    $sql = "SELECT * FROM  tbl_evtype WHERE ev_type='".$inType."';";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))

        {
            $evid=$row["ev_id"];
            $evtype=$row["ev_type"];
           //echo $evid;
        
    }
    if($eDate=="")
    {
    $sql1 = "SELECT * FROM  tbl_event WHERE (event_date>='$sDate') AND (event_name LIKE '$evName%' OR event_name='$evName') AND (ev_id='$evid') ORDER BY event_date DESC;";

    $result1 = mysqli_query($conn, $sql1);
           while($row1 = mysqli_fetch_array($result1))
        
             {
               $requirement=$row1["event_requirement"];

        $requireMet=explode('!~',$requirement);
                // print_r($requireMet);
             $i = 0;
                foreach($requireMet as $value)
                {
                ${'require'.$i} = $value;
                 $i++;
                //echo $i."<p>";
             
                }
 
//echo $require0;
//echo $require1;
                $success = "successful";
                $response[$count++] = array("id"=>$row1["event_id"],"type"=>$evtype,"name"=>$row1["event_name"],"venue"=>$row1["event_venue"],"date"=>$row1["event_date"],"metRequire"=>$require0,"totRequire"=>$require1,"contact"=>$row1["event_contact"]);
   }
    
    }
    elseif($sDate=="")
    {
        $sql1 = "SELECT * FROM  tbl_event WHERE (event_date<='$eDate') AND (event_name LIKE '$evName%' OR event_name='$evName') AND (ev_id='$evid') ORDER BY event_date DESC;";

    $result1 = mysqli_query($conn, $sql1);
           while($row1 = mysqli_fetch_array($result1))
        
             {
               $requirement=$row1["event_requirement"];

        $requireMet=explode('!~',$requirement);
                // print_r($requireMet);
             $i = 0;
                foreach($requireMet as $value)
                {
                ${'require'.$i} = $value;
                 $i++;
                //echo $i."<p>";
             
                }
 
//echo $require0;
//echo $require1;
                $success = "successful";
                $response[$count++] = array("id"=>$row1["event_id"],"type"=>$evtype,"name"=>$row1["event_name"],"venue"=>$row1["event_venue"],"date"=>$row1["event_date"],"metRequire"=>$require0,"totRequire"=>$require1,"contact"=>$row1["event_contact"]);
   }
    }
    else
    {
        $sql1 = "SELECT * FROM  tbl_event WHERE (event_date>='$sDate' AND event_date<='$eDate') AND (event_name LIKE '$evName%' OR event_name='$evName') AND (ev_id='$evid') ORDER BY event_date DESC;";

    $result1 = mysqli_query($conn, $sql1);
           while($row1 = mysqli_fetch_array($result1))
        
             {
               $requirement=$row1["event_requirement"];

        $requireMet=explode('!~',$requirement);
                // print_r($requireMet);
             $i = 0;
                foreach($requireMet as $value)
                {
                ${'require'.$i} = $value;
                 $i++;
                //echo $i."<p>";
             
                }
 
//echo $require0;
//echo $require1;
                $success = "successful";
                $response[$count++] = array("id"=>$row1["event_id"],"type"=>$evtype,"name"=>$row1["event_name"],"venue"=>$row1["event_venue"],"date"=>$row1["event_date"],"metRequire"=>$require0,"totRequire"=>$require1,"contact"=>$row1["event_contact"]);
   }
    }
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
?>