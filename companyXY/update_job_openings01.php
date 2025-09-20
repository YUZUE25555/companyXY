<?php
include("conn_db.php");

if (!isset($_GET['JobOpening_ID'])) {
    echo "<script>alert('ไม่พบรหัสตำแหน่งที่เปิดรับ'); window.location='select_job_openings.php';</script>";
    exit();
}

$JobOpening_ID = $_GET['JobOpening_ID'];

// ดึงข้อมูลปัจจุบัน
$stmt = $conn->prepare("SELECT * FROM job_openings WHERE JobOpening_ID = ?");
$stmt->bind_param("i", $JobOpening_ID);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows !== 1) {
    echo "<script>alert('ไม่พบข้อมูลในระบบ'); window.location='select_job_openings.php';</script>";
    exit();
}
$row = $result->fetch_assoc();
$stmt->close();

// ดึง dropdown
$pos_result = $conn->query("SELECT PosID FROM position");
$branch_result = $conn->query("SELECT BranchID FROM branch");
$round_result = $conn->query("SELECT Round FROM application_round");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขตำแหน่งที่เปิดรับ</title>
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
    <h2>ฟอร์มแก้ไขตำแหน่งที่เปิดรับ</h2>

    <form method="post" action="update_job_openings02.php">
        <input type="hidden" name="Old_JobOpening_ID" value="<?= htmlspecialchars($row['JobOpening_ID']) ?>">

        <label>รหัสเปิดรับ <span class="required">*</span>
            <input type="number" name="JobOpening_ID" value="<?= htmlspecialchars($row['JobOpening_ID']) ?>" required>
        </label>

        <label>ตำแหน่ง <span class="required">*</span>
            <select name="PosID" required>
                <option value="">-- เลือกตำแหน่ง --</option>
                <?php while ($pos = $pos_result->fetch_assoc()) {
                    $selected = ($pos['PosID'] == $row['PosID']) ? "selected" : "";
                    echo "<option value='{$pos['PosID']}' $selected>{$pos['PosID']}</option>";
                } ?>
            </select>
        </label>

        <label>รอบสมัคร <span class="required">*</span>
            <select name="Round" required>
                <option value="">-- เลือกรอบ --</option>
                <?php while ($r = $round_result->fetch_assoc()) {
                    $selected = ($r['Round'] == $row['Round']) ? "selected" : "";
                    echo "<option value='{$r['Round']}' $selected>{$r['Round']}</option>";
                } ?>
            </select>
        </label>

        <label>สาขา <span class="required">*</span>
            <select name="BranchID" required>
                <option value="">-- เลือกสาขา --</option>
                <?php while ($b = $branch_result->fetch_assoc()) {
                    $selected = ($b['BranchID'] == $row['BranchID']) ? "selected" : "";
                    echo "<option value='{$b['BranchID']}' $selected>{$b['BranchID']}</option>";
                } ?>
            </select>
        </label>

        <label>จำนวนอัตราที่เปิดรับ
            <input type="number" name="Amount" value="<?= htmlspecialchars($row['Amount']) ?>">
        </label>

        <label>สถานะการเปิดรับ
            <select name="Application_Status">
                <option value="Open" <?= $row['Application_Status'] === 'Open' ? 'selected' : '' ?>>Open</option>
                <option value="Close" <?= $row['Application_Status'] === 'Close' ? 'selected' : '' ?>>Close</option>
            </select>
        </label>

        <label>คุณสมบัติ
            <textarea name="Qualifications" rows="3"><?= htmlspecialchars($row['Qualifications']) ?></textarea>
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_job_openings.php'">ยกเลิก</button>
    </form>
</body>
</html>
