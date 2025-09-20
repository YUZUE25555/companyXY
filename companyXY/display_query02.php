<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Query02</title>
</head>
<body>
    <br>จงแสดงคอลัมน์ รหัสการเปิดรับสมัคร สถานะการรับสมัคร จำนวนที่รับ และชื่อตำแหน่ง</br>
    <br>โดยเรียงจากจำนวนที่รับจากมากไปน้อย</br>
    <br>
    SELECT JOB_OPENINGS.JobOpening_ID,
           JOB_OPENINGS.Application_Status,
           JOB_OPENINGS.Amount,
           POSITION.PosName
    FROM JOB_OPENINGS
    INNER JOIN POSITION
    ON JOB_OPENINGS.PosID = POSITION.PosID
    ORDER BY 3 DESC;
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
            <th>รหัสการเปิดรับสมัคร</th>
            <th>สถานะการรับสมัคร</th>
            <th>จำนวนที่รับ</th>
            <th>ชื่อตำแหน่ง</th>
        </tr>
    <?php
        include('conn_db.php');
        $sql = "SELECT JOB_OPENINGS.JobOpening_ID,
                       JOB_OPENINGS.Application_Status,
                       JOB_OPENINGS.Amount,
                       POSITION.PosName
                FROM JOB_OPENINGS
                INNER JOIN POSITION
                ON JOB_OPENINGS.PosID = POSITION.PosID
                ORDER BY JOB_OPENINGS.Amount DESC";
                
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++;
                echo "<tr>
                        <td>".$i."</td>
                        <td>".$row["JobOpening_ID"]."</td>
                        <td>".$row["Application_Status"]."</td>
                        <td>".$row["Amount"]."</td>
                        <td>".$row["PosName"]."</td>
                      </tr>";
            }
        }
        $conn->close();
    ?>
    </table>
</body>
</html>