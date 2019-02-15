<!DOCTYPE html>
<html><title>11.php</title>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body, html {
  height: 100%;
  font-family: calibri;

  background:white;
}
* {
  box-sizing: border-box;

}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  
  height: 50%;
/* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.content {
max-width: 600px;
  height: 100%;
  margin: auto;
  background: white;
  padding-left: 10px;
  padding-right: 10px;
  font-size: 18px;

}
.content1{
  line-height: 15px;
}
a {

  text-decoration:none;
  display: inline-block;
  padding: 8px 16px;
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
}
.next:hover {
  background-color: #4CAF50;
  color: white;
}
div.absolute{
  line-height: 1px;
  padding-bottom: 18px;
}

img {
  display: block;
 max-height:40%;
 image-width: 45%;
  margin-left: auto;
  margin-right: auto;
}
button {
  background-color:  #f2f2f2;
  border: none;
  color: black;
  width:40%;
  height: 40px;
  /*min-width:25px; */
  /*padding: 12px 32px;*/
  text-align:center;

  display: inline-block;

  margin: 4px 2px;
  cursor: pointer;
}
button:hover {
  background-color: #008CBA;
  color: white;
</style>

</head>
<body>

  <p style="font-size:px; color: black"><strong style="font-size: 18px; color:rgb(180, 180, 180)">HOME>EVENTS>A DAY FOR THE SPECIAL ONES</strong><hr>
  </p>
  
  <div class="content" >
   <div class="row">
   <div class="column" style="background-color:white;align-content: margin-left;" >
    
     <h3><strong style="font-size: 25px;color: #000000;opacity: 82%">BOYS HOME</strong></h3>
     <div class="content1">
     <h4 style=" color:rgb(100,100,100)"><strong>GURUVAYOUR</strong> </h4>
     <h4 style="color:rgb(100,100,100)"><strong> STRENGTH : 32</strong> </h4>
     <h4 style="color:rgb(100,100,100)"><strong> CONTACT:1478523697</strong> </h4>
   </div>
   </div>
   <div class="column" style="background-color:white;padding-left:40px" >
      <h2 align=right> <a href="http://www.hyperlinkcode.com/button-links.phphttp://www.hyperlinkcode.com/button-links.php" class="previous round" >&#8249;</a>
                  <a href="http://www.hyperlinkcode.com/button-links.php" class="next round" style="align-content: center;">&#8250;</a></h2>
                  <br>
         <div class="absolute">
      <p style="color:rgb(100,100,100) ;line-height:18px; text-align:right;"><strong>Need Rs.36000 more of Rs.54000</strong> </p>
 
      <div class="outter" ><div class="inner"  ></div></div>
     </div>
    </div>
  </div>
<img src="assets/images/download1.jpg" alt="download1.jpg"  align="center" style="width:100%">
<br>

<div align="center">
 <button class="button" button style="margin-right: 20px" onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'"> <strong>DONATE</strong> </button> 
 <button class="button" onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'"> <strong>VOLUNTEER</strong></button>
</div>
<p align="justify"style="color:rgb(120,120,120);line-height:150%;" style="150%">Content inside this container is centered horizontally.Learn how to create an responsive image with CSS.Responsive images will automatically adjust to fit the size of the screen.Resize the browser window to see the responsive effect:</p>
<br>

</div>
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
  height:16px;
  width: 100%;
  
  padding-top: 0;

 }
 .inner {

  height:16px;
  width: <?php echo $person ?>%;
 padding-top:0;

 background-color: orange;
}

 </style>