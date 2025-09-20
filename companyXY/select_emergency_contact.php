<?php
include("conn_db.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
if (!empty($search)) {
    $where = "WHERE ApplicantID LIKE '%$search%' OR Contact_Name LIKE '%$search%'";
}

$sql = "SELECT * FROM emergency_contact $where ORDER BY ApplicantID, Contact_Name ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ข้อมูลผู้ติดต่อฉุกเฉิน</title>
    <style>
        table { width: 95%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2 align="center">ข้อมูลผู้ติดต่อฉุกเฉิน</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาด้วยรหัสผู้สมัครหรือชื่อผู้ติดต่อ" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_emergency_contact.php'">ล้าง</button>
        <button type="button" onclick="location.href='insert_emergency_contact01.php'">เพิ่มข้อมูล</button>
    </form>

    <div style='text-align:center; margin-bottom: 20px;'>
        <button type="button" class="btn btn-warning" onclick="location.href='insert_emergency_contact01.php'" style="width:150px;">New Contact</button>
        <button type="button" class="btn btn-warning" onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>

    <table>
        <tr>
        <th>ลำดับ</th>
            <th>ชื่อผู้ติดต่อ</th>
            <th>ความสัมพันธ์</th>
            <th>ที่อยู่</th>
            <th>เบอร์โทร</th>
            <th>รหัสผู้สมัคร</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $key = "Contact_Name=" . urlencode($row['Contact_Name']) . 
                       "&ApplicantID=" . urlencode($row['ApplicantID']);
                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>{$row['Contact_Name']}</td>
                        <td>{$row['Relationship']}</td>
                        <td>{$row['Address']}</td>
                        <td>{$row['Phone']}</td>
                        <td>{$row['ApplicantID']}</td>
                        <td>
                            <button onclick=\"location.href='update_emergency_contact01.php?$key'\">แก้ไข</button>
                            <button onclick=\"if(confirm('ต้องการลบใช่หรือไม่?')) location.href='delete_emergency_contact.php?$key'\">ลบ</button>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>ไม่พบข้อมูล</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
