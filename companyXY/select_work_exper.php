<?php
include("conn_db.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
if (!empty($search)) {
    $where = "WHERE ApplicantID LIKE '%$search%' OR Workplace LIKE '%$search%' OR Job_Position LIKE '%$search%'";
}

$sql = "SELECT * FROM work_exper $where ORDER BY ApplicantID, Workplace ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ประสบการณ์ทำงาน</title>
    <style>
        table { width: 95%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2 align="center">ข้อมูลประสบการณ์ทำงาน</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาด้วยรหัสผู้สมัคร / สถานที่ทำงาน / ตำแหน่ง" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_work_exper.php'">ล้าง</button>
        <button type="button" onclick="location.href='insert_work_exper01.php'">เพิ่มข้อมูล</button>
    </form>

    <div style='text-align:center; margin-bottom: 20px;'>
        <button onclick="location.href='insert_work_exper01.php'" style="width:150px;">New Work Exp</button>
        <button onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>

    <table>
        <tr>
        <th>ลำดับ</th>
            <th>สถานที่ทำงาน</th>
            <th>ตำแหน่ง</th>
            <th>เงินเดือน</th>
            <th>รายละเอียดงาน</th>
            <th>เริ่ม</th>
            <th>จบ</th>
            <th>เหตุผลลาออก</th>
            <th>รหัสผู้สมัคร</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $key = "Workplace={$row['Workplace']}&ApplicantID={$row['ApplicantID']}";
                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>{$row['Workplace']}</td>
                        <td>{$row['Job_Position']}</td>
                        <td>{$row['Salary']}</td>
                        <td>{$row['Job_Description']}</td>
                        <td>{$row['Start_Date']}</td>
                        <td>{$row['End_date']}</td>
                        <td>{$row['Reason_Leaving']}</td>
                        <td>{$row['ApplicantID']}</td>
                        <td>
                            <button onclick=\"location.href='update_work_exper01.php?$key'\">แก้ไข</button>
                            <button onclick=\"if(confirm('ต้องการลบใช่หรือไม่?')) location.href='delete_work_exper.php?$key'\">ลบ</button>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>ไม่พบข้อมูล</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
