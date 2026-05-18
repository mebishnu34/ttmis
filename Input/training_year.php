<?php
include("../Processing/db_connection.php");
  if(isset($_GET['id']))
    {
      $financial_year=$_GET['id'];
  $sdate=""    ;
  $edate="";
include("../financial_year.php");
 //$sql = "SELECT id, trainingname, level, subject, coordinator, startdate, enddate,venue,user from tblruntraining where startdate>='".$sdate."' and enddate<='".$edate."' and remark='Running' ORDER BY starttime";
 $sql = "SELECT id, trainingname, level, subject, coordinator, startdate, enddate,venue,user from tblruntraining where financialyear='".$financial_year."' and remark='Running' ORDER BY starttime";
  $result = $conn->query($sql);
  ?>
  <select id="trainingsubject" name="cmbtrainingid" class="custom-combo">
  <?php
  if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
			
      echo "<option value=".$row[id].">" . $row["trainingname"]. "-". $row["coordinator"] .'-'. $row["startdate"].'-'. $row["enddate"] ."</option>";
               
    }
    }
    }
     ?>    
  </select>
