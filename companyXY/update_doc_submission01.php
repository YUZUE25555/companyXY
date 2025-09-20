<?php
include("conn_db.php");

if (!isset($_GET['ApplicantID']) || !isset($_GET['DocID'])) {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการแก้ไข'); window.location.href='select_doc_submission.php';</script>";
    exit;
}

$ApplicantID = $_GET['ApplicantID'];
$DocID = $_GET['DocID'];

$sql = "SELECT * FROM doc_submission WHERE ApplicantID = '$ApplicantID' AND DocID = '$DocID'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขการส่งเอกสาร</title>
    <style>
        form {
            width: 40%; margin: auto; padding: 20px;
            border: 1px solid #ccc; border-radius: 8px;
        }
        label { display: block; margin-top: 10px; }
        input[type="text"] {
            width: 100%; padding: 8px; margin-top: 5px;
        }
        .required-label { color: red; }
        .invalid {
            border: 2px solid red; background-color: #ffe6e6;
        }
    </style>
</head>
<body>
    <h2 align="center">แก้ไขการส่งเอกสาร</h2>
    <form id="updateForm" action="update_doc_submission02.php" method="POST" onsubmit="return validateForm();">
        <input type="hidden" name="OldApplicantID" value="<?php echo $data['ApplicantID']; ?>">
        <input type="hidden" name="OldDocID" value="<?php echo $data['DocID']; ?>">

        <label for="ApplicantID">รหัสผู้สมัคร <span class="required-label">*</span></label>
        <input type="text" name="ApplicantID" id="ApplicantID" value="<?php echo $data['ApplicantID']; ?>">

        <label for="DocID">รหัสเอกสาร <span class="required-label">*</span></label>
        <input type="text" name="DocID" id="DocID" value="<?php echo $data['DocID']; ?>">

        <br><br>
        <div style="text-align: center;">
            <button type="submit">บันทึกการแก้ไข</button>
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
                alert("กรุณากรอกข้อมูลให้ครบถ้วน");
            }
            return isValid;
        }
    </script>
</body>
</html>