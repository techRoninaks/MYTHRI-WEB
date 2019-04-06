<?php
        require "../../init.php";//needed for connection with database
        
        $sql_query =  "SELECT E.*,T.ev_type FROM tbl_event as E JOIN tbl_evtype as T ON E.ev_id=T.ev_id ORDER BY `E`.`event_date` DESC   ";//SQL command
        $response = array();
        $data = array();
        $success = "unsuccessful";
        $count = 0;
        $result = mysqli_query($conn,$sql_query);
        while($row=mysqli_fetch_array($result)){
            //  echo  nl2br($row[0] .":". $row[1].":".$row[2].":".$row[3].":".$row[4]."\n");//returning results 
            $success = "successful";
            $count = $count + 1;
            if($count > 3){
                break;
            }
            $response[0] = array("response"=>$success);  
            $response[$count] = array("event_id"=>$row[0],"ev_id"=>$row[1],"cccat_id"=>$row[2],"event_name"=>$row[3], "event_venue"=>$row[4], "event_date"=>$row[5], "contact"=>$row[6], "event_img"=>$row[7], "event_des"=>$row[8], "event_requirement"=>$row[9], "event_type"=>$row[10]);
        }
        echo json_encode($response);
?> 