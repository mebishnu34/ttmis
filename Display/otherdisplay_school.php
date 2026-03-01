<HTML>
<HEAD>
 <?php
  include("../Processing/db_connection.php");
 ?>

<script>
 function training(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","display_teacher.php?q="+str,true);
        xmlhttp.send();
    }
}

function teacher(str) {
    if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","teacher_display.php?t="+str,true);
        xmlhttp.send();
    }
}
function teacher1(str) {
    if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","teacher_display1.php?t="+str,true);
        xmlhttp.send();
    }
}

function teacherall(str) {
    if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","teacher_display_all.php?t="+str,true);
        xmlhttp.send();
    }
}
</script>

</HEAD>
<BODY>
<form method="post">
<table width="100%">
<tr>
<td>
<select name="cmbdistrict" onchange="teacher(this.value)">
           <option>Select District</option>
           <option>All</option>
           <option>Bhaktapur</option>
           <option>Charikot</option>
           <option>Hetauda</option>
           <option>Kathmandu</option>
           <option>Kavrepalanchowk</option>
           <option>Sindupalanchowk</option>
</select>
</td>

<td>
<div>Municipality</div></td>
<td>
<?php
                    $sql="SELECT * FROM tbltraining";
                    $result = mysqli_query($conn,$sql);
                    echo "<Select name=cmbtraining onchange=training(this.value)>";
                    while($row = mysqli_fetch_array($result))
                          {
                                echo "<option value='". $row['trainingid']."'>" . $row['trainingname'] . "</option>";
                          }
                    echo "</select>";
               ?>


</td>
<td><div id="txtHint">Training Number</div></td>
<td>Search By<input type="Text" onchange="teacherall(this.value)"></td>
</tr>

</table>
</form>
<div id="txtHint1">Teacher Display</div>

</BODY>
</HTML>
