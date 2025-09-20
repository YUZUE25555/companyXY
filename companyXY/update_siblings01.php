<?php
include("conn_db.php");

if (!isset($_GET['Age'], $_GET['Occouation'], $_GET['Sibling_Name'], $_GET['Sibling_Order'], $_GET['Num_Siblings'], $_GET['ApplicantID'])) {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการแก้ไข'); window.location='select_siblings.php';</script>";
    exit();
}

$Age = $_GET['Age'];
$Occouation = $_GET['Occouation'];
$Sibling_Name = $_GET['Sibling_Name'];
$Sibling_Order = $_GET['Sibling_Order'];
$Num_Siblings = $_GET['Num_Siblings'];
$ApplicantID = $_GET['ApplicantID'];

// ดึงข้อมูลเดิม
$stmt = $conn->prepare("SELECT * FROM siblings WHERE 
    Age = ? AND Occouation = ? AND Sibling_Name = ? AND Sibling_Order = ? AND Num_Siblings = ? AND ApplicantID = ?");
$stmt->bind_param("issiii", $Age, $Occouation, $Sibling_Name, $Sibling_Order, $Num_Siblings, $ApplicantID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "<script>alert('ไม่พบข้อมูลในระบบ'); window.location='select_siblings.php';</script>";
    exit();
}
$row = $result->fetch_assoc();
$stmt->close();

$applicant_result = $conn->query("SELECT ApplicantID FROM applicant");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลพี่น้อง</title>
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
        button { background-color: #888; }
        .required { color: red; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>ฟอร์มแก้ไขข้อมูลพี่น้อง</h2>

    <form method="post" action="update_siblings02.php">
        <!-- ส่งคีย์เก่าไปให้ -->
        <input type="hidden" name="Old_Age" value="<?= $Age ?>">
        <input type="hidden" name="Old_Occouation" value="<?= htmlspecialchars($Occouation) ?>">
        <input type="hidden" name="Old_Sibling_Name" value="<?= htmlspecialchars($Sibling_Name) ?>">
        <input type="hidden" name="Old_Sibling_Order" value="<?= $Sibling_Order ?>">
        <input type="hidden" name="Old_Num_Siblings" value="<?= $Num_Siblings ?>">
        <input type="hidden" name="Old_ApplicantID" value="<?= $ApplicantID ?>">

        <label>ชื่อพี่น้อง <span class="required">*</span>
            <input type="text" name="Sibling_Name" value="<?= htmlspecialchars($row['Sibling_Name']) ?>" required>
        </label>

        <label>อายุ <span class="required">*</span>
            <input type="number" name="Age" value="<?= $row['Age'] ?>" required>
        </label>

        <label>อาชีพ <span class="required">*</span>
            <input type="text" name="Occupation" value="<?= htmlspecialchars($row['Occouation']) ?>" required>
        </label>

        <label>ลำดับในครอบครัว <span class="required">*</span>
            <input type="number" name="Sibling_Order" value="<?= $row['Sibling_Order'] ?>" required>
        </label>

        <label>จำนวนพี่น้องทั้งหมด <span class="required">*</span>
            <input type="number" name="Num_Siblings" value="<?= $row['Num_Siblings'] ?>" required>
        </label>

        <label>รหัสผู้สมัคร <span class="required">*</span>
            <select name="ApplicantID" required>
                <option value="">-- เลือกรหัสผู้สมัคร --</option>
                <?php while ($a = $applicant_result->fetch_assoc()) {
                    $sel = ($a['ApplicantID'] == $ApplicantID) ? 'selected' : '';
                    echo "<option value='{$a['ApplicantID']}' $sel>{$a['ApplicantID']}</option>";
                } ?>
            </select>
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_siblings.php'">ยกเลิก</button>
    </form>
</body>
</html>
