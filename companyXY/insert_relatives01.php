<?php
include("conn_db.php");
$applicant_result = $conn->query("SELECT ApplicantID FROM applicant");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลญาติ</title>
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
        button {
            background-color: #888;
        }
        .required { color: red; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>ฟอร์มเพิ่มข้อมูลญาติ</h2>

    <form method="post" action="insert_relatives02.php">
        <label>ชื่อญาติ <span class="required">*</span>
            <input type="text" name="Relative_Name" required>
        </label>

        <label>เบอร์โทร
            <input type="text" name="Phone">
        </label>

        <label>อายุ
            <input type="number" name="Age">
        </label>

        <label>อาชีพ
            <input type="text" name="Occupation">
        </label>

        <label>ความสัมพันธ์
            <input type="text" name="Relationship">
        </label>

        <label>จำนวนบุตร
            <input type="number" name="Num_Children">
        </label>

        <label>ตำแหน่ง
            <input type="text" name="Position">
        </label>

        <label>สถานที่ทำงาน
            <input type="text" name="Workplace">
        </label>

        <label>รหัสผู้สมัคร <span class="required">*</span>
            <select name="ApplicantID" required>
                <option value="">-- กรุณาเลือกรหัสผู้สมัคร --</option>
                <?php while ($row = $applicant_result->fetch_assoc()) { ?>
                    <option value="<?= $row['ApplicantID'] ?>"><?= $row['ApplicantID'] ?></option>
                <?php } ?>
            </select>
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_relatives.php'">ยกเลิก</button>
    </form>
</body>
</html>
