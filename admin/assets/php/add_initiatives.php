<?php
//session_start();
include("C:/xampp/htdocs/mythri/init.php");
$success = "unsuccessful";
    $initType = $_POST["iType"];
    $eName = $_POST["Name"];
    $eVenue=$_POST["Venue"];
    $eDate = $_POST["Date"];
    $eContact=$_POST["ContactNo"];
    $eRequireMet=$_POST["RequireMet"];
    $eRequireTotal=$_POST["RequireTotal"];
    $eDescribe=$_POST["Describe"];
    $eImage=$_POST["Image"];
   // echo $initType;

$a=0;
$b=0;

$requirements=$eRequireMet."!~".$eRequireTotal;
$cccat_id=1;
 
 //In order to check whether the same data already exist or not
 $sql1="SELECT  * FROM tbl_evtype WHERE ev_type='".$initType."'";
 $sql2="SELECT * FROM tbl_event  WHERE event_name='".$eName."' AND event_venue='".$eVenue."' AND event_date='".$eDate."' AND event_contact='".$eContact."' AND event_des='".$eDescribe."' AND event_requirement='".$requirements."'";
 
 $result_sql1=mysqli_query($conn,$sql1);
 $result_sql2=mysqli_query($conn,$sql2);
 $count_sql1=mysqli_num_rows($result_sql1);
 $count_sql2=mysqli_num_rows($result_sql2);

// echo $count_sql1;
 //echo $count_sql2;

//Adding to tbl_evtype
 if($count_sql1>0)
 {

 	$a=1;
 	//$_SESSION['msg']="Dupli";
 	//echo "Duplication in Initative type";
 }
 else
 {
 	$sql3="INSERT INTO tbl_evtype(ev_type)VALUES('".$initType."')";
	if(mysqli_query($conn,$sql3))
	{ 	
		//$_SESSION['msgl']="Success";
 		//echo "Record Added Initative type";
 		$a=1;
 		
 		}
	else
	{
		//$_SESSION['msgl']="Failed";
 		//echo "Failed Initiative type";
 		$count=0;
 		$a=0;
 	}
}

 
 $sql4="SELECT ev_id FROM tbl_evtype WHERE ev_type='".$initType."'";
		 	$result_sql4=mysqli_query($conn,$sql4);
				 	while($row=mysqli_fetch_array($result_sql4))
				 	{
				 		$initiative_id=$row["ev_id"];
				 		//echo $initiative_id;

				 	}
	

//Adding to tbl_event
if($count_sql2>0)
{
	//$b=1;
	$success="duplicate";
	//$_SESSION['msg2']="Dupli1";
	//echo "Duplicate Data is Entered";
}
else
{


	$sql6="SELECT MAX(event_id) FROM tbl_event;";
		$result_sql6=mysqli_query($conn,$sql6);
		
		while($row6=mysqli_fetch_array($result_sql6))
		
		{
			$last_event_id=$row6["MAX(event_id)"];
		}

			$imgid = $last_event_id + 1;
			//echo $imgid;


	$address = "../../../assets/images/initiatives/"."$imgid".".png";
	$sql5="INSERT INTO tbl_event(ev_id,cccat_id,event_name,event_venue,event_date,event_contact,event_des,event_requirement,event_img)VALUES('".$initiative_id."','".$cccat_id."','".$eName."','".$eVenue."','".$eDate."','".$eContact."','".$eDescribe."','".$requirements."','".$address."');";

	
	
$result_sql5=mysqli_query($conn,$sql5);
if($result_sql5)
	{
		//$_SESSION['msg3']="Success1";
		
		$b=1;
		//echo "Record Added Event Details";
	}
	else
	{
		$b=0;
		//$_SESSION['msg3']="Failed1";
		//echo "Failed Event Details";
	}


/**/
if($eImage!=null || $eImage!= "" ){
        $path = "../../../assets/images/initiatives/";
        $img = explode(",", $eImage);
        // echo $eImage;
        define('UPLOAD_DIR', $path);
        $img[1] = str_replace(' ', '+', $img[1]);
        $imgData = base64_decode($img[1]);
        $file = UPLOAD_DIR.$imgid.'.png';
        $success1 = file_put_contents($file, $imgData);
    if($success1){
            // echo "img";
        }
    }

if(($a==1) && ($b==1))
{
	//echo $a;
	//echo $b;
	$success="successful";
}
}
//echo $a;
//	echo $b;

$result = array("success"=>$success);
    echo json_encode(array("data"=>$result));

//mysqli_close($conn);
//header("Location:initiatives.html");
//echo $requirements;
?>

