<?php
include("conn_db.php");

if (!isset($_GET['skill_id'])) {
    echo "<script>alert('ไม่พบรหัสทักษะ'); window.location='select_special_skills.php';</script>";
    exit();
}

$skill_id = $_GET['skill_id'];
$stmt = $conn->prepare("SELECT * FROM special_skills WHERE skill_id = ?");
$stmt->bind_param("i", $skill_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows != 1) {
    echo "<script>alert('ไม่พบข้อมูลทักษะนี้'); window.location='select_special_skills.php';</script>";
    exit();
}
$row = $result->fetch_assoc();
$stmt->close();

$applicants = $conn->query("SELECT ApplicantID FROM applicant");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขทักษะพิเศษ</title>
    <style>
        form {
            width: 500px;
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
    <h2>แก้ไขข้อมูลทักษะพิเศษ</h2>

    <form method="post" action="update_special_skills02.php">
        <input type="hidden" name="skill_id" value="<?= $skill_id ?>">

        <label>ภาษา <span class="required">*</span>
            <input type="text" name="language" value="<?= htmlspecialchars($row['language']) ?>" required>
        </label>

        <label>ความสามารถด้านคอมพิวเตอร์ <span class="required">*</span>
            <select name="Computer" required>
                <option value="">-- เลือก --</option>
                <option value="Y" <?= $row['Computer'] == 'Y' ? 'selected' : '' ?>>มี</option>
                <option value="N" <?= $row['Computer'] == 'N' ? 'selected' : '' ?>>ไม่มี</option>
            </select>
        </label>

        <label>หมายเลขใบขับขี่
            <input type="text" name="driver_license" value="<?= htmlspecialchars($row['driver_license']) ?>">
        </label>

        <label>ความสามารถในการขับรถ <span class="required">*</span>
            <select name="Driving_Ability" required>
                <option value="">-- เลือก --</option>
                <option value="Y" <?= $row['Driving_Ability'] == 'Y' ? 'selected' : '' ?>>ขับได้</option>
                <option value="N" <?= $row['Driving_Ability'] == 'N' ? 'selected' : '' ?>>ขับไม่ได้</option>
            </select>
        </label>

        <label>ทักษะอุปกรณ์สำนักงาน
            <input type="text" name="office_equipment_skills" value="<?= htmlspecialchars($row['office_equipment_skills']) ?>">
        </label>

        <label>ความรู้พิเศษ
            <input type="text" name="special_knowledge" value="<?= htmlspecialchars($row['special_knowledge']) ?>">
        </label>

        <label>กีฬาที่ชอบ
            <input type="text" name="favorite_sports" value="<?= htmlspecialchars($row['favorite_sports']) ?>">
        </label>

        <label>งานอดิเรก
            <input type="text" name="hobbies" value="<?= htmlspecialchars($row['hobbies']) ?>">
        </label>

        <label>ความเร็วพิมพ์ไทย
            <input type="number" name="thai_typing_speed" value="<?= $row['thai_typing_speed'] ?>">
        </label>

        <label>ความเร็วพิมพ์อังกฤษ
            <input type="number" name="english_typing_speed" value="<?= $row['english_typing_speed'] ?>">
        </label>

        <label>รหัสผู้สมัคร <span class="required">*</span>
            <select name="ApplicantID" required>
                <option value="">-- เลือก --</option>
                <?php while ($a = $applicants->fetch_assoc()) {
                    $sel = ($a['ApplicantID'] == $row['ApplicantID']) ? 'selected' : '';
                    echo "<option value='{$a['ApplicantID']}' $sel>{$a['ApplicantID']}</option>";
                } ?>
            </select>
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_special_skills.php'">ยกเลิก</button>
    </form>
</body>
</html>
