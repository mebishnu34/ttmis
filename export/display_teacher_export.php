<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
<?php
header('Content-type: application/excel');
$filename = 'teacher.xls';
header('Content-Disposition: attachment; filename='.$filename);
$data = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
?>
<head>
    <!--[if gte mso 9]>
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>Sheet 1</x:Name>
                    <x:WorksheetOptions>
                        <x:Print>
                            <x:ValidPrinterInfo/>
                        </x:Print>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->
</HEAD>
<BODY>
<table width="100%">
<tr>
<th>S.No</th>
<th>Teacher ID</th>
<th>Name of Teacher</th>
<th>Contact</th>
<th>Email</th>
</tr>
<?php
$sn=1;
include("..\Processing\db_connection.php");
$d = $_GET['t'];
$array=array();
$sql1 = "SELECT * FROM tblteacher where tname like '$d%'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    echo "<tr>";
    echo "<td>". $sn . "</td>";
   echo "<td><a href=teacher_details.php?tid=$row[teacherid] target=_blank>" . $row["teacherid"] . "</a></td>";
    echo "<td>" . $row["tname"] . "</td>";
    echo "<td>" . $row["tcontact"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    $sn++;
    }
   }

?>
</BODY>
</HTML>
