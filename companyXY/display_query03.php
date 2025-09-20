<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Query03</title>
</head>
<body>
    <br>จงแสดงคอลัมจำนวนผู้สมัคร รอบ และ ปีที่เปิดรับสมัคร</br>
    <br>เมื่อจำนวนผู้สมัครมีมากว่า 7 คน</br>
    <br>เรียงจากปีที่เปิดรับสมัครน้อยไปมาก และ จำนวนผู้สมัครจากมากไปน้อย</br>
    <br>SELECT COUNT(EMPLOYEE_RECRUIT.ApplicantID) AS Total_Applicants,
       EMPLOYEE_RECRUIT.Round,
       APPLICATION_ROUND.Opening_Year
FROM EMPLOYEE_RECRUIT
INNER JOIN APPLICATION_ROUND
ON EMPLOYEE_RECRUIT.Round = APPLICATION_ROUND.Round
GROUP BY EMPLOYEE_RECRUIT.Round, APPLICATION_ROUND.Opening_Year
HAVING COUNT(EMPLOYEE_RECRUIT.ApplicantID) &gt; 7
ORDER BY APPLICATION_ROUND.Opening_Year, Total_Applicants DESC;</br>

<?php 
        echo "<div style='text-align:center; margin-bottom: 20px;'>
                <button type=\"button\" class=\"btn btn-warning\" 
                    onclick=\"location.href='select_2Kanyapat_Query.php'\" style=\"width:150px;\">Go back</button>
        </div>";
    ?>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
        <tr>
            <th>ลำดับที่</th>
            <th>จำนวนผู้สมัคร</th>
            <th>รอบ</th>
            <th>ปีที่เปิดรับสมัคร</th>
        </tr>
    <?php
        include('conn_db.php');
        $sql = <<<SQL
SELECT COUNT(EMPLOYEE_RECRUIT.ApplicantID) AS Total_Applicants,
       EMPLOYEE_RECRUIT.Round,
       APPLICATION_ROUND.Opening_Year
FROM EMPLOYEE_RECRUIT
INNER JOIN APPLICATION_ROUND
ON EMPLOYEE_RECRUIT.Round = APPLICATION_ROUND.Round
GROUP BY EMPLOYEE_RECRUIT.Round, APPLICATION_ROUND.Opening_Year
HAVING COUNT(EMPLOYEE_RECRUIT.ApplicantID) > 7
ORDER BY APPLICATION_ROUND.Opening_Year, Total_Applicants DESC;
SQL;

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++;
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$row['จำนวนผู้สมัคร']."</td>";
                echo "<td>".$row['รอบ']."</td>";
                echo "<td>".$row['ปีที่เปิดรับสมัคร']."</td>";
                echo "</tr>";
            }
        }
        $conn->close();
    ?>
    </table>
</body>
</html>