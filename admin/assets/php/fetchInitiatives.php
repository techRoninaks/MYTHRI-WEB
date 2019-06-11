<?php
    include("init.php");
    header("Content-Type: application/json; charset=UTF-8");
	
	$id = $_POST["id"];
    //$id=11;
    $sql="SELECT * FROM `tbl_event`,`tbl_evtype` WHERE tbl_event.event_id=$id AND tbl_event.ev_id=tbl_evtype.ev_id;";
    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result);
    if($row){
        // $evid=$row['ev_id'];
        // $evname=$row['event_name'];
        // $evvenue=$row['event_venue'];
        // $evdate=$row['event_date'];
        // $evcont=$row['event_contact'];
        // $evdes=$row['event_des'];
        // $evimg=$row['event_img'];
        //echo $evid;
        $requirement=$row['event_requirement'];
        $evtype= $row["ev_type"];
       // echo $evtype;
        $requireMet=explode('!~',$requirement,3);
        $i = 0;
         foreach($requireMet as $value){
        ${'require'.$i} = $value;
        $i++;
        }
        //echo $require0;
        //echo $require1;
// }
// $sql1="SELECT * FROM 'tbl_evtype' WHERE 'ev_id'=$evid;";
//          $result1=mysqli_query($conn,$sql1);
//                 $row1 = mysqli_fetch_array($result1);
//                 if($row1){
$eDate=$row["event_date"];

//$curDate=date_format($evDate,"m-d-Y H:i:s");
//$curDate=$date->format('YYYY-MM-DDTkk:mm');
//echo $curDate;
$curDate=strftime('%Y-%m-%dT%H:%M:%S',strtotime($eDate));
    
    

$userData = array("id"=>$id,"eventName"=>$row["event_name"],"typeName"=>$row["ev_type"],"venueName"=>$row["event_venue"],"curDate"=>$curDate,"metRequire"=>$require0,"totalRequire"=>$require1,"contactNo"=>$row["event_contact"],"eventDes"=>$row["event_des"]);
            $jsonData = json_encode($userData);
            echo $jsonData;
    	}            


     else {
	    echo "0";
	               }
               
?>