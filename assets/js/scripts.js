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
//   console.log("in func");
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
        console.log("edit cookie-> "+id);
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
            eveTable += '<tr><td><div style = "display:inline;"><div class = "col-sm-4"><img class="img-responsive" src = "'+myObj[i].eveImg+'"></div><div class = "col-sm-8"><p id = "sgHead">'+myObj[i].eveName+'</p><p style = "font-size:1rem;" id = "sgDate">'+myObj[i].eveDate+'</p><p style = "font-size:1.3rem;text-align:justify;" id = "sgData">'+myObj[i].eveDes+'</p></div></di></td></tr>';
        }
        document.getElementById("sgTable").innerHTML = eveTable;
        }
    };
    xmlhttp.open("GET", "assets/php/fetchEvents.php", true);
    xmlhttp.send();
}


// La Cookie Section

function reDirect(){
    var page = window.location.protocol+"//"+window.location.hostname+"/devMythri/home.html";
    window.location.replace(page);
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
            return c.substring(cookieName.length, c.length);
        }
    }
    return "";
}

function checkCookie(cookieName,signVar = null) {
    
    if(signVar !== null){       //sign out code
 
        if(confirm("Confirm Log Out?")){
            setCookie(cookieName);
            reDirect();
        } else {
            return;
        }
        
    } else {
    
        var id = getCookie(cookieName+"="); //load data
        
        if (id !== "null") {
            loadProfile(id);
            loadEvents();
        }
        else {                      //session validation
            alert("Session Expired! Login again to continue");
            setCookie(cookieName);
            reDirect();
        }
    }
}
