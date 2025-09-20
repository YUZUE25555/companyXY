<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มรอบการสมัคร</title>
    <style>
        form { width: 40%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="date"] { width: 100%; padding: 8px; margin-top: 5px; }
        .required-label { color: red; }
        .invalid { border: 2px solid red; background-color: #ffe6e6; }
    </style>
</head>
<body>
    <h2 align="center">เพิ่มรอบการสมัคร</h2>
    <form id="roundForm" action="insert_application_round02.php" method="POST" onsubmit="return validateForm();">
        <label for="round">เลขรอบ <span class="required-label">*</span></label>
        <input type="text" name="round" id="round">
        <label>ปีที่เปิดรับ:</label>
            <input type="number" name="Opening_Year" min="2000" max="2100" required>


        <br><br>
        <div style="text-align: center;">
            <button type="submit">บันทึก</button>
            <button type="button" onclick="location.href='select_application_round.php'">ยกเลิก</button>
        </div>
    </form>

    <script>
        function validateForm() {
            let isValid = true;
            const requiredFields = ['round', 'Opening_Year'];

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