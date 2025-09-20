<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มสาขา</title>
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
    <h2 align="center">เพิ่มข้อมูลสาขา</h2>
    <form id="branchForm" action="insert_branch02.php" method="POST" onsubmit="return validateForm();">
        <label for="BranchID">รหัสสาขา <span class="required-label">*</span></label>
        <input type="text" name="BranchID" id="BranchID">

        <label for="BranchName">ชื่อสาขา</label>
        <input type="text" name="BranchName" id="BranchName">

        <br><br>
        <div style="text-align: center;">
            <button type="submit">บันทึก</button>
            <button type="button" onclick="location.href='select_branch.php'">ยกเลิก</button>
        </div>
    </form>
    <br></br>
    <div style='text-align:center; margin-bottom: 20px;'>
            <button type="button" class="btn btn-warning" onclick="location.href='select_branch.php'" style="width:150px;">Back to Branch</button>
        </div>
    <script>
        function validateForm() {
            const branchID = document.getElementById("BranchID");
            branchID.classList.remove("invalid");

            if (!branchID.value.trim()) {
                branchID.classList.add("invalid");
                alert("กรุณากรอกรหัสสาขา");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
