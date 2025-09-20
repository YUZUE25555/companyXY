<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Query09</title>
</head>
<body>
    <br>จงแสดงชื่อผู้สมัคร กับตำแหน่งที่เคยทำงาน และเหตุผลที่ลาออก</br>
    <br>โดยเรียงจากเหตุผลการลาออกตามตัวอักษร</br>
    <br>SELECT APPLICANT.Name,
       WORK_EXPER.Job_Position,
       WORK_EXPER.Reason_Leaving
FROM WORK_EXPER
INNER JOIN APPLICANT
ON WORK_EXPER.ApplicantID = APPLICANT.ApplicantID
ORDER BY WORK_EXPER.Reason_Leaving;</br>

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
            <th>ตำแหน่งที่เคยทำ</th>
            <th>เหตุผลที่ลาออก</th>
        </tr>
    <?php
        include('conn_db.php');
        $sql = <<<SQL
SELECT APPLICANT.Name,
       WORK_EXPER.Job_Position,
       WORK_EXPER.Reason_Leaving
FROM WORK_EXPER
INNER JOIN APPLICANT
ON WORK_EXPER.ApplicantID = APPLICANT.ApplicantID
ORDER BY WORK_EXPER.Reason_Leaving;
SQL;

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++;
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Job_Position']."</td>";
                echo "<td>".$row['Reason_Leaving']."</td>";
                echo "</tr>";
            }
        }
        $conn->close();
    ?>
    </table>
</body>
</html>