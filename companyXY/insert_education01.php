<?php
include("conn_db.php");

// ดึงข้อมูล ApplicantID จากตาราง applicant
$applicants = $conn->query("SELECT ApplicantID, Name FROM applicant ORDER BY ApplicantID ASC");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลการศึกษา</title>
    <style>
        form {
            width: 40%; margin: auto; padding: 20px;
            border: 1px solid #ccc; border-radius: 8px;
        }
        label { display: block; margin-top: 10px; }
        select {
            width: 100%; padding: 8px; margin-top: 5px;
        }
        .required-label { color: red; }
        .invalid {
            border: 2px solid red; background-color: #ffe6e6;
        }
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
    <h2 align="center">เพิ่มข้อมูลการศึกษา</h2>
    
    <form name="eduForm" method="POST" action="insert_education02.php" onsubmit="return validateForm();" style="width: 600px; margin: auto;">
    <label>ระดับการศึกษา <span class="required-label">*</span></label>
        <input type="text" name="Education_Level">

        <label>สถานศึกษา <span class="required-label">*</span></label>
        <input type="text" name="Institution">

        <label>วันเริ่มเรียน <span class="required-label">*</span></label>
        <input type="date" name="Start_Date">

        <label>วันจบการศึกษา <span class="required-label">*</span></label>
        <input type="date" name="End_Date">

        <label>สาขาวิชา <span class="required-label">*</span></label>
        <input type="text" name="Major">

        <label>รหัสผู้สมัคร <span class="required-label">*</span></label>
        <select name="ApplicantID">
            <option value="">-- กรุณาเลือกผู้สมัคร --</option>
            <?php while ($row = $applicants->fetch_assoc()) {
                echo "<option value='{$row['ApplicantID']}'>{$row['ApplicantID']} - {$row['Name']}</option>";
            } ?>
        </select><br><br>

        <div style="text-align:center;">
            <button type="submit">บันทึก</button>
            <button type="button" onclick="location.href='select_education.php'">ยกเลิก</button>
        </div>
    </form>
</body>
</html>
