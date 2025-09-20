<?php
include("conn_db.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
if (!empty($search)) {
    $where = "WHERE Sibling_Name LIKE '%$search%' 
           OR ApplicantID LIKE '%$search%' 
           OR Occupation LIKE '%$search%'";
}

$sql = "SELECT * FROM siblings $where ORDER BY ApplicantID, Age ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ข้อมูลพี่น้องของผู้สมัคร</title>
    <style>
        table { width: 95%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2 align="center">ข้อมูลพี่น้องของผู้สมัคร</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาด้วยชื่อ/รหัส/อาชีพ" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_siblings.php'">ล้าง</button>
        <button type="button" onclick="location.href='insert_siblings01.php'">เพิ่มข้อมูล</button>
    </form>

    <div style='text-align:center; margin-bottom: 20px;'>
        <button type="button" onclick="location.href='insert_siblings01.php'" style="width:150px;">New Sibling</button>
        <button type="button" onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>

    <table>
        <tr>
        <th>ลำดับ</th>
            <th>ชื่อพี่น้อง</th>
            <th>อายุ</th>
            <th>อาชีพ</th>
            <th>ลำดับในครอบครัว</th>
            <th>จำนวนพี่น้องทั้งหมด</th>
            <th>รหัสผู้สมัคร</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $key = "Age={$row['Age']}&Occupation=" . urlencode($row['Occupation']) . 
                       "&Sibling_Name=" . urlencode($row['Sibling_Name']) .
                       "&Sibling_Order={$row['Sibling_Order']}&Num_Siblings={$row['Num_Siblings']}&ApplicantID={$row['ApplicantID']}";

                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>{$row['Sibling_Name']}</td>
                        <td>{$row['Age']}</td>
                        <td>{$row['Occupation']}</td>
                        <td>{$row['Sibling_Order']}</td>
                        <td>{$row['Num_Siblings']}</td>
                        <td>{$row['ApplicantID']}</td>
                        <td>
                            <button onclick=\"location.href='update_siblings01.php?$key'\">แก้ไข</button>
                            <button onclick=\"if(confirm('ต้องการลบใช่หรือไม่?')) location.href='delete_siblings.php?$key'\">ลบ</button>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>ไม่พบข้อมูล</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
