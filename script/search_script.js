function display_teacher(str) {
  if (str == "") {
    document.getElementById("display").innerHTML = "Good Morning";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("display").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","teacher_search.php?search="+str,true);
    xmlhttp.send();
  }
}
