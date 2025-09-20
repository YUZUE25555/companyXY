<?php
include("conn_db.php");

if (!isset($_GET['Workplace']) || !isset($_GET['ApplicantID'])) {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการแก้ไข'); window.location='select_work_exper.php';</script>";
    exit();
}

$Workplace = $_GET['Workplace'];
$ApplicantID = $_GET['ApplicantID'];

$stmt = $conn->prepare("SELECT * FROM work_exper WHERE Workplace = ? AND ApplicantID = ?");
$stmt->bind_param("si", $Workplace, $ApplicantID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 1) {
    echo "<script>alert('ไม่พบข้อมูลประสบการณ์นี้'); window.location='select_work_exper.php';</script>";
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
    <title>แก้ไขประสบการณ์ทำงาน</title>
    <style>
        form {
            width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 12px;
            background-color: #f9f9f9;
        }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="number"], input[type="date"], select {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], button {
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
    <h2>แก้ไขประสบการณ์ทำงาน</h2>

    <form method="post" action="update_work_exper02.php">
        <input type="hidden" name="Old_Workplace" value="<?= $Workplace ?>">
        <input type="hidden" name="Old_ApplicantID" value="<?= $ApplicantID ?>">

        <label>สถานที่ทำงาน <span class="required">*</span>
            <input type="text" name="Workplace" value="<?= htmlspecialchars($row['Workplace']) ?>" required>
        </label>

        <label>ตำแหน่ง
            <input type="text" name="Job_Position" value="<?= htmlspecialchars($row['Job_Position']) ?>">
        </label>

        <label>เงินเดือน
            <input type="number" name="Salary" value="<?= $row['Salary'] ?>">
        </label>

        <label>รายละเอียดงาน
            <input type="text" name="Job_Description" value="<?= htmlspecialchars($row['Job_Description']) ?>">
        </label>

        <label>วันเริ่มทำงาน
            <input type="date" name="Start_Date" value="<?= $row['Start_Date'] ?>">
        </label>

        <label>วันสิ้นสุด
            <input type="date" name="End_date" value="<?= $row['End_date'] ?>">
        </label>

        <label>เหตุผลลาออก
            <input type="text" name="Reason_Leaving" value="<?= htmlspecialchars($row['Reason_Leaving']) ?>">
        </label>

        <label>รหัสผู้สมัคร <span class="required">*</span>
            <select name="ApplicantID" required>
                <option value="">-- เลือก --</option>
                <?php while ($a = $applicants->fetch_assoc()) {
                    $selected = ($a['ApplicantID'] == $ApplicantID) ? "selected" : "";
                    echo "<option value='{$a['ApplicantID']}' $selected>{$a['ApplicantID']}</option>";
                } ?>
            </select>
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_work_exper.php'">ยกเลิก</button>
    </form>
</body>
</html>
