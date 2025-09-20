<?php
include("conn_db.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
if (!empty($search)) {
    $where = "WHERE DocID LIKE '%$search%' OR DocName LIKE '%$search%'";
}

$sql = "SELECT * FROM support_doc $where ORDER BY DocID ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เอกสารประกอบการสมัคร</title>
    <style>
        table { width: 50%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2 align="center">รายการเอกสารประกอบการสมัคร</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาด้วยรหัสหรือชื่อเอกสาร" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_support_doc.php'">ล้าง</button>
        <button type="button" onclick="location.href='insert_support_doc01.php'">เพิ่มเอกสาร</button>
    </form>

    <div style='text-align:center; margin-bottom: 20px;'>
        <button type="button" class="btn btn-warning" onclick="location.href='insert_support_doc01.php'" style="width:150px;">New Document</button>
        <button type="button" class="btn btn-warning" onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>

    <table>
        <tr>
        <th>ลำดับ</th>
            <th>รหัสเอกสาร</th>
            <th>ชื่อเอกสาร</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>{$row['DocID']}</td>
                        <td>{$row['DocName']}</td>
                        <td>
                            <button onclick=\"location.href='update_support_doc01.php?DocID={$row['DocID']}'\">แก้ไข</button>
                            <button onclick=\"if(confirm('คุณต้องการลบข้อมูลนี้หรือไม่?')) location.href='delete_support_doc02.php?DocID={$row['DocID']}'\">ลบ</button>
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