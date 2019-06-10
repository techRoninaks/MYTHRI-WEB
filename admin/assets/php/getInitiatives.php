<?php
    include("C:/xampp/htdocs/mythri/init.php");
    $success = "unsuccessful";
    $sql_query = "select * from tbl_event  order by event_id desc;";
    $result = mysqli_query($conn, $sql_query);
    $response = array();
    $count = 0;
    while($row = mysqli_fetch_array($result)){
        $ev_id=$row["ev_id"];
        $requirement=$row["event_requirement"];

        $requireMet=explode('!~',$requirement);
                 //print_r($requireMet);
             $i = 0;
                foreach($requireMet as $value){
                ${'require'.$i} = $value;
                 $i++;
                //echo $i."<p>";
             }

 
//echo $require0;
//echo $require1;



        $sql_query1="select ev_type from tbl_evtype where ev_id='".$ev_id."'";
        $result1=mysqli_query($conn,$sql_query1);
        while($row1=mysqli_fetch_array($result1))
        {
        $success = "successful";
        $response[$count++] = array("id"=>$row["event_id"],"type"=>$row1["ev_type"],"name"=>$row["event_name"],"venue"=>$row["event_venue"],"date"=>$row["event_date"],"metRequire"=>$require0,"totRequire"=>$require1,"contact"=>$row["event_contact"]);
        }
    }
    $result = array("success"=>$success, "result"=>$response);
    echo json_encode(array("data"=>$result));
    //,"premium"=>$row["premium"]
?>
