<?php
include("conn_db.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
if (!empty($search)) {
    $where = "WHERE PosID LIKE '%$search%' OR PosName LIKE '%$search%'";
}

$sql = "SELECT * FROM position $where ORDER BY PosID ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ตำแหน่งงาน</title>
    <style>
        table { width: 95%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2 align="center">ข้อมูลตำแหน่งงาน</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาด้วยรหัสหรือชื่อตำแหน่ง" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_position.php'">ล้าง</button>
        <button type="button" onclick="location.href='insert_position01.php'">เพิ่มข้อมูล</button>
    </form>

    <div style='text-align:center; margin-bottom: 20px;'>
        <button type="button" class="btn btn-warning" onclick="location.href='insert_position01.php'" style="width:150px;">New Position</button>
        <button type="button" class="btn btn-warning" onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>

    <table>
        <tr>
        <th>ลำดับ</th>
            <th>รหัสตำแหน่ง</th>
            <th>ชื่อตำแหน่ง</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $key = "PosID=" . urlencode($row['PosID']);
                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>{$row['PosID']}</td>
                        <td>{$row['PosName']}</td>
                        <td>
                            <button onclick=\"location.href='update_position01.php?$key'\">แก้ไข</button>
                            <button onclick=\"if(confirm('ต้องการลบใช่หรือไม่?')) location.href='delete_position.php?$key'\">ลบ</button>
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
