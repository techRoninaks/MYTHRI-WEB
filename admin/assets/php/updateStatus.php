<?php

require "init.php";//needed for connection with database
    //php to update user info into database `admin_user`
    $Uid = $_POST["uid"];
    $Status=$_POST["status"];
    $sqtsid="";

    switch($Status)
    {case "Unassigned":$sqtsid=1;
        break;
     case 'Contacted' :$sqtsid=2;
        break;
     case 'Converted' :$sqtsid=3;
        break;
     case 'Rejected'  :$sqtsid=4;
        break;
    } 

    $sql_query =  "UPDATE tbl_enquiry SET enquiry_status='$Status',enqsts_id='$sqtsid' WHERE enquiry_id  = $Uid";//SQL command
    $result = mysqli_query($conn,$sql_query);
    //     echo $Username. $Type.$Password;
     echo $result;

       
?> 