function includeHTML() {
    var z, i, elmnt, file, xhttp;
    /* Loop through a collection of all HTML elements: */
    z = document.getElementsByTagName("*");
    for (i = 0; i < z.length; i++) {
      elmnt = z[i];
      /*search for elements with a certain atrribute:*/
      file = elmnt.getAttribute("w3-include-html");
      if (file) {
        /* Make an HTTP request using the attribute value as the file name: */
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
            if (this.status == 200) {elmnt.innerHTML = this.responseText;}
            if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
            /* Remove the attribute, and call this function once more: */
            elmnt.removeAttribute("w3-include-html");
            includeHTML();
          }
        }; 
        xhttp.open("GET", file, true);
        xhttp.send();
        /* Exit the function: */
        return;
      }
    }
}

function toggleBTN(){
  console.log("in func");
  var element = document.getElementById('dropmenu');
  if(element.classList.contains("show")){
    document.getElementById('dropmenu').classList.remove("show");
    document.getElementById('icon').classList.add("glyphicon-th");
    document.getElementById('icon').classList.remove("glyphicon-remove");
  }
  else{
    document.getElementById('dropmenu').classList.add("show");
    document.getElementById('icon').classList.remove("glyphicon-th");
    document.getElementById('icon').classList.add("glyphicon-remove");
  }
}

function getQueryString(){
  return document.URL.split('?')[1].split('&');
}

function loadtablerole(caller, page){
  var xhr =  new XMLHttpRequest();
  this.responseType = 'text';
  xhr.onreadystatechange  =  function() {
      
      var ourData = xhr.response;
      if (this.readyState == 4 && this.status == 200) {//if result successful
        var myObj = JSON.parse(this.responseText);
        
        switch (caller){
          case "janananma":
              janaload(myObj);
              break;
          case "donate":
              donateload(myObj);
              break;
          case "volunteer":
              volunteerload(myObj);
              break;
          case "home":
              homeload(myObj);
              break;
          case "care":
              careload(myObj);
              break;
          case "carehome":
              carehomeload(myObj);
              break;
          default:
            // homeload(myObj);
            break;
        }
      }
      
  };

  switch(caller){
    case "janananma":
            xhr.open("GET", "assets/php/getjana.php", true);
            xhr.setRequestHeader("Content-type", "text/plain");
            xhr.send();
            break;
    case "donate":
            xhr.open("GET", "assets/php/getdonate.php", true);
            xhr.setRequestHeader("Content-type", "text/plain");
            xhr.send();
            break;
    case "volunteer":
            xhr.open("GET", "assets/php/getvolunteer.php", true);
            xhr.setRequestHeader("Content-type", "text/plain");
            xhr.send();
            break;
    case "home":
          xhr.open("GET", "assets/php/gethome1.php", true);
          xhr.setRequestHeader("Content-type", "text/plain");
          xhr.send();
          break;
    case "care":
          xhr.open("GET", "assets/php/getcare.php", true);
          xhr.setRequestHeader("Content-type", "text/plain");
          xhr.send();
          break;
    case "carehome":
          xhr.open("GET", "assets/php/getcare.php", true);
          xhr.setRequestHeader("Content-type", "text/plain");
          xhr.send();
          break;
    default:

            break;
  }

  // xhr.open("GET", "assets/php/getjana.php", true);
  
  
}

function homeload(array){
  var data2 = "";
  var htmltemp ="";
  
  for(i = 1; i<array.length; i++){
    var data = array[i];
    switch(data["event_type"]){
      case "Jana&nbsp;Nanma":
              htmltemp = htmltemp + templateHomeJana(data, "janananma");
              break;
      case "Donate":
              htmltemp = htmltemp + templateHomeDoVol(data, "donate");
              break;
      case "Volunteer":
              htmltemp = htmltemp + templateHomeDoVol(data, "volunteer");
              break;
      default:
              ;
    }
   
    }
    //  console.log(htmltemp);
  document.getElementById('homerow1').innerHTML = htmltemp; 
  }

function careload(array){
  var data2 = "";
  var htmltemp ="";
  
  for(i = 1; i<array.length; i++){
    var data = array[i];
    htmltemp = htmltemp + templateCare(data, "care_centers");
    }
    
  document.getElementById('row1').innerHTML = htmltemp; 
  
  }

function carehomeload(array){
  var data2 = "";
  var htmltemp ="";
  
  for(i = 1; i<array.length; i++){
    var data = array[i];
    htmltemp = htmltemp + templateHomeCare(data, "care_centers");
    }
    
  document.getElementById('homerow2').innerHTML = htmltemp; 
  
  }
function janaload(array){
var data2 = "";
var htmltemp ="";

for(i = 1; i<array.length; i++){
  var data = array[i];
  htmltemp = htmltemp + templateJana(data, "janananma");
  }
  
document.getElementById('row1').innerHTML = htmltemp; 
}

function donateload(array){
  var data2 = "";
  var htmltemp ="";
  
  for(i = 1; i<array.length; i++){
    var data = array[i];
    htmltemp = htmltemp + templateDonVol(data, "donate");
    }
    
  document.getElementById('row1').innerHTML = htmltemp; 
  }

function volunteerload(array){
  var data2 = "";
  var htmltemp ="";
  
  for(i = 1; i<array.length; i++){
    var data = array[i];
    htmltemp = htmltemp + templateDonVol(data, "volunteer");
    }
    
  document.getElementById('row1').innerHTML = htmltemp; 
  }


function on() {
  document.getElementById("overlay1").style.display = "block";
}

function off() {
  
  document.getElementById("overlay1").style.display = "none";
  console.log("hell");
} 

function templateDonVol(data, type){
  var template ="";
  template +=  "<div class= col-md-3  id= donatetemp >"+
  "<a class= noa  href= forms.html?cat_type="+type+"&ev_id="+data["event_id"] +" >"+
    "<div class= container1 >"+
    " <img class= img-responsive   src= "+ data["event_img"] +"   alt= sample   style= width:350px;height:150px;>"+
        "<div class=  overlay  >"+
          "<div class=  text1  >"+type.toUpperCase()+""+
          "</div>"+
        "</div>"+
    "</div>"+
    "</a>"+
    "<br>"+
    "<a class= noa href= individuallisting.php?type="+type+"&ev_id="+data["event_id"] +" >"+
    "<div class=  text   align=  left  >"+         
      "<font style=  font-size:14; ><strong>"+data["event_name"]+"</strong></font>"+
      // "<font color= grey   size= -16 ;>"+
        "<h6>"+data["event_date"]+", "+data["event_venue"]+", "+data["contact"]+"</h6>"+
      "</font>"+
      "<p style= width:240px;height:60px;  >"+
        "<font size= -18   color= grey  ;>"
          +data["event_des"]+           
        "</font>"+
      "</p> "+
    "</div>"+
    "</a>"+
    "<font size= -16  ><strong>Need Rs.12,000 more of Rs.40,000</strong></font>"+
    "<div class= progressbar >"+
      "<div class= progressbarx >"+
      "</div>"+
    "</div>"+
    "</div>";
    return template;
}

function templateJana(data, type){
  var template = "";
  template += "<div class= col-md-3  id= donatetemp >"+
  "<a class= noa  href= individuallisting.php?type="+type+"&ev_id="+data["event_id"] +">"+
    "<div class= container1  id= janatemp  >"+
    " <img class= img-responsive   src= "+ data["event_img"] +"   alt= sample   style= width:350px;height:150px;>"+
        "<div class=  overlay  >"+
          "<div class=  text1  >Read more"+
          "</div>"+
        "</div>"+
    "</div>"+
    "<br>"+
    "<div class=  text   align=  left  >"+         
      "<font style=  font-size:14; ><strong>"+data["event_name"]+"</strong></font>"+
      "<font color= grey   size= -16 ;>"+
        "<h6>"+data["event_date"]+", "+data["event_venue"]+", "+data["contact"]+"</h6>"+
      "</font>"+
      "<p style= width:240px;height:60px;  >"+
        "<font size= -18   color= grey  ;>"
          +data["event_des"]+           
        "</font>"+
      "</p> "+
    "</div>"+
    "<font size= -16  ><strong>Need Rs.12,000 more of Rs.40,000</strong></font>"+
    "<div class= progressbar >"+
      "<div class= progressbarx >"+
      "</div>"+
    "</div>"+
    "<div id= overlay1 >"+
    "<div >"+
     "<div class= hovertext  click= off() ><a class= hovertext  href=  home.html > Read more</a></div>"+
      "</div>"+
    "</div>"+
    "</a>"+
    "</div>";

    return template;
}

function templateCare(data, type){
  var template = "";
  template += "<div class= col-md-3  id= donatetemp >"+
  "<a class= noa  href= individuallisting.php?type="+type+"&ev_id="+data["cc_id"] +">"+
    "<div class= container1  id= janatemp  >"+
    " <img class= img-responsive   src= "+ data["cc_img"] +"   alt= sample   style= width:350px;height:150px;>"+
        "<div class=  overlay  >"+
          "<div class=  text1  >Read more"+
          "</div>"+
        "</div>"+
    "</div>"+
    "<br>"+
    "<div class=  text   align=  left  >"+         
      // "<font style=  font-size:14; ><strong>"+data["cc_name"]+"</strong></font>"+
      "<font color= grey   size= -16 ;>"+
        "<h6>"+data["cc_venue"]+", "+data["cc_contact"]+"</h6>"+
      "</font>"+
      "<p style= width:240px;height:60px;  >"+
        "<font size= -18   color= grey  ;>"
          +data["cc_des"]+           
        "</font>"+
      "</p> "+
    "</div>"+
    "<font size= -16  ><strong>Need Rs.12,000 more of Rs.40,000</strong></font>"+
    "<div class= progressbar >"+
      "<div class= progressbarx >"+
      "</div>"+
    "</div>"+
    "<div id= overlay1 >"+
    "<div >"+
     "<div class= hovertext  click= off() ><a class= hovertext  href=  home.html > Read more</a></div>"+
      "</div>"+
    "</div>"+
    "</a>"+
    "</div>";

    return template;
}

function templateHomeJana(data, type){
  var template = ""; 
  template += "<div class= col-md-4  id= shadowB  >"+
  "<a class= noa href= individuallisting.php?type="+type+"&ev_id="+data["event_id"] +">"+
  "<div class=  hovereffect  >"+
  "<img class=  img-responsive  src=  "+ data["event_img"] +"   alt= sample  style=  width:350px;height:150px; >"+
    "<div class=  overlay11   style=  margin-top:-100px;width:240px;height:35px; >"+
         "<h2 style=  width:250px; >"+data["event_type"]+"</h2>"+
  "</div>"+
"</div>"+
"<div class= text   align= left  style=  margin-top:20px; >"+
  "<font color= grey size= 2; >"+data["event_name"]+"</font>"+
  // "<font color= grey  size= -16 ; ></font>"+
  "<h6 style=  color:gray;  >"+data["event_date"]+", "+data["event_venue"]+", "+data["contact"]+"</h6>"+
   "<p style=  width:240px;height:80px;line-height:17px; ><font size= 2  color= grey ;>"
   +data["event_des"]+
    "</font></p>"+
"</div>"+
"<strong>need Rs 1200 more of Rs. 4000</strong>"+
"<div class=  progressbar  >"+
"<div class=  progressbarx  >"+
"</div>"+
"</div>"+
"</a>"+
"</div>";

// console.log(template+"\n");
return template;
}

function templateHomeDoVol(data, type){
  var template = ""; 
  template += "<div class= col-md-4 id= shadowB >"+
  "<a class= noa  href= forms.html?cat_type="+type+"&ev_id="+data["event_id"] +" >"+
  "<div class=  hovereffect  >"+
  "<img class=  img-responsive  src=  "+ data["event_img"] +"   alt= sample  style=  width:350px;height:150px; >"+
    "<div class=  overlay11   style=  margin-top:-100px;width:240px;height:35px; >"+
         "<h2 style=  width:250px; >"+data["event_type"]+"</h2>"+
  "</div>"+
"</div>"+
"</a>"+
"<a class= noa href= individuallisting.php?type="+type+"&ev_id="+data["event_id"] +" >"+
"<div class= text   align= left  style=  margin-top:20px; >"+
  "<font color= grey size= 2; >"+data["event_name"]+"</font>"+
  // "<font color= grey  size= -16 ; ></font>"+
  "<h6 style=  color:gray;  >"+data["event_date"]+", "+data["event_venue"]+", "+data["contact"]+"</h6>"+
   "<p style=  width:240px;height:80px;line-height:17px; ><font size= 2  color= grey ;>"
   +data["event_des"]+
    "</font></p>"+
"</div>"+
"</a>"+
"<strong>need Rs 1200 more of Rs. 4000</strong>"+
"<div class=  progressbar  >"+
"<div class=  progressbarx  >"+
"</div>"+
"</div>"+
"</div>"  ;
console.log(template+"\n");
return template;
}

function templateHomeCare(data, type){
  var template = ""; 
  template += "<div class= col-md-4  id= shadowB  >"+
  "<a class= noa href= individuallisting.php?type="+type+"&ev_id="+data["cc_id"] +">"+
  "<div class=  hovereffect  >"+
  "<img class=  img-responsive  src=  "+ data["cc_img"] +"   alt= sample  style=  width:350px;height:150px; >"+
    "<div class=  overlay11   style=  margin-top:-100px;width:240px;height:35px; >"+
         "<h2 style=  width:250px; >Care Centers</h2>"+
  "</div>"+
"</div>"+
"<div class= text   align= left  style=  margin-top:20px; >"+
  // "<font color= grey size= 2; >"+data["event_name"]+"</font>"+
  // "<font color= grey  size= -16 ; ></font>"+
  "<h6 style=  color:gray;  >"+data["cc_venue"]+", "+data["cc_contact"]+"</h6>"+
   "<p style=  width:240px;height:80px;line-height:17px; ><font size= 2  color= grey ;>"
   +data["cc_des"]+
    "</font></p>"+
"</div>"+
"<strong>need Rs 1200 more of Rs. 4000</strong>"+
"<div class=  progressbar  >"+
"<div class=  progressbarx  >"+
"</div>"+
"</div>"+
"</a>"+
"</div>";

// console.log(template+"\n");
return template;
}



