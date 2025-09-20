<?php
include("conn_db.php");

if (!isset($_GET["id"])) {
    echo "<script>alert('ไม่พบรหัสผู้สมัคร'); window.location.href='select_applicant.php';</script>";
    exit;
}

$ApplicantID = $_GET["id"];
$sql = "SELECT * FROM applicant WHERE ApplicantID = '$ApplicantID'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลผู้สมัคร</title>
    <style>
        .required-label { color: red; }
        .invalid { border: 2px solid red; background-color: #ffe6e6; }
        body { font-family: sans-serif; }
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { padding: 8px; }
    </style>
</head>
<body>
    <h2 align="center">แก้ไขข้อมูลผู้สมัคร</h2>
    <form id="editForm" action="update_applicant02.php" method="POST" onsubmit="return validateForm();">
        <input type="hidden" name="ApplicantID" value="<?php echo $data["ApplicantID"]; ?>">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr><td><span class="required-label">*</span> วันเกิด:</td><td><input type="date" name="BirthDate" id="BirthDate" value="<?php echo $data["BirthDate"]; ?>"></td></tr>
            <tr><td><span class="required-label">*</span> เลขบัตรประชาชน:</td><td><input type="text" name="NationalID" id="NationalID" value="<?php echo $data["NationalID"]; ?>"></td></tr>
            <tr><td><span class="required-label">*</span> วันหมดอายุบัตร:</td><td><input type="date" name="ID_Expiry_Date" id="ID_Expiry_Date" value="<?php echo $data["ID_Expiry_Date"]; ?>"></td></tr>
            <tr><td><span class="required-label">*</span> ชื่อ-นามสกุล:</td><td><input type="text" name="Name" id="Name" value="<?php echo $data["Name"]; ?>"></td></tr>
            <tr><td><span class="required-label">*</span> อายุ:</td><td><input type="number" name="age" id="age" value="<?php echo $data["age"]; ?>"></td></tr>
            <tr><td><span class="required-label">*</span> สัญชาติ:</td><td><input type="text" name="Nationality" id="Nationality" value="<?php echo $data["Nationality"]; ?>"></td></tr>
            <tr><td>เชื้อชาติ:</td><td><input type="text" name="Ethnicity" value="<?php echo $data["Ethnicity"]; ?>"></td></tr>
            <tr><td>อีเมล:</td><td><input type="email" name="Email" value="<?php echo $data["Email"]; ?>"></td></tr>
            <tr><td>Facebook:</td><td><input type="text" name="Facebook" value="<?php echo $data["Facebook"]; ?>"></td></tr>
            <tr>
                <td><span class="required-label">*</span> เพศ:</td>
                <td>
                    <select name="Gender" id="Gender">
                        <option value="">-- เลือกเพศ --</option>
                        <option value="M" <?php if ($data["Gender"] == "M") echo "selected"; ?>>ชาย</option>
                        <option value="F" <?php if ($data["Gender"] == "F") echo "selected"; ?>>หญิง</option>
                    </select>
                </td>
            </tr>
            <tr><td>โทรศัพท์บ้าน:</td><td><input type="text" name="Home_phone" id="Home_phone" value="<?php echo $data["Home_phone"]; ?>"></td></tr>
            <tr><td>โทรศัพท์สำนักงาน:</td><td><input type="text" name="Office_phone" id="Office_phone" value="<?php echo $data["Office_phone"]; ?>"></td></tr>
            <tr><td><span class="required-label">*</span> มือถือ:</td><td><input type="text" name="Mobile" id="Mobile" value="<?php echo $data["Mobile"]; ?>"></td></tr>
            <tr><td>สถานะทางทหาร:</td><td><input type="text" name="Military_Status" value="<?php echo $data["Military_Status"]; ?>"></td></tr>
            <tr><td>สถานภาพสมรส:</td><td><input type="text" name="Marital_Status" value="<?php echo $data["Marital_Status"]; ?>"></td></tr>
            <tr><td>ส่วนสูง (ซม.):</td><td><input type="number" name="Height" value="<?php echo $data["Height"]; ?>"></td></tr>
            <tr><td>น้ำหนัก (กก.):</td><td><input type="number" name="Weight" value="<?php echo $data["Weight"]; ?>"></td></tr>
            <tr><td>ศาสนา:</td><td><input type="text" name="Religion" value="<?php echo $data["Religion"]; ?>"></td></tr>
            <tr><td>รู้จักบริษัทจาก:</td><td><input type="text" name="Source_Information" value="<?php echo $data["Source_Information"]; ?>"></td></tr>
            <tr><td>บ้านเลขที่:</td><td><input type="text" name="AddressNum" value="<?php echo $data["AddressNum"]; ?>"></td></tr>
            <tr><td>ถนน:</td><td><input type="text" name="Street" value="<?php echo $data["Street"]; ?>"></td></tr>
            <tr><td>หมู่บ้าน:</td><td><input type="text" name="Village" value="<?php echo $data["Village"]; ?>"></td></tr>
            <tr><td>ตำบล:</td><td><input type="text" name="Subdistrict" value="<?php echo $data["Subdistrict"]; ?>"></td></tr>
            <tr><td>อำเภอ:</td><td><input type="text" name="District" value="<?php echo $data["District"]; ?>"></td></tr>
            <tr><td>จังหวัด:</td><td><input type="text" name="Province" value="<?php echo $data["Province"]; ?>"></td></tr>
            <tr><td>รหัสไปรษณีย์:</td><td><input type="text" name="Postal_Code" value="<?php echo $data["Postal_Code"]; ?>"></td></tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit">บันทึกการแก้ไข</button>
                    <button type="button" onclick="location.href='select_Applicants.php'">ยกเลิก</button>
                </td>
            </tr>
        </table>
    </form>

    <script>
        function validateForm() {
            let isValid = true;
            const requiredFields = ['BirthDate', 'NationalID', 'ID_Expiry_Date', 'Name', 'age', 'Nationality', 'Gender'];

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
