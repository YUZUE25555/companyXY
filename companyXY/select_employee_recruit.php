<?php
include("conn_db.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
if (!empty($search)) {
    $where = "WHERE ApplicantID LIKE '%$search%' 
           OR JobOpening_ID LIKE '%$search%' 
           OR PosID LIKE '%$search%' 
           OR Round LIKE '%$search%' 
           OR BranchID LIKE '%$search%'";
}

$sql = "SELECT * FROM employee_recruit $where 
        ORDER BY ApplicantID, JobOpening_ID, PosID, Round, BranchID ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ข้อมูลการสมัครงาน</title>
    <style>
        table { width: 95%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2 align="center">ข้อมูลการสมัครงานของผู้สมัคร</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาโดยรหัสผู้สมัคร/ตำแหน่ง/รอบ/สาขา" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_employee_recruit.php'">ล้าง</button>
        <button type="button" onclick="location.href='insert_employee_recruit01.php'">เพิ่มข้อมูล</button>
    </form>

    <div style='text-align:center; margin-bottom: 20px;'>
        <button type="button" class="btn btn-warning" onclick="location.href='insert_employee_recruit01.php'" style="width:150px;">New Recruit</button>
        <button type="button" class="btn btn-warning" onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>

    <table>
        <tr>
        <th>ลำดับ</th>
            <th>รหัสผู้สมัคร</th>
            <th>รหัสเปิดรับ</th>
            <th>รหัสตำแหน่ง</th>
            <th>รอบสมัคร</th>
            <th>รหัสสาขา</th>
            <th>วันที่สมัคร</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $key = http_build_query([
                    'ApplicantID' => $row['ApplicantID'],
                    'JobOpening_ID' => $row['JobOpening_ID'],
                    'PosID' => $row['PosID'],
                    'Round' => $row['Round'],
                    'BranchID' => $row['BranchID']
                ]);
                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>{$row['ApplicantID']}</td>
                        <td>{$row['JobOpening_ID']}</td>
                        <td>{$row['PosID']}</td>
                        <td>{$row['Round']}</td>
                        <td>{$row['BranchID']}</td>
                        <td>{$row['Application_Date']}</td>
                        <td>
                            <button onclick=\"location.href='update_employee_recruit01.php?$key'\">แก้ไข</button>
                            <button onclick=\"if(confirm('ต้องการลบใช่หรือไม่?')) location.href='delete_employee_recruit.php?$key'\">ลบ</button>
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
