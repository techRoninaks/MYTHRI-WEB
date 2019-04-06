<!DOCTYPE html>
<html>
<head>
  <title id="title">individual 1</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/head1.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <style>
    body, html {
      font-family: defaultBarlow;

      background:white;
    }
    * {
      box-sizing: border-box;

    }

    /* Create two equal columns that floats next to each other */
    .column {
      float: left;
      width: 50%;
      
    /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    .content_listing {
      max-width: 600px;
      margin: auto;
      background: white;
      font-size: 18px;

    }
    .content1{
      line-height: 15px;
    }
    
    .cls-anchor {
      text-decoration:none;
      color: rgb(180, 180, 180);
      display: inline-block;

    }
    .cls-anchor:hover{
    color: black;
    }

    .previous {
      background-color: #f2f2f2;
      color: black;
    }

    .next {
      background-color: #f2f2f2;
      color: black;
    }

    .round{
      padding: 2px;
      width:40px;
      height:40px;
      text-align: center;
    }
    .previous:hover {
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
    }
    .next:hover {
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
    }
    div.absolute{
      line-height: 1px;
      padding-bottom: 18px;
    }
    .img-main {
      display: block;
      width: 100%;
      height: 350px;
    }
    .btns {
      background-color:  #f2f2f2;
      border: none;
      color: black;
      width:25%;
      height: 30px;
      /*min-width:25px; */
      /*padding: 12px 32px;*/
      text-align:center;
      display: inline-block;
      cursor: pointer;
      font-size: 1.3rem;
      font-family: defaultBarlowBold;
      margin-left: 10px;
      margin-right: 10px;
    }
    .btns:hover {
      background-color: #008CBA;
      color: white;
    }
    .content-text {
      font-size: 1.3rem;
      color:rgb(100,100,100);
      font-family: defaultBarlowBold;
    }
  </style>

</head>
<body>
  <div w3-include-html="head1.html"></div>
  
  <?php
  
  ini_set('display_errors',0);
  ini_set('display_startup_errors', 0);
  error_reporting(E_ALL);
  
 require "init.php";


 
      if(isset($_GET["ev_id"]) && isset($_GET["type"])){


        

          $evid=$_GET['ev_id'];
          $qtype=$_GET['type'];
     


       if($qtype=="care_centers")
       {

          $sql = "SELECT * FROM tbl_carectr where ev_id=(SELECT ev_id FROM tbl_evtype where ev_id='$evid')";
          $result =mysqli_query($conn,$sql);
  
          while($row=mysqli_fetch_array($result)){
            $venue=$row['cc_venue'];
            $title=$row['cc_title'];
            $strength=$row['cc_strength'];
            $contact=$row['cc_contact'];
            $id=$row['cc_id'];
            $des=$row['cc_des'];
          }
        }
        
       else 
       {
          $sql = "SELECT * FROM tbl_event where ev_id=(SELECT ev_id FROM tbl_evtype where ev_id='$evid')";
          $result =mysqli_query($conn,$sql);
          while($row=mysqli_fetch_array($result)){
          
          $title=$row['event_title'];        
          $venue=$row['event_venue'];
          $date=$row['event_date'];
          $title=$row['event_title'];
          $contact=$row['event_contact'];
          $id=$row['event_id'];
          $des=$row['event_des'];
          $total=$row['event_total'];
          $needed=$row['event_needed'];
          $aa=$total-$needed;
          $progress=round(($aa/$total)*100,1);

        }
       }       


 
  ?>
  <div id="divBreadCrumbs" style="margin-left: 5%; margin-right: 5%; vertical-align: middle; margin-top: 48px;">
    <p class="spnBreadCrumbs"><a href="home.html" class="spnBreadCrumbs">HOME</a> > <a href="cate_listing.html?cat_type=<?php echo $_GET['type'] ?>&pg_no=1" class="spnBreadCrumbs" id="links">CARE CENTERS</a> ><?php echo $title ?></p>
    <hr/>
  </div>
  <div class="content_listing" >
    <div class="row">
      <div class="column" style="background-color:white;" >
        <h3><strong style="font-size: 18px;color: #000000;opacity:82%; font-family: defaultBarlowBold !important;" id="heading">
          <?php echo $title ?></strong></h3>
        <div class="content1" style="margin-top:24px;">
          <h5 class="content-text" id="venue" style="display:inline;"><strong id="place" style="display:inline;" >VENUE:</strong><strong><?php echo $venue ?></strong> </h5>
            <h5 class="content-text" id="date" ><strong id="dates" style="display:inline;">DATE:</strong><strong style="text-transform: uppercase"><?php echo date('d M Y',strtotime($date)) ?></strong> </h5>
          <h5 class="content-text" id="strength"><strong> STRENGTH : <?php echo $strength ?></strong> </h4>
          <h5 class="content-text" id="contact"><strong> CONTACT:<?php echo $contact ?></strong> </h4>
        </div>
      </div>
      <div class="column" style="background-color:white;padding-left:40px" >
        <h2 align=right> 
          <a href=" " class="previous round cls-anchor">&#8249;</a>
          <a href=" " class="next round cls-anchor" style="align-content: center;">&#8250;</a>
        </h2>
        <br>
        <div class="absolute" id="progress">
          <p style="line-height:18px; text-align:right;" class="content-text">
            <strong>Need Rs.<?php echo $total ?> more of Rs.<?php echo $needed ?></strong> 
          </p>
          <div class="outter" >
            <div class="inner"  >
            </div>
        </div>
        </div>
        </div>
    </div>
    
    <div class="row">
      <img src="assets/images/<?php echo $id ?>.jpg" alt="download1.jpg"  align="center" class="img-main">
    </div>
    <div align="center" style="margin: 20px;">
        <button class="btns" onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" id="donate">
        <strong>DONATE</strong> 
        </button> 
        <button class="btns" onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" id="volunteer">
        <strong>VOLUNTEER</strong>
        </button>
    </div>
    <div class="row">
      <p align="justify"  id="des" style="color:rgb(120,120,120);line-height:150%;font-size:1.3rem; "><?php echo $des ?></p>
    </div>
    <br>
  </div>
  <?php

  
}

 
 else
 {
   header("Location:error.php?error-code=404");

 }

 
  ?>

   <div w3-include-html="footer.html" style="margin-top: 24px;"></div>
  <script type="text/javascript">
    includeHTML();
  </script>
</body>
</html>
 <?php
 $total=54000;
 $need=36000;
 $aa=$total-$need;
 $person=round(($aa/$total)*100,1);
 ?>
 <style type="text/css">
 .outter {
  
  background-color:#f1f1f1;
  height:12px;
  width: 100%;
  
  padding-top: 0;

 }
 .inner {

  height:12px;
  width: <?php echo $progress ?>%;
 padding-top:0;

 background-color: orange;
}

 </style>
 <script type="text/javascript">
  includeHTML();
  var qryType = "";
  var qryEvId = "";
  var qryStrings = getQueryString();
  qryStrings.forEach(element => {
    if(element.startsWith('type')){
      qryType = element.split('=')[1];
      showForm();
    }
    else if(element.startsWith('ev_id')){
      qryEvId = element.split('=')[1];
    }
  });


function showForm(){
    switch(qryType){
    case "donate":{
      $('#title').text('Donate');
      $('#strength').css('display', 'none');
      $('#volunteer').css('display', 'none');
      document.getElementById("links").innerHTML = "INITIATIVES";
      qryEvId =1;
      break;
    }
    case "janananma":{
      $('#title').text('Janananma');
      $('#strength').css('display', 'none');
      document.getElementById("links").innerHTML = "INITIATIVES";
      qryEvId =2;
      break;
    }
    case "care_centers":{
      $('#title').text('Care centers');
      $('#dates').css('display', 'none');
      $('#date').css('display', 'none');
      $('#place').css('display', 'none');
      $('#progress').css('display', 'none');
      document.getElementById("links").innerHTML = "CARE CENTERS";
      qryEvId =3;
      break;
    }
    case "events":{
      $('#title').text('Events');
      $('#strength').css('display', 'none');
      document.getElementById("links").innerHTML = "EVENTS";
      document.getElementById("heading").innerHTML = "A DAY FOR SPECIAL ONES";
      qryEvId =4;
      break;
    }
    case "volunteer":{
      $('#title').text('Volunteer');
      $('#strength').css('display', 'none');
      $('#donate').css('display', 'none');
      $('#progress').css('display', 'none');
      document.getElementById("links").innerHTML = "INITIATIVES";
      qryEvId =5;
      break;
    }
  }
  }

</script>