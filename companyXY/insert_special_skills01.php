<?php
include("conn_db.php");
$applicant_result = $conn->query("SELECT ApplicantID FROM applicant");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลทักษะพิเศษ</title>
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
    <h2>เพิ่มข้อมูลทักษะพิเศษ</h2>

    <form method="post" action="insert_special_skills02.php">
        <label>ภาษา <span class="required">*</span>
            <input type="text" name="language" required>
        </label>

        <label>ความสามารถด้านคอมพิวเตอร์ <span class="required">*</span>
            <select name="Computer" required>
                <option value="">-- เลือก --</option>
                <option value="Y">มี</option>
                <option value="N">ไม่มี</option>
            </select>
        </label>

        <label>หมายเลขใบขับขี่
            <input type="text" name="driver_license">
        </label>

        <label>ความสามารถในการขับรถ <span class="required">*</span>
            <select name="Driving_Ability" required>
                <option value="">-- เลือก --</option>
                <option value="Y">ขับได้</option>
                <option value="N">ขับไม่ได้</option>
            </select>
        </label>

        <label>ทักษะอุปกรณ์สำนักงาน
            <input type="text" name="office_equipment_skills">
        </label>

        <label>ความรู้พิเศษ
            <input type="text" name="special_knowledge">
        </label>

        <label>กีฬาที่ชอบ
            <input type="text" name="favorite_sports">
        </label>

        <label>งานอดิเรก
            <input type="text" name="hobbies">
        </label>

        <label>ความเร็วพิมพ์ไทย (คำ/นาที)
            <input type="number" name="thai_typing_speed">
        </label>

        <label>ความเร็วพิมพ์อังกฤษ (คำ/นาที)
            <input type="number" name="english_typing_speed">
        </label>

        <label>รหัสผู้สมัคร <span class="required">*</span>
            <select name="ApplicantID" required>
                <option value="">-- เลือกรหัสผู้สมัคร --</option>
                <?php while ($row = $applicant_result->fetch_assoc()) { ?>
                    <option value="<?= $row['ApplicantID'] ?>"><?= $row['ApplicantID'] ?></option>
                <?php } ?>
            </select>
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_special_skills.php'">ยกเลิก</button>
    </form>
</body>
</html>
