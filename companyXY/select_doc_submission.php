<?php
include("conn_db.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
if (!empty($search)) {
    $where = "WHERE ApplicantID LIKE '%$search%' OR DocID LIKE '%$search%'";
}

$sql = "SELECT * FROM doc_submission $where ORDER BY ApplicantID ASC, DocID ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>จัดการเอกสารที่ส่ง</title>
    <style>
        table { width: 60%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2 align="center">รายการเอกสารที่ส่ง</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาด้วยรหัสผู้สมัครหรือเอกสาร" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_doc_submission.php'">ล้าง</button>
        <button type="button" onclick="location.href='insert_doc_submission01.php'">เพิ่มการส่งเอกสาร</button>
    </form>

    <div style='text-align:center; margin-bottom: 20px;'>
        <button type="button" class="btn btn-warning" onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>

    <table>
        <tr>
        <th>ลำดับ</th>
            <th>รหัสผู้สมัคร</th>
            <th>รหัสเอกสาร</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ApplicantID']}</td>
                        <td>{$row['DocID']}</td>
                        <td>
                            <button onclick=\"location.href='update_doc_submission01.php?ApplicantID={$row['ApplicantID']}&DocID={$row['DocID']}'\">แก้ไข</button>
                            <button onclick=\"if(confirm('คุณต้องการลบข้อมูลนี้หรือไม่?')) location.href='delete_doc_submission.php?ApplicantID={$row['ApplicantID']}&DocID={$row['DocID']}'\">ลบ</button>
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
