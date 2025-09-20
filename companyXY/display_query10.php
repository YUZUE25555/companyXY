<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Query10</title>
</head>
<body>
    <br>จงแสดงชื่อผู้สมัคร ภาษา และความสามารถพิเศษ</br>
    <br>เฉพาะคนที่สามารถพิมพ์ไทยได้มากกว่า 40 คำ/นาที</br>
    <br>SELECT APPLICANT.Name,
       SPECIAL_SKILLS.language,
       SPECIAL_SKILLS.special_knowledge
FROM SPECIAL_SKILLS
INNER JOIN APPLICANT
ON SPECIAL_SKILLS.ApplicantID = APPLICANT.ApplicantID
WHERE SPECIAL_SKILLS.thai_typing_speed &gt; 40;</br>

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
            <th>ภาษา</th>
            <th>ความสามารถพิเศษ</th>
        </tr>
    <?php
        include('conn_db.php');
        $sql = <<<SQL
SELECT APPLICANT.Name,
       SPECIAL_SKILLS.language,
       SPECIAL_SKILLS.special_knowledge
FROM SPECIAL_SKILLS
INNER JOIN APPLICANT
ON SPECIAL_SKILLS.ApplicantID = APPLICANT.ApplicantID
WHERE SPECIAL_SKILLS.thai_typing_speed > 40;
SQL;

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++;
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['language']."</td>";
                echo "<td>".$row['special_knowledge']."</td>";
                echo "</tr>";
            }
        }
        $conn->close();
    ?>
    </table>
</body>
</html>