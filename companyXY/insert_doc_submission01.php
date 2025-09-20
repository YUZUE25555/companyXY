<?php
include("conn_db.php");

$applicants = $conn->query("SELECT ApplicantID, Name FROM applicant ORDER BY ApplicantID ASC");
$documents = $conn->query("SELECT DocID, DocName FROM support_doc ORDER BY DocID ASC");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มการส่งเอกสาร</title>
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
</head>
<body>
    <h2 align="center">เพิ่มการส่งเอกสาร</h2>

    <div style='text-align:center; margin-bottom: 20px;'>
        <button type="button" class="btn btn-warning" onclick="location.href='insert_doc_submission01.php'" style="width:150px;">New Submission</button>
        <button type="button" class="btn btn-warning" onclick="location.href='index.php'" style="width:150px;">Back to Home</button>
    </div>

    <form id="submissionForm" action="insert_doc_submission02.php" method="POST" onsubmit="return validateForm();">
        <label for="ApplicantID">รหัสผู้สมัคร <span class="required-label">*</span></label>
        <select name="ApplicantID" id="ApplicantID">
            <option value="">-- กรุณาเลือก --</option>
            <?php while ($a = $applicants->fetch_assoc()) {
                echo "<option value='{$a['ApplicantID']}'>{$a['ApplicantID']} - {$a['Name']}</option>";
            } ?>
        </select>

        <label for="DocID">รหัสเอกสาร <span class="required-label">*</span></label>
        <select name="DocID" id="DocID">
            <option value="">-- กรุณาเลือก --</option>
            <?php while ($d = $documents->fetch_assoc()) {
                echo "<option value='{$d['DocID']}'>{$d['DocID']} - {$d['DocName']}</option>";
            } ?>
        </select>

        <br><br>
        <div style="text-align: center;">
            <button type="submit">บันทึก</button>
            <button type="button" onclick="location.href='select_doc_submission.php'">ยกเลิก</button>
        </div>
    </form>

    <script>
        function validateForm() {
            let isValid = true;
            const requiredFields = ['ApplicantID', 'DocID'];

            requiredFields.forEach(id => {
                const input = document.getElementById(id);
                input.classList.remove("invalid");
                if (!input.value.trim()) {
                    input.classList.add("invalid");
                    isValid = false;
                }
            });

            if (!isValid) {
                alert("กรุณาเลือกข้อมูลให้ครบถ้วน");
            }
            return isValid;
        }
    </script>
</body>
</html>
