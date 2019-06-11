var postimage = "";
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
        // xhttp.send();
        /* Exit the function: */
        return;
      }
    }
}

function getQueryString(){
  var queryString = document.URL.split('?');
  var queryStrings = [];
  if(queryString.length > 1){
    queryStrings = queryString[1].split('&');
  }
  return queryStrings;
}

function reDirect(loc){ //redirect to any page without storing as cache.. mainly used when logged in

    // var page = window.location.protocol+"//"+window.location.hostname+"/helloMyWork/"+loc;
    var page = "../"+loc;
    window.location.replace(page);
}

function setCookie(cname, cvalue=null, exdays=1) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie(cname) {
  var value = getCookie(cname);
  if (value === "null" || value === "" || value === "0") {
    return false;
  }
  return true;
}


function readFile() {

 if (this.files && this.files[0]) {

     var FR= new FileReader();

     FR.addEventListener("load", function(e) {
     postimage = e.target.result;
     
     });

     FR.readAsDataURL( this.files[0] );
  }
}
function loadProfile(){
    // document.getElementById("acName").innerHTML = getCookie("empId");
}
function cancelFunc(val=0){
    setCookie("userOnEdit");
    
    
    if(val !== 0){
        setCookie("inpId");
        
        //  var page = window.location.protocol+"//"+window.location.hostname+"\htdocs\newwork\login\login.html";
        // var page = "login/login.html";
        window.location.replace(page);
    } else {
        window.location.reload();
    }
    
}

function dataUpdate(pageName){
    var data = [];
    var myObj = {};
    var phpFile = "";
    var prevName = "";
    var image = "";
    var formData = new FormData();
    switch(pageName){
        case 'volunteer': phpFile = "updateVolunteer";
                    break;
        
    }
    if(confirm("Confirm Upload?")){
        if(pageName == 'volunteer'){
            data[0] =  document.getElementById("inpId").value;
            data[1] =  document.getElementById("inpName").value;
            data[2] =  document.getElementById("inpEmail").value;
            data[3] =  document.getElementById("inpContact").value;
            data[4] =  document.getElementById("inpOccupation").value;
            data[5] =  document.getElementById("inpLocation").value;
            data[6] =  document.getElementById("inpPassword").value;
            data[7] =  document.getElementById("inpRate").value;
            prevName = getCookie("userOnEdit");
            myObj = {"inpId":data[0],"inpName":data[1],"inpEmail":data[2],"inpContact":data[3],"inpOccupation":data[4],"inpLocation":data[5],"inpPassword":data[6],"inpRate":data[7],"cookieName":prevName};
        }         var jSONObj = JSON.stringify(myObj);
        
        // console.log("-> "+jSONObj);
        xhr =  new XMLHttpRequest();
        this.responseType = 'text';
           xhr.onreadystatechange  =  function() {
            var ourData = xhr.response;
            if (this.readyState == 4 && this.status == 200) {
                if(xhr.responseText == '1'){
                    alert("Successful!");
                    postimage = "";
                    cancelFunc();
                } else if(parseInt(xhr.responseText)<0 && pageName == "task"){
                    if(confirm("Task already assigned! Switch to editing?")){
                        fetchData(Math.abs(parseInt(xhr.responseText)),"task");
                    } else {
                        cancelFunc();
                    }
                } else {
                    alert("Update Failed! Try again!");
                }
            }
        };
        xhr.open("POST", "assets/php/"+phpFile+".php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("jsonObj="+jSONObj);
    } else {
        return;
    }
}

function fetchData(id,pageName){
    var phpFile = "";
    switch(pageName){
        case 'volunteer': phpFile = "fetchVolunteer";
                    break;
      
    }
    var params = 'id='+id;
    
    var xhr =  new XMLHttpRequest();
    xhr.onreadystatechange  =  function() {
            if (this.readyState == 4 && this.status == 200) {//if result successful
                    var myObj = JSON.parse(xhr.responseText);
                    if(xhr.responseText !== "0"){
                        if(pageName == "volunteer"){
                        document.getElementById("inpId").value = myObj.inpId;
                        document.getElementById("inpId").disabled=true;
                        document.getElementById("inpName").value = myObj.inpName;
                        document.getElementById("inpEmail").value = myObj.inpEmail;
                        document.getElementById("inpEmail").disabled=true;
                        document.getElementById("inpContact").value = myObj.inpContact;
                        document.getElementById("inpOccupation").value = myObj.inpOccupation;
                        document.getElementById("inpLocation").value = myObj.inpLocation;
                        document.getElementById("inpPassword").value =  myObj.inpPassword;
                        document.getElementById("inpRate").value = myObj.inpRate;
                        setCookie("userOnEdit",myObj.inpId);
                        } 
            } else {
                alert('Edit Failed!');
            }
        }
    };
    xhr.open("POST", "assets/php/"+phpFile+".php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(params);
}

function deleteData(id,pageName){
    var confirmTxt = "Confirm deletion?";
    if(pageName == "posts"){
        confirmTxt = "Remove comment?";
    }
    if(confirm(confirmTxt)){
        var phpFile = "";
        switch(pageName){
           
            case 'volunteer': phpFile = "deleteVolunteer";
                        break;
           
        }
        var xhr =  new XMLHttpRequest();
        var params = 'id='+id;
        xhr.onreadystatechange  =  function() {
                if (this.readyState == 4 && this.status == 200) {//if result successful
                    var message = 'Deletion successful!';
                    if(pageName == "posts"){
                            message = 'Removed successfully!';
                    }
                    if(xhr.responseText !== "0"){
                            alert(message);
                            window.location.reload();
                    } else {
                        alert('Deletion Failed!');
                    }
                }
        };
        xhr.open("POST", "assets/php/"+phpFile+".php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(params);
    } else {
        return;
    }
}

function getQueryString(){		
     if(document.URL.includes("?")){		
         return document.URL.split('?')[1].split('&');		
     }		
     else{		
         return "null";		
     }  		
}
