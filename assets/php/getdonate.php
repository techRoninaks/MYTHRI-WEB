<?php
        require "../../init.php";//needed for connection with database
        
        // $sql_query =  "SELECT * FROM `tbl_event` WHERE `ev_id` = 1 ";//SQL command
        $response = array();
        $data = array();
        $success = "unsuccessful";
        $count = 0;
        // $result = mysqli_query($con,$sql_query);
        // while($row=mysqli_fetch_array($result)){
        //     //  echo  nl2br($row[0] .":". $row[1].":".$row[2].":".$row[3].":".$row[4]."\n");//returning results 
        //     $success = "successful";
        //     $count = $count + 1;
        //     $response[0] = array("response"=>$success);  
        //     $response[$count] = array("event_id"=>$row[0],"ev_id"=>$row[1],"cccat_id"=>$row[2],"event_name"=>$row[3], "event_venue"=>$row[4], "event_date"=>$row[5], "contact"=>$row[6], "event_img"=>$row[7], "event_des"=>$row[8], "event_requirement"=>$row[9]);
        // }
        // echo ":"; WHERE `ev_id` = 1 
        // $data = array("1"=>$response);
        $sql_query =  "SELECT * FROM `tbl_event` WHERE `ev_id` = 2 ";//SQL command
        $count = 0;
        $result = mysqli_query($conn,$sql_query);
        while($row=mysqli_fetch_array($result)){
            //  echo  nl2br($row[0] .":". $row[1].":".$row[2].":".$row[3].":".$row[4]."\n");//returning results 
            $success = "successful";
            $count = $count + 1;
            $response[0] = array("response"=>$success);  
            $response[$count] = array("event_id"=>$row[0],"ev_id"=>$row[1],"cccat_id"=>$row[2],"event_name"=>$row[3], "event_venue"=>$row[4], "event_date"=>$row[5], "contact"=>$row[6], "event_img"=>$row[7], "event_des"=>$row[8], "event_requirement"=>$row[9]);
        }
        // $data = $data + array("2"=>$response);
        // $sql_query =  "SELECT * FROM `tbl_event` WHERE `ev_id` = 3 ";//SQL command
        // $count = 0;
        // $result = mysqli_query($con,$sql_query);
        // while($row=mysqli_fetch_array($result)){
        //     //  echo  nl2br($row[0] .":". $row[1].":".$row[2].":".$row[3].":".$row[4]."\n");//returning results 
        //     $success = "successful";
        //     $count = $count + 1;
        //     $response[0] = array("response"=>$success);  
        //     $response[$count] = array("event_id"=>$row[0],"ev_id"=>$row[1],"cccat_id"=>$row[2],"event_name"=>$row[3], "event_venue"=>$row[4], "event_date"=>$row[5], "contact"=>$row[6], "event_img"=>$row[7], "event_des"=>$row[8], "event_requirement"=>$row[9]);
        // }
        // $data = $data + array("3"=>$response);
        echo json_encode($response);
?> 