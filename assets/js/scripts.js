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