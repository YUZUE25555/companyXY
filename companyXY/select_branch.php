<?php
include("conn_db.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
if (!empty($search)) {
    $where = "WHERE BranchID LIKE '%$search%' OR BranchName LIKE '%$search%'";
}

$sql = "SELECT * FROM branch $where ORDER BY BranchID ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>จัดการสาขา</title>
    <style>
        table { width: 60%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
<div style='text-align:center; margin-bottom: 20px;'>
        <button type="button" class="btn btn-warning" onclick="location.href='insert_branch01.php'" style="width:150px;">New Branch</button>
        <button type="button" class="btn btn-warning" onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>
    <h2 align="center">รายการสาขา</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="ค้นหาสาขาหรือรหัส" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_branch.php'">ล้าง</button>
    </form>

    

    <table>
        <tr>
            <th>ลำดับ</th>
            <th>รหัสสาขา</th>
            <th>ชื่อสาขา</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>{$row['BranchID']}</td>
                        <td>{$row['BranchName']}</td>
                        <td>
                            <button onclick=\"location.href='update_branch01.php?BranchID={$row['BranchID']}'\">แก้ไข</button>
                            <button onclick=\"if(confirm('คุณต้องการลบสาขานี้หรือไม่?')) location.href='delete_branch.php?BranchID={$row['BranchID']}'\">ลบ</button>
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
