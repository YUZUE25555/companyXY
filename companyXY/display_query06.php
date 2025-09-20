<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Query06</title>
</head>
<body>
    <br>จงแสดงชื่อผู้สมัคร ชื่อญาติ และตำแหน่งงานของญาติ</br>
    <br>เรียงจากตำแหน่งงานของญาติจากมากไปน้อย</br>
    <br>SELECT APPLICANT.Name,
       RELATIVES.Relative_Name,
       RELATIVES.Position
FROM RELATIVES
INNER JOIN APPLICANT
ON RELATIVES.ApplicantID = APPLICANT.ApplicantID
ORDER BY RELATIVES.Position DESC;</br>

    <?php 
        echo "<div style='text-align:center; margin-bottom: 20px;'>
                <button type=\"button\" class=\"btn btn-warning\" 
                    onclick=\"location.href='select_1Suttinan_Query.php'\" style=\"width:150px;\">Go back</button>
        </div>";
    ?>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
        <tr>
            <th>ลำดับที่</th>
            <th>ชื่อผู้สมัคร</th>
            <th>ชื่อญาติ</th>
            <th>ตำแหน่งของญาติ</th>
        </tr>
    <?php
        include('conn_db.php');
        $sql = <<<SQL
    SELECT APPLICANT.Name,
        RELATIVES.Relative_Name,
        RELATIVES.Position
    FROM RELATIVES
    INNER JOIN APPLICANT
    ON RELATIVES.ApplicantID = APPLICANT.ApplicantID
    ORDER BY RELATIVES.Position DESC;
    SQL;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++;
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Relative_Name']."</td>";
                echo "<td>".$row['Position']."</td>";
                echo "</tr>";
            }
        }
        $conn->close();
    ?>
    </table>
</body>
</html>