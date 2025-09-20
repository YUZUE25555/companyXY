<?php
include("conn_db.php");

// ดึงข้อมูลจากตารางแม่
$pos_result = $conn->query("SELECT PosID FROM position");
$branch_result = $conn->query("SELECT BranchID FROM branch");
$round_result = $conn->query("SELECT Round FROM application_round");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มตำแหน่งที่เปิดรับ</title>
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
        input[type="number"],
        select,
        textarea {
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
    <h2>ฟอร์มเพิ่มตำแหน่งที่เปิดรับ</h2>

    <form method="post" action="insert_job_openings02.php">
        <label>รหัสเปิดรับ <span class="required">*</span>
            <input type="number" name="JobOpening_ID" required>
        </label>

        <label>ตำแหน่ง <span class="required">*</span>
            <select name="PosID" required>
                <option value="">-- เลือกตำแหน่ง --</option>
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

        <label>สาขา <span class="required">*</span>
            <select name="BranchID" required>
                <option value="">-- เลือกสาขา --</option>
                <?php while ($row = $branch_result->fetch_assoc()) { ?>
                    <option value="<?= $row['BranchID'] ?>"><?= $row['BranchID'] ?></option>
                <?php } ?>
            </select>
        </label>

        <label>จำนวนอัตราที่เปิดรับ
            <input type="number" name="Amount">
        </label>

        <label>สถานะการเปิดรับ
            <select name="Application_Status">
                <option value="Open">Open</option>
                <option value="Close">Close</option>
            </select>
        </label>

        <label>คุณสมบัติ
            <textarea name="Qualifications" rows="3"></textarea>
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_job_openings.php'">ยกเลิก</button>
    </form>
</body>
</html>
