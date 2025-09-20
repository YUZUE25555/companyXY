<?php
include("conn_db.php");

// ค้นหาข้อมูล ถ้ามีคำค้น
$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";

if (!empty($search)) {
    $where = "WHERE round LIKE '%$search%' OR Opening_Year LIKE '%$search%'";
}

$sql = "SELECT * FROM application_round $where ORDER BY round ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รอบการสมัคร</title>
    <style>
        table { width: 50%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <?php 
            echo "<div style='text-align:center; margin-bottom: 20px;'>
                    <button type=\"button\" class=\"btn btn-warning\"
                        onclick=\"location.href='insert_application_round01.php'\" style=\"width:150px;\">New Round</button>
                    <button type=\"button\" class=\"btn btn-warning\"
                        onclick=\"location.href='index.php'\" style=\"width:150px;\">Back to Home</button>
                </div>";
        ?>
    <h2 align="center">จัดการรอบการสมัคร</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาเลขรอบหรือปีเปิดรับ" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_application_round.php'">ล้าง</button>
    </form>


    <table>
        <tr>
            <th>ลำดับ</th>
            <th>เลขรอบ</th>
            <th>ปีที่เปิดรับ</th>
            <th>การจัดการ</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $i++ . "</td>
                        <td>{$row['round']}</td>
                        <td>{$row['Opening_Year']}</td>
                        <td>
                            <button onclick=\"location.href='update_application_round01.php?round={$row['round']}'\">แก้ไข</button>
                            <button onclick=\"if(confirm('ยืนยันการลบรอบนี้?')) location.href='delete_application_round.php?round={$row['round']}'\">ลบ</button>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>ไม่พบข้อมูล</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
