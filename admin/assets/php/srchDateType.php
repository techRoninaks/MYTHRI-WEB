<?php
    include("C:/xampp/htdocs/mythri/init.php");
    $success = "unsuccessful";
    $sDate = $_POST["sDate"];
    $eDate = $_POST["eDate"];
    $inType = $_POST["inType"];
    
    $response = array();
    $count = 0;
     $sql_query = "SELECT * FROM tbl_evtype WHERE ev_type='".$inType."';";
                $result = mysqli_query($conn, $sql_query);
                while($row=mysqli_fetch_array($result))
                {
                    $evid=$row["ev_id"];
                }
      if($eDate=="")
      {    
     $sql_query1 = "SELECT * FROM  tbl_event WHERE (event_date>='$sDate') AND (ev_id='$evid') ORDER BY event_date DESC;";
        $result1 = mysqli_query($conn, $sql_query1);
             while($row1 = mysqli_fetch_array($result1)){
                   $success = "successful";

                   $requirement=$row1["event_requirement"];

        $requireMet=explode('!~',$requirement);
                 //print_r($requireMet);
             $i = 0;
                foreach($requireMet as $value){
                ${'require'.$i} = $value;
                 $i++;
                //echo $i."<p>";
             }
                $response[$count++] = array("id"=>$row1["event_id"],"type"=>$inType,"name"=>$row1["event_name"],"venue"=>$row1["event_venue"],"date"=>$row1["event_date"],"metRequire"=>$require0,"totRequire"=>$require1,"contact"=>$row1["event_contact"]);
    }
    }
    elseif ($sDate=="") {

         $sql_query1 = "SELECT * FROM  tbl_event WHERE (event_date<='$eDate') AND (ev_id='$evid') ORDER BY event_date DESC;";
        $result1 = mysqli_query($conn, $sql_query1);
             while($row1 = mysqli_fetch_array($result1)){
                   $success = "successful";

                   $requirement=$row1["event_requirement"];

        $requireMet=explode('!~',$requirement);
                 //print_r($requireMet);
             $i = 0;
                foreach($requireMet as $value){
                ${'require'.$i} = $value;
                 $i++;
                //echo $i."<p>";
             }
                $response[$count++] = array("id"=>$row1["event_id"],"type"=>$inType,"name"=>$row1["event_name"],"venue"=>$row1["event_venue"],"date"=>$row1["event_date"],"metRequire"=>$require0,"totRequire"=>$require1,"contact"=>$row1["event_contact"]);
    }
    
        # code...
    }
    else
    {
         $sql_query1 = "SELECT * FROM  tbl_event WHERE (event_date>='$sDate' AND event_date<='$eDate') AND (ev_id='$evid') ORDER BY event_date DESC;";
        $result1 = mysqli_query($conn, $sql_query1);
             while($row1 = mysqli_fetch_array($result1)){
                   $success = "successful";

                   $requirement=$row1["event_requirement"];

        $requireMet=explode('!~',$requirement);
                 //print_r($requireMet);
             $i = 0;
                foreach($requireMet as $value){
                ${'require'.$i} = $value;
                 $i++;
                //echo $i."<p>";
             }
                $response[$count++] = array("id"=>$row1["event_id"],"type"=>$inType,"name"=>$row1["event_name"],"venue"=>$row1["event_venue"],"date"=>$row1["event_date"],"metRequire"=>$require0,"totRequire"=>$require1,"contact"=>$row1["event_contact"]);
    }
    
    }
    
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
?>