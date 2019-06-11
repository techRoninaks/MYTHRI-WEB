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
    setCookie("roleOnEdit"); 
    if(val !== 0){
        setCookie("inpId");
        setCookie("empId");
        setCookie("empName");
        setCookie("isAdmin");
        setCookie("role");
        setCookie("inputRolename");
        setCookie("inputVol");
        setCookie("inputRole");
        setCookie("inputEnqu");
        setCookie("inputInit");
        setCookie("inputNews");
        setCookie("inputEmp");
        setCookie("inputCare");
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
        case 'user': phpFile = "updateUser";
                    break;
        case 'role': phpFile = "updateRole";
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
        }else if(pageName == 'user'){
            data[1] =  document.getElementById("inputName").value;
            data[2] =  document.getElementById("inputEmail").value;
            data[3] =  document.getElementById("inputPhone").value;
            data[4] =  document.getElementById("inputPassword").value;
            data[5] =  document.getElementById("inputRole").value;
            prevName = getCookie("userOnEdit");
            myObj = {"inputName":data[1],"inputEmail":data[2],"inputPhone":data[3],"inputPassword":data[4],"inputRole":data[5],"cookieName":prevName};
        }else if(pageName == 'role'){
            data[0] = document.getElementById("inputRolename").value;
            data[1] = document.getElementById("inputVol").checked;
            data[2] = document.getElementById("inputRole").checked;
            data[3] = document.getElementById("inputEnqu").checked;
            data[4] = document.getElementById("inputNews").checked;
            data[5] = document.getElementById("inputInit").checked;
            data[6] = document.getElementById("inputEmp").checked;
            data[7] = document.getElementById("inputCare").checked;
            prevName = getCookie("roleOnEdit");
            for(i = 1;i<=7;i++){
                if(data[i] === false){
                    data[i] = 0;
                }
            }
            myObj = {"inputRolename":data[0],"inputVol":data[1],"inputRole":data[2],"inputEnqu":data[3],"inputNews":data[4],"inputInit":data[5],"inputEmp":data[6],"inputCare":data[7],"cookieName":prevName};
        }     
        var jSONObj = JSON.stringify(myObj);
        
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
        case 'user': phpFile = "fetchUser";
                    break;
        case 'role': phpFile = "fetchRole";
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
                        }else if(pageName == "user"){
                            document.getElementById("inputName").value = myObj.inputName;
                            document.getElementById("inputEmail").value = myObj.inputEmail;
                            document.getElementById("inputPhone").value = myObj.inputPhone;
                            document.getElementById("inputPassword").value =  myObj.inputPassword;
                            document.getElementById("inputRole").value = myObj.inputRole;
                            setCookie("userOnEdit",myObj.inputEmail);  
                        }else if(pageName == "role"){
                            if(myObj.inputVol == 0 || myObj.inputVol == ""){
                                myObj.inputVol = false;
                            }
                            if(myObj.inputRole == 0 || myObj.inputRole == ""){
                                myObj.inputRole = false;
                            }
                            if(myObj.inputEnqu == 0 || myObj.inputEnqu == ""){
                                myObj.inputEnqu = false;
                            }
                            if(myObj.inputNews == 0 || myObj.inputNews == ""){
                                myObj.inputNews = false;
                            }
                            if(myObj.inputInit == 0 || myObj.inputInit == ""){
                                myObj.inputInit = false;
                            }
                            if(myObj.inputEmp == 0 || myObj.inputEmp == ""){
                                myObj.inputEmp = false;
                            }
                            if(myObj.inputCare == 0 || myObj.inputCare == ""){
                                myObj.inputCare = false;
                            }
                            document.getElementById("inputRolename").value = myObj.inputRolename;
                            document.getElementById("inputRolename").disabled=true;
                            document.getElementById("inputVol").checked = myObj.inputVol;
                            document.getElementById("inputRole").checked = myObj.inputRole;
                            document.getElementById("inputEnqu").checked = myObj.inputEnqu;
                            document.getElementById("inputNews").checked = myObj.inputNews;
                            document.getElementById("inputInit").checked = myObj.inputInit;
                            document.getElementById("inputEmp").checked = myObj.inputEmp;
                            document.getElementById("inputCare").checked = myObj.inputCare;
                            setCookie("roleOnEdit",myObj.inputRolename);
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
            case 'user': phpFile = "deleteUser";
                        break;
            case 'role': phpFile = "deleteRole";
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
