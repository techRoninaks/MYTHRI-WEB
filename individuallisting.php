<!DOCTYPE html>
<html><title>individual 1</title>
<head>
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
  <div id="divBreadCrumbs" style="margin-left: 5%; margin-right: 5%; vertical-align: middle; margin-top: 48px;">
    <p class="spnBreadCrumbs"><a href="home.html" class="spnBreadCrumbs">HOME</a> > <a href="cate_listing.html?cat_type=care_centers&pg_no=1" class="spnBreadCrumbs">CARE CENTERS</a> > BOYS HOME</p>
    <hr/>
  </div>
  
  <div class="content_listing" >
    <div class="row">
      <div class="column" style="background-color:white;" >
        <h3><strong style="font-size: 18px;color: #000000;opacity:82%; font-family: defaultBarlowBold !important;">BOYS HOME</strong></h3>
        <div class="content1" style="margin-top:24px;">
          <h5 class="content-text"><strong>GURUVAYOUR</strong> </h4>
          <h5 class="content-text"><strong> STRENGTH : 32</strong> </h4>
          <h5 class="content-text"><strong> CONTACT:1478523697</strong> </h4>
        </div>
      </div>
      <div class="column" style="background-color:white;padding-left:40px" >
        <h2 align=right> 
          <a href=" " class="previous round cls-anchor">&#8249;</a>
          <a href=" " class="next round cls-anchor" style="align-content: center;">&#8250;</a>
        </h2>
        <br>
        <div class="absolute">
          <p style="line-height:18px; text-align:right;" class="content-text">
            <strong>Need Rs.36000 more of Rs.54000</strong> 
          </p>
          <div class="outter" >
            <div class="inner"  >
            </div>
        </div>
        </div>
        </div>
    </div>
    <div class="row">
      <img src="assets/images/download1.jpg" alt="download1.jpg"  align="center" class="img-main">
    </div>
    <div align="center" style="margin: 20px;">
        <button class="btns" onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'">
        <strong>DONATE</strong> 
        </button> 
        <button class="btns" onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'">
        <strong>VOLUNTEER</strong>
        </button>
    </div>
    <div class="row">
      <p align="justify"style="color:rgb(120,120,120);line-height:150%;font-size:1.3rem;">Content inside this container is centered horizontally.Learn how to create an responsive image with CSS.Responsive images will automatically adjust to fit the size of the screen.Resize the browser window to see the responsive effect:</p>
    </div>
    <br>
  </div>
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
  width: <?php echo $person ?>%;
 padding-top:0;

 background-color: orange;
}

 </style>