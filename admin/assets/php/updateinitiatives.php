<?php
	include("C:/xampp/htdocs/mythri/init.php");
	header("Content-Type: application/json; charset=UTF-8");
	
	$dataJSON = $_POST["jsonObj"];
    $data = json_decode($dataJSON);
    // echo $dataJSON;


    

    $sql = "SELECT * FROM `tbl_event`,`tbl_evtype` WHERE ((tbl_event.event_id='$data->initiative_viewsOnEdit')AND (tbl_evtype.ev_type='$data->typeName')) ORDER BY event_date DESC";
   // echo $sql;
    $result = mysqli_query($conn,$sql);
    while(($row = mysqli_fetch_array($result))!=NULL)
    
    
    {
        $evid=$row["ev_id"];
        $metRequire="$data->metRequire";
    $totRequire="$data->totalRequire";
    
    //echo $metRequire;
    //echo $totRequire;
    //echo $evtype;
    $requirement=$metRequire."!~".$totRequire;

        $address = "../../../assets/images/initiatives/"."$data->initiative_viewsOnEdit".".png";
        $sql1 = "UPDATE tbl_event SET event_name='$data->eventName',ev_id='$evid',event_venue='$data->venueName',event_date='$data->curDate',event_des='$data->eventDes',event_contact='$data->contactNo',event_requirement='$requirement',event_img='$address' WHERE event_id='$data->initiative_viewsOnEdit'";
    }
    
   if($data->image!=null || $data->image!= "" ){
        $path = "../../../assets/images/initiatives/";
        $img = explode(",", $data->image);
        // echo $data->image;
        define('UPLOAD_DIR', $path);
        $img[1] = str_replace(' ', '+', $img[1]);
        $imgData = base64_decode($img[1]);
        $file = UPLOAD_DIR.$data->initiative_viewsOnEdit.'.png';
        $success = file_put_contents($file, $imgData);
        if($success){
            // echo "img";
        }
    }
    // echo $sql1;
    $result1 = mysqli_query($conn,$sql1);

    // var_dump($result);
    if($result1){
        echo '1';
    }

    //,profile_table.union='$data->unionName',address='$data->addName',state='$data->stateName',country='$data->countryName',pincode='$data->pincode',phone='$data->primaryPhone',phone2='$data->secondaryPhone',whatapp='$data->whatsappPhone',email='$data->eMail',website='$data->webSite',skils='$data->skillName',password='$data->password',profile_image='$address'
?>