<?php
include("conn_db.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
if (!empty($search)) {
    $where = "WHERE ApplicantID LIKE '%$search%' OR language LIKE '%$search%' OR hobbies LIKE '%$search%'";
}

$sql = "SELECT * FROM special_skills $where ORDER BY ApplicantID ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ข้อมูลทักษะพิเศษ</title>
    <style>
        table { width: 95%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2 align="center">ข้อมูลทักษะพิเศษ</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาด้วยรหัสผู้สมัคร/ภาษา/งานอดิเรก" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_special_skills.php'">ล้าง</button>
        <button type="button" onclick="location.href='insert_special_skills01.php'">เพิ่มข้อมูล</button>
    </form>

    <div style='text-align:center; margin-bottom: 20px;'>
        <button onclick="location.href='insert_special_skills01.php'" style="width:150px;">New Skill</button>
        <button onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>

    <table>
        <tr>
        <th>ลำดับ</th>
            <th>ID</th>
            <th>ภาษา</th>
            <th>คอมพิวเตอร์</th>
            <th>ใบขับขี่</th>
            <th>ความสามารถในการขับ</th>
            <th>ทักษะอุปกรณ์สำนักงาน</th>
            <th>ความรู้พิเศษ</th>
            <th>กีฬาที่ชอบ</th>
            <th>งานอดิเรก</th>
            <th>พิมพ์ไทย</th>
            <th>พิมพ์อังกฤษ</th>
            <th>รหัสผู้สมัคร</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $id = $row['skill_id'];
                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>{$id}</td>
                        <td>{$row['language']}</td>
                        <td>{$row['Computer']}</td>
                        <td>{$row['driver_license']}</td>
                        <td>{$row['Driving_Ability']}</td>
                        <td>{$row['office_equipment_skills']}</td>
                        <td>{$row['special_knowledge']}</td>
                        <td>{$row['favorite_sports']}</td>
                        <td>{$row['hobbies']}</td>
                        <td>{$row['thai_typing_speed']}</td>
                        <td>{$row['english_typing_speed']}</td>
                        <td>{$row['ApplicantID']}</td>
                        <td>
                            <button onclick=\"location.href='update_special_skills01.php?skill_id={$id}'\">แก้ไข</button>
                            <button onclick=\"if(confirm('ต้องการลบใช่หรือไม่?')) location.href='delete_special_skills.php?skill_id={$id}'\">ลบ</button>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='13'>ไม่พบข้อมูล</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
