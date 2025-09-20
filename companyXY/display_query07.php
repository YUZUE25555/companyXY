<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Query07</title>
</head>
<body>
    <br>จงแสดงชื่อผู้สมัคร และจำนวนเอกสารที่ส่ง</br>
    <br>โดยเรียงจากจำนวนเอกสารมากไปน้อย</br>
    <br>SELECT APPLICANT.Name,
       COUNT(DOC_SUBMISSION.DocID) AS Total_Documents
FROM DOC_SUBMISSION
INNER JOIN APPLICANT
ON DOC_SUBMISSION.ApplicantID = APPLICANT.ApplicantID
GROUP BY APPLICANT.Name
ORDER BY Total_Documents DESC;</br>

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
            <th>เอกสารที่ส่ง</th>
        </tr>
    <?php
        include('conn_db.php');
        $sql = <<<SQL
SELECT APPLICANT.Name,
       COUNT(DOC_SUBMISSION.DocID) AS Total_Documents
FROM DOC_SUBMISSION
INNER JOIN APPLICANT
ON DOC_SUBMISSION.ApplicantID = APPLICANT.ApplicantID
GROUP BY APPLICANT.Name
ORDER BY Total_Documents DESC;
SQL;

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++;
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Total_Documents']."</td>";
                echo "</tr>";
            }
        }
        $conn->close();
    ?>
    </table>
</body>
</html>