<?php
    include("C:/xampp/htdocs/mythri/init.php");
    $success = "unsuccessful";
    $sDate = $_POST["sDate"];
    $eDate = $_POST["eDate"];
    $evName = $_POST["eventName"];
    
    $response = array();
    $count = 0;
    if($eDate=="")
    {
     $sql_query = "SELECT * FROM tbl_event WHERE (event_date>='$sDate') AND (event_name LIKE '$evName%' OR event_name='$evName') ORDER BY event_date DESC;";
        $result = mysqli_query($conn, $sql_query);
             while($row = mysqli_fetch_array($result)){
                $evid=$row["ev_id"];
                $requirement=$row["event_requirement"];

        $requireMet=explode('!~',$requirement);
                 //print_r($requireMet);
             $i = 0;
                foreach($requireMet as $value){
                ${'require'.$i} = $value;
                 $i++;
                //echo $i."<p>";
                        }

                $sql_query1 = "SELECT * FROM  tbl_evtype WHERE ev_id='".$evid."';";
                $result1 = mysqli_query($conn, $sql_query1);
               while( $row1=mysqli_fetch_array($result1))
                
                {
                  $evtype=$row1["ev_type"]; 
                 }   
                $success = "successful";
                $response[$count++] = array("id"=>$row["event_id"],"type"=>$evtype,"name"=>$row["event_name"],"venue"=>$row["event_venue"],"date"=>$row["event_date"],"metRequire"=>$require0,"totRequire"=>$require1,"contact"=>$row["event_contact"]);
    }
}
elseif($sDate=="")
{
    $sql_query = "SELECT * FROM tbl_event WHERE ( event_date<='$eDate') AND (event_name LIKE '$evName%' OR event_name='$evName') ORDER BY event_date DESC;";
        $result = mysqli_query($conn, $sql_query);
             while($row = mysqli_fetch_array($result)){
                $evid=$row["ev_id"];
                $requirement=$row["event_requirement"];

        $requireMet=explode('!~',$requirement);
                 //print_r($requireMet);
             $i = 0;
                foreach($requireMet as $value){
                ${'require'.$i} = $value;
                 $i++;
                //echo $i."<p>";
                        }

                $sql_query1 = "SELECT * FROM  tbl_evtype WHERE ev_id='".$evid."';";
                $result1 = mysqli_query($conn, $sql_query1);
               while( $row1=mysqli_fetch_array($result1))
                
                {
                  $evtype=$row1["ev_type"]; 
                 }   
                $success = "successful";
                $response[$count++] = array("id"=>$row["event_id"],"type"=>$evtype,"name"=>$row["event_name"],"venue"=>$row["event_venue"],"date"=>$row["event_date"],"metRequire"=>$require0,"totRequire"=>$require1,"contact"=>$row["event_contact"]);
    }
}
else
{
    $sql_query = "SELECT * FROM tbl_event WHERE (event_date>='$sDate' AND event_date<='$eDate') AND (event_name LIKE '$evName%' OR event_name='$evName') ORDER BY event_date DESC;";
        $result = mysqli_query($conn, $sql_query);
             while($row = mysqli_fetch_array($result)){
                $evid=$row["ev_id"];
                $requirement=$row["event_requirement"];

        $requireMet=explode('!~',$requirement);
                 //print_r($requireMet);
             $i = 0;
                foreach($requireMet as $value){
                ${'require'.$i} = $value;
                 $i++;
                //echo $i."<p>";
                        }

                $sql_query1 = "SELECT * FROM  tbl_evtype WHERE ev_id='".$evid."';";
                $result1 = mysqli_query($conn, $sql_query1);
               while( $row1=mysqli_fetch_array($result1))
                
                {
                  $evtype=$row1["ev_type"]; 
                 }   
                $success = "successful";
                $response[$count++] = array("id"=>$row["event_id"],"type"=>$evtype,"name"=>$row["event_name"],"venue"=>$row["event_venue"],"date"=>$row["event_date"],"metRequire"=>$require0,"totRequire"=>$require1,"contact"=>$row["event_contact"]);
    }
}
    
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
?>