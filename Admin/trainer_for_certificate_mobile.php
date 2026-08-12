<?php
$count=0;
//Including Database configuration file.
include("../Processing/db_connection.php");
//Getting value of "search" variable from "script.js".
if (isset($_POST['searchmobile'])) {

    $mobileno = trim($_POST['searchmobile']);

    if ($mobileno != "") {

        // Prepared statement for security + speed
        $stmt = $conn->prepare("
            SELECT 
                t.teacherid,
                t.teachercode,
                t.tname,
                t.tcontact,
                t.munvdc,
                t.district,
                t.scode,
                s.schoolname
            FROM tblteacher t
            LEFT JOIN tblschool s 
                ON t.scode = s.schoolcode
            WHERE t.tcontact LIKE CONCAT(?, '%')
            LIMIT 5
        ");

        $stmt->bind_param("s", $mobileno);
        $stmt->execute();

        $result = $stmt->get_result();

        echo '<table width="100%">';

        while ($row = $result->fetch_assoc()) {

            $count++;
            ?>

            <tr>
                <td><?php echo htmlspecialchars($row['teachercode']); ?></td>
                <td><?php echo htmlspecialchars($row['tname']); ?></td>
                <td><?php echo htmlspecialchars($row['tcontact']); ?></td>
                <td><?php echo htmlspecialchars($row['schoolname']); ?></td>

                <td bgcolor="blue">
                    <a href="../Input/update_registration_for_certificate.php?tid=<?php echo $row['teacherid']; ?>" target="_blank">
                        Edit
                    </a>
                </td>

                <td bgcolor="blue" align="center">
                    <a href="../Display/trainee_training_completed.php?id=<?php echo $row['teachercode']; ?>" target="_blank">
                        Completed Training
                    </a>
                </td>
            </tr>

            <?php
        }

        echo '</table>';

        echo $count;

        $stmt->close();
    }
}
?>

