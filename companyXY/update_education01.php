<?php
include("conn_db.php");

$Education_Level = $_GET['Education_Level'];
$Institution = $_GET['Institution'];
$Start_Date = $_GET['Start_Date'];
$End_Date = $_GET['End_Date'];
$Major = $_GET['Major'];
$ApplicantID = $_GET['ApplicantID'];

// ดึงข้อมูล record เดิม
$sql = "SELECT * FROM education 
        WHERE Education_Level=? AND Institution=? AND Start_Date=? AND End_Date=? AND Major=? AND ApplicantID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $Education_Level, $Institution, $Start_Date, $End_Date, $Major, $ApplicantID);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// ดึง Applicant ทั้งหมด
$applicants = $conn->query("SELECT ApplicantID, Name FROM applicant ORDER BY ApplicantID ASC");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลการศึกษา</title>
    <style>
        form {
            width: 40%; margin: auto; padding: 20px;
            border: 1px solid #ccc; border-radius: 8px;
        }
        label { display: block; margin-top: 10px; }
        .required-label { color: red; }
    </style>
    <script>
        function validateForm() {
            let required = ['Education_Level', 'Institution', 'Start_Date', 'End_Date', 'Major', 'ApplicantID'];
            for (let field of required) {
                let input = document.forms["eduForm"][field];
                if (input.value.trim() === "") {
                    alert("กรุณากรอกข้อมูลให้ครบทุกช่องที่มี *");
                    input.style.border = "2px solid red";
                    input.focus();
                    return false;
                } else {
                    input.style.border = "";
                }
            }
            return true;
        }
    </script>
</head>
<body>
    <h2 align="center">แก้ไขข้อมูลการศึกษา</h2>

    <form name="eduForm" method="POST" action="update_education02.php" onsubmit="return validateForm();">
        <label>ระดับการศึกษา <span class="required-label">*</span></label>
        <input type="text" name="Education_Level" value="<?php echo $data['Education_Level']; ?>">

        <label>สถานศึกษา <span class="required-label">*</span></label>
        <input type="text" name="Institution" value="<?php echo $data['Institution']; ?>">

        <label>วันเริ่มเรียน <span class="required-label">*</span></label>
        <input type="date" name="Start_Date" value="<?php echo $data['Start_Date']; ?>">

        <label>วันจบการศึกษา <span class="required-label">*</span></label>
        <input type="date" name="End_Date" value="<?php echo $data['End_Date']; ?>">

        <label>สาขาวิชา <span class="required-label">*</span></label>
        <input type="text" name="Major" value="<?php echo $data['Major']; ?>">

        <label>รหัสผู้สมัคร <span class="required-label">*</span></label>
        <select name="ApplicantID">
            <option value="">-- กรุณาเลือกผู้สมัคร --</option>
            <?php while ($a = $applicants->fetch_assoc()) {
                $selected = ($a['ApplicantID'] == $data['ApplicantID']) ? "selected" : "";
                echo "<option value='{$a['ApplicantID']}' $selected>{$a['ApplicantID']} - {$a['Name']}</option>";
            } ?>
        </select><br><br>

        <!-- Hidden original PKs -->
        <input type="hidden" name="old_Education_Level" value="<?php echo $Education_Level; ?>">
        <input type="hidden" name="old_Institution" value="<?php echo $Institution; ?>">
        <input type="hidden" name="old_Start_Date" value="<?php echo $Start_Date; ?>">
        <input type="hidden" name="old_End_Date" value="<?php echo $End_Date; ?>">
        <input type="hidden" name="old_Major" value="<?php echo $Major; ?>">
        <input type="hidden" name="old_ApplicantID" value="<?php echo $ApplicantID; ?>">

        <div style="text-align:center; margin-top: 20px;">
            <button type="submit">บันทึก</button>
            <button type="button" onclick="location.href='select_education.php'">ยกเลิก</button>
        </div>
    </form>
</body>
</html>
