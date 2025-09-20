<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มเอกสารประกอบการสมัคร</title>
    <style>
        form {
            width: 40%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px;
        }
        label { display: block; margin-top: 10px; }
        input[type="text"] { width: 100%; padding: 8px; margin-top: 5px; }
        .required-label { color: red; }
        .invalid { border: 2px solid red; background-color: #ffe6e6; }
    </style>
</head>
<body>
    <h2 align="center">เพิ่มเอกสารประกอบการสมัคร</h2>
    <form id="supportForm" action="insert_support_doc02.php" method="POST" onsubmit="return validateForm();">
        <label for="DocID">รหัสเอกสาร <span class="required-label">*</span></label>
        <input type="text" name="DocID" id="DocID">

        <label for="DocName">ชื่อเอกสาร</label>
        <input type="text" name="DocName" id="DocName">

        <br><br>
        <div style="text-align: center;">
            <button type="submit">บันทึก</button>
            <button type="button" onclick="location.href='select_support_doc.php'">ยกเลิก</button>
        </div>
    </form>

    <script>
        function validateForm() {
            const docID = document.getElementById('DocID');
            let valid = true;

            docID.classList.remove("invalid");
            if (!docID.value.trim()) {
                docID.classList.add("invalid");
                valid = false;
            }

            if (!valid) alert("กรุณากรอกรหัสเอกสารให้ครบถ้วน");
            return valid;
        }
    </script>
</body>
</html>
