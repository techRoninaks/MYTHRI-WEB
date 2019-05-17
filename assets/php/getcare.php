<?php
        require "init.php";//needed for connection with database
        
        $sql_query =  "SELECT * FROM `tbl_carectr` ";//SQL command
        $response = array();
        $data = array();
        $success = "unsuccessful";
        $count = 0;
        $result = mysqli_query($conn,$sql_query);
        while($row=mysqli_fetch_array($result)){
            $success = "successful";
            $count = $count + 1;
            $response[0] = array("response"=>$success);  
            $response[$count] = array("cc_id"=>$row[0],"cccat_id"=>$row[1],"cc_venue"=>$row[2],"cc_strength"=>$row[3], "cc_contact"=>$row[4], "cc_img"=>$row[5], "cc_des"=>$row[6], "event_type"=>$row[7]);
        }
        
        echo json_encode($response);
?>