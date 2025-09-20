<?php
include("conn_db.php");

if (!isset($_GET['ApplicantID'], $_GET['JobOpening_ID'], $_GET['PosID'], $_GET['Round'], $_GET['BranchID'])) {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการแก้ไข'); window.location='select_employee_recruit.php';</script>";
    exit();
}

$ApplicantID = $_GET['ApplicantID'];
$JobOpening_ID = $_GET['JobOpening_ID'];
$PosID = $_GET['PosID'];
$Round = $_GET['Round'];
$BranchID = $_GET['BranchID'];

// ดึงข้อมูลเดิม
$stmt = $conn->prepare("SELECT * FROM employee_recruit WHERE 
    ApplicantID = ? AND JobOpening_ID = ? AND PosID = ? AND Round = ? AND BranchID = ?");
$stmt->bind_param("iiiii", $ApplicantID, $JobOpening_ID, $PosID, $Round, $BranchID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "<script>alert('ไม่พบข้อมูลในระบบ'); window.location='select_employee_recruit.php';</script>";
    exit();
}
$row = $result->fetch_assoc();
$stmt->close();

// dropdown ข้อมูลจากแม่
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
    <title>แก้ไขข้อมูลการสมัครงาน</title>
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
        select, input[type="date"] {
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
    <h2>ฟอร์มแก้ไขข้อมูลการสมัครงาน</h2>

    <form method="post" action="update_employee_recruit02.php">
        <!-- ส่งคีย์เดิมทั้งหมดไป -->
        <input type="hidden" name="Old_ApplicantID" value="<?= $ApplicantID ?>">
        <input type="hidden" name="Old_JobOpening_ID" value="<?= $JobOpening_ID ?>">
        <input type="hidden" name="Old_PosID" value="<?= $PosID ?>">
        <input type="hidden" name="Old_Round" value="<?= $Round ?>">
        <input type="hidden" name="Old_BranchID" value="<?= $BranchID ?>">

        <label>รหัสผู้สมัคร <span class="required">*</span>
            <select name="ApplicantID" required>
                <option value="">-- เลือกผู้สมัคร --</option>
                <?php while ($a = $applicant_result->fetch_assoc()) {
                    $sel = ($a['ApplicantID'] == $ApplicantID) ? 'selected' : '';
                    echo "<option value='{$a['ApplicantID']}' $sel>{$a['ApplicantID']}</option>";
                } ?>
            </select>
        </label>

        <label>รหัสเปิดรับ <span class="required">*</span>
            <select name="JobOpening_ID" required>
                <option value="">-- เลือกรหัสเปิดรับ --</option>
                <?php while ($j = $job_result->fetch_assoc()) {
                    $sel = ($j['JobOpening_ID'] == $JobOpening_ID) ? 'selected' : '';
                    echo "<option value='{$j['JobOpening_ID']}' $sel>{$j['JobOpening_ID']}</option>";
                } ?>
            </select>
        </label>

        <label>รหัสตำแหน่ง <span class="required">*</span>
            <select name="PosID" required>
                <option value="">-- เลือกรหัสตำแหน่ง --</option>
                <?php while ($p = $pos_result->fetch_assoc()) {
                    $sel = ($p['PosID'] == $PosID) ? 'selected' : '';
                    echo "<option value='{$p['PosID']}' $sel>{$p['PosID']}</option>";
                } ?>
            </select>
        </label>

        <label>รอบสมัคร <span class="required">*</span>
            <select name="Round" required>
                <option value="">-- เลือกรอบ --</option>
                <?php while ($r = $round_result->fetch_assoc()) {
                    $sel = ($r['Round'] == $Round) ? 'selected' : '';
                    echo "<option value='{$r['Round']}' $sel>{$r['Round']}</option>";
                } ?>
            </select>
        </label>

        <label>รหัสสาขา <span class="required">*</span>
            <select name="BranchID" required>
                <option value="">-- เลือกสาขา --</option>
                <?php while ($b = $branch_result->fetch_assoc()) {
                    $sel = ($b['BranchID'] == $BranchID) ? 'selected' : '';
                    echo "<option value='{$b['BranchID']}' $sel>{$b['BranchID']}</option>";
                } ?>
            </select>
        </label>

        <label>วันที่สมัคร
            <input type="date" name="Application_Date" value="<?= $row['Application_Date'] ?>">
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_employee_recruit.php'">ยกเลิก</button>
    </form>
</body>
</html>
