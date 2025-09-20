<?php
include("conn_db.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
if (!empty($search)) {
    $where = "WHERE JobOpening_ID LIKE '%$search%' 
              OR PosID LIKE '%$search%' 
              OR BranchID LIKE '%$search%' 
              OR Round LIKE '%$search%' 
              OR Application_Status LIKE '%$search%'";
}

$sql = "SELECT * FROM job_openings $where ORDER BY JobOpening_ID ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ข้อมูลตำแหน่งที่เปิดรับ</title>
    <style>
        table { width: 95%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2 align="center">ข้อมูลตำแหน่งที่เปิดรับ</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาด้วยข้อมูลที่เกี่ยวข้อง" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_job_openings.php'">ล้าง</button>
        <button type="button" onclick="location.href='insert_job_openings01.php'">เพิ่มข้อมูล</button>
    </form>

    <div style='text-align:center; margin-bottom: 20px;'>
        <button type="button" class="btn btn-warning" onclick="location.href='insert_job_openings01.php'" style="width:150px;">New Opening</button>
        <button type="button" class="btn btn-warning" onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>

    <table>
        <tr>
        <th>ลำดับ</th>
            <th>รหัสเปิดรับ</th>
            <th>ตำแหน่ง</th>
            <th>รอบสมัคร</th>
            <th>สาขา</th>
            <th>จำนวนที่เปิด</th>
            <th>สถานะ</th>
            <th>คุณสมบัติ</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $key = "JobOpening_ID=" . urlencode($row['JobOpening_ID']);
                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>{$row['JobOpening_ID']}</td>
                        <td>{$row['PosID']}</td>
                        <td>{$row['Round']}</td>
                        <td>{$row['BranchID']}</td>
                        <td>{$row['Amount']}</td>
                        <td>{$row['Application_Status']}</td>
                        <td>{$row['Qualifications']}</td>
                        <td>
                            <button onclick=\"location.href='update_job_openings01.php?$key'\">แก้ไข</button>
                            <button onclick=\"if(confirm('ต้องการลบใช่หรือไม่?')) location.href='delete_job_openings.php?$key'\">ลบ</button>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>ไม่พบข้อมูล</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
