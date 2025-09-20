<?php
include("conn_db.php");
$applicant_result = $conn->query("SELECT ApplicantID FROM applicant");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มประสบการณ์ทำงาน</title>
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
        input[type="date"],
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
    <h2>เพิ่มประสบการณ์ทำงาน</h2>

    <form method="post" action="insert_work_exper02.php">
        <label>สถานที่ทำงาน <span class="required">*</span>
            <input type="text" name="Workplace" required>
        </label>

        <label>ตำแหน่ง
            <input type="text" name="Job_Position">
        </label>

        <label>เงินเดือน
            <input type="number" name="Salary">
        </label>

        <label>รายละเอียดงาน
            <input type="text" name="Job_Description">
        </label>

        <label>วันเริ่มงาน
            <input type="date" name="Start_Date">
        </label>

        <label>วันสิ้นสุดงาน
            <input type="date" name="End_date">
        </label>

        <label>เหตุผลที่ลาออก
            <input type="text" name="Reason_Leaving">
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
        <button type="button" onclick="location.href='select_work_exper.php'">ยกเลิก</button>
    </form>
</body>
</html>
