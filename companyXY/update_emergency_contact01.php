<?php
include("conn_db.php");

if (!isset($_GET['Contact_Name']) || !isset($_GET['ApplicantID'])) {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการแก้ไข'); window.location='select_emergency_contact.php';</script>";
    exit();
}

$Contact_Name = $_GET['Contact_Name'];
$ApplicantID = $_GET['ApplicantID'];

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT * FROM emergency_contact WHERE Contact_Name=? AND ApplicantID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $Contact_Name, $ApplicantID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "<script>alert('ไม่พบข้อมูลในระบบ'); window.location='select_emergency_contact.php';</script>";
    exit();
}

$row = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขผู้ติดต่อฉุกเฉิน</title>
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
    <h2>ฟอร์มแก้ไขข้อมูลผู้ติดต่อฉุกเฉิน</h2>

    <form method="post" action="update_emergency_contact02.php">
        <input type="hidden" name="Old_Contact_Name" value="<?= htmlspecialchars($Contact_Name) ?>">
        <input type="hidden" name="Old_ApplicantID" value="<?= htmlspecialchars($ApplicantID) ?>">

        <label>ชื่อผู้ติดต่อ <span class="required">*</span>
            <input type="text" name="Contact_Name" value="<?= htmlspecialchars($row['Contact_Name']) ?>" required>
        </label>

        <label>ความสัมพันธ์
            <input type="text" name="Relationship" value="<?= htmlspecialchars($row['Relationship']) ?>">
        </label>

        <label>ที่อยู่
            <input type="text" name="Address" value="<?= htmlspecialchars($row['Address']) ?>">
        </label>

        <label>เบอร์โทร <span class="required">*</span>
            <input type="text" name="Phone" value="<?= htmlspecialchars($row['Phone']) ?>" required pattern="\d{10}" title="กรอกเบอร์โทร 10 หลัก">
        </label>
        <label>รหัสผู้สมัคร <span class="required">*</span>
            <select name="ApplicantID" required>
                <?php
                $app_sql = "SELECT ApplicantID FROM applicant";
                $app_result = $conn->query($app_sql);
                while ($a = $app_result->fetch_assoc()) {
                    $selected = ($a['ApplicantID'] == $row['ApplicantID']) ? "selected" : "";
                    echo "<option value='{$a['ApplicantID']}' $selected>{$a['ApplicantID']}</option>";
                }
                ?>
            </select>
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_emergency_contact.php'">ยกเลิก</button>
    </form>
</body>
</html>
