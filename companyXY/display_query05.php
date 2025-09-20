<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Query05</title>
</head>
<body>
    <br>จงแสดงคอลัมรอบ ปีที่เปิดรับสมัคร ชื่อสาขา และ จำนวนผู้สมัคร</br>
    <br>เมื่อปีเปิดรับสมัครก่อนปีพ.ศ.2566 และ เมื่อจำนวนผู้สมัครมีมากว่า 5 คน</br>
    <br>โดยเรียงจากปีที่เปิดรับสมัครมากไปน้อย</br>
    <br>SELECT EMPLOYEE_RECRUIT.Round,
       APPLICATION_ROUND.Opening_Year,
       BRANCH.BranchName,
       COUNT(EMPLOYEE_RECRUIT.ApplicantID) AS Total_Applicants
FROM EMPLOYEE_RECRUIT
INNER JOIN APPLICATION_ROUND
ON EMPLOYEE_RECRUIT.Round = APPLICATION_ROUND.Round
INNER JOIN BRANCH
ON EMPLOYEE_RECRUIT.BranchID = BRANCH.BranchID
WHERE APPLICATION_ROUND.Opening_Year &lt; 2023
GROUP BY EMPLOYEE_RECRUIT.Round, APPLICATION_ROUND.Opening_Year, BRANCH.BranchName
HAVING COUNT(EMPLOYEE_RECRUIT.ApplicantID) &gt; 5
ORDER BY APPLICATION_ROUND.Opening_Year DESC;</br>

    <?php 
        echo "<div style='text-align:center; margin-bottom: 20px;'>
                <button type=\"button\" class=\"btn btn-warning\" 
                    onclick=\"location.href='select_2Kanyapat_Query.php'\" style=\"width:150px;\">Go back</button>
        </div>";
    ?>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
        <tr>
            <th>ลำดับที่</th>
            <th>รอบ</th>
            <th>ปีที่เปิดรับสมัคร</th>
            <th>ชื่อสาขา</th>
            <th>จำนวนผู้สมัคร</th>
        </tr>
    <?php
        include('conn_db.php');
        $sql = <<<SQL
SELECT EMPLOYEE_RECRUIT.Round,
       APPLICATION_ROUND.Opening_Year,
       BRANCH.BranchName,
       COUNT(EMPLOYEE_RECRUIT.ApplicantID) AS Total_Applicants
FROM EMPLOYEE_RECRUIT
INNER JOIN APPLICATION_ROUND
ON EMPLOYEE_RECRUIT.Round = APPLICATION_ROUND.Round
INNER JOIN BRANCH
ON EMPLOYEE_RECRUIT.BranchID = BRANCH.BranchID
WHERE APPLICATION_ROUND.Opening_Year < 2023
GROUP BY EMPLOYEE_RECRUIT.Round, APPLICATION_ROUND.Opening_Year, BRANCH.BranchName
HAVING COUNT(EMPLOYEE_RECRUIT.ApplicantID) > 5
ORDER BY APPLICATION_ROUND.Opening_Year DESC;
SQL;

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++;
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$row['รอบ']."</td>";
                echo "<td>".$row['ปีที่เปิดรับสมัคร']."</td>";
                echo "<td>".$row['ชื่อสาขา']."</td>";
                echo "<td>".$row['จำนวนผู้สมัคร']."</td>";
                echo "</tr>";
            }
        }
        $conn->close();
    ?>
    </table>
</body>
</html>