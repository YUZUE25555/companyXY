<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลผู้สมัคร</title>
    <style>
        .required-label {
            color: red;
        }
        .invalid {
            border: 2px solid red;
            background-color: #ffe6e6;
        }
        body {
            font-family: sans-serif;
        }
        table {
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2 align="center">ฟอร์มเพิ่มข้อมูลผู้สมัคร</h2>
    <form id="applicantForm" action="insert_applicant02.php" method="POST" style="width:40%; margin:auto;" onsubmit="return validateForm();">
        <table border="1" cellpadding="5" cellspacing="0" style="width:100%;">
            <tr><td><span class="required-label">*</span> วันเกิด:</td><td><input type="date" name="BirthDate" id="BirthDate"></td></tr>
            <tr><td><span class="required-label">*</span> เลขบัตรประชาชน:</td><td><input type="text" name="NationalID" id="NationalID"></td></tr>
            <tr><td><span class="required-label">*</span> วันหมดอายุบัตร:</td><td><input type="date" name="ID_Expiry_Date" id="ID_Expiry_Date"></td></tr>
            <tr><td><span class="required-label">*</span> ชื่อ-นามสกุล:</td><td><input type="text" name="Name" id="Name"></td></tr>
            <tr><td><span class="required-label">*</span> อายุ:</td><td><input type="number" name="age" id="age"></td></tr>
            <tr><td><span class="required-label">*</span> สัญชาติ:</td><td><input type="text" name="Nationality" id="Nationality"></td></tr>
            <tr><td>เชื้อชาติ:</td><td><input type="text" name="Ethnicity" id="Ethnicity"></td></tr>
            <tr><td>อีเมล:</td><td><input type="email" name="Email" id="Email"></td></tr>
            <tr><td>Facebook:</td><td><input type="text" name="Facebook" id="Facebook"></td></tr>
            <tr>
                <td><span class="required-label">*</span> เพศ:</td>
                <td>
                    <select name="Gender" id="Gender">
                        <option value="">-- เลือกเพศ --</option>
                        <option value="M">ชาย</option>
                        <option value="F">หญิง</option>
                    </select>
                </td>
            </tr>
            <tr><td>โทรศัพท์บ้าน:</td><td><input type="text" name="Home_phone" id="Home_phone"></td></tr>
            <tr><td>โทรศัพท์สำนักงาน:</td><td><input type="text" name="Office_phone" id="Office_phone"></td></tr>
            <tr><td><span class="required-label">*</span> มือถือ:</td><td><input type="text" name="Mobile" id="Mobile"></td></tr>
            <tr><td>สถานะทางทหาร:</td><td><input type="text" name="Military_Status" id="Military_Status"></td></tr>
            <tr><td>สถานภาพสมรส:</td><td><input type="text" name="Marital_Status" id="Marital_Status"></td></tr>
            <tr><td>ส่วนสูง (ซม.):</td><td><input type="number" name="Height" id="Height"></td></tr>
            <tr><td>น้ำหนัก (กก.):</td><td><input type="number" name="Weight" id="Weight"></td></tr>
            <tr><td>ศาสนา:</td><td><input type="text" name="Religion" id="Religion"></td></tr>
            <tr><td>รู้จักบริษัทจาก:</td><td><input type="text" name="Source_Information" id="Source_Information"></td></tr>
            <tr><td>บ้านเลขที่:</td><td><input type="text" name="AddressNum" id="AddressNum"></td></tr>
            <tr><td>ถนน:</td><td><input type="text" name="Street" id="Street"></td></tr>
            <tr><td>หมู่บ้าน:</td><td><input type="text" name="Village" id="Village"></td></tr>
            <tr><td>ตำบล:</td><td><input type="text" name="Subdistrict" id="Subdistrict"></td></tr>
            <tr><td>อำเภอ:</td><td><input type="text" name="District" id="District"></td></tr>
            <tr><td>จังหวัด:</td><td><input type="text" name="Province" id="Province"></td></tr>
            <tr><td>รหัสไปรษณีย์:</td><td><input type="text" name="Postal_Code" id="Postal_Code"></td></tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="บันทึกข้อมูล">
                    <input type="reset" value="ล้างข้อมูล">
                </td>
            </tr>
        </table>
    </form>
    <br></br>
    <?php 
        echo "<div style='text-align:center; margin-bottom: 20px;'>
                <button type=\"button\" class=\"btn btn-warning\" 
                    onclick=\"location.href='select_Applicants.php'\" style=\"width:150px;\">Go back to Applicant</button>
        </div>";
    ?>
    <script>
        function validateForm() {
            
            let isValid = true;
            const requiredFields = [
                'BirthDate', 'NationalID', 'ID_Expiry_Date',
                'Name', 'age', 'Nationality', 'Gender','Mobile'
            ];

            requiredFields.forEach(function(id) {
                const input = document.getElementById(id);
                input.classList.remove("invalid");

                if (!input.value.trim()) {
                    input.classList.add("invalid");
                    isValid = false;
                }
            });

            if (!isValid) {
                alert("กรุณากรอกข้อมูลในช่องที่มี * ให้ครบถ้วนก่อนบันทึก");
            }

            return isValid;
        }
    </script>
</body>
</html>
