<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Query01</title>
</head>
<body>
    <br>จงแสดงคอลัมน์ ชื่อผู้สมัคร ชื่อผู้ติดต่อ และความสัมพันธ์</br>
    <br>โดยเรียงจากชื่อผู้สมัครจากมากไปน้อย และชื่อผู้ติดต่อจากน้อยไปมาก</br>
    <br>
    SELECT APPLICANT.Name,
           EMERGENCY_CONTACT.Contact_Name,
           EMERGENCY_CONTACT.Relationship
    FROM EMERGENCY_CONTACT
    INNER JOIN APPLICANT
    ON EMERGENCY_CONTACT.ApplicantID = APPLICANT.ApplicantID
    ORDER BY 1 DESC, 2;
    </br>

    <?php 
        echo "<div style='text-align:center; margin-bottom: 20px;'>
                <button type=\"button\" class=\"btn btn-warning\" 
                    onclick=\"location.href='select_2Kanyapat_Query.php'\" style=\"width:150px;\">Go back</button>
        </div>";
    ?>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
        <tr>
            <th>ลำดับที่</th>
            <th>ชื่อผู้สมัคร</th>
            <th>ชื่อผู้ติดต่อ</th>
            <th>ความสัมพันธ์</th>
        </tr>
    <?php
        include('conn_db.php');
        $sql = "SELECT APPLICANT.Name,
                       EMERGENCY_CONTACT.Contact_Name,
                       EMERGENCY_CONTACT.Relationship
                FROM EMERGENCY_CONTACT
                INNER JOIN APPLICANT
                ON EMERGENCY_CONTACT.ApplicantID = APPLICANT.ApplicantID
                ORDER BY APPLICANT.Name DESC, EMERGENCY_CONTACT.Contact_Name ASC";
                
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++;
                echo "<tr>
                        <td>".$i."</td>
                        <td>".$row["Name"]."</td>
                        <td>".$row["Contact_Name"]."</td>
                        <td>".$row["Relationship"]."</td>
                      </tr>";
            }
        }
        $conn->close();
    ?>
    </table>
</body>
</html>