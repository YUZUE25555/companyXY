<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Query04</title>
</head>
<body>
    <br>จงแสดงคอลัมรอบ ปีที่เปิดรับสมัคร และ ชื่อสาขา</br>
    <br>เมื่อปีเปิดรับสมัครก่อนปีพ.ศ.2566</br>
    <br>โดยเรียงจากปีที่เปิดรับสมัครมากไปน้อย</br>
    <br>SELECT EMPLOYEE_RECRUIT.Round,
       APPLICATION_ROUND.Opening_Year,
       BRANCH.BranchName
FROM EMPLOYEE_RECRUIT
INNER JOIN APPLICATION_ROUND
ON EMPLOYEE_RECRUIT.Round = APPLICATION_ROUND.Round
INNER JOIN BRANCH
ON EMPLOYEE_RECRUIT.BranchID = BRANCH.BranchID
WHERE APPLICATION_ROUND.Opening_Year &lt; 2023
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
        </tr>
        <?php
    include('conn_db.php');
    $sql = "SELECT EMPLOYEE_RECRUIT.Round, 
                   APPLICATION_ROUND.Opening_Year, 
                   BRANCH.BranchName
            FROM EMPLOYEE_RECRUIT
            INNER JOIN APPLICATION_ROUND ON EMPLOYEE_RECRUIT.Round = APPLICATION_ROUND.Round
            INNER JOIN BRANCH ON EMPLOYEE_RECRUIT.BranchID = BRANCH.BranchID
            WHERE APPLICATION_ROUND.Opening_Year < 2023
            ORDER BY APPLICATION_ROUND.Opening_Year DESC;";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $i++;
            // ตรวจสอบก่อนการใช้
            $round = isset($row['Round']) ? $row['Round'] : 'N/A';
            $opening_year = isset($row['Opening_Year']) ? $row['Opening_Year'] : 'N/A';
            $branch_name = isset($row['BranchName']) ? $row['BranchName'] : 'N/A';

            echo "<tr>
                    <td>".$i."</td>
                    <td>".$round."</td>
                    <td>".$opening_year."</td>
                    <td>".$branch_name."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>ไม่มีข้อมูล</td></tr>";
    }
    $conn->close();
?>
</body>
</html>