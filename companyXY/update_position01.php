<?php
include("conn_db.php");

if (!isset($_GET['PosID'])) {
    echo "<script>alert('ไม่พบรหัสตำแหน่ง'); window.location='select_position.php';</script>";
    exit();
}

$PosID = $_GET['PosID'];

// ดึงข้อมูลตำแหน่งเดิม
$stmt = $conn->prepare("SELECT * FROM position WHERE PosID = ?");
$stmt->bind_param("i", $PosID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "<script>alert('ไม่พบข้อมูลตำแหน่งในระบบ'); window.location='select_position.php';</script>";
    exit();
}

$row = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขตำแหน่งงาน</title>
    <style>
        form {
            width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 12px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"],
        button {
            margin-top: 15px;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        button {
            background-color: #888;
        }
        .required { color: red; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>ฟอร์มแก้ไขตำแหน่งงาน</h2>

    <form method="post" action="update_position02.php">
        <input type="hidden" name="Old_PosID" value="<?= htmlspecialchars($row['PosID']) ?>">

        <label>รหัสตำแหน่ง <span class="required">*</span>
            <input type="number" name="PosID" value="<?= htmlspecialchars($row['PosID']) ?>" required>
        </label>

        <label>ชื่อตำแหน่ง
            <input type="text" name="PosName" value="<?= htmlspecialchars($row['PosName']) ?>">
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_position.php'">ยกเลิก</button>
    </form>
</body>
</html>
