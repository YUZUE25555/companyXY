<?php
include("conn_db.php");

// ดึง ApplicantID มาใส่ dropdown
$sql = "SELECT ApplicantID FROM applicant";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มผู้ติดต่อฉุกเฉิน</title>
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
    <h2>ฟอร์มเพิ่มข้อมูลผู้ติดต่อฉุกเฉิน</h2>

    <form method="post" action="insert_emergency_contact02.php">
        <label>ชื่อผู้ติดต่อ <span class="required">*</span>
            <input type="text" name="Contact_Name" required>
        </label>

        <label>ความสัมพันธ์
            <input type="text" name="Relationship">
        </label>

        <label>ที่อยู่
            <input type="text" name="Address">
        </label>

        <label>เบอร์โทร <span class="required">*</span>
        <input type="text" name="Phone" required pattern="\d{10}" title="กรอกเบอร์โทร 10 หลัก">

        </label>

        <label>รหัสผู้สมัคร <span class="required">*</span>
            <select name="ApplicantID" required>
                <option value="">-- กรุณาเลือกผู้สมัคร --</option>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?= $row['ApplicantID'] ?>">
                        <?= $row['ApplicantID'] ?>
                    </option>
                <?php } ?>
            </select>
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_emergency_contact.php'">ยกเลิก</button>
    </form>
</body>
</html>
