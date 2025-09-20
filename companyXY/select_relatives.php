<?php
include("conn_db.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
if (!empty($search)) {
    $where = "WHERE Relative_Name LIKE '%$search%' 
           OR ApplicantID LIKE '%$search%' 
           OR Relationship LIKE '%$search%' 
           OR Workplace LIKE '%$search%'";
}

$sql = "SELECT * FROM relatives $where ORDER BY ApplicantID, Relative_Name ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ข้อมูลญาติของผู้สมัคร</title>
    <style>
        table { width: 95%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2 align="center">ข้อมูลญาติของผู้สมัคร</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาด้วยชื่อ/รหัส/สถานที่ทำงาน" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_relatives.php'">ล้าง</button>
        <button type="button" onclick="location.href='insert_relatives01.php'">เพิ่มข้อมูล</button>
    </form>

    <div style='text-align:center; margin-bottom: 20px;'>
        <button type="button" class="btn btn-warning" onclick="location.href='insert_relatives01.php'" style="width:150px;">New Relative</button>
        <button type="button" class="btn btn-warning" onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>

    <table>
        <tr>
        <th>ลำดับ</th>
            <th>ชื่อญาติ</th>
            <th>เบอร์โทร</th>
            <th>อายุ</th>
            <th>อาชีพ</th>
            <th>ความสัมพันธ์</th>
            <th>จำนวนบุตร</th>
            <th>ตำแหน่ง</th>
            <th>สถานที่ทำงาน</th>
            <th>รหัสผู้สมัคร</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $key = "Relative_Name=" . urlencode($row['Relative_Name']) . "&ApplicantID=" . urlencode($row['ApplicantID']);
                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>{$row['Relative_Name']}</td>
                        <td>{$row['Phone']}</td>
                        <td>{$row['Age']}</td>
                        <td>{$row['Occupation']}</td>
                        <td>{$row['Relationship']}</td>
                        <td>{$row['Num_Children']}</td>
                        <td>{$row['Position']}</td>
                        <td>{$row['Workplace']}</td>
                        <td>{$row['ApplicantID']}</td>
                        <td>
                            <button onclick=\"location.href='update_relatives01.php?$key'\">แก้ไข</button>
                            <button onclick=\"if(confirm('ต้องการลบใช่หรือไม่?')) location.href='delete_relatives.php?$key'\">ลบ</button>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>ไม่พบข้อมูล</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
