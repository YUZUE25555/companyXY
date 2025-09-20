<?php
include("conn_db.php");

if (!isset($_GET['Relative_Name'], $_GET['ApplicantID'])) {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการแก้ไข'); window.location='select_relatives.php';</script>";
    exit();
}

$Relative_Name = $_GET['Relative_Name'];
$ApplicantID = $_GET['ApplicantID'];

// ดึงข้อมูลเดิม
$stmt = $conn->prepare("SELECT * FROM relatives WHERE Relative_Name = ? AND ApplicantID = ?");
$stmt->bind_param("si", $Relative_Name, $ApplicantID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "<script>alert('ไม่พบข้อมูลในระบบ'); window.location='select_relatives.php';</script>";
    exit();
}
$row = $result->fetch_assoc();
$stmt->close();

// dropdown
$applicant_result = $conn->query("SELECT ApplicantID FROM applicant");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลญาติ</title>
    <style>
        form {
            width: 450px;
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
        input[type="number"],
        select {
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
        button { background-color: #888; }
        .required { color: red; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>ฟอร์มแก้ไขข้อมูลญาติ</h2>

    <form method="post" action="update_relatives02.php">
        <!-- คีย์เก่า -->
        <input type="hidden" name="Old_Relative_Name" value="<?= htmlspecialchars($Relative_Name) ?>">
        <input type="hidden" name="Old_ApplicantID" value="<?= htmlspecialchars($ApplicantID) ?>">

        <label>ชื่อญาติ <span class="required">*</span>
            <input type="text" name="Relative_Name" value="<?= htmlspecialchars($row['Relative_Name']) ?>" required>
        </label>

        <label>เบอร์โทร
            <input type="text" name="Phone" value="<?= htmlspecialchars($row['Phone']) ?>">
        </label>

        <label>อายุ
            <input type="number" name="Age" value="<?= htmlspecialchars($row['Age']) ?>">
        </label>

        <label>อาชีพ
            <input type="text" name="Occupation" value="<?= htmlspecialchars($row['Occouation']) ?>">
        </label>

        <label>ความสัมพันธ์
            <input type="text" name="Relationship" value="<?= htmlspecialchars($row['Relationship']) ?>">
        </label>

        <label>จำนวนบุตร
            <input type="number" name="Num_Children" value="<?= htmlspecialchars($row['Num_Children']) ?>">
        </label>

        <label>ตำแหน่ง
            <input type="text" name="Position" value="<?= htmlspecialchars($row['Position']) ?>">
        </label>

        <label>สถานที่ทำงาน
            <input type="text" name="Workplace" value="<?= htmlspecialchars($row['Workplace']) ?>">
        </label>

        <label>รหัสผู้สมัคร <span class="required">*</span>
            <select name="ApplicantID" required>
                <option value="">-- กรุณาเลือกรหัสผู้สมัคร --</option>
                <?php while ($a = $applicant_result->fetch_assoc()) {
                    $sel = ($a['ApplicantID'] == $ApplicantID) ? 'selected' : '';
                    echo "<option value='{$a['ApplicantID']}' $sel>{$a['ApplicantID']}</option>";
                } ?>
            </select>
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_relatives.php'">ยกเลิก</button>
    </form>
</body>
</html>
