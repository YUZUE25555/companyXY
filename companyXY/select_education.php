<?php
include("conn_db.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
if (!empty($search)) {
    $where = "WHERE ApplicantID LIKE '%$search%' OR Education_Level LIKE '%$search%'";
}

$sql = "SELECT * FROM education $where ORDER BY ApplicantID, Education_Level ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ประวัติการศึกษา</title>
    <style>
        table { width: 95%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2 align="center">ข้อมูลประวัติการศึกษา</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาด้วยรหัสผู้สมัครหรือระดับการศึกษา" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_education.php'">ล้าง</button>
        <button type="button" onclick="location.href='insert_education01.php'">เพิ่มข้อมูล</button>
    </form>

    <div style='text-align:center; margin-bottom: 20px;'>
        <button type="button" class="btn btn-warning" onclick="location.href='insert_education01.php'" style="width:150px;">New Education</button>
        <button type="button" class="btn btn-warning" onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>

    <table>
        <tr>
        <th>ลำดับ</th>
            <th>ระดับการศึกษา</th>
            <th>สถานศึกษา</th>
            <th>วันเริ่ม</th>
            <th>วันจบ</th>
            <th>สาขาวิชา</th>
            <th>รหัสผู้สมัคร</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $key = "Education_Level={$row['Education_Level']}&Institution={$row['Institution']}&Start_Date={$row['Start_Date']}&End_Date={$row['End_Date']}&Major={$row['Major']}&ApplicantID={$row['ApplicantID']}";
                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>{$row['Education_Level']}</td>
                        <td>{$row['Institution']}</td>
                        <td>{$row['Start_Date']}</td>
                        <td>{$row['End_Date']}</td>
                        <td>{$row['Major']}</td>
                        <td>{$row['ApplicantID']}</td>
                        <td>
                            <button onclick=\"location.href='update_education01.php?$key'\">แก้ไข</button>
                            <button onclick=\"if(confirm('ต้องการลบใช่หรือไม่?')) location.href='delete_education.php?$key'\">ลบ</button>
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
