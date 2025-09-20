<?php
include("conn_db.php");

// ดึงข้อมูลจากตารางแม่
$applicant_result = $conn->query("SELECT ApplicantID FROM applicant");
$job_result = $conn->query("SELECT JobOpening_ID FROM job_openings");
$pos_result = $conn->query("SELECT PosID FROM position");
$round_result = $conn->query("SELECT Round FROM application_round");
$branch_result = $conn->query("SELECT BranchID FROM branch");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลการสมัครงาน</title>
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
        button {
            background-color: #888;
        }
        .required { color: red; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>ฟอร์มเพิ่มข้อมูลการสมัครงาน</h2>

    <form method="post" action="insert_employee_recruit02.php">
        <label>รหัสผู้สมัคร <span class="required">*</span>
            <select name="ApplicantID" required>
                <option value="">-- เลือกผู้สมัคร --</option>
                <?php while ($row = $applicant_result->fetch_assoc()) { ?>
                    <option value="<?= $row['ApplicantID'] ?>"><?= $row['ApplicantID'] ?></option>
                <?php } ?>
            </select>
        </label>

        <label>รหัสเปิดรับ <span class="required">*</span>
            <select name="JobOpening_ID" required>
                <option value="">-- เลือกรหัสเปิดรับ --</option>
                <?php while ($row = $job_result->fetch_assoc()) { ?>
                    <option value="<?= $row['JobOpening_ID'] ?>"><?= $row['JobOpening_ID'] ?></option>
                <?php } ?>
            </select>
        </label>

        <label>รหัสตำแหน่ง <span class="required">*</span>
            <select name="PosID" required>
                <option value="">-- เลือกรหัสตำแหน่ง --</option>
                <?php while ($row = $pos_result->fetch_assoc()) { ?>
                    <option value="<?= $row['PosID'] ?>"><?= $row['PosID'] ?></option>
                <?php } ?>
            </select>
        </label>

        <label>รอบสมัคร <span class="required">*</span>
            <select name="Round" required>
                <option value="">-- เลือกรอบ --</option>
                <?php while ($row = $round_result->fetch_assoc()) { ?>
                    <option value="<?= $row['Round'] ?>"><?= $row['Round'] ?></option>
                <?php } ?>
            </select>
        </label>

        <label>รหัสสาขา <span class="required">*</span>
            <select name="BranchID" required>
                <option value="">-- เลือกสาขา --</option>
                <?php while ($row = $branch_result->fetch_assoc()) { ?>
                    <option value="<?= $row['BranchID'] ?>"><?= $row['BranchID'] ?></option>
                <?php } ?>
            </select>
        </label>

        <label>วันที่สมัคร
            <input type="date" name="Application_Date">
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_employee_recruit.php'">ยกเลิก</button>
    </form>
</body>
</html>
