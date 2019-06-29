var dataArray = [];

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
  // console.log("in func");
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
  var temp = document.URL.split('?');
  if(temp.length > 1){
    return temp[1].split('&');
  }
  return [];
}

function loadtablerole(caller, page = 1){
  var xhr =  new XMLHttpRequest();
  this.responseType = 'text';
  xhr.onreadystatechange  =  function() {
      
      var ourData = xhr.response;
      if (this.readyState == 4 && this.status == 200) {//if result successful
        var myObj = JSON.parse(this.responseText);
        if(window.location.href.toLowerCase().includes("cate_listing.html")){
          pagination(page, myObj[0].total_pages);
        }
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
          case "events":
            eventload(myObj);
            break;
          case "news":
            newsload(myObj);
            break;
          default:
            // homeload(myObj);
            break;
        }
      }
      
  };

  switch(caller){
    case "janananma":
      xhr.open("GET", "assets/php/getjana.php?page=" + page, true);
      xhr.setRequestHeader("Content-type", "text/plain");
      xhr.send();
      break;
    case "donate":
      xhr.open("GET", "assets/php/getdonate.php?page=" + page, true);
      xhr.setRequestHeader("Content-type", "text/plain");
      xhr.send();
      break;
    case "volunteer":
      xhr.open("GET", "assets/php/getvolunteer.php?page=" + page, true);
      xhr.setRequestHeader("Content-type", "text/plain");
      xhr.send();
      break;
    case "home":
      xhr.open("GET", "assets/php/gethome1.php", true);
      xhr.setRequestHeader("Content-type", "text/plain");
      xhr.send();
      break;
    case "care":
      xhr.open("GET", "assets/php/getcare.php?page=" + page, true);
      xhr.setRequestHeader("Content-type", "text/plain");
      xhr.send();
      break;
    case "carehome":
      xhr.open("GET", "assets/php/getcare.php", true);
      xhr.setRequestHeader("Content-type", "text/plain");
      xhr.send();
      break;
    case "events":
      xhr.open("GET", "assets/php/getevents.php?page=" + page, true);
      xhr.setRequestHeader("Content-type", "text/plain");
      xhr.send();
      break;
    case "news":
      xhr.open("GET", "assets/php/getnews.php?page=" + page, true);
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
    // console.log(data["event_type"]);
    switch(data["event_type"].toLowerCase()){
      case "janananma":
              htmltemp = htmltemp + templateHomeJana(data, "janananma");
              break;
      case "donate":
              htmltemp = htmltemp + templateHomeDoVol(data, "donate");
              break;
      case "volunteer":
              htmltemp = htmltemp + templateHomeDoVol(data, "volunteer");
              break;
      default:
              ;
    }
   
    }
     // console.log(htmltemp);
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
  
  for(i = 1; i<=3; i++){
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

function eventload(array){
  var data2 = "";
  var htmltemp ="";
  
  for(i = 1; i<array.length; i++){
    var data = array[i];
    htmltemp = htmltemp + templateEvents(data, "events");
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

function newsload(array){
  var data2 = "";
  var htmltemp ="";
  
  for(i = 1; i<array.length; i++){
    var data = array[i];
    htmltemp = htmltemp + templateNews(data, "news");
    }
    
  document.getElementById('row1').innerHTML = htmltemp; 
}
function on() {
  document.getElementById("overlay1").style.display = "block";
}

function off() {
  
  document.getElementById("overlay1").style.display = "none";
  // console.log("hell");
} 

function templateDonVol(data, type){
  var requirements = data["event_requirement"].split("!~");
  var total = requirements[1];
  var needed = requirements[0];
  var template ="";
  template +=  "<div class= gallery  id= donatetemp >"+
  "<a class= noa  href= forms.html?cat_type="+type+"&ev_id="+data["event_id"] +" style=width:100%;>"+
    "<div class= container1 >"+
    " <img class= img-responsive   src= "+ data["event_img"] +"   alt=sample   style= width:100%;height:150px;>"+
        "<div class=  overlay  >"+
          "<div class=  text1  >"+type.toUpperCase()+""+
          "</div>"+
        "</div>"+
    "</div>"+
    "</a>"+
    "<br>"+
    "<a class= noa href= individual-listing.php?type="+type+"&ev_id="+data["event_id"] +" >"+
    "<div class=  text   align=  left  >"+         
      "<font style=  font-size:14; ><strong>"+data["event_name"]+"</strong></font>"+
      // "<font color= grey   size= -16 ;>"+
        "<h6 style=height:26px;color:gray;width:100%;>"+data["event_date"]+", "+data["event_venue"]+", "+data["contact"]+"</h6>"+
        "<p style=  width:100%;height:80px;line-height:17px;font-family:defaultBarlow;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;><font size= 2  color= grey ;>"
        +data["event_des"]+
         "</font></p>"+
    "</div>"+
    "</a>";
    if(type == "donate"){
      template += "<strong>Need Rs."+ needed +" more of Rs."+ total +"</strong>"+
      "<div class= progressbar >"+
      "<div class=  progressbarx  style='width:"+ (total == 0 ? 100 : (Number(needed)/Number(total))*100) +"%'>"+
        "</div>"+
      "</div>";
    }
    template += "</div>";
    return template;
}

function templateEvents(data, type){
  var template ="";
  template +=  "<div class= gallery  id= donatetemp >"+
  "<a class= noa  href= individual-listing.php?type="+type+"&ev_id="+data["event_id"] +" style=width:100%;>"+
    "<div class= container1 >"+
    " <img class= img-responsive   src= "+ data["event_img"] +"   alt=sample   style= width:100%;height:150px;>"+
        "<div class=  overlay  >"+
          "<div class=  text1  >"+"Read More"+""+
          "</div>"+
        "</div>"+
    "</div>"+
    "<br>"+
    "<div class=  text   align=  left  >"+         
      "<font style=  font-size:14; ><strong>"+data["event_name"]+"</strong></font>"+
      // "<font color= grey   size= -16 ;>"+
        "<h6 style=height:26px;color:gray;width:100%;>"+data["event_date"]+", "+data["event_venue"]+", "+data["contact"]+"</h6>"+
        "<p style=  width:100%;height:80px;line-height:17px;font-family:defaultBarlow;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;><font size= 2  color= grey ;>"
        +data["event_des"]+
         "</font></p>"+
    "</div>"+
    "</a>"+
    "</div>";
    return template;
}

function templateJana(data, type){
  var requirements = data["event_requirement"].split("!~");
  var total = requirements[1];
  var needed = requirements[0];
  var template = "";
  template += "<div class= gallery  id= donatetemp >"+
  "<a class= noa  href= individual-listing.php?type="+type+"&ev_id="+data["event_id"] +" style:100%>"+
    "<div class= container1  id= janatemp  >"+
    " <img class= img-responsive   src= "+ data["event_img"] +"   alt= sample   style= width:100%;height:150px;>"+
        "<div class=  overlay  >"+
          "<div class=  text1  >Read more"+
          "</div>"+
        "</div>"+
    "</div>"+
    "<br>"+
    "<div class=  text   align=  left  >"+         
      "<font style=  font-size:14; ><strong>"+data["event_name"]+"</strong></font>"+
        "<h6 style=height:26px;color:gray;width:100%>"+data["event_date"]+", "+data["event_venue"]+", "+data["contact"]+"</h6>"+
        "<p style=  width:100%;height:80px;line-height:17px;font-family:defaultBarlow;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;><font size= 2  color= grey ;>"
        +data["event_des"]+
         "</font></p>"+
    "</div>"+
    "<strong>Need Rs."+ needed +" more of Rs."+ total +"</strong>"+
    "<div class=  progressbar  >"+
    "<div class=  progressbarx  style='width:"+ (total == 0 ? 100 : (Number(needed)/Number(total))*100) +"%'>"+
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
  template += "<div class= gallery  id= donatetemp >"+
  "<a class=noa  href= individual-listing.php?type="+type+"&ev_id="+data["cc_id"] +" style=width:100%>"+
    "<div class= container1  id= janatemp  >"+
    " <img class= img-responsive   src= "+ data["cc_img"] +"   alt= sample   style= width:100%;height:150px;>"+
        "<div class=  overlay  >"+
          "<div class=  text1  >Read more"+
          "</div>"+
        "</div>"+
    "</div>"+
    "<div class=  text   align=  left  >"+         
      "<font style=  font-size:14; ><strong>"+data["cc_name"]+"</strong></font>"+
        "<h6 style=height:26px;color:gray;width:100%;>"+data["cc_venue"]+", "+data["cc_contact"]+"</h6>"+
        "<p style=  width:100%;height:80px;line-height:17px;font-family:defaultBarlow;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;><font size= 2  color= grey ;>"
        +data["cc_des"]+
         "</font></p>"+
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
  var requirements = data["event_requirement"].split("!~");
  var total = requirements[1];
  var needed = requirements[0];
  var template = ""; 
  template += "<div class= galleryHome  id= shadowB  >"+
  "<a class= noa href= individual-listing.php?type="+type+"&ev_id="+data["event_id"] +" style=width:100%>"+
  "<div class=  hovereffect  >"+
  "<img class=  img-responsive  src=  "+ data["event_img"] +"   alt= sample  style=  width:100%;height:150px; >"+
    "<div class=  overlay11   style=  margin-top:-100px;width:100%;height:35px; >"+
         "<h2 style=  width:100%; >"+data["event_type"]+"</h2>"+
  "</div>"+
"</div>"+
"<div class= text   align= left  style=  margin-top:20px; >"+
  "<font color= black size= 2; >"+data["event_name"]+"</font>"+
  // "<font color= grey  size= -16 ; ></font>"+
  "<h6 style=  color:gray;height:26px  >"+data["event_date"]+", "+data["event_venue"]+", "+data["contact"]+"</h6>"+
  "<p style=  width:100%;height:80px;line-height:17px;font-family:defaultBarlow;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;><font size= 2  color= grey ;>"
  +data["event_des"]+
   "</font></p>"+
"</div>"+
"<strong>Need Rs."+ needed +" more of Rs."+ total +"</strong>"+
"<div class=  progressbar  >"+
"<div class=  progressbarx  style='width:"+ (total == 0 ? 100 : (Number(needed)/Number(total))*100) +"%'>"+
"</div>"+
"</div>"+
"</a>"+
"</div>";

// console.log(template+"\n");
return template;
}

function templateHomeDoVol(data, type){
  var requirements = data["event_requirement"].split("!~");
  var total = requirements[1];
  var needed = requirements[0];
  var template = ""; 
  template += "<div class= galleryHome id= shadowB >"+
  "<a class= noa  href= forms.html?cat_type="+type+"&ev_id="+data["event_id"] +" style=width:100%>"+
  "<div class=  hovereffect  >"+
  "<img class=  img-responsive  src=  "+ data["event_img"] +"   alt= sample  style=  width:100%;height:150px; >"+
    "<div class=  overlay11   style=  margin-top:-100px;width:100%;height:35px; >"+
         "<h2 style=  width:100%; >"+data["event_type"]+"</h2>"+
  "</div>"+
"</div>"+
"</a>"+
"<a class= noa href= individual-listing.php?type="+type+"&ev_id="+data["event_id"] +" >"+
"<div class= text   align= left  style=  margin-top:20px; >"+
  "<font color= black size= 2; >"+data["event_name"]+"</font>"+
  // "<font color= grey  size= -16 ; ></font>"+
  "<h6 style=  color:gray;height:26px  >"+data["event_date"]+", "+data["event_venue"]+", "+data["contact"]+"</h6>"+
  "<p style=  width:100%;height:80px;line-height:17px;font-family:defaultBarlow;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;><font size= 2  color= grey ;>"
  +data["event_des"]+
   "</font></p>"+
"</div>"+
"</a>"+
"<strong>Need Rs."+ needed +" more of Rs."+ total +"</strong>"+
"<div class=  progressbar  >"+
"<div class=  progressbarx  style='width:"+ (total == 0 ? 100 : (Number(needed)/Number(total))*100) +"%'>"+
"</div>"+
"</div>"+
"</div>"  ;
// console.log(template+"\n");
return template;
}

function templateHomeCare(data, type){
  var template = ""; 
  template += "<div class= galleryHome  id= shadowB  >"+
  "<a class= noa href= individual-listing.php?type="+type+"&ev_id="+data["cc_id"] +" style=width:100%>"+
  "<div class=  hovereffect  >"+
  "<img class=  img-responsive  src=  "+ data["cc_img"] +"   alt= sample  style=  width:100%;height:150px; >"+
    "<div class=  overlay11   style=  margin-top:-100px;width:240px;height:35px; >"+
         "<h2 style=  width:250px; >Care Centers</h2>"+
  "</div>"+
"</div>"+
"<div class= text   align= left  style=  margin-top:20px; >"+
  "<font color=black size= 2; >"+data["cc_name"]+"</font>"+
  // "<font color= grey  size= -16 ; ></font>"+
  "<h6 style=  color:gray;height:26px  >"+data["cc_venue"]+", "+data["cc_contact"]+"</h6>"+
  "<p style=  width:100%;height:80px;line-height:17px;font-family:defaultBarlow;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;><font size= 2  color= grey ;>"
  +data["cc_des"]+
   "</font></p>"+
"</div>"+
"</a>"+
"</div>";

// console.log(template+"\n");
return template;
}

function templateNews(data, type){
  var template ="";
  template +=  "<div class= gallery  id= donatetemp >"+
  "<a class= noa  href= individual-listing.php?type="+type+"&ev_id="+data["news_id"] +" style=width:100%;>"+
    "<div class= container1 >"+
    " <img class= img-responsive   src= "+ data["news_img"] +"   alt=sample   style= width:100%;height:150px;>"+
        "<div class=  overlay  >"+
          "<div class=  text1  >"+"Read More"+""+
          "</div>"+
        "</div>"+
    "</div>"+
    "<br>"+
    "<div class=  text   align=  left  >"+         
      "<font style=  font-size:14; ><strong>"+data["news_title"]+"</strong></font>"+
      // "<font color= grey   size= -16 ;>"+
        "<h6 style=height:13px;color:gray;width:100%;>"+data["news_date"]+"</h6>"+
        "<p style=  width:100%;height:80px;line-height:17px;font-family:defaultBarlow;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;><font size= 2  color= grey ;>"
        +data["news_des"]+
         "</font></p>"+
    "</div>"+
    "</a>"+
    "</div>";
    return template;
}

function loadProfile(id,editCon = null){
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        
            if(editCon === null){
                document.getElementById("userName").innerHTML = myObj.userName;
                document.getElementById("userJob").innerHTML = myObj.userJob;
                document.getElementById("userMail").innerHTML = myObj.userMail;
                document.getElementById("userLoc").innerHTML = myObj.userLoc;
                document.getElementById("userPhone").innerHTML = myObj.userPhone;
                document.getElementById("userRating").innerHTML = myObj.userRating;
            } else {
                document.getElementById("editName").value = myObj.userName;
                document.getElementById("editJob").value = myObj.userJob;
                document.getElementById("editMail").innerHTML = myObj.userMail;
                document.getElementById("editLoc").value = myObj.userLoc;
                document.getElementById("editPhone").value = myObj.userPhone;
            }
        } 
    };
    xmlhttp.open("POST", "assets/php/fetchProfile.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id="+id);
}

function editProfile(){
        var x = document.getElementById("viewCard");
          if (x.style.display == "none") {
            x.style.display = "inline-block";
          } else {
            x.style.display = "none";
          }
        var y = document.getElementById("editCard");
          if (y.style.display == "none") {
            y.style.display = "inline-block";
          } else {
            y.style.display = "none";
          }
        var id = getCookie("userId=");
        loadProfile(id,1);
}

function updateProfile(){
    
    if(confirm("Confirm Profile Updation")){
        var data = [];
        data[0] =  document.getElementById("editName").value;
        data[1] =  document.getElementById("editJob").value;
        data[2] =  document.getElementById("editPhone").value;
        data[3] =  document.getElementById("editLoc").value;
        data[4] =  getCookie("userId=");
        var myObj = {"newName":data[0],"newJob":data[1],"newPhone":data[2],"newLoc":data[3],"userId":data[4]};
        var jSONObj = JSON.stringify(myObj);
        
        xhr =  new XMLHttpRequest();
        this.responseType = 'text';
        xhr.onreadystatechange  =  function() {
            var ourData = xhr.response;
            if (this.readyState == 4 && this.status == 200) {
                if(xhr.responseText == '1'){
                    alert("Update Successful!");
                    window.location.reload();
                } else {
                    alert("Update Failed! Try again!");
                }
            }
        };
        xhr.open("POST", "assets/php/updateProfile.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("jsonObj="+jSONObj);
    }
}

function loadEvents(selectId = 0){
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        var eveTable = "";
        
        for(i = 0; i< myObj.length; i++){
            eveTable += '<tr onclick="reDirect(&quot;individual-listing.php?type='+myObj[i].eveType+'&ev_id='+myObj[i].eveId+'&quot;,1)"><td><div style = "display:inline;"><div class = "col-sm-4"><img class="img-responsive" src = "'+myObj[i].eveImg+'"></div><div  class = "col-sm-8"><p id = "sgHead">'+myObj[i].eveName+'</p><p style = "font-size:1rem;" id = "sgDate">'+myObj[i].eveDate+'</p><p style = "font-size:1.3rem;text-align:justify;" id = "sgData">'+myObj[i].eveDes+'</p></div></di></td></a></tr>';
        }
        document.getElementById("sgTable").innerHTML = eveTable;
        }
    };
    xmlhttp.open("GET", "assets/php/fetchEvents.php", true);
    xmlhttp.send();
}

function loadActivity(){
    var id = getCookie("userId=");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            var actTable = "";
            for(i = 0; i< myObj.length; i++){
                actTable += '<tr id="'+myObj[i].evId+'"><td>'+myObj[i].eveName+'</td><tr><td style = "font-size:1rem;">'+myObj[i].eveDate+'</td></tr></tr>';
            }
            document.getElementById("tbActivityContent").innerHTML = actTable;
            document.getElementById("userRating").innerHTML = myObj[0].ehRating;
            document.getElementById("dvActivityCount").innerHTML = myObj[0].count;
        }
    };
    xmlhttp.open("POST", "assets/php/fetchActivity.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.send("id="+id);
}

// La Cookie Section

function reDirect(loc,type=0){
    if(type=0){
        window.location.replace(loc);
    } else {
        window.location.href=loc;
    }
}

function setCookie(cookieName,userId = null) {

    var d = new Date();
    var exdays = 1;
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cookieName + "=" + userId + ";" + expires + ";path=/";
}

function getCookie(cookieName) {
    
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    // console.log("decoded cookie -> "+ca);
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
            // console.log("&&&&&& "+c);
        }
        if (c.indexOf(cookieName) === 0) {
            return c.substring(cookieName.length + 1, c.length);
        }
    }
    return "";
}
function toggleHeaders(){
  if(getCookie("mob") == "true"){
    // document.getElementById('header').style.display = "none";
    // document.getElementById('footer').style.display = "none";
    $('#header').hide();
    $('#footer').hide();
  }
}
